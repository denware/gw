<?php

?>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
		@include('partials.head')
    </head>
    <body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">
        <header class="w-full lg:max-w-4xl max-w-[335px] text-sm mb-6 not-has-[nav]:hidden">
            @if (Route::has('login'))
                <nav class="flex items-center justify-start">
					<a 
						href="{{ route('home') }}" 
					 wire:navigate>
						<x-app-logo-icon class="fill-current text-white dark:text-black" />
					</a>
					<div class="flex w-full gap-4 justify-end">					
                    @auth
                        <a
                            href="{{ url('/dashboard') }}"
                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal"
                        >
                            Vezérlő Pult
                        </a>
						<form id="form" action="{{ route('logout') }}" method="POST" class="hidden">@csrf</form>
                        <a
                            href="javascript:void(0)" onclick="document.getElementById('form').submit()"
                            class="inline-block px-5 py-1.5 border border-transparent  rounded-sm text-sm leading-normal text-white! bg-[#00A0E3]! hover:bg-[#0080B3]!"
                        >
                            Kilépés
                        </a>						
                    @else
						
                        <a
                            href="{{ route('login') }}"
                            class="inline-block px-5 py-1.5 border border-transparent  rounded-sm text-sm leading-normal text-white! bg-[#00A0E3]! hover:bg-[#0080B3]!"
                        >
                            Belépés
                        </a>

                        @if (Route::has('register'))
                            <a
                                href="{{ route('register') }}"
                                class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                                Regisztráció
                            </a>
                        @endif
                    @endauth
					</div>
                </nav>
            @endif
        </header>
        <div class="flex w-full justify-center grow transition-opacity opacity-100 duration-750 starting:opacity-0">
            <main class="flex flex-col w-full lg:max-w-4xl max-w-[335px] justify-center ">		
			@auth
				<!-- registered users -->
				@if (auth()->user()->role ==='user')
					Helló Normál felhasználó!	
				@endif
				<!-- admin user -->
				@if (auth()->user()->role ==='admin')
					Helló Admin felhasználó!	
				@endif
			@endauth
			
			<!-- guest -->
			@guest
				Helló vendég!
			@endguest
					<h1 class="w-full lg:max-w-4xl max-w-[335px] text-3xl font-[Calibri] font-black text-black dark:text-white">Események listája</h1>
					<livewire:events-table class="dark:bg-pg-primary-800! text-sm!"/>			
            </main>
        </div>
		<footer class="">
			<a 
				href="{{ route('home') }}" 
			 wire:navigate>
				<x-gw-logo-icon class="fill-current text-white dark:text-black" />
			</a>
		</footer>
	@fluxScripts
    </body>
</html>
