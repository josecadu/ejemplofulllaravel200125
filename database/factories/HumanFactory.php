<?php

namespace Database\Factories;

use App\Models\Departament;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Human>
 */
class HumanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        fake()->addProvider(new \Mmo\Faker\PicsumProvider(fake()));
        $nombre=fake()->unique()->userName();
        return [
            'username'=>$nombre,
            'email'=>$nombre."@"."miempresa.org",
            'departament_id'=>Departament::all()->random()->id,
            'activo'=>fake()->randomElement(["SI", "NO"]),
            'logo'=>"images/logos/".fake()->picsum('public/storage/images/logos/', 400, 400, false),
        ];
    }
}
