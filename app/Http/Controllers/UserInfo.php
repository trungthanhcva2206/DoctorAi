<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserInfo extends Controller
{
    public function userInfo(){
        $user = Auth::user();
        return view('Admin.user-info',compact('user'));
    }
    public function updateInfo(Request $request){
        $user = Auth::user();

        $user->name = $request->input('fname');
        $user->email = $request->input('email');
        $user->save();

    return redirect()->back()->with('success', 'Profile updated successfully!');
    }
    public function updateAvatar(Request $request)
{
    
    $img_link = $request->img_link;
    $storePath = $img_link->move('img', $img_link->getClientOriginalName());
    $user = auth()->user();

    $user->img_link = $storePath;
    
    $user->save();
    return redirect()->back();
}
}
