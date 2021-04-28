<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Model;

class Referral extends Model
{
		protected $table = 'referrals';

		protected $fillable = ['u_id', 'referred_by', 'reSendTo'
		];

        public static function getAffilait($u_id){

            try {
                $id_affiliate = Referral::where('u_id',$u_id)->latest()->first()->reSendTo;
                return $id_affiliate;

            } catch (Exception $e) {
                return false;
            }
        }
        public static function getMyRefferalId ($u_id){
            $chat_id = Chat_id::where('u_id',$u_id)->first()->chat_id;
            $refferal_ids = Chat_list_user::where('chat_id',$chat_id )->pluck('u_id')->toArray();
            return $refferal_ids;
        }
}

