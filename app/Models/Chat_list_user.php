<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Chat_list_user
 *
 * @property int $id
 * @property string $chat_id
 * @property int $u_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Chat_list_user newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Chat_list_user newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Chat_list_user query()
 * @method static \Illuminate\Database\Eloquent\Builder|Chat_list_user whereChatId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chat_list_user whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chat_list_user whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chat_list_user whereUId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chat_list_user whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Chat_list_user extends Model
{
    protected $table = 'chat_list_users';

    protected $fillable = ['chat_id', 'u_id'
		];
}
