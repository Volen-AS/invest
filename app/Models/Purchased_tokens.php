<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Purchased_tokens
 *
 * @property int $id
 * @property string $transaction
 * @property int $u_id
 * @property string $new_token
 * @property string $in_cash
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Purchased_tokens newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Purchased_tokens newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Purchased_tokens query()
 * @method static \Illuminate\Database\Eloquent\Builder|Purchased_tokens whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Purchased_tokens whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Purchased_tokens whereInCash($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Purchased_tokens whereNewToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Purchased_tokens whereTransaction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Purchased_tokens whereUId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Purchased_tokens whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Purchased_tokens extends Model
{

    protected $table = 'purchased_tokens';


    protected $fillable = ['transaction', 'u_id', 'rate', 'new_token','in_cash'
    ];

}
