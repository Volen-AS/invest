<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * App\Models\ActLOtHistory
 *
 * @property int $id
 * @property string $code_transaction_au
 * @property string $emission_period
 * @property string $amount_token_lot
 * @property int $seller_u_id
 * @property string $start_price
 * @property array $previous_price
 * @property int $previous_price_user
 * @property array $lider_price
 * @property int $lider_price_user
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ActLOtHistory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ActLOtHistory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ActLOtHistory query()
 * @method static \Illuminate\Database\Eloquent\Builder|ActLOtHistory whereAmountTokenLot($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActLOtHistory whereCodeTransactionAu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActLOtHistory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActLOtHistory whereEmissionPeriod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActLOtHistory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActLOtHistory whereLiderPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActLOtHistory whereLiderPriceUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActLOtHistory wherePreviousPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActLOtHistory wherePreviousPriceUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActLOtHistory whereSellerUId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActLOtHistory whereStartPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActLOtHistory whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ActLOtHistory extends Model
{
    protected $table = 'act_lot_histories';

    protected $fillable = ['code_transaction_au','emission_period','amount_token_lot','seller_u_id','start_price',
        'previous_price','previous_price_user','lider_price','lider_price_user', 'created_at'
    ];

    protected $casts = [
        'previous_price' => 'array',
        'lider_price' => 'array'
    ];

    public static function AddLotHistories($lot){

        ActLOtHistory::create([
            'code_transaction_au'=>$lot->code_transaction_au,
            'emission_period'=>$lot->emission_period,
            'amount_token_lot'=>$lot->amount_token_lot,
            'seller_u_id'=>$lot->seller_u_id,
            'start_price'=>$lot->start_price,
            'previous_price'=>$lot->previous_price,
            'previous_price_user'=>$lot->previous_price_user,
            'lider_price'=>$lot->lider_price,
            'lider_price_user'=>$lot->lider_price_user
        ]);
        return;
    }
    public static function getAllLotHistories(){
        $historiesActLots = ActLOtHistory::all();
        return $historiesActLots;
    }

    public static function getLotHistories($u_id){
        $historiesActLot = ActLOtHistory::where('seller_u_id', $u_id)
                                        ->orWhere('previous_price_user',$u_id)
                                        ->orWhere('lider_price_user',$u_id)
                                        ->get();
            return $historiesActLot;
    }

    public static function getLotHistoriesTeam($team){

        $historiesActLotsTeams = ActLOtHistory::whereIn('seller_u_id', $team)
            ->orWhereIn('previous_price_user',$team)
            ->orWhereIn('lider_price_user',$team)
            ->get();
        return $historiesActLotsTeams;
    }
}
