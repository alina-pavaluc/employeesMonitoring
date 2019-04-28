<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $data = [];

        if (Auth::user()->isEmployer()) {
            $data['employees'] = User::employee()->get();
        } else {

            $data['tasks'] = Auth::user()->tasks()->latest()->orderByDesc('status')->get();
        }

        return view('home', $data);
    }
}
