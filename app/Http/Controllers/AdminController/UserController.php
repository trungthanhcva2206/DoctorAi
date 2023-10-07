<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Asked_question;
use App\Models\Question;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;



class UserController extends Controller
{
    public function showUser(){
        $users = User::get();
        return view('Admin/user',compact('users'));
    }
    public function addUser(){
        return view('Admin/add-user');
    }
    public function addUserPost(Request $request){
        $messages = [
            'name.required' => 'Vui lòng nhập tên.',
            'email.required' => 'Vui lòng nhập địa chỉ email.',
            'email.email' => 'Địa chỉ email không hợp lệ.',
            'email.unique' => 'Địa chỉ email đã tồn tại.',
            'password.required' => 'Vui lòng nhập mật khẩu.',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự.',
            'password.confirmed' => 'Xác nhận mật khẩu không khớp.',
            'role.required' => 'Vui lòng chọn vai trò.',
            'role.in' => 'Vai trò không hợp lệ.',
            'img_link.image' => 'Hình ảnh không hợp lệ.',
            'img_link.mimes' => 'Hình ảnh phải có định dạng jpeg, png, jpg, gif.',
            'img_link.max' => 'Hình ảnh không được vượt quá 2MB.',
        ];
    
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'role' => 'required|in:1,2,3',
            'img_link' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ], $messages);
    
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
    

        if ($request->hasFile('img_link')) {
            $img_link = $request->file('img_link');
            $storedPath = $img_link->move('img', $img_link->getClientOriginalName());
            $user->img_link = $storedPath;
        } else {
            $user->img_link = "img/user.png"; 
        }
    
        $user->save();
        return redirect()->route('show.user')->with('success.add-user', 'Thêm nhân viên thành công');
    }
    public function updateUser($id){
        $user = User::find($id);
        return view('Admin.update-user',compact('user'));
    }
    public function updateUserPost(Request $request,$id){
        $user = User::find($id);
        $messages = [
            'name.required' => 'Vui lòng nhập tên.',
            'email.required' => 'Vui lòng nhập địa chỉ email.',
            'email.email' => 'Địa chỉ email không hợp lệ.',
            'email.unique' => 'Địa chỉ email đã tồn tại.',
            'role.required' => 'Vui lòng chọn vai trò.',
            'role.in' => 'Vai trò không hợp lệ.',
            'img_link.image' => 'Hình ảnh không hợp lệ.',
            'img_link.mimes' => 'Hình ảnh phải có định dạng jpeg, png, jpg, gif.',
            'img_link.max' => 'Hình ảnh không được vượt quá 2MB.',
        ];
    
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($id),
            ],
            'role' => 'required|in:1,2,3,0',
            'img_link' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ], $messages);

    
        
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        if ($request->hasFile('img_link')) {
            $img_link = $request->file('img_link');
            $storedPath = $img_link->move('img', $img_link->getClientOriginalName());
            $user->img_link = $storedPath;
        }  
        if(!Hash::check("12345678", $user->password)){
            return redirect()->route('show.user')->with('error.update-user', 'Không được sửa khi đã bàn giao tài khoản');
        }  
        $user->save();
        return redirect()->route('show.user')->with('success.update-user', 'Sửa nhân viên thành công');
    }
    public function deleteUser($id){
        $user = User::find($id);
        $user_id = $user->id;
        $userCount = Question::where('user_id',$user_id)->count();
        if($userCount == 0){
            
            Asked_question::where('user_id',$user_id)->delete();
            $user->delete();
            return redirect()->route('show.user')->with('success.delete-user', 'Xóa thành công');
        }else{
            return redirect()->route('show.user')->with('error.delete-user', 'Không thể xóa vì có thể đang là người hỏi hoặc người trả lời 1 câu hỏi');
        }
    }
    
    // public function userInfo(){
    //     return view('Admin.user-info');
    // }
    // public function updateInfo(Request $request){
    //     $user = Auth::user();

    //     $user->name = $request->input('fname');
    //     $user->email = $request->input('email');
    //     $user->save();

    // return redirect()->back()->with('success', 'Profile updated successfully!');
    // }
    // public function updateImg($id,Request $request){
    //     $messages = [
    //         'img_link.image' => 'Hình ảnh không hợp lệ.',
    //         'img_link.mimes' => 'Hình ảnh phải có định dạng jpeg, png, jpg, gif.',
    //         'img_link.max' => 'Hình ảnh không được vượt quá 2MB.',
    //     ];
    
    //     $validatedData = $request->validate([
    //         'img_link' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
    //     ], $messages);
    //     $user = User::find($id);
    //     $user->img_link = $request->img_link;
    //     $user->save();
    // }
}
