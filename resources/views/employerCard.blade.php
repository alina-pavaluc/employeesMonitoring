<div class="card-header">
    @unless(Request::has('allEmployees'))
        Checked in employees
        <small><a href="?allEmployees">See all employees</a></small>
    @else
        All Employees
        <small><a href="?">See only checked in employees</a></small>
    @endunless

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
        <tbody id="user-container">
        @foreach($employees as $employee)
            <tr id="employee-{{ $employee->id }}">
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
    @if(Request::has('allEmployees'))
        {!! $employees->links() !!}
    @endif
</div>

@section('scripts')
    <script>
        @unless(Request::has('allEmployees'))
        echo.private('employer')
            .listen('CheckInEvent', ({user}) => {

                const csrfToken = '{{ csrf_token() }}';

                const template = `
<tr id="employee-${user.id}">
    <td>${user.name}</td>
    <td>${user.email}</td>
    <td>
        <a class="btn btn-link" href="/employee/${user.id}/tasks"><i class="fa fa-tasks"></i></a>
    </td>
    <td>
        <a class="btn btn-link" href="/employee/${user.id}"><i class="fa fa-pen"></i></a>
    </td>
    <td>
        <form action="/employee/${user.id}" method="post">
            <input type="hidden" name="_token" value="${csrfToken}">
            <input type="hidden" name="_method" value="delete">
            <button class="btn btn-link text-danger" type="submit"><i class="fa fa-trash"></i></button>
        </form>
    </td>
</tr>`;

                $(template).prependTo($('#user-container')).hide().fadeIn();
            })
            .listen('CheckOutEvent', ({user}) => {
                $(`#employee-${user.id}`).fadeOut();
            });
        @endunless
    </script>
@endsection