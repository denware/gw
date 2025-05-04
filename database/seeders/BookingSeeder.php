<?php

namespace Database\Seeders;

use App\Models\Reservation;
use App\Models\Event;
use Illuminate\Database\Seeder;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;


class BookingSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {	
		$this->command->info("\nCreating sample reservations...");
		
		////////////////////
		//with factory
		////////////////////
		Reservation::factory()
        ->count(60)
        ->create();	
		
		$this->command->info("... done.");
		
		////////////////////
		// Update events table with seeded reservations
		////////////////////
		$this->command->info("\nUpdate events table with seeded reservations:");
		
		$bookings = DB::table('bookings')->get();
		
		foreach ($bookings as $booking) {
			
			/*
			$eventRow = DB::table('events')->where('id', $booking->event_id)->first();
			//$eventRow->('sold') = $eventRow->seats - $booking->seats;
			
			DB::table('events')->where('id', $booking->event_id)
			->update(['sold' => $eventRow->sold + $booking->seats]);
			*/
			
			Event::where('id', $booking->event_id)
			->increment('sold', $booking->seats);
			
			//$this->command->info(print_r($eventRow));
		}
		$this->command->info("Updates are finished.");
    }
}
