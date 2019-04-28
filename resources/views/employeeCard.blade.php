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
        <tbody>
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