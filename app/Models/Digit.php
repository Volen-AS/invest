<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Digit
 *
 * @property int $id
 * @property int|null $u_id
 * @property string $balance
 * @property string $replenished
 * @property string $invested
 * @property string $payment
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Digit newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Digit newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Digit query()
 * @method static \Illuminate\Database\Eloquent\Builder|Digit whereBalance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Digit whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Digit whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Digit whereInvested($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Digit wherePayment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Digit whereReplenished($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Digit whereUId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Digit whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Digit extends Model
{
    protected $fillable = ['u_id', 'balance', 'replenished', 'invested', 'payment'];
}
