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
            <main class="w-full lg:max-w-4xl max-w-[335px] ">		
			@auth
				<!-- registered users -->
				@if (auth()->user()->role ==='user')
					<div class="w-full lg:max-w-4xl max-w-[335px] text-right dark:text-white">Helló Normál felhasználó!</div>
				@endif
				<!-- admin user -->
				@if (auth()->user()->role ==='admin')
					<div class="w-full lg:max-w-4xl max-w-[335px] text-right dark:text-white">Helló Admin felhasználó!</div>	
				@endif
			@endauth
			<!-- guest -->
			@guest
					<div class="w-full lg:max-w-4xl max-w-[335px] text-right dark:text-white">Helló vendég!</div>
			@endguest
			 <x-event.show :event="$event"/>
			@auth
				@if (auth()->user()->role ==='admin')
					<div class="w-full justify-center mt-8 mb-16 p-8 flex flex-row justify-center items-center gap-4 shadow-2xl rounded-md border-1 border-solid border-[#ddd]  dark:bg-[#111] dark:border-[#222] dark:text-white">
						<h1 class="w-full text-3xl font-[Calibri] font-black text-black dark:text-white">Esemény szerkesztése</h1>
						<a  href="/admin/edit-event/{{$event->id}}" class="rounded-md bg-indigo-600 px-8 py-3 text-sm font-semibold text-white shadow-xs text-white! bg-[#00A0E3]! hover:bg-[#0080B3]! focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 cursor-pointer" type="submit">Szerkesztés</a>
					</div>
					<h1 class="mt-8 mb-8 w-full lg:max-w-4xl max-w-[335px] text-3xl font-[Calibri] font-black text-black dark:text-white">Az eseményhez tartozó foglalások</h1>
					<div class="mb-24"><livewire:bookings-event-table :eventid="$event->id"  /><div>
				@endif
				@if (auth()->user()->role ==='user')
					
					<div class="mt-8 mb-24"><livewire:create-reservation :eventid="$event->id"/><div>
					<h1 class="mt-8 mb-8 w-full lg:max-w-4xl max-w-[335px] text-3xl font-[Calibri] font-black text-black dark:text-white">Az eseményhez tartozó foglalásaim</h1>
					<div class="mb-24"><livewire:bookings-event-user-table :eventid="$event->id"/><div>
				@endif				
			@endauth	
            </main>
        </div>
		<footer class="">
			<a 
				href="{{ route('home') }}" 
			 wire:navigate>
				<x-gw-logo-icon class="fill-current text-white dark:text-black" />
			</a>
		</footer>
		@guest
			
			
		@endguest
	@fluxScripts
	<x-toaster-hub />
    </body>
</html>
