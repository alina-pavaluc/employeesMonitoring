<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckInController extends Controller
{
    public function checkIn(Request $request)
    {
        $request->session()->put("checked-in", true);
        return redirect()->route("home");
    }

    public function checkOut(Request $request)
    {
        $request->session()->put("checked-in", false);
        return redirect()->route("home");
    }
}
