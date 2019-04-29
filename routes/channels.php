<?php


Broadcast::channel('employee.{id}.tasks', function ($user, $id) {
    return (int)$user->id === (int)$id;
});

Broadcast::channel('employer', function ($user) {
    return $user->isEmployer();
});

