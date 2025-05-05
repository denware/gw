<x-layouts.app :title="__('Foglalások')">
	@auth
		<!-- registered users -->
		@if (auth()->user()->role ==='user')
			<div class="w-full text-right dark:text-white">Helló Normál felhasználó!</div>
			<h1 class="mb-8 w-full lg:max-w-4xl max-w-[335px] text-3xl font-[Calibri] font-black text-black dark:text-white">Vásárlásaim</h1>
			<livewire:bookings-user-table/>
		@endif
		<!-- admin user -->
		@if (auth()->user()->role ==='admin')
			
		
			<div class="w-full text-right dark:text-white">Helló Admin felhasználó!</div>
			<h1 class="mb-8 w-full lg:max-w-4xl max-w-[335px] text-3xl font-[Calibri] font-black text-black dark:text-white">Vásárlások</h1>
			<livewire:bookings-table/>
			
			
		@endif
	@endauth
</x-layouts.app>
<x-toaster-hub />