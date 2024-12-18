<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manipulation de fichier</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>

    </header>
    <section id="conteneur">
        <div class="titre">
            <h1>Manipulation de fichier</h1>
        </div>
        <div class="connex">
            <?php
                $fichier = 'fichier/fichiertest.txt';
                    $notre_fichier = fopen($fichier, 'r+');
                    
                    if ($notre_fichier) {
                        // Lire et afficher le contenu du fichier
                        echo fread($notre_fichier, filesize($fichier));
                        
                        // Fermer le fichier après lecture
                        fclose($notre_fichier);
                    } else {
                        // Message d'erreur si le fichier ne peut pas être ouvert
                        echo "Erreur : Impossible d'ouvrir le fichier.";
                    }
            
            ?>
        </div>
    </section>
    <footer>

    </footer>
</body>
</html>