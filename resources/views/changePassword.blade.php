@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">Change password</div>
                    <div class="card-body">
                        <form action="/changePassword" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="current_password">Current password</label>
                                <input name="current_password" type="password" class="form-control"
                                       id="current_password">
                            </div>

                            <div class="form-group">
                                <label for="password">New password</label>
                                <input name="password" type="password" class="form-control" id="password">
                            </div>

                            <div class="form-group">
                                <label for="password_confirmation">Confirm password</label>
                                <input name="password_confirmation" type="password" class="form-control"
                                       id="password_confirmation">
                            </div>

                            <input type="submit" value="Save Changes" class="btn btn-primary btn-block">

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
