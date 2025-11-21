<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Commande>
 */
class CommandeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_client'=>fake()->unique->randomElement(\App\Models\Client::pluck('id')),
            'id_produit'=>fake()->unique->randomElement(\App\Models\Produit::pluck('id')),
            'quantite'=>fake()->numberBetween(1,9999),
            'date'=>fake()->date(),
        ];
    }
}
