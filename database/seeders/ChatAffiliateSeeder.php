<?php

namespace Database\Seeders;

use App\Models\Chat_id;
use App\Models\User;
use Illuminate\Database\Seeder;

class ChatAffiliateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user  = User::where('role', 9)->first();

        $chat = new Chat_id();
        $chat->chat_id = '000'.$user->id;
        $chat->u_id = $user->id;
        $chat->save();
    }
}
