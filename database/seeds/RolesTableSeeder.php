<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'User',
        ]);

        DB::table('roles')->insert([
            'name' => 'Admin',
        ]);

        DB::table('role_user')->insert([
            'user_id' => '1',
            'role_id' => '2',
        ]);
    }
}
