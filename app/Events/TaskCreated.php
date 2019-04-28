<?php

namespace App\Events;

use App\Task;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TaskCreated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $task;

    public function __construct(Task $task)
    {
        $this->task = $task;
    }

    public function broadcastOn()
    {
        return new PrivateChannel("employee.{$this->task->owner_id}.tasks");
    }
}
