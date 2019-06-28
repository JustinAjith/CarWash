<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SettingController extends Controller
{
    public function index()
    {
        $page = 'Settings';
        return view('admin.setting.index', compact('page'));
    }

    public function changePassword(Request $request)
    {
        $this->validate($request, [
            'current_password'=>'required|string|min:6',
            'password'=>'required|string|min:6|confirmed',
            'password_confirmation'=>'required|string|min:6'
        ]);

        if(!(Hash::check($request->current_password, Auth::user()->password))) {
            $response = 'Your current password does not matches with the password you provided.';
        }
        elseif(strcmp($request->current_password, $request->password)==0) {
            $response = 'New Password cannot be same as your current password. Please choose a different password.';
        }
        else {
            $user = User::find(Auth::user()->id);
            $user->update(['password'=>Hash::make($request->password)]);
            return redirect()->back()->with('success', 'success');
        }
        return redirect()->back()->with('error', $response);
    }
}
