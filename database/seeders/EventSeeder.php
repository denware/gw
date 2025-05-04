<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;
use Illuminate\Console\Command;

class EventSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {	
		$this->command->info("\nCreating sample events...");
		
		////////////////////
		//with factory
		////////////////////
		Event::factory()
        ->count(20)
        ->create();	
		
		$this->command->info("... done.");
		

		
    }
}
