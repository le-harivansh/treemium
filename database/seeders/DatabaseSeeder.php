<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Administrator;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         Administrator::factory(10)->create();

         Administrator::factory([
             'name' => 'One One',
             'email' => 'one@one.one',
         ])->create();
    }
}
