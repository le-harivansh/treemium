<?php

namespace Database\Seeders;

use App\Models\Administrator;
use App\Models\Comment;
use App\Models\Query;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $administrators = Administrator::factory()->count(10)->create();

        $administrators->push(Administrator::factory([
            'name' => 'One One',
            'email' => 'one@one.one',
        ])->create());

        $queries = Query::factory()
            ->count(100)
            ->sequence(fn () => [
                'resolved_at' => rand(0, 4) === 0 ? now() : null,
                'deleted_at' => rand(0, 4) === 0 ? now() : null,
            ])
            ->create();

        $queries->each(function (Query $query) use ($administrators) {
            $query->comments()->createMany(
                Comment::factory()->count(rand(1, 10))->sequence(
                    fn () => ['administrator_id' => $administrators->random()->id]
                )->raw()
            );
        });
    }
}
