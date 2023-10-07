<?php

namespace App\Http\Controllers\AdminController;
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
        return view('Admin.login');
    }
    public function login(Request $request){
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
            if (in_array($role, [1, 2, 3])) {
                return redirect('/admin/dashboard');
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
        return redirect()->route('show.admin.login');
    }
    public function forgetPassword(){
        return view('Admin.forget-password');
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
        Mail::send("Admin.sendMail",['token' => $token], function ($message) use ($request){
            $message->to($request->email);
            $message->subject("Reset Password");
        });

        return redirect()->route('show.admin.login');
    }
    public function resetPassword($token){
        return view('Admin.new-password',compact('token'));
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

        return redirect()->route('show.admin.login')->with("success.reset-password","Đổi mật khẩu thành công");

    }

    
}
