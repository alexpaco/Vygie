<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ajoutIdVille</title>
</head>

<body>



<?php
 set_time_limit(0);
try
        {
        $bdd = new PDO('mysql:host=localhost;dbname=vygie;charset=utf8', 'root', '');
        // $bdd -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
          catch(Exception $e)
            {
             die('Erreur : '.$e->getMessage());
            }

            	$req = $bdd ->query('SELECT id_Ville, codePostal FROM villes');

            	while ($donnees = $req->fetch())
            	{
                   
                    $idVille = $donnees['id_Ville'];
                    $resVille = $donnees['codePostal'];

                    $reqV = $bdd ->query('SELECT codePostal, id_Ecole FROM ecoles');

                    while ($donneesV = $reqV->fetch())
                    {
                        $idEcole = $donneesV['id_Ecole'];
                        
                        if(is_string($donneesV['codePostal']))
                        {
                            $resCP = $donneesV['codePostal'];
                           
                            if($resVille == $resCP)
                            {
                                $bdd->exec('UPDATE ecoles SET id_Ville = '.$idVille.' WHERE id_Ecole= '.$idEcole.'');
                            }
                            else
                            {
                               // echo $resCP.",".$resVille.'<br>';
                            }
                        }
                    } 
            	} 


               

           
?>


</body>
</html>