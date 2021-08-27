<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Monthly_rate;

class MonthlyRateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $token = new Monthly_rate();
        $token->monthly_rate = 2.00;
        $token->date = date('2021.01.01');
        $token->save();

        $token = new Monthly_rate();
        $token->monthly_rate = 2.07;
        $token->date = date('2021.02.01');
        $token->save();

        $token = new Monthly_rate();
        $token->monthly_rate = 2.14;
        $token->date = date('2021.03.01');
        $token->save();

        $token = new Monthly_rate();
        $token->monthly_rate = 2.21;
        $token->date = date('2021.04.01');
        $token->save();

        $token = new Monthly_rate();
        $token->monthly_rate = 2.29;
        $token->date = date('2021.05.01');
        $token->save();

        $token = new Monthly_rate();
        $token->monthly_rate = 2.37;
        $token->date = date('2021.06.01');
        $token->save();

        $token = new Monthly_rate();
        $token->monthly_rate = 2.45;
        $token->date = date('2021.07.01');
        $token->save();

        $token = new Monthly_rate();
        $token->monthly_rate = 2.54;
        $token->date = date('2021.08.01');
        $token->save();

        $token = new Monthly_rate();
        $token->monthly_rate = 2.62;
        $token->date = date('2021.09.01');
        $token->save();

        $token = new Monthly_rate();
        $token->monthly_rate = 2.71;
        $token->date = date('2021.10.01');
        $token->save();

        $token = new Monthly_rate();
        $token->monthly_rate = 2.81;
        $token->date = date('2021.11.01');
        $token->save();

        $token = new Monthly_rate();
        $token->monthly_rate = 2.90;
        $token->date = date('2021.12.01');
        $token->save();

    }
}
