@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    @if($isEmployee)
                        @if(Auth::user()->isCheckedIn)
                            @include('employeeCard')
                        @elseif(Auth::user()->hasCheckedOut)
                            @include("alreadyCheckedOut")
                        @else
                            @include('checkInButton')
                        @endif
                    @else
                        @include('employerCard')
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
