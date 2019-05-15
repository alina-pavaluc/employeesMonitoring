<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\CheckIn
 *
 * @property int $id
 * @property int $employee_id
 * @property Carbon $checked_in_at
 * @property string|null $checked_out_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|CheckIn newModelQuery()
 * @method static Builder|CheckIn newQuery()
 * @method static Builder|CheckIn query()
 * @method static Builder|CheckIn whereCheckedInAt($value)
 * @method static Builder|CheckIn whereCheckedOutAt($value)
 * @method static Builder|CheckIn whereCreatedAt($value)
 * @method static Builder|CheckIn whereEmployeeId($value)
 * @method static Builder|CheckIn whereId($value)
 * @method static Builder|CheckIn whereUpdatedAt($value)
 * @mixin Eloquent
 */
class CheckIn extends Model
{
    protected $guarded = [];
    protected $dates = ['checked_in_at', 'checked_out_at'];
}
