<?php


Broadcast::channel('employee.{id}.tasks', function ($user, $id) {
    return (int)$user->id === (int)$id;
});