<?php

namespace App\Http\Controllers\ClientController;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\User;

class LoginController extends Controller
{
    public function showLogin()
    {
        return view('Client.login');
    }
    public function login(Request $request){
        Auth::logout();
        $messages = [
            'email.required' => 'Vui lòng nhập địa chỉ email.',
            'email.email' => 'Địa chỉ email không hợp lệ.',
            'password.required' => 'Vui lòng nhập mật khẩu.',
        ];
    
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ], $messages);
    
        if (Auth::attempt($credentials)) {
            
            $user = Auth::user();
            $role = $user->role;
            if ($role == 0) {
                return redirect('/chat');
            } else {
                Auth::logout();
                return back()->withErrors([
                    'email' => 'Thông tin đăng nhập không chính xác',
                ])->withInput($request->only('email'));
            }
        } else {
            return back()->withErrors([
                'email' => 'Thông tin đăng nhập không chính xác',
            ])->withInput($request->only('email'));
        }
    }
    
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }
    public function forgetPassword(){
        return view('Client.forget-password');
    }
    public function forgetPasswordPost(Request $request){
        $request->validate([
            'email' => "required|email|exists:users",
        ]);
        $token = Str::random(64);
        DB::table('password_reset_tokens')->insert([
            'email' => $request->email,
            'token' => $token,
        ]);
        Mail::send("Client.sendMail01",['token' => $token], function ($message) use ($request){
            $message->to($request->email);
            $message->subject("Reset Password");
        });

        return redirect()->route('show.client.login');
    }
    public function resetPassword($token){
        return view('Client.new-password',compact('token'));
    }
    public function resetPasswordPost(Request $request){
        $request->validate([
            "email" => "required|email|exists:password_reset_tokens",
            "password" => "required|string|min:6|confirmed",
            "password_confirmation" => "required"
        ]);
        $updatePassword = DB::table('password_reset_tokens')
        ->where([
            "email" => $request->email,
            "token" => $request->token,
        ])->first();
        if(!$updatePassword){
            return redirect()->route('forget.password')->with("error.reset-password", "Không hợp lệ");
        }

        User::where("email", $request->email)
        ->update(["password" => Hash::make($request->password)]);
        DB::table('password_reset_tokens')
        ->where([
            "email" => $request->email,])
        ->delete();

        return redirect()->route('show.client.login')->with("success.reset-password","Đổi mật khẩu thành công");
    }
    public function register(Request $request){
        $messages = [
            'name.required' => 'Vui lòng nhập tên.',
            'email.required' => 'Vui lòng nhập địa chỉ email.',
            'email.email' => 'Địa chỉ email không hợp lệ.',
            'email.unique' => 'Địa chỉ email đã tồn tại.',
            'password.required' => 'Vui lòng nhập mật khẩu.',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự.',
            'password.confirmed' => 'Xác nhận mật khẩu không khớp.',
        ];
    
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ], $messages);
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = 0;
        $user->img_link = "img/user.png";
        $user->save();
        return redirect()->route('show.client.login')->with('success.register', 'Đăng kí thành công');
    }

    
}
