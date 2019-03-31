@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">Create employee</div>
                    <div class="card-body">
                        <form action="/employee" method="post">
                            @csrf

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input name="name" type="text" class="form-control" id="name">
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input name="email" type="email" class="form-control" id="email">
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input name="password" type="password" class="form-control" id="password">
                            </div>

                            <input type="submit" value="Save Changes" class="btn btn-primary btn-block">

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
