<?php

namespace App\Models;

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
        return $this->hasOne(Profile::class);
    }

    public static function getChat_id(){
        return Chat_id::select('chat_id')->where('u_id', Auth::id())->first();
    }

    public static function getAffiliate(){
        return Referral::where('u_id', Auth::id())->latest()->first()->reSendTo;
    }

}




































//public static function addUsers(){
//
//    $reg = new RegisterController;
//
//    $primeAffiliat = User::where('role', 9)->select('u_id')->first();
//    Session::put('primeAffiliat', $primeAffiliat);
//    $_token  = Session::get('_token');
//
//    $users = array('Ukrbank', 'Vlad_Forex', 'Mono_Morc', 'Evhen_Zavarin', 'N_Zarubin', 'Blondateams', 'Trlvlad77', 'Kate_Voropaeva', 'S_T_E_F_F', 'Sensations', 'Svetlana_Vasilieva', 'Wombat', 'Nikita', 'Yura_levchenko', 'Zaur_Hazif', 'Yachmenov', 'Usmanov_Said', 'Radmir', 'Garant', 'Rasoshi777', 'Ustinov_R', 'Roman', 'Andrey_V', 'Zloymen', 'Ser_Seo', 'Slavonchek', 'Vovan', 'Yana-Shafar', 'Mariya', 'Maksim', 'Viktor N', 'Vanessa_Sky');
//    $new_user = [];
//    foreach ($users as $invester){
//
//        $array = [
//            "_token" => $_token,
//            "name" => $invester,
//            "email" => $invester.'@gmail.com',
//            "password" => "123123",
//            "password_confirmation" => "123123"
//        ];
//        $reg->create($array);
//        $new_user[] = $array;
//    }
//    dd($new_user);
//}


