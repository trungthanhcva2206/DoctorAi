<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Hash;

class ChangePassWord extends Controller
{
    public function showchange()
    {
        $user = Auth::user();

        return view('Admin.change-password', compact('user'));

    }
    public function update(Request $request)
    {
        $request->validate([
            'old_password'=>'required|min:6|max:100',
            'new_password'=>'required|min:6|max:100',
            'confirm_password'=>'required|same:new_password',
        ]);
        $current_user = Auth::user();
        if (Hash::check($request->old_password,$current_user->password)) {
            $current_user->update([
                'password'=>bcrypt($request->new_password)
            ]);

            return redirect() -> back() ->with('success','Password successfully updated.');
        }
        else {
            return redirect() -> back() ->with('error','Old password does not matched.');
        }
    }
}
