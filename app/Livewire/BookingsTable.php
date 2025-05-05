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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\On;
use Livewire\Volt\Component;

use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Responsive;

use PowerComponents\LivewirePowerGrid\Traits\WithExport;
use PowerComponents\LivewirePowerGrid\Components\SetUp\Exportable;

use Masmerise\Toaster\Toaster;

final class BookingsTable extends PowerGridComponent
{
	use WithExport; 
    public string $tableName = 'bookings-table-mnbeei-table';
	public bool $showFilters = true;
	public $rowID;
	public $__id;
	
    public function setUp(): array
    {
        $this->showCheckBox();

        return [
			PowerGrid::exportable(fileName: 'my-export-file') 
            ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV), 
            PowerGrid::header()
                ->showToggleColumns()
                ->withoutLoading()			
                //->showSearchInput(),
            //PowerGrid::footer()
                //->showPerPage()
                //->showRecordCount(),
        ];
    }

	public function datasource(): ?Builder
    {
		/*
		$join = Reservation::query()
            ->join('users as newUsers', function ($users) 	{ $users->on('bookings.user_id', '=', 'newUsers.id'); })
            ->select('bookings.*', 'newUsers.name as user_name')
			;
		*/
		$join = Reservation::query()
            ->join('users as newUsers', function ($users) 	{ $users->on('bookings.user_id', '=', 'newUsers.id'); })		
            ->join('events as newEvents', function ($events) 	{ $events->on('bookings.event_id', '=', 'newEvents.id'); })
            ->select('bookings.*', 
			'newUsers.name as user_name', 
			'newEvents.artist as event_artist',
			'newEvents.name as event_name',			
			'newEvents.location as event_location',
			'newEvents.start as event_start',
			'newEvents.free as event_free',
			)
			;	
        return $join;
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('user_id')
            ->add('user_name')
            ->add('seats')			
            ->add('event_id')
            ->add('event_artist')
            ->add('event_location')
            ->add('event_start')
            ->add('event_start_formatted', fn ($reservation) => Carbon::parse($reservation->event_start)->format('Y. m. d. H:i'). " ")
            ->add('event_free')
            ->add('updated_at')
            ->add('updated_at_formatted', fn ($reservation) => Carbon::parse($reservation->updated_at)->format('Y. m. d. H:i:s'). " ");
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id')
			->title('#')
			->sortable()
			->contentClasses('whitespace-normal! text-sm!')			
			,
            Column::make('User id', 'user_id')
			->title('Vásárló')
			->sortable()
			->searchable()
			->contentClasses('whitespace-normal! text-sm!')
			->hidden(isHidden: true, 
			isForceHidden: true)			
			,
            Column::make('User id', 'user_name', 'newUsers.name')
			->title('Vásárló neve')
			->sortable()
			->searchable()
			->contentClasses('whitespace-normal! text-sm!')			
			,		
            Column::make('Seats', 'seats')
			->title('Vásárlás')
			->sortable()
			->contentClasses('whitespace-normal! text-sm!')
			,
            Column::make('Updated at', 'updated_at_formatted')
			->title('Időpont')
			->searchable()
			->contentClasses('whitespace-normal! text-sm!')
			,			
            Column::make('Event id', 'event_id')
			->title('Esemény')
			->sortable()
			->hidden(isHidden: true, 
			isForceHidden: true)			
			->contentClasses('whitespace-normal! text-sm!')			
			,
            Column::make('Event id', 'event_artist', 'newEvents.artist')
			->title('Előadó')
			->sortable()
			->contentClasses('whitespace-normal! text-sm!')			
			,
            Column::make('Event id', 'event_location', 'newEvents.location')
			->title('Helyszín')
			->sortable()
			->searchable()
			->contentClasses('whitespace-normal! text-sm!')			
			,			
            Column::make('Event id', 'event_start_formatted', 'newEvents.start')
			->title('Dátum')
			->sortable()
			->contentClasses('whitespace-normal! text-sm!')
			,
            Column::make('Event id', 'event_free', 'newEvents.free')
			->title('Szabad')
			->sortable()
			->contentClasses('whitespace-normal! text-sm!')
			,
            Column::action('Művelet')
			->contentClasses('whitespace-normal! text-sm!'),		
        ];
    }

	
    public function actions($row): array
    {
        return [
            Button::add('trash')
				->icon('default-trash')
				->tooltip('TÖRÖL')
                ->class('cursor-pointer inline-block px-5 py-1.5 border border-transparent  rounded-sm text-sm leading-normal stroke-white!  text-white! bg-[#00A0E3]! hover:bg-[#0080B3]!')
				->dispatch('delete', ['id' => $row->id]),
				//->openModal('delete', ['key' => $row->id]),
				//->emit('deleteUser', ['user' => '$row->id'])
        ];
    }
	/*
    #[\Livewire\Attributes\On('delete')]
    public function delete(string $component, array $arguments)
    {	
		$this->js('alert(' . dd(get_defined_vars()) . ')');
        //$this->js('alert(' .$this->rowID. '\'))');
    }
	*/
	
    #[On('delete')]
    public function delete(int $id)
    {
        $row 			= Reservation::find($id);
		$seats 			= $row->seats;
		$eventId 		= $row->event_id;
		
		$event			= Event::find($eventId);
		$event->free	= $event->free + $seats;
		$event->save();
		
		Reservation::where('id', $id )-> delete();
		//$this->js("alert('Delete #{dd($row)}')");
		
		Toaster::warning(  "A rekordot töröltük az adatbázisból!" );
		
    }
	
    public function filters(): array
    {
        return [
			Filter::inputText('event_artist')
				->operators(['contains'])
                ->filterRelation('event', 'artist'),

			Filter::inputText('event_location')
				->operators(['contains'])
                ->filterRelation('event', 'location'),
				
            Filter::datetimepicker('updated_at_formatted')->params([
                    'only_future' => false,
            ]),
            Filter::select('user_name', 'user_id')
                ->dataSource(User::all())
                ->optionLabel('name')
                ->optionValue('id'),
			/*	
            Filter::select('event_location', 'event_id')
                ->dataSource(Event::all())
                ->optionLabel('location')
                ->optionValue('id'),				
			*/
            Filter::datetimepicker('event_start')->params([
                    'only_future' => false,
            ]),

        ];
    }

	  /*
    public function actionsFromView($row): View
    {
        //return view('actions-view', ['row' => $row]);
    }
  


    public function actions(Event $row): array
    {
        return [
		Button::add('create-dish')  
    ->slot('Create a dish')
    ->attributes([
        'id' => 'my-custom-id',
        'class' => 'another-class'
    ]),
        ];
    }

    public function actionRules($row): array
    {
       return [
            // Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($row) => $row->id === 1)
                ->hide(),
        ];
    }
    */
}
