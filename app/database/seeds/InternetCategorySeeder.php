<?php

use Illuminate\Database\Seeder;

class InternetCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\InternetCategory::create(['name' => 'ADSL']);
        \App\InternetCategory::create(['name' => 'LTE']);
        \App\InternetCategory::create(['name' => 'Fiber']);
    }
}
