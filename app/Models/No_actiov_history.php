<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\No_actiov_history
 *
 * @property int $id
 * @property string|null $code_transaction_au
 * @property string|null $emission_period
 * @property string|null $amount_token_lot
 * @property int|null $seller_u_id
 * @property string|null $start_price
 * @property int|null $first_buyer
 * @property array|null $first_price_lot
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|No_actiov_history newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|No_actiov_history newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|No_actiov_history query()
 * @method static \Illuminate\Database\Eloquent\Builder|No_actiov_history whereAmountTokenLot($value)
 * @method static \Illuminate\Database\Eloquent\Builder|No_actiov_history whereCodeTransactionAu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|No_actiov_history whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|No_actiov_history whereEmissionPeriod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|No_actiov_history whereFirstBuyer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|No_actiov_history whereFirstPriceLot($value)
 * @method static \Illuminate\Database\Eloquent\Builder|No_actiov_history whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|No_actiov_history whereSellerUId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|No_actiov_history whereStartPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|No_actiov_history whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class No_actiov_history extends Model
{
    protected $table = 'no_actiov_histories';

    protected $fillable = ['code_transaction_au', 'emission_period','amount_token_lot','seller_u_id',
                            'start_price','first_buyer','first_price_lot','created_at'
    ];

    protected $casts = [
        'first_price_lot' => 'array',
    ];

    public function sellerUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id', 'seller_u_id');
    }

    public function firstBuyerUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id', 'first_buyer');
    }

    public static function PassLolHistory($expired){
        No_actiov_history::create([
            'code_transaction_au'=>$expired->code_transaction_au,
            'emission_period'=>$expired->emission_period,
            'amount_token_lot'=>$expired->amount_token_lot,
            'seller_u_id'=>$expired->seller_u_id,
            'start_price'=>$expired->start_price,
            'first_buyer'=>$expired->first_buyer,
            'first_price_lot'=>$expired->first_price_lot
        ]);
    }
    public static function getPassLolHistory($u_id){
        $historiesNotActLots = No_actiov_history::where('seller_u_id', $u_id)
            ->orWhere('first_buyer',$u_id)
            ->get();
        return $historiesNotActLots;
    }
    public static function getAllLotHistories(){
        $historiesPassLots = No_actiov_history::all();
            return $historiesPassLots;
    }

    public static function getPassLolHistoryTeam($team){
        $historiesNotActLotTeams = No_actiov_history::whereIn('seller_u_id', $team)
            ->orWhereIn('first_buyer',$team)
            ->get();
        return $historiesNotActLotTeams;
    }
}
