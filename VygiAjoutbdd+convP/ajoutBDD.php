
<?php
set_time_limit(0);

$row = 1;

try
        {
        $bdd = new PDO('mysql:host=localhost;dbname=vygie;charset=utf8', 'root', '');
        // $bdd -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
          catch(Exception $e)
            {
             die('Erreur : '.$e->getMessage());
            }

if (($handle = fopen("C:\wamp\www\conversionLambert\DocEcoles\DEPP-etab-1D2D.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
        $num = count($data);
        $row++;

           
           
                	$req = $bdd->prepare('SELECT * FROM villes WHERE codePostal=?');
                
                	$req->execute(array(
								$data[8]
                        ));
					$test=$req->rowCount();
	  
	
			if($test == 0)
			{
				$req = $bdd -> prepare('INSERT INTO villes ( codePostal, nom_Ville) VALUES(?, ?)');
								//insert code postal et nom de ville
			  
				$req->execute(array(
				  				$data[8],
				  				$data[9]
						));
			 

    		}	  
  
}
    fclose($handle);   
}
?>