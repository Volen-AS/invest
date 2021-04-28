<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
