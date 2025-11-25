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
        $commande->id_client  = $request->get('idClient');
        $commande->id_produit = $request->get('idProduit');
        $commande->quantite   = $request->get('qte');
        $commande->date       = now();
        $commande->save();

        return response()->json([
            'status' => 'Commande créée',
            'data'   => $commande,
        ]);
    }
}
