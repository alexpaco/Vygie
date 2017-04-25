<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>recDep</title>
</head>
<body>
<body>



<?php
 
try
        {
        $bdd = new PDO('mysql:host=localhost;dbname=vygie;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        // $bdd -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
          catch(Exception $e)
            {
             die('Erreur : '.$e->getMessage());
            }

            	$req = $bdd ->query('SELECT id_Departement, code_dept FROM departements');

            	while ($donnees = $req->fetch())
            	{
                    // $idDept = $donnees['id_Departement'].':'.$donnees['code_dept'].'</br>';
                    $idDept = $donnees['id_Departement'];
                    $resDep = $donnees['code_dept'];
                    $reqV = $bdd ->query('SELECT id_Ville, nom_Ville, codePostal FROM villes');
                    while ($donneesV = $reqV->fetch())
                    {
                        $idVille = $donneesV['id_Ville'];
                        
                        if(is_string($donneesV['codePostal']))
                        {
                            $resCP = $donneesV['codePostal'];
                            $resCP = substr("$resCP",0,2);
                            if($resDep == $resCP)
                            {
                                $bdd->exec('UPDATE villes SET id_Departement = '.$idDept.' WHERE id_Ville= '.$idVille.'');
                            }
                            else
                            {
                               echo $resCP.",".$resDep.'<br>';
                            }
                        }
                    } 
            	} 


               

           
?>

<script>
    


</script>
</body>
</html>