<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Privet_messegde
 *
 * @property int $message_id
 * @property string $chat_id
 * @property int $u_id
 * @property int $to_uid
 * @property string $message
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Privet_messegde newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Privet_messegde newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Privet_messegde query()
 * @method static \Illuminate\Database\Eloquent\Builder|Privet_messegde whereChatId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Privet_messegde whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Privet_messegde whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Privet_messegde whereMessageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Privet_messegde whereToUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Privet_messegde whereUId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Privet_messegde whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Privet_messegde extends Model
{
    protected $table = 'privet_messegdes';

    protected $fillable = ['message_id', 'chat_id', 'u_id', 'to_uid', 'message', 'created_at',
    ];
    protected $primaryKey = 'message_id';
}
