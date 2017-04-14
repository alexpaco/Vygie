<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Departement;
use App\Ville;

class AfficheVilleController extends Controller
{
    public function afficheVilles(Request $request){

		$dept = $request->input('dept');
		$ville = new Ville;
		
		$villes = $ville::select("codePostal", "nom_Ville")->where("id_Departement", $dept)->get();
		
		return response()->json(['dept' => $villes]);
    }
}
