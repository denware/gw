<?php

namespace App\Livewire;

use Livewire\Attributes\Validate; 
use Livewire\Component;
use App\Models\Reservation;
use App\Models\Event;

use Masmerise\Toaster\Toaster;

class CreateReservation extends Component {
	public $id;
	
    #[Validate('required|min:5, message: Az előadó neve legalább 5 karakter legyen!')]
    public string $event_id = '';
	
    #[Validate('required|min:6')]
    public string $user_id = '';

    #[Validate('required|min:3')]
    public string $seats = '';	
	
    public function save()
    {
		
		
		$this->validate();
		
		Reservation::create(
			$this->only([
				'event_id',
				'user_id', 
				'seats',
			])
		);
		
	}
		public function render()
    {
        return view('livewire.create-reservation');
    }	
}; 
?>
