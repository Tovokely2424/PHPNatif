<?php declare(strict_types = 1); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Premiere page 2025 pour diplome CNTMAD</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php

        function somme(int $x , int $y){
            return($x + $y);
        }


        $nombre = 1995;
        $age = 29;
        $prenom = "Pierre";
        $prix = 123.1897;
        $boolee =  true;
        echo("<h1>PREMIER PAS DANS LA PROGRAMMATION PHP CNTMAD</h1>");
        echo "Je m'appele $prenom <br>";
        echo 'Je m\'appele Pierre RASOLONJATOVO <br>';
        echo 'J\'ai '.$age.' ans<br><br>';

        echo gettype($age);
        echo '<br>';
        echo gettype($prenom);
        echo '<br>';
        echo gettype($prix);

        echo '<br>';
        echo 'Le type de bool est : '.gettype($boolee);
        echo '<br>';

        #Constante 
        //le type primitif 
        /** Le nom est toujours en majuscule par convention  */

        echo 'La ligne actuel du code est '.__LINE__;
        echo '<br>';
        echo __FILE__; //chemin complet dufichier actuel
        echo '<br>';

        echo('La somme de ton age et ta date de naissance : '.somme($age, $nombre ));     

    ?>
</body>
</html>