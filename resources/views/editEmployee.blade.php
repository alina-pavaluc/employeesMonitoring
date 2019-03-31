@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">Edit {{$employee->name}}</div>
                    <div class="card-body">
                        <form action="/employee/{{$employee->id}}" method="post">
                            @csrf

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input name="name" type="text" class="form-control" id="name"
                                       value="{{$employee->name}}">
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input name="email" type="email" class="form-control" id="email"
                                       value="{{$employee->email}}">
                            </div>

                            <input type="submit" value="Save Changes" class="btn btn-primary btn-block">

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
