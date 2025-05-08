<?php

namespace App\Livewire;
use Illuminate\Validation\Rule;
use Illuminate\Support\Sleep;
use Livewire\Attributes\Validate; 

use Livewire\Component;
use App\Models\Event;
use Masmerise\Toaster\Toaster;

class CreateEvent extends Component {
	
	public $id;
	
	#[Validate('required', message: 'Add meg az előadó nevét!')]
	#[Validate('min:1', message: 'Az előadó neve nem lehet rövidebb 1 karakternél!')]
    public string $artist = '';
	
	#[Validate('required', message: 'Add meg az esemény típusát!')]
	#[Validate('min:1', message: 'Az az esemény típusa nem lehet rövidebb 1 karakternél!')]	
    public string $type = '';
	#[Validate('required', message: 'Add meg az esemény típusát!')]
	#[Validate('min:1', message: 'Az az esemény típusa nem lehet rövidebb 1 karakternél!')]		
    public string $location = '';
	#[Validate('required', message: 'Add meg az esemény leírását!')]
	#[Validate('min:1', message: 'Az az esemény leírása nem lehet rövidebb 1 karakternél!')]	
    public string $description = '';	
    public $start = '';	
    public $end = '';
	#[Validate('required', message: 'Add meg a jegyek számát!')]
		
    public $seats = '';	
	public $free = '';		
	
    public function save()
    {
		// set free tickets
		$this->free = $this->seats; 
		
		$this->validate();
		
		Event::create(
			$this->only([
				'artist',
				'type',				
				'location',
				'description',
				'start',
				'end',
				'seats',
				'free',
			])
		);
		Toaster::success(  "Sikeres mentés!" );
		Sleep::for(0.5)->seconds();
		return $this->redirect('/');
	}

	
		public function render()
    {
        return view('livewire.create-event');
    }	
}; 
?>
