<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Support\Carbon;

/**
 * App\User
 *
 * @property-read DatabaseNotificationCollection|DatabaseNotification[] $notifications
 * @method static Builder|User employee()
 * @method static Builder|User employer()
 * @method static Builder|User newModelQuery()
 * @method static Builder|User newQuery()
 * @method static Builder|User query()
 * @mixin Eloquent
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $user_type
 * @property string $password
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|User whereCreatedAt($value)
 * @method static Builder|User whereEmail($value)
 * @method static Builder|User whereId($value)
 * @method static Builder|User whereName($value)
 * @method static Builder|User wherePassword($value)
 * @method static Builder|User whereRememberToken($value)
 * @method static Builder|User whereUpdatedAt($value)
 * @method static Builder|User whereUserType($value)
 * @property-read Collection|CheckIn[] $checkIns
 * @property-read mixed $has_checked_out
 * @property-read mixed $is_checked_in
 * @property-read Collection|Task[] $tasks
 * @property-read CheckIn $todayCheckIn
 */
class User extends Authenticatable
{
    protected $guarded = [];

    protected $hidden = ['password', 'remember_token'];
    protected $with = ['todayCheckIn'];

    public function scopeEmployee($query)
    {
        return $query->where('user_type', UserType::EMPLOYEE);
    }

    public function scopeEmployer($query)
    {
        return $query->where('user_type', UserType::EMPLOYER);
    }

    public function isEmployee()
    {
        return $this->user_type === UserType::EMPLOYEE;
    }


    public function isEmployer()
    {
        return $this->user_type === UserType::EMPLOYER;
    }

    public function tasks()
    {
        return $this->hasMany(Task::class, 'owner_id');
    }

    public function checkIns()
    {
        return $this->hasMany(CheckIn::class, 'employee_id');
    }

    public function todayCheckIn()
    {
        return $this->hasOne(CheckIn::class, 'employee_id')->whereDate('checked_in_at', '=', Carbon::today());
    }

    public function getIsCheckedInAttribute()
    {
        return $this->todayCheckIn ? $this->todayCheckIn->checked_out_at == null : false;
    }

    public function getHasCheckedOutAttribute()
    {
        return $this->todayCheckIn ? $this->todayCheckIn->checked_out_at != null : false;
    }
}
