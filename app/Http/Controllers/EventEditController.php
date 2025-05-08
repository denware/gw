<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Event;

class EventEditController extends Controller
{	

    public function show(string $id): View

    {
		
        return view('editboard', [
            //'event' => Event::findOrFail($id)
			//'event' => $this->queries($id)
			'event' => Event::where('id', $id)->firstOrFail()
        ]);

    }


}
