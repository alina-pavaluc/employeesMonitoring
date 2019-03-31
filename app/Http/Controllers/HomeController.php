<?php

namespace App\Http\Controllers;

use App\User;
use App\UserType;

class HomeController extends Controller
{
    public function index()
    {
        $data = [];

        if (auth()->user()->user_type == UserType::EMPLOYER) {
            $data['employees'] = User::employee()->get();
        }
        return view('home', $data);
    }
}
