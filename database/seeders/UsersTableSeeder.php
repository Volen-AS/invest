<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'Admin';
        $user->email = 'admin@test.com';
        $user->email_verified_at = now();
        $user->role = 4;
        $user->password = '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm'; // secret
        $user->remember_token = Str::random(10);
        $user->code = (string)Uuid::uuid1();
        $user->save();

        $user = new User();
        $user->name = 'Invest';
        $user->email = 'Invest@test.com';
        $user->email_verified_at = now();
        $user->role = 9;
        $user->password = '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm'; // secret
        $user->remember_token = Str::random(10);
        $user->code = (string)Uuid::uuid1();
        $user->save();

    }
}
