<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Departement;
use App\Ville;
use App\Ecole;

class AfficheVilleController extends Controller
{
    public function afficheVilles(Request $request){

		$dept = $request->input('dept');
		$ville = new Ville;
		
		$villes = $ville::select("codePostal", "nom_Ville", "id_Ville")->where("id_Departement", $dept)->orderBy('nom_Ville', 'asc')->get();		
		
		return response(['dept' => $villes]);
    }

    public function afficheEcoles(Request $request){

    	$ville = $request->input('ville');

    	$ecole = new Ecole;

    	$ecoles = $ecole::select("nom_Ecole", "id_Ecole")->where("id_Ville", $ville)->orderBy('nom_Ecole', 'asc')->get();

    	return response()->json(['ville' => $ecoles]);
    }

}