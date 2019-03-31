<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    public function index(User $user)
    {
        return view("employerSeeTasks", ['employee' => $user]);
    }

    public function store(User $user, Request $request)
    {
        //todo
        return redirect()->back();
    }

    public function complete($task)
    {
        //todo
        return redirect()->back();
    }


}
