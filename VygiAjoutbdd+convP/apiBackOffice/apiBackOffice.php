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
  if(isset($_GET['verif']))
  {
    if($_GET['verif']=='vrai')
    {
      $req= $bdd->prepare("SELECT * FROM villes WHERE nom_Ville LIKE ?");
      $req->execute(array($_GET['lettre']."%"));
      $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
      echo json_encode($resultat);
    }
    else
    {
      $req= $bdd->prepare("SELECT * FROM villes WHERE nom_Ville = ?");
      $req->execute(array($_GET['ville']));
      $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
      echo json_encode($resultat);
    }
  }
  else
  {
    $req= $bdd->prepare("SELECT * FROM ecoles");
    $req->execute();
    $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($resultat);
  }
         		} else if ($method == 'POST'){
       				$input = json_decode(file_get_contents('php://input'),true);
                    $ville = $input['infos']['ville'];
                    $codePostal = $input['infos']['codePostal'];
                    $id_Departement = $input['infos']['id_Departement'];
                    $nom_Ecole = $input['infos']['nom_Ecole'];
                    $adresse_Ecole = $input['infos']['adresse_Ecole'];
                   
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
                        $verif = $bdd ->prepare("SELECT nom_Ecole, adresse_Ecole FROM ecoles WHERE nom_Ecole = ?");
                        $verif->execute(array($nom_Ecole));
                        $verifs = $verif->rowCount();
                        $nom = $verif->fetchAll(PDO::FETCH_ASSOC);

                        if ($nom[0]['nom_Ecole'] === $nom_Ecole && $nom[0]['adresse_Ecole'] === $adresse_Ecole){
                        }
                        else if($count < 1){ 
                        $insertVille=$bdd->prepare('INSERT INTO villes (codePostal, nom_Ville, id_Departement) VALUES(?,?,?)');
                        $insertVille->execute(array($codePostal, $ville, $resultatDep[0]['id_Departement']));
                        $recup=$bdd->lastInsertId();
                        $req = $bdd->prepare('INSERT INTO ecoles (nom_Ecole, adresse_Ecole, id_Ville) VALUES(?,?,?)');
                        $req->execute(array($nom_Ecole, $adresse_Ecole, $recup));
                          }else{
                          $req = $bdd->prepare('INSERT INTO ecoles (nom_Ecole, adresse_Ecole,id_Ville) VALUES(?,?,?)');
                          $req->execute(array($nom_Ecole, $adresse_Ecole, $resultatVille[0]['id_Ville']));             
                        }
                }
 					 
?>