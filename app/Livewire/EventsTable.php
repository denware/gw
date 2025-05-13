<?php

namespace App\Livewire;

use App\Models\Event;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Blade;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;

use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Responsive;



final class EventsTable extends PowerGridComponent
{
    public string $tableName = 'EventsTable';
	public string $sortField = 'id'; 
	public string $sortDirection = 'desc';	
	public bool $showFilters = false;
	
    public function boot(): void
    {	
        config(['livewire-powergrid.filter' => 'outside']);

    }	
	
    public function setUp(): array
    {
        //$this->showCheckBox();

        return [
            PowerGrid::header()
                ->showSearchInput(),
            //PowerGrid::footer()
                //->showPerPage(),
                //->showRecordCount(),
			//PowerGrid::responsive()
            //    ->fixedColumns('#','seats','sold','free','actions'),
        ];
    }

    public function datasource(): Builder
    {
        return Event::query();
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('type')
            ->add('artist')
            ->add('location')
            
			/* ->add('description')
            ->add('description', fn (Event $model) => Blade::render('<x-longdesc description="' . $model->description . '"/>'))
			*/ 
			->add('description_excerpt', function ($events) {
				return str(e($events->description))->words(8); //Gets the first 8 words
			 })
			
            ->add('start_date', fn ($events) => Carbon::parse($events->start)->format('Y. m. d.'). " ")
            ->add('start_formatted', function ($events) { return date('H:i',strtotime($events->start)); }) 
            ->add('end_formatted', function ($events) { return date('H:i',strtotime($events->end)); }) 
            ->add('seats')
            ->add('free')
            ->add('sold', function ($events) { return $events->seats - $events->free;  })
            ->add('created_at');
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id')
			->title('EID')
			->sortable()
			->contentClasses('whitespace-normal! text-sm!')
			->hidden(isHidden: false, 
			isForceHidden: false),

            Column::make('Artist', 'artist')
				->title('Előadó')
				->contentClasses('whitespace-normal! text-sm!')
                ->sortable()
                ->searchable(),

            Column::make('Type', 'type')
				->title('Típus')
				->contentClasses('whitespace-normal! text-sm!')
                ->sortable()
                ->searchable(),
				
            Column::make('Location', 'location')
				->title('Helyszín')
				->contentClasses('whitespace-normal! text-sm!')
                ->sortable()
                ->searchable(),


            Column::make('Start', 'start_date', 'start' )
				->title('Dátum')
				->sortable()
				->contentClasses('text-sm!'),

				
            Column::make('Start','start_formatted')
				->title('Kezdete')
				->contentClasses('whitespace-normal! text-sm!'),
				
            Column::make('End', 'end_formatted')
				->title('Vége')
				->contentClasses('whitespace-normal! text-sm!')
				->contentClasses('whitespace-normal! text-sm!'),
				
			Column::make('Description', 'description_excerpt')
				->title('Leírás')	
				->contentClasses('whitespace-normal! text-sm!')
				->hidden(isHidden: true, 
				isForceHidden: false),								
				
            Column::make('Seats', 'seats')
				->title('Helyek')
				->contentClasses('whitespace-normal! text-sm!')
				->hidden(isHidden: true, 
				isForceHidden: false),
				
            Column::make('Sold', 'sold')
				->title('Eladott')
				->contentClasses('whitespace-normal! text-sm!')
				->sortable()
				->hidden(isHidden: true, 
				isForceHidden: false),
				
            Column::make('Free', 'free', dataField: 'free')
				->contentClasses('text-sm!')
				->sortable()
				->title('Helyek'),
            
			/*
			Column::make('Created at', 'created_at')
                ->sortable()
                ->searchable(),
			*/
            Column::action('Részletek')
			->contentClasses('whitespace-normal! text-sm!')
        ];
    }

    public function filters(): array
    {
        return [
            Filter::datetimepicker('start')->params([
                    'only_future' => true,
            ]),
            Filter::datetimepicker('end')->params([
                    'only_future' => true,
            ]),
            Filter::datetimepicker('start_date', 'events.start')
					->params([
                    'only_future' => false,
					'enableTime' => false,
            ]),			
        ];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('alert('.$rowId.')');
    }

    public function actions(Event $row): array
    {
        return [
            Button::add('view')
                ->icon('default-eye')
                ->class('inline-block px-5 py-1.5 border border-transparent  rounded-sm text-sm leading-normal stroke-white! text-white! bg-[#00A0E3]! hover:bg-[#0080B3]!')
                //->dispatch('edit', ['rowId' => $row->id])
				->tag('a')
				->tooltip('MEGTEKINT')
				->attributes([
				'href' => url('/event/' . $row->id),
				])
        ];
    }

    /*
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
