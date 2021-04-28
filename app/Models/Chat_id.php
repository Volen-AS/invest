<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Chat_id
 *
 * @property int $id
 * @property string $chat_id
 * @property int $u_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Chat_id newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Chat_id newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Chat_id query()
 * @method static \Illuminate\Database\Eloquent\Builder|Chat_id whereChatId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chat_id whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chat_id whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chat_id whereUId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chat_id whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Chat_id extends Model
{
    protected $table = 'chat_ids';

    protected $fillable = ['u_id', 'chat_id',
		];
    public static function getMyChates($u_id){
        $my_chats['my_chat'] = Chat_id::where('u_id',$u_id)->first()->chat_id;
        $id_affiliate = Referral::getAffilait($u_id);
        if($id_affiliate === false){
            $my_chats['aff_chat'] = null;
        }else{
            $my_chats['aff_chat'] = Chat_id::where('u_id',$id_affiliate)->first()->chat_id;
        }
         return $my_chats;
    }
}
