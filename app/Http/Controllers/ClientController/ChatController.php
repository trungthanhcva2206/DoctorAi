<?php

namespace App\Http\Controllers\ClientController;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Asked_Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChatController extends Controller
{
    public function chat(){
        $askedQuestions = DB::table('asked_questions')
        ->join('questions', 'asked_questions.question_id', '=', 'questions.id')
        ->select('questions.question', 'asked_questions.created_at','asked_questions.question_id','asked_questions.id')
        ->where('asked_questions.user_id', Auth::user()->id)
        ->get();
        return view('Client.chat',compact('askedQuestions')); 
    }
    public function chatPost(Request $request){
        
        $question = strtolower($request->question);
       
        $answer = Question::whereRaw('LOWER(question) = ?', [$question])->first();
        
        if (!$answer) {
            $newQuestion = new Question();
            $newQuestion->question = $question;
            $newQuestion->answer = null;
            $newQuestion->user_id = Auth::user()->id;
            $newQuestion->save();
            $answer = $newQuestion;
        }
        
        $asked = new Asked_question;
        $asked->user_id = Auth::user()->id;
        $asked->question_id = $answer->id;
        $asked->save();
    
        
        $responseAnswer = $answer->answer ? $answer->answer : "Chúng tôi sẽ trả lời vào Gmail của bạn sau.";
    
        return response()->json(['answer' => $responseAnswer]);
    }
    public function askedQuestion($id) {
        $question = Question::find($id);
        $askedQuestions = DB::table('asked_questions')
        ->join('questions', 'asked_questions.question_id', '=', 'questions.id')
        ->select('questions.question', 'asked_questions.created_at','asked_questions.question_id','asked_questions.id')
        ->where('asked_questions.user_id', Auth::user()->id)
        ->get();
        return view('Client.chat01',compact('askedQuestions','question')); 
    }
    public function deleteAskedQuestion($id){
        Asked_question::find($id)->delete();
        return redirect()->back();
    }
    public function deleteAll($id){
        Asked_question::where('user_id',$id)->delete();
        return redirect()->back();

    }
}
