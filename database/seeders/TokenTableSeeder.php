<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Token;

class TokenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $token = new Token();
        $token->token_price = 1;
        $token->date = date('2021.01.01');
        $token->save();

        $token = new Token();
        $token->token_price = 1.08;
        $token->date = date('2021.02.01');
        $token->save();

        $token = new Token();
        $token->token_price = 1.22;
        $token->date = date('2021.03.01');
        $token->save();

        $token = new Token();
        $token->token_price = 1.48;
        $token->date = date('2021.04.01');
        $token->save();

        $token = new Token();
        $token->token_price = 1.98;
        $token->date = date('2021.05.01');
        $token->save();

        $token = new Token();
        $token->token_price = 2.39;
        $token->date = date('2021.06.01');
        $token->save();

        $token = new Token();
        $token->token_price = 2.71;
        $token->date = date('2021.07.01');
        $token->save();

        $token = new Token();
        $token->token_price = 2.92;
        $token->date = date('2021.08.01');
        $token->save();

        $token = new Token();
        $token->token_price = 3.30;
        $token->date = date('2021.09.01');
        $token->save();

        $token = new Token();
        $token->token_price = 4;
        $token->date = date('2021.10.01');
        $token->save();

        $token = new Token();
        $token->token_price = 5.35;
        $token->date = date('2021.11.01');
        $token->save();

        $token = new Token();
        $token->token_price = 6.48;
        $token->date = date('2021.12.01');
        $token->save();

    }
}
