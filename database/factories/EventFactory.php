<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
		$day = rand(5, 60);
		$seats = rand(40, 90);
        return [
            'type' =>  array_rand(array_flip(['Koncert', 'Előadás', 'Majális', 'Kerti party', 'Bányásznap', 'Rádió felvétel']), 1),
            'artist' => array_rand(array_flip(['Majka', 'Korda Gyuri', 'Tóth Gabi', 'Kovács Kati', 'Dopeman', 'Hajós András', 'Curtis', 'Varnus Xavér']), 1),
            'location' => fake()->city(),
            'description' => fake()->paragraph(),
            'start' => now()->modify('+'. $day .' days'),
            'end' => now()->modify('+'. $day .'days + 2 hours'),
            'seats' => $seats,
            'free' => $seats,
        ];
    }
}
