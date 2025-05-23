<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Livewire\Attributes\On;
use App\Models\Event;

class EventShowController extends Controller
{	

	
    public function show(string $id): View

    {
		
        return view('event', [
            //'event' => Event::findOrFail($id)
			//'event' => $this->queries($id)
			'event' => Event::where('id', $id)->firstOrFail()
        ]);

    }
	

}
