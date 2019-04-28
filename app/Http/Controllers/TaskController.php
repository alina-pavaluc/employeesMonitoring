<?php

namespace App\Http\Controllers;

use App\Task;
use App\TaskStatus;
use App\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    public function tasksOfEmployee(User $user)
    {
        $tasks = $user->tasks;
        return view("employerSeeTasks", ['employee' => $user, 'tasks' => $tasks]);
    }

    public function store(User $user, Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string'
        ]);

        Task::create([
            "name" => $request->input("name"),
            "description" => $request->input("description"),
            "owner_id" => $user->id
        ]);


        return redirect()->back();
    }

    public function complete(Task $task)
    {
        $task->update(['status' => TaskStatus::COMPLETED]);
        return redirect()->back();
    }


    public function edit(Task $task)
    {
        return view("editTask", compact('task'));
    }

    public function update(Task $task, Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'description' => "required|string",
        ]);

        $task->update($validated);

        return redirect()->route('employeeTasks', [$task->owner_id]);
    }

    public function delete(Task $task)
    {
        $task->delete();
        return redirect()->back();
    }

}
