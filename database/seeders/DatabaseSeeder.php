<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Client;
use App\Models\Produit;
use App\Models\Commande;

class DatabaseSeeder extends Seeder {
    use WithoutModelEvents;
    public function run(): void {
        Client::factory()->count(50)->create();
        Produit::factory()->count(200)->create();
        Commande::factory()->count(100)->create();
    }
}
