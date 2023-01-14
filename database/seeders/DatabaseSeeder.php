<?php

namespace Database\Seeders;

use App\Models\Administrator;
use App\Models\Query;
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

         Query::factory(100)->create(); // TODO: add sequence for resolved_at & deleted_at
    }
}
