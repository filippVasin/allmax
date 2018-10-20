<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@mail.ru',
            'password' => bcrypt('qwerty')
        ]);

        DB::table('users')->insert([
            'name' => str_random(10),
            'email' => 'user1@mail.ru',
            'password' => bcrypt('qwerty')
        ]);

        DB::table('users')->insert([
            'name' => str_random(10),
            'email' => 'user2@mail.ru',
            'password' => bcrypt('qwerty')
        ]);
    }
}
