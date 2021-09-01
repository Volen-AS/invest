<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * App\Models\User
 *
 * @property int $id
 * @property int|null $u_id
 * @property string|null $name
 * @property string $email
 * @property string|null $email_verified_at
 * @property string $password
 * @property int $role
 * @property string $code
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \App\Models\Profile|null $profile
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class User extends Authenticatable //implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';

    protected $fillable = [
        'name', 'email', 'password', 'role', 'code', 'u_id'
    ];

    public static $PRIME_ROLE = 9;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function profile()
    {
        return $this->hasOne(Profile::class, 'user_id', 'id');
    }

    public function myTotals(): HasMany
    {
        return $this->hasMany(Own_token_by_emission::class, 'u_id');
    }

    public function referrals(): HasMany
    {
        return $this->hasMany(Referral::class, 'referred_by');
    }

    public function balance(): HasOne
    {
        return $this->hasOne(Statistic::class, 'u_id');
    }

    public function OwnTokenByEmission(): HasMany
    {
        return $this->hasMany(Own_token_by_emission::class, 'u_id');
    }

    public function userSellActiveLotHistories(): HasMany
    {
        return $this->hasMany(ActLOtHistory::class, 'seller_u_id');
    }

    public function userPreviousPriceActiveLotHistories(): HasMany
    {
        return $this->hasMany(ActLOtHistory::class, 'previous_price_user');
    }

    public function userLeaderPriceActiveLotHistories(): HasMany
    {
        return $this->hasMany(ActLOtHistory::class, 'lider_price_user');
    }

    public function userSellerNotActiveLotHistories(): HasMany
    {
        return $this->hasMany(No_actiov_history::class, 'seller_u_id');
    }

    public function userFirstBuyerNotActiveLotHistories(): HasMany
    {
        return $this->hasMany(No_actiov_history::class, 'first_buyer');
    }

    public static function getMyAffiliate($user): User
    {
        $affId = Referral::where('u_id', $user->id)->latest()->first();
        if ($affId) {
            return User::find($affId->reSendTo);
        }
        return User::whereRole(9)->first();

    }

    public static function getChat_id(){
        return Chat_id::select('chat_id')->where('u_id', Auth::id())->first();
    }

    public static function getAffiliate(){
        return Referral::where('u_id', Auth::id())->latest()->first()->reSendTo;
    }

}

