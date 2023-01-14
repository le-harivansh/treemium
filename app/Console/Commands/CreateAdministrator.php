<?php

namespace App\Console\Commands;

use App\Models\Administrator;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateAdministrator extends Command
{
    protected $signature = 'admin:new';

    protected $description = 'Create a new administrator.';

    public function handle(): int
    {
        $this->info('You are creating a new administrator. Enter the required information.');

        $name = $this->ask('Name');
        $email = $this->ask('Email');
        $password = $this->secret('Password');

        $newAdministrator = Administrator::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
        ]);

        $this->info("A new administrator has been created [name: {$newAdministrator->name}, email: {$newAdministrator->email}].");

        return Command::SUCCESS;
    }
}
