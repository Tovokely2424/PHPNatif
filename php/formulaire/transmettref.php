<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Traitement du fichier envoyé</title>
    <link rel="stylesheet" href="css/styletraitementf.css">
</head>
<body>
    <header>

    </header>
    <section>
        <div>
            <div class="contenu">
                <p>
                    <?php 
                        if(isset($_FILES['fichier'])){
                            $upload = 'upload/'.basename($_FILES['fichier']['name']);
                            move_uploaded_file($_FILES['fichier']['tmp_name'], $upload);
                        
                    ?>
                    <p class="success">
                            Le fichier a bien était transmis.
                    </p>
                    <?php
                        }
                        else{
                            
                        
                    ?>
                    <p class="echec">
                            Echec de transmission du fichier.
                    </p>
                    <?php } ?>
                </p>
            </div>
            <div class="menu">

            </div>
        </div>
    </section>
    <footer>

    </footer>
</body>
</html>