<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commande;

class CommandeController extends Controller {
    function addCommande($idClient, $idProduit, $qte) {
        $commande = new Commande();
        $commande->id_client  = $idClient;
        $commande->id_produit = $idProduit;
        $commande->quantite   = $qte;
        $commande->date       = now();
        $commande->save();

        return response()->json([
            'status' => 'Commande créée',
            'data'   => $commande,
        ]);
    }

    function addCommandeJSON(Request $request) {
        $commande = new Commande();
        // nom dans la BDD      nom dans le JSON (avec Postman par exemple)
        $commande->id_client  = $request->json('id_client');
        $commande->id_produit = $request->json('id_produit');
        $commande->quantite   = $request->json('qte');
        $commande->date       = now();
        $commande->save();

        return response()->json([
            'status' => 'Commande créée',
            'data'   => $commande,
        ]);
    }
}
