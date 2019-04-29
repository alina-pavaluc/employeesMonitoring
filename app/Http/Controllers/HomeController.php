<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $data = [];

        if (Auth::user()->isEmployer()) {
            $employeeQuery = User::employee();

            if (!$request->has('allEmployees')) {
                $employeeQuery = $employeeQuery->whereHas('todayCheckIn', function (Builder $query) {
                    return $query->whereNull('checked_out_at');
                })->get();
            } else {
                $employeeQuery = $employeeQuery->paginate()->appends('allEmployees', true);
            }

            $data['employees'] = $employeeQuery;
        } else {

            $data['tasks'] = Auth::user()->tasks()->latest()->orderByDesc('status')->get();
        }

        return view('home', $data);
    }
}
