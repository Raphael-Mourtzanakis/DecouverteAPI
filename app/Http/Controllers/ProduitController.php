<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;

class ProduitController extends Controller {
    function liste() {
        return response()->json(Produit::all());
    }

    function getProduit($id) {
        return response()->json(Produit::query()->find($id));
    }
}
