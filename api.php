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
	$method = $_SERVER['REQUEST_METHOD'];
	//on vérifie dans quelle method sont envoyées les données
	if($method == 'POST')
	{
		$idEcole = $test['unId']['idEcole'];
		$idMaladie = $test['unId']['idMaladie'];
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
		//affiche les maladie 
		if($_GET['verif']=='malade')
		{
			$reponse = $bdd->query('SELECT * FROM maladies');
			$reponse = $reponse->fetchAll(PDO::FETCH_ASSOC);
			$json = json_encode($reponse);
			echo $json;
		}	 //affiche le total de malad par maladi dans une ecole
		else if($_GET['verif']=='total')
		{
			$reponse = $bdd->prepare('SELECT maladies.id_Maladie, COALESCE(SUM(infecters.infecter_NbEnfant),0)AS total, COALESCE(MAX(infecters.infecter_id),0)AS lastId FROM maladies LEFT JOIN infecters ON maladies.id_Maladie = infecters.id_Maladie AND infecters.infecter_Actif=1 AND infecters.id_Ecole=:idEcole GROUP BY maladies.id_Maladie');
			$reponse->execute(array('idEcole'=>$_GET['unId']));
			$reponse = $reponse->fetchAll(PDO::FETCH_ASSOC);
			$json =json_encode($reponse);
			echo $json;
			
		}
		else if($_GET['verif']=='sup')
		{
			$sup = $bdd->prepare('DELETE FROM infecters WHERE id_Maladie=:idMaladie AND id_Ecole=:idEcole AND infecter_id = :idInfecter');
			$sup->execute(array('idEcole'=>$_GET['unId'],'idMaladie'=>$_GET['idM'],'idInfecter'=>$_GET['idI']));

			$reponse = $bdd->prepare('SELECT maladies.id_Maladie, COALESCE(SUM(infecters.infecter_NbEnfant),0)AS total, COALESCE(MAX(infecters.infecter_id),0)AS lastId FROM maladies LEFT JOIN infecters ON maladies.id_Maladie = infecters.id_Maladie AND infecters.infecter_Actif=1 AND infecters.id_Ecole=:idEcole GROUP BY maladies.id_Maladie');
			$reponse->execute(array('idEcole'=>$_GET['unId']));
			$reponse = $reponse->fetchAll(PDO::FETCH_ASSOC);
			$json =json_encode($reponse);
			echo $json;
		} //affichie les ecole
		else if($_GET['verif']=='ecole')
		{
			$reponse = $bdd->query('SELECT * FROM ecoles');
			$reponse = $reponse->fetchAll(PDO::FETCH_ASSOC);
			$json = json_encode($reponse);
			echo $json;
		}
		else if($_GET['verif']=='nomEcole')
		{
			$reponse = $bdd->prepare('SELECT nom_Ecole FROM ecoles WHERE id_Ecole=:idEcole');
			$reponse->execute(array('idEcole'=>$_GET['unId']));
			$reponse = $reponse->fetchAll(PDO::FETCH_ASSOC);
			$json =json_encode($reponse);
			echo $json;
			
		}
	}
	
?>