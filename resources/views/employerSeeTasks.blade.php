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

                            <input type="submit" value="Send task to {{$employee->name}}"
                                   class="btn btn-primary btn-block">
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
                                <td>Edit</td>
                                <td>Delete</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tasks as $task)
                                <tr>
                                    <td>{{ $task->name }}</td>
                                    <td>{{ $task->description }}</td>
                                    <td>{{ $task->status }}</td>
                                    <td>
                                        <a class="btn btn-link" href="/task/{{$task->id}}"><i class="fa fa-pen"></i></a>
                                    </td>
                                    <td>
                                        <form action="/task/{{$task->id}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-link text-danger" type="submit"><i
                                                        class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
