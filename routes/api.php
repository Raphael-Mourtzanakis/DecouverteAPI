<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\CommandeController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/produits', [ProduitController::class, "liste"]);
Route::get('/produit/{id}', [ProduitController::class, "getProduit"]);

Route::get('/ajoutCommande/{idClient}/{idProduit}/{qte}', [CommandeController::class, "addCommande"]);
Route::post('/ajoutCommande', [CommandeController::class, "addCommandeJSON"]);
