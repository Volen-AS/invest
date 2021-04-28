<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Auth;

use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Foundation\Auth\User as Authenticatable;

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


