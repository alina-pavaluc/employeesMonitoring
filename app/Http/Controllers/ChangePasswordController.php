<?php

namespace App\Http\Controllers;

use Hash;
use Illuminate\Http\Request;

class ChangePasswordController extends Controller
{
    public function changePassword()
    {
        return view('changePassword');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required|string',
            'password' => 'required|string|confirmed',
        ]);

        if (!Hash::check($request->current_password, auth()->user()->password)) {
            return redirect()->back();
        }
        auth()->user()->update(['password' => Hash::make($request->input('password'))]);
        return redirect()->route('home');
    }
}
