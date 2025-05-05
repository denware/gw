<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Volt\Component;
use Masmerise\Toaster\Toaster;

new class extends Component {

    public function boot(): void
    {
		if ( Auth::user() === null ){
			Toaster::warning(  "A jegyvásárláshoz be kell lépni!" );
		}
	}
}; 
?>
<span></span>