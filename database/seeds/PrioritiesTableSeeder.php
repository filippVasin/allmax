<?php

use Illuminate\Database\Seeder;

class PrioritiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('priorities')->insert([
            'name' => 'высокий',
        ]);

        DB::table('priorities')->insert([
            'name' => 'нормальный',
        ]);

        DB::table('priorities')->insert([
            'name' => 'низкий',
        ]);
    }
}
