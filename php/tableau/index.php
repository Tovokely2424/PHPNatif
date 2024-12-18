<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau</title>
    <link rel="stylesheet" href="css/styletableau.css">
</head>
<body>
    <p>
        <h2>Tableau avec indice </h2>
        <?php
            
            $pays  = array("France", "Espagne", "Maroc", "Madagascar");
            echo $pays[2];

            $ville = ['Tana', 'Toky', 'Pékin', 'Rio'];

            $frere[0] = 'Jean Richard';
            $frere[1] = 'RANDRIANIRINA Justin';
            $frere[2] = "RAKOTOZAFY François";
        ?>
    </p>
    <p>
        <h2>Tableau associatifs </h2>
        <?php
            
            $pierre  = array(
                'nom' => 'RASOLONJATOVO',
                'prenom' => 'Pierre',
                'age' => 29,
                'ville' => 'Fianarantsoa'
            );

            #echo $pierre['ville'];
            foreach($pierre as $info){
                echo $info.'<br>';
            }

            foreach($pierre as $cle => $valeur){
                echo 'clé : '.$cle.' - '.$valeur.'<br>';
            }
        ?>
    </p>
    <p>
        <h2>Tableau multidimentionnel </h2>
        <?php
            
            $ville  = array();
            $ville[0][0] = "France";
            $ville[0][1] = "Paris";
            $ville[0][2] = 80;

            $ville[1][0] = "Maroc";
            $ville[1][1] = "Casablanca";
            $ville[1][2] = 50;

            $ville[2][0] = "Angleterre";
            $ville[2][1] = "Londre";
            $ville[2][2] = 120;
    
        ?>
        <table>
            <thead>
                <td>Pays</td>
                <td>Capital</td>
                <td>Habitan</td>
            </thead>
            <?php 
            for($i=0; $i<count($ville); $i++){ ?>
            <tbody>
                <?php for($j=0; $j<3; $j++){ ?>
                <td><?php echo $ville[$i][$j]; ?></td>
                <?php } ?>
            </tbody>
           <?php } ?>
        </table>
    </p>
    <p>
        <?php 
            echo '<pre>';
                print_r($ville);
            echo '</pre>';
        ?>
    </p>
    <p>
        <h2>Tableau bidimentionnel </h2>
        <?php
            
        ?>
    </p>
</body>
</html>