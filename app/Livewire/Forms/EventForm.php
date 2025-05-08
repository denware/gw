<?php

namespace App\Livewire\Forms;
use App\Models\Event;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Livewire\Component;

class EventForm extends Form
{
	public ?Event $event;
	
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
	
    public function setEvent(Event $event)
    {
        $this->event = $event;
 
        $this->artist = $event->artist;
        $this->type = $event->type;
        $this->location = $event->location;
        $this->description = $event->description;
        $this->start = $event->start;
        $this->end = $event->end;
        $this->seats = $event->seats;
        $this->free = $event->free;
    }
    public function store() 
    {
        $this->validate();
        Event::create($this->all());
    }
    public function update()
    {
        $this->validate();
 
        $this->event->update(
            $this->all()
        );
    }
}
