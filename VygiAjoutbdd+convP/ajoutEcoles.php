

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <title></title>
</head>
<body>

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



    function lambert93ToWgs84($x, $y){
    $x = number_format($x, 10, '.', '');
    $y = number_format($y, 10, '.', '');
    $b6  = 6378137.0000;
    $b7  = 298.257222101;
    $b8  = 1/$b7;
    $b9  = 2*$b8-$b8*$b8;
    $b10 = sqrt($b9);
    $b13 = 3.000000000;
    $b14 = 700000.0000;
    $b15 = 12655612.0499;
    $b16 = 0.7256077650532670;
    $b17 = 11754255.426096;
    $delx = $x - $b14;
    $dely = $y - $b15;
    $gamma = atan( -($delx) / $dely );
    $r = sqrt(($delx*$delx)+($dely*$dely));
    $latiso = log($b17/$r)/$b16;
    $sinphiit0 = tanh($latiso+$b10*atanh($b10*sin(1)));
    $sinphiit1 = tanh($latiso+$b10*atanh($b10*$sinphiit0));
    $sinphiit2 = tanh($latiso+$b10*atanh($b10*$sinphiit1));
    $sinphiit3 = tanh($latiso+$b10*atanh($b10*$sinphiit2));
    $sinphiit4 = tanh($latiso+$b10*atanh($b10*$sinphiit3));
    $sinphiit5 = tanh($latiso+$b10*atanh($b10*$sinphiit4));
    $sinphiit6 = tanh($latiso+$b10*atanh($b10*$sinphiit5));
    $longrad = $gamma/$b16+$b13/180*pi();
    $latrad = asin($sinphiit6);
    $long = ($longrad/pi()*180);
    $lat  = ($latrad/pi()*180);
    
    return array(
        'lambert93' => array(
            'x' => $x,
            'y' => $y
        ),
        'wgs84' => array(
            'lat' => $lat,
            'long' => $long
        )
    );
}


if (($handle = fopen("C:\wamp\www\\vygieApp\Vygie\VygiAjoutbdd+convP\csvEtMcd\DEPP-etab-1D2D.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
        $num = count($data);
      

        $affichage = str_replace(',','.',$data[11]);
        $affichage2 = str_replace(',','.',$data[10]);
            
        $affiche = lambert93ToWgs84($affichage2,$affichage);
        
           
                	$req = $bdd->prepare('SELECT * FROM ecoles WHERE adresse_Ecole= ?');
                
                	$req->execute(array(
								$data[5]
                        ));
					$test=$req->rowCount();
	               
                    
	
			if($test == 0)
			{
				$req = $bdd -> prepare('INSERT INTO ecoles ( codePostal, nom_Ecole, adresse_Ecole, longitude, latitude) VALUES(?, ?, ?, ?, ?)');
			
			  
				$req->execute(array(
                                $data[8],
				  				$data[1],
				  				$data[5],
                                $affiche['wgs84']['long'],
                                $affiche['wgs84']['lat']
						));
			 

    		}	  
    $row++;
}
    fclose($handle);   
}
?>

</body>
</html>