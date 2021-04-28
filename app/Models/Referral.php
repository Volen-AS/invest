<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Referral
 *
 * @property int $id
 * @property int|null $u_id
 * @property string|null $referred_by
 * @property string|null $reSendTo
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Referral newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Referral newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Referral query()
 * @method static \Illuminate\Database\Eloquent\Builder|Referral whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Referral whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Referral whereReSendTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Referral whereReferredBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Referral whereUId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Referral whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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

