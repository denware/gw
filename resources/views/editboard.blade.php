<x-layouts.app :title="__('Esemény szerkesztése')">
	@auth
		<!-- admin user -->
		@if (auth()->user()->role ==='admin')	
			<livewire:edit-event :event="$event" />
		@endif
	@endauth
</x-layouts.app>
