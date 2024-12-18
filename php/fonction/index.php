<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Refresh sur les fonctions</title>
</head>
<body>
    <p>
        <h2>Fonctions 1er partie</h2>
        <?php
            $nombre1 = 1.245357676426542;
            echo  'Arrondi : '.round($nombre1, 4).'<br>';
            echo 'Nombre aleatoire : '.rand(1, 10).'<br>';
            echo 'date du jour : '.date('d/m/Y').'<br>';
            echo 'Heure : '.date('H:i:s').'<br>';
            $aujourdui = getdate();
            #echo 'Resultat de get Date : '.$aujourdui.'<br>';
            echo '<pre>';
                print_r($aujourdui);
            echo '</pre>';
        ?>
    </p>
    <p>
        <h2>Fonctions 2eme partie</h2>
        <?php
            $info = array(
                'nom' => 'RASOLONJATOVO',
                'prenom' => 'Pierre',
                'date de naissance ' => date('d/m/Y'),
                'age' => 28
            );

            echo 'Teste key age : '.array_key_exists('age', $info).'<br>';
            echo 'Teste valeur Pierre : '.in_array('Pierre', $info);
        ?>
    </p>
    
</body>
</html>