@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">Create task</div>
                    <div class="card-body">
                        <form method="post">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input name="name" type="text" class="form-control" id="name">
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" type="text" class="form-control"
                                          id="description"></textarea>
                            </div>

                            <input type="submit" value="Send task" class="btn btn-primary btn-block">
                        </form>
                    </div>
                </div>
                <div class="card mt-5">
                    <div class="card-header">All tasks of {{$employee->name}}</div>
                    <div class="card-body">
                        <table class="table table-striped table-hover table-sm">
                            <thead>
                            <tr>
                                <td>Name</td>
                                <td>Description</td>
                                <td>Status</td>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Production update</td>
                                <td>Update production today</td>
                                <td>New</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
