<?php

use Livewire\Volt\Component;

new class extends Component {
    //
}; ?>

<section class="w-full">
    @include('partials.settings-heading')
    <x-settings.layout :heading="__('Megjelenés')" :subheading=" __('Téma beállítása')">
        <flux:radio.group x-data variant="segmented" x-model="$flux.appearance">
            <flux:radio value="light" icon="sun">{{ __('Világos') }}</flux:radio>
            <flux:radio value="dark" icon="moon">{{ __('Sötét') }}</flux:radio>
            <flux:radio value="system" icon="computer-desktop">{{ __('Rendszer') }}</flux:radio>
        </flux:radio.group>
    </x-settings.layout>
</section>
