<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

use Livewire\Attributes\On;

use Livewire\Volt\Component;
use Masmerise\Toaster\Toaster;

new class extends Component {

    public function boot()
    {	
		if(request()->route()->named('home')){
			if ( !Auth::check()){
				Toaster::warning(  "A jegyvásárláshoz be kell lépni!" );
			}else{
				Toaster::success(  "Bejelentkezve" );
			}		
		}
	}
}; 
?>
<x-toaster-hub/>