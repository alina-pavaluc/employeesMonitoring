<div class="card-header">My tasks</div>

<div class="card-body">
    <table class="table table-striped table-hover table-sm">
        <thead>
        <tr>
            <td>Status</td>
            <td>Name</td>
            <td>Description</td>
            <td></td>
        </tr>
        </thead>
        <tbody id="task-container">
        @foreach($tasks as $task)
            <tr>
                <td>{{ $task->status }}</td>
                <td>{{ $task->name }}</td>
                <td>{{ $task->description }}</td>
                <td>
                    @if($task->canBeCompleted)
                        <form action="/task/{{ $task->id }}/complete" method="post">
                            @csrf
                            <button type="submit" class="btn btn-outline-primary" title="Mark task completed"><i
                                        class="fa fa-check"></i></button>
                        </form>
                    @endif
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
</div>

@section("scripts")
    <script>
        const a = echo.private('employee.{{ Auth::id() }}.tasks')
            .listen('TaskCreated', ({task}) => {
                console.log({task});

                const csrfToken = "{{ csrf_token() }}";
                const template = `
<tr class="new-task">
    <td>${task.status}</td>
    <td>${task.name}</td>
    <td>${task.description}</td>
    <td>
        <form action="/task/${task.id}/complete" method="post">
            <input type="hidden" name="_token" value="${csrfToken}">
            <button type="submit" class="btn btn-outline-primary" title="Mark task completed">
                <i class="fa fa-check"></i>
            </button>
        </form>
    </td>
</tr>`;
                let newRow = $(template).prependTo($('#task-container'));
                newRow.hover(() => newRow.removeClass('new-task'));
                console.log(message);
            });
    </script>
@endsection