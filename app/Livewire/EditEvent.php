<?php

namespace App\Livewire;

use Livewire\Form;
use App\Livewire\Forms\EventForm;
use App\Models\Event;
use App\Models\Reservation;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Sleep;
use Illuminate\Validation\Rule;
use Masmerise\Toaster\Toaster;


class EditEvent extends Component {
	
	public ?Event $event;
	public EventForm $form;
    public function mount(Event $event)
    {
        $this->form->setEvent($event);
    }	

	
    public function update()
    {
		
		$this->form->update();
		$this->event->save();
		

		Toaster::success(  "Sikeres frissítés!" );
 		Sleep::for(0.5)->seconds();
		return $this->redirect('/');

		
		
		/*
		
		return var_dump( $this);
        $this->validate();
 
        $this->update( $this->all());
 
        $this->reset();
		Toaster::success(  "Sikeres mentés!" );
		*/
    }

	public function trash(){
		
		Reservation::where('event_id', $this->event->id)->delete();
		Event::find($this->event->id)->delete();
		Toaster::warning(  "A rekordot és hozzá tartozó foglalásokat töröltük!" );
 		Sleep::for(0.5)->seconds();
		return $this->redirect('/');
	}
	
		public function render()
    {
        return view('livewire.edit-event');
    }	
}; 
?>
