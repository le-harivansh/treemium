<?php

namespace Database\Seeders;

use App\Models\Administrator;
use App\Models\Query;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
         Administrator::factory()->count(10)->create();

         Administrator::factory([
             'name' => 'One One',
             'email' => 'one@one.one',
         ])->create();

         Query::factory()
             ->count(100)
             ->sequence(fn() => [
                 'resolved_at' => rand(0, 4) === 0 ? now() : null,
                 'deleted_at' => rand(0, 4) === 0 ? now() : null,
             ])
             ->create();
    }
}
