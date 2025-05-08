<x-layouts.app :title="__('Esemény létrehozása')">
	@auth
		<!-- admin user -->
		@if (auth()->user()->role ==='admin')
			<div class="w-full text-right dark:text-white">Helló Admin felhasználó!</div>
			<livewire:create-event />
		@endif
	@endauth
</x-layouts.app>
<x-toaster-hub />