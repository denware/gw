<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Console\Command;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {	
	
	
		$this->command->info("\nCreating sample users...");
		////////////////////
		// admin user
		////////////////////
		
		User::factory()->create([
			'name' => 'Admin User',
			'password' => 'password',
			'email' => 'admin@example.com',
			'role' => 'admin'
		]);		
		
		$this->command->info("Admin user email address: admin@example.com");
		$this->command->info("Admin user password: password\n");
		
		////////////////////
		// registered user
		////////////////////
		User::factory()->create([
			'name' => 'Normal User',
			'password' => 'password',
			'email' => 'user@example.com',
			'role' => 'user'
		]);		
		
		$this->command->info("A normal user email address: user@example.com");
		$this->command->info("A normal password: password\n");		
				
		////////////////////
		// registered user
		// with factory
		////////////////////
		User::factory()
        ->count(28)
        ->create();
		
		/*
		////////////////////
		// with loops
		////////////////////
		for ($x = 1; $x <= 10; $x++) {
			$user_email = uniqid();
			User::factory()->create([
				'name' => 'Test User'.str_pad($x, 3, "0", STR_PAD_LEFT),
				'password' => 'password',
				'email' => $user_email.'@example.com',
			]);
		}
		*/		
		
		$this->command->info("... done.");	
    }
}
