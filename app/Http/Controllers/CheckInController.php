<?php

namespace App\Http\Controllers;

use App\CheckIn;
use App\Events\CheckInEvent;
use App\Events\CheckOutEvent;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckInController extends Controller
{
    public function checkIn(Request $request)
    {
        $request->validate([
            'checked_in_at' => 'required|date_format:"H:i"',
        ]);

        $hour = Carbon::parse($request->input('checked_in_at'));
        CheckIn::create([
            "checked_in_at" => $hour,
            "employee_id" => Auth::id()
        ]);

        event(new CheckInEvent(Auth::user()));

        return redirect()->route("home");
    }

    public function checkOut()
    {
        $user = Auth::user();
        if (!$user->isCheckedIn) {
            return response('', 422);
        }

        $user->todayCheckIn->update([
            'checked_out_at' => Carbon::now()
        ]);

        event(new CheckOutEvent($user));

        return redirect()->route("home");
    }
}
