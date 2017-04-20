<?php
	ini_set('display_errors',1);
	header('Access-Control-Allow-Origin: *');
	header('Access-Control-Allow-Headers: Origin, Content-Type, Authorization, X-Auth-Token, X-XSRF-TOKEN');
	header('Access-Control-Allow-Methods: GET, POST, PUT, PATCH, DELETE, HEAD, OPTIONS');
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=theveniaux;charset=utf8', 'theveniaux', 'M8wEZxzDD52rLqQH', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
	catch (Exception $e)
	{
	        die('Erreur : ' . $e->getMessage());
	}
	$test = json_decode(file_get_contents('php://input'),true);
	$idEcole = $test['unId']['idEcole'];
	$idMaladie = $test['unId']['idMaladie'];
	$method = $_SERVER['REQUEST_METHOD'];
	//on vérifie dans quelle method sont envoyées les données
	if($method == 'POST')
	{
		//on vérifie que les info id de la ville et id de la maladi son bien envoyer 
		if(isset($idEcole)== true && isset($idMaladie)== true)
		{
			//on vérifie qu'il ne revoi pas des valeur vide
			if(empty($idEcole)!= true && empty($idMaladie)!= true)
			{
				$date = new DateTime(date("Y-m-d"));
				$date->modify('+5 day');
				//on vérifie qu'il n'y a pas deja une alert par rapport a une maladi et une ecole donnéé
					$req = $bdd->prepare('INSERT INTO infecters(infecter_Actif, id_Ecole, id_Maladie, infecter_Date, infecter_DateFin, infecter_NbEnfant
					) VALUES(:infecter, :idEcole, :idMaladie, :laDateDebut, :laDateFin, :infecter)');
					$req->execute(array(
						'infecter' => 1,
						'idEcole' => $idEcole,
						'idMaladie' => $idMaladie,
						'laDateDebut'=> date("Y-m-d"),
						'laDateFin'=>date_format($date, "Y-m-d"),
						'infecter'=>1
						));
				echo json_encode('Il a bien ete ajouté');
			}
			else
			{
				echo "	il y a déja une alert d'active";
			}
		}
		else
		{
			echo json_encode('erreur');
		}
	}
	else
	{
		$reponse = $bdd->query('SELECT * FROM maladies');
				$reponse = $reponse->fetchAll(PDO::FETCH_ASSOC);
				$json = json_encode($reponse);
				echo $json;
	}
	
?>