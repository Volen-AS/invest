<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Monthly_rate extends Model
{
    protected $table = 'monthly_rates';

    protected $fillable = ['id','date', 'monthly_rate'];

    public $timestamps = false;

//    public static function addMrate(){
//        $date = Carbon::create(2019,12,01)->format('Y-m-d');
//        $rate = 2.90;
//        Monthly_rate::create([
//            'date'=>$date,
//            'monthly_rate'=>$rate
//        ]);
//        dd('create');
//
//    }
}

