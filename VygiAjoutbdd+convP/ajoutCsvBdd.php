<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>

<?php
try
        {
        $bdd = new PDO('mysql:host=localhost;dbname=vygie;charset=utf8', 'root', '');
        // $bdd -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
          catch(Exception $e)
            {
             die('Erreur : '.$e->getMessage());
            }

//on vérifie qu'il ne revoi pas des valeur vide
            // if(empty($_POST['id_Ecole'])!= true && empty($_POST['nom_Ecole'])!= true)
            // {
          
                $req = $bdd->query('SELECT  codePostal FROM villes');
                
               

                    while($données = $req->fetch()){


                        if(strlen($données['codePostal']) == 4)
                        {
                            $change = "0".$données['codePostal']."</br>";
                            echo $change;
                        }
                        
                      
                    }
                    
                // Ajout des 0 avant tous les codePostale qui ont 4 numéros dans la BDD                      
                // $update = $bdd->prepare("UPDATE villes SET codePostal = CONCAT(0, codePostal) WHERE LENGTH(codePostal) = 4 ");
                // $update->execute();
            //}
           

	?>
</body>
</html>