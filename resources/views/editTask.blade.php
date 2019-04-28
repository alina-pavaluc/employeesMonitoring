@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">Edit task</div>
                    <div class="card-body">
                        <form method="post">
                            @csrf

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input name="name" type="text" class="form-control" id="name"
                                       value="{{$task->name}}">
                            </div>
                            <div class="form-group">
                                <label for="description">Name</label>
                                <input name="description" type="text" class="form-control" id="description"
                                       value="{{$task->description}}">
                            </div>
                            <input type="submit" value="Save Changes" class="btn btn-primary btn-block">

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
