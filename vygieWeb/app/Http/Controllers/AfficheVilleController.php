<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Departement;
use App\Ville;
use App\Ecole;
use App\Maladie;
use App\Infecter;

class AfficheVilleController extends Controller
{
    public function afficheDepartement(Request $request){

        $departement = new Departement;

        $dept = $departement::select('id_Departement', 'nom_Departement')->get();

        return view('pagePrincipale', array('dept' => $dept));
    }

    public function afficheVilles(Request $request){

		$dept = $request->input('dept');
		$ville = new Ville;
		
		$villes = $ville::select("codePostal", "nom_Ville", "id_Ville")->where("id_Departement", $dept)->orderBy('nom_Ville', 'asc')->get();		
		
		return response(['dept' => $villes]);
    }

    public function afficheEcoles(Request $request){

    	$ville = $request->input('ville');

    	$ecole = new Ecole;
        $infecter = new Infecter;

    	$ecoles = $ecole::select("nom_Ecole", "id_Ecole")->where("id_Ville", $ville)->orderBy('nom_Ecole', 'asc')->get();

        $infecters = $infecter::join("ecoles", "infecters.id_Ecole", "=", "ecoles.id_Ecole")->select("*")->where([['id_Ville', $ville], ['infecter_Actif', '=', 1],])->count();


    	return response()->json(['ville' => $ecoles, 'ecole' => $infecters]);
    }

    public function afficheMaladie(Request $request){

        $ecole = $request->input('ecole');

        $maladie = new Maladie;

        $infecter = new Infecter;

        $maladies = $maladie::join("infecters", "maladies.id_Maladie","=", "infecters.id_Maladie")->select("*")->where('id_Ecole', $ecole)->get();
        $infecters = $infecter::select("*")->where("id_Ecole", $ecole)->get();

        return response()->json(['ecole' => $maladies, 'enfant' => $infecters]);

    }

}