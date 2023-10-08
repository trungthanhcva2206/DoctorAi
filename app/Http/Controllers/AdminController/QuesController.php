<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Question;
use App\Models\Asked_question;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;


class QuesController extends Controller
{
    public function showQuestion(){
        $questions = Question::get();
        foreach ($questions as $question) {
            $user = User::find($question->user_id);
            $question->user_info = $user;
        }
        return view('Admin/question',compact('questions'));
    }
    public function newQuestion(){
        $questions = Question::whereNull('answer')->get();
        foreach ($questions as $question) {
            $user = User::find($question->user_id);
            $question->user_info = $user;
        }
        return view('Admin/new-question',compact('questions'));
    }
    public function answer($id){
        $question = Question::find($id);
        return view('Admin/answer',compact('question'));
    }
    public function answerPost(Request $request, $id)
    {
        $question = Question::find($id);
        $question->answer = $request->answer;
        $question->user_id = Auth::user()->id;
        $question->save();

        
        $userIds = Asked_question::where('question_id', $question->id)->pluck('user_id')->toArray();

    
        $usersToNotify = User::whereIn('id', $userIds)->where('role', 0)->get();

        foreach ($usersToNotify as $user) {
            Mail::send("Client.sendMail", ['question' => $question->question, 'answer' => $request->answer], function ($message) use ($user) {
                $message->to($user->email);
                $message->subject("Trả lời câu hỏi");
            });
        }

        return redirect()->route('show.question')->with('success.answer', 'Sửa câu trả lời thành công.');
    }
    public function getUnansweredQuestionCount()
    {
        
        $unansweredCount = Question::whereNull('answer')->count();
        return response()->json(['unansweredCount' => $unansweredCount]);
    }
    public function addQuestion(){
        return view('Admin.add-question');
    }
    public function addQuestionPost(Request $request){
        $question = new Question;
        $messages = [
            'question.required' => 'Vui lòng nhập câu hỏi.',
        ];
    
        $credentials = $request->validate([
            'question' => ['required'],
        ], $messages);
        $question->user_id = Auth::user()->id;
        $question->question = $request->question;
        
        $question->save();
        return redirect()->route('show.question')->with('success.add-question', 'Thêm câu hỏi thành công.');;
    }
    public function updateQuestion($id){
        $question = Question::find($id);
        return view('Admin/update-question', compact('question'));
    }
    public function updateQuestionPost(Request $request,$id){
        $question = Question::find($id);
        $messages = [
            'question.required' => 'Vui lòng nhập câu hỏi.',
        ];
    
        $credentials = $request->validate([
            'question' => ['required'],
        ], $messages);
        if(empty($question->answer)){
            $question->question = $request->question;
            $question->save();
            return redirect()->route('show.question')->with('success.update-question', 'Sửa câu hỏi thành công');
        }
        else{
        return redirect()->route('show.question')->with('error.update-question', 'Câu hỏi đã trả lời thì không được sửa');}
    }
    public function deleteQuestion($id){
        $question = Question::find($id);
        $question_id = $question->id;
        $userCount = Asked_question::where('question_id',$question_id)->count();
        if($userCount == 0){
            $question->delete();
            return redirect()->route('show.question')->with('success.delete-question', 'Xóa câu hỏi thành công');
        }else{
            return redirect()->route('show.question')->with('error.delete-question', 'Không thể xóa vì còn trong lịch sử câu hỏi của người dùng');
        }
    }

}
