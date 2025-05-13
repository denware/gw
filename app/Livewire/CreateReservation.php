<?php

namespace App\Livewire;

use App\Models\Reservation;
use App\Models\User;
use App\Models\Event;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;


use Masmerise\Toaster\Toaster;

class CreateReservation extends Component {
	
	public ?string $event;
	
	public $event_id;
	public $user_id;
	public $seats;
	

    public function mount($event)
    {
        $this->event_id = $event->id;
        $this->user_id = Auth::id();
        $this->seats =1;
    }

    #[On('save')]
    public function save()
    {
        /*
		$row 			= Reservation::find($id);
		$seats 			= $row->seats;
		$eventId 		= $row->event_id;
		
		$event			= Event::find($eventId);
		$event->free	= $event->free + $seats;
		$event->save();
		
		Reservation::where('id', $id )-> delete();
		*/
		
		//$this->js("alert('Delete #{dd($this->seats)}')");
		
		Reservation::create([
            'event_id' => $this->event_id,
            'user_id' => $this->user_id,
            'seats' => $this->seats,
        ]);
		Toaster::success(  "Sikeres foglalás!" );
		
        return redirect()->to('/event/'. $this->event_id);
		
		
    }	
	
		public function render()
    {
        return view('livewire.create-reservation');
    }	
}; 
?>