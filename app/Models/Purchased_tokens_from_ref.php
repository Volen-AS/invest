<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\Purchased_tokens_from_ref
 *
 * @property int $id
 * @property string $transaction
 * @property int $u_id
 * @property int $u_id_to
 * @property string $new_token
 * @property string $in_cash
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Purchased_tokens_from_ref newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Purchased_tokens_from_ref newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Purchased_tokens_from_ref query()
 * @method static \Illuminate\Database\Eloquent\Builder|Purchased_tokens_from_ref whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Purchased_tokens_from_ref whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Purchased_tokens_from_ref whereInCash($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Purchased_tokens_from_ref whereNewToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Purchased_tokens_from_ref whereTransaction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Purchased_tokens_from_ref whereUId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Purchased_tokens_from_ref whereUIdTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Purchased_tokens_from_ref whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Purchased_tokens_from_ref extends Model
{

    protected $table = 'purchased_tokens_from_refs';


    protected $fillable = ['u_id', 'u_id_to','transaction','new_token','rate', 'in_cash'
    ];

}
