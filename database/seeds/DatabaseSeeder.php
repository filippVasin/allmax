<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(StatusesTableSeeder::class);
        $this->call(PrioritiesTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(TasksTableSeeder::class);
    }
}
