<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;
use App\Models\Commande;
use App\Models\Client;

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

    function deleteCommande(Request $request) {
        $id = $request->json('id');
        $commande = response()->json(Commande::find($id));
        Commande::destroy($id);

        if ($id) {
            return response()->json([
                'status' => 'Commande supprimée',
                'data' => $commande,
            ]);
        } else {
            return response()->json([
                'error' => 'Commande inconnue',
            ]);
        }
    }

    function listCommandes($idClient) {
        //return response()->json(Commande::all()->where('id_client', $idClient));
        return response()->json(Client::find($idClient)->commandes()->get());
    }

    function listCommandesProduits(Request $request) {
        $idClient = $request->json('id_client');
        return response()->json(Client::find($idClient)->commandes()->with('produit')->get());
    }
}
