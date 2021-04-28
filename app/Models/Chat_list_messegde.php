<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Chat_list_messegde extends Model
{
        protected $table = 'chat_list_messegdes';

    protected $fillable = ['message_id', 'chat_id', 'u_id', 'message', 'created_at',
		];
    protected $primaryKey = 'message_id';

    public static function getMessegde($u_id){

        $my_chat = Auth()->User()->getChat_id()->chat_id;
        $affiliat = Referral::getAffilait($u_id);
        if($affiliat === false){
            $group_messegdes = Chat_list_messegde::where('chat_id',$my_chat)
                ->join('users','users.u_id','=','chat_list_messegdes.u_id')
                ->select('chat_list_messegdes.message_id','chat_list_messegdes.chat_id','chat_list_messegdes.u_id',
                    'chat_list_messegdes.message','chat_list_messegdes.created_at','users.name')
                ->get();
            $privet_msgs = Privet_messegde::where('u_id','=', $u_id)->orwhere('to_uid',$u_id)->get();
                foreach ($privet_msgs as $privet_msg){
                    if($privet_msg->u_id == $u_id){
                        $name_user = User::where('u_id', $privet_msg->to_uid)->first()->name;
                        $privet_msg = array_add($privet_msg, 'user_msg_name', $name_user);
                    }
                    else {
                        $name_user = User::where('u_id', $privet_msg->u_id)->first()->name;
                        $privet_msg = array_add($privet_msg, 'user_msg_name', $name_user);
                    }
                }
            $mergedCollection= $group_messegdes->toBase()->merge($privet_msgs);
            $chat_messegdes = $mergedCollection->sortBy('created_at');
            return $chat_messegdes;
        }else{
            $affil_chat= Chat_id::where('u_id',$affiliat)->first()->chat_id;
            $group_messegdes = Chat_list_messegde::wherein('chat_id',[$my_chat,$affil_chat])
                ->join('users','users.u_id','=','chat_list_messegdes.u_id')
                ->select('chat_list_messegdes.message_id','chat_list_messegdes.chat_id','chat_list_messegdes.u_id',
                    'chat_list_messegdes.message','chat_list_messegdes.created_at','users.name')
                ->get();

            $privet_msgs = Privet_messegde::where('u_id','=', $u_id)->orwhere('to_uid',$u_id)->get();
                foreach ($privet_msgs as $privet_msg){
                    if($privet_msg->u_id == $u_id){
                        $name_user = User::where('u_id', $privet_msg->to_uid)->first()->name;
                        $privet_msg = array_add($privet_msg, 'user_msg_name', $name_user);
                    }
                    else {
                        $name_user = User::where('u_id', $privet_msg->u_id)->first()->name;
                        $privet_msg = array_add($privet_msg, 'user_msg_name', $name_user);
                    }
                }
            $mergedCollection= $group_messegdes->toBase()->merge($privet_msgs);
            $chat_messegdes = $mergedCollection->sortBy('created_at');
            return $chat_messegdes;
        }
    }
}

