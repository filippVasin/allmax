<?php

use Illuminate\Database\Seeder;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tasks')->insert([
            'title' => 'Задача 1',
            'user_id' => '2',
            'priority_id' => '1',
            'status_id' => '1'
        ]);

        DB::table('tasks')->insert([
            'title' => 'Задача 2',
            'user_id' => '3',
            'priority_id' => '1',
            'status_id' => '2'
        ]);

        DB::table('tasks')->insert([
            'title' => 'Задача 3',
            'user_id' => '3',
            'priority_id' => '3',
            'status_id' => '3'
        ]);
    }
}
