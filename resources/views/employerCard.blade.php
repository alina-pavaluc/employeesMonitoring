<div class="card-header">
    Checked in employees
    <small><a href="">See all employees</a></small>
</div>

<div class="card-body">
    <a href="/employee/" class="btn btn-primary btn-block btn-sm d-flex align-items-center justify-content-center">Create
        employee&nbsp;<i class="fa fa-plus"></i></a>
    <table class="table table-striped table-hover table-sm">
        <thead>
        <tr>
            <td>Name</td>
            <td>Email</td>
            <td>Tasks</td>
            <td>Edit</td>
            <td>Delete</td>
        </tr>
        </thead>
        <tbody>
        @foreach($employees as $employee)
            <tr>

                <td>{{$employee->name}}</td>
                <td>{{$employee->email}}</td>
                <td>
                    <a class="btn btn-link" href="/employee/{{$employee->id}}/tasks"><i class="fa fa-tasks"></i></a>
                </td>
                <td>
                    <a class="btn btn-link" href="/employee/{{$employee->id}}"><i class="fa fa-pen"></i></a>
                </td>
                <td>
                    <form action="/employee/{{$employee->id}}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-link text-danger" type="submit"><i class="fa fa-trash"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>