<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Task
 *
 * @method static Builder|Task newModelQuery()
 * @method static Builder|Task newQuery()
 * @method static Builder|Task query()
 * @mixin Eloquent
 */
class Task extends Model
{
    protected $guarded = [];

    public function getCanBeCompletedAttribute()
    {
        return $this->status === TaskStatus::NEW;
    }
}
