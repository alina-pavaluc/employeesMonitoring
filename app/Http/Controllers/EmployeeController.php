<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{

    public function create()
    {
        return view("createEmployee");
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => "required|email|unique:users,email",
            'password' => "required|string"
        ]);

        User::create([
            "name" => $request->input("name"),
            "email" => $request->input("email"),
            "password" => Hash::make($request->input("password"))
        ]);
        return redirect()->route('home');
    }


    public function delete(User $user)
    {
        $user->delete();

        return redirect()->back();
    }

    public function edit(User $user)
    {
        return view("editEmployee", ['employee' => $user]);
    }

    public function update(User $user, Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|string',
            'email' => "required|email|unique:users,email,{$user->id}"
        ]);

        $user->update($validated);

        return redirect()->route('home');
    }

}
