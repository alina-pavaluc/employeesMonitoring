<?php

namespace App\Http\Controllers;

use App\User;
use App\UserType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

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
        $this->checkEmployee($user);
        $user->delete();

        return redirect()->back();
    }

    private function checkEmployee(User $user)
    {
        if ($user->user_type != UserType::EMPLOYEE) {
            throw new UnprocessableEntityHttpException("User is not an employee");
        }
    }

    public function edit(User $user)
    {
        $this->checkEmployee($user);

        return view("editEmployee", ['employee' => $user]);
    }

    public function update(User $user, Request $request)
    {
        $this->checkEmployee($user);

        $validated = $request->validate([
            'name' => 'required|string',
            'email' => "required|email|unique:users,email,{$user->id}"
        ]);

        $user->update($validated);

        return redirect()->route('home');
    }

}
