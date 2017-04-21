<?php
try
        {
        $bdd = new PDO('mysql:host=localhost;dbname=vygie2.0;charset=utf8', 'root', '');
        $bdd -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
          catch(Exception $e)
            {
             die('Erreur : '.$e->getMessage());
            }

$method = $_SERVER['REQUEST_METHOD'];
if ($method == 'GET') {
    $req= $bdd->prepare("SELECT * FROM ecoles");
    $req->execute();
    $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($resultat);
         		} else if ($method == 'POST'){
       				$input = json_decode(file_get_contents('php://input'),true);
                    $ville = $input['infos']['ville'];
                    $codePostal = $input['infos']['codePostal'];
                    $id_Departement = $input['infos']['id_Departement'];
                    $nom_Ecole = $input['infos']['nom_Ecole'];
                    $adresse_Ecole = $input['infos']['adresse_Ecole'];
                    $longitude = $input['infos']['longitude'];
                    $latitude = $input['infos']['latitude'];
                    
                        $query=$bdd->prepare("SELECT id_Ville FROM villes WHERE nom_Ville=?");
                        $query->execute(array($ville));
                        $count = $query->rowCount();
                        $resultatVille = $query->fetchAll(PDO::FETCH_ASSOC);
                        // var_dump($resultatVille[0]['id_Ville']);
                        // $resultatVille = intval($resultatVille[0]);
                        // var_dump($resultatVille);
                        $dep = $bdd -> prepare("SELECT id_Departement FROM departements WHERE code_dept=?");
                        $dep -> execute(array($id_Departement));
                        $resultatDep = $dep->fetchAll(PDO::FETCH_ASSOC);
                        // $resultatDep = intval($resultatDep[0]);
                        // var_dump($resultatDep);

                        if($count < 1){ 

                        $insertVille=$bdd->prepare('INSERT INTO villes (codePostal, nom_Ville, id_Departement) VALUES(?,?,?)');
                        $insertVille->execute(array($codePostal, $ville, $resultatDep[0]['id_Departement']));
                        $recup=$bdd->lastInsertId();
                        $req = $bdd->prepare('INSERT INTO ecoles (nom_Ecole, adresse_Ecole, longitude, latitude,id_Ville) VALUES(?,?,?,?,?)');
                        $req->execute(array($nom_Ecole, $adresse_Ecole, $longitude, $latitude,$recup));
                          }else{
                          $req = $bdd->prepare('INSERT INTO ecoles (nom_Ecole, adresse_Ecole, longitude, latitude,id_Ville) VALUES(?,?,?,?,?)');
                          $req->execute(array($nom_Ecole, $adresse_Ecole, $longitude, $latitude, $resultatVille[0]['id_Ville']));             
                        }
                }
   					   



   					 //    else if($method == 'DELETE'){
   						// $nom_Ecole = $input->infos->nom_Ecole;
    					// $req= $bdd->query("DELETE FROM ecoles WHERE nom_ecole= '$nom_Ecole'");
    					// // 
    					// echo $nom_Ecole;
  							// 		}

?>