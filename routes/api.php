<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\AuthController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/produits', [ProduitController::class, "liste"])->middleware('auth:sanctum');;
Route::get('/produit/{id}', [ProduitController::class, "getProduit"])->middleware('auth:sanctum');;

Route::get('/ajoutCommande/{idClient}/{idProduit}/{qte}', [CommandeController::class, "addCommande"])->middleware('auth:sanctum');;
Route::post('/ajoutCommande', [CommandeController::class, "addCommandeJSON"])->middleware('auth:sanctum');
Route::delete('/suppcommande', [CommandeController::class, "deleteCommande"])->middleware('auth:sanctum');
Route::get('/commandes/{idClient}', [CommandeController::class, "listCommandes"])->middleware('auth:sanctum');
Route::post('/commandes', [CommandeController::class, "listCommandesProduits"])->middleware('auth:sanctum');

Route::post('/auth', [AuthController::class, "auth"]);
Route::get('/logout', [AuthController::class, "logout"])->middleware('auth:sanctum');
Route::get('/unauthorized', [AuthController::class, "unauthorized"])->name('login');
