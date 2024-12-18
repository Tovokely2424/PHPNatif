<?php
    session_start();
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace membre</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/stylebievenue.css">
</head>
<body>
    <header>

    </header>
    
    <section id="conteneur">
    <?php 
    if (isset($_SESSION['identifiant']) && isset($_SESSION['pass'])) 
    {
    ?>
        <div class="titre">
            <h1>Espace RASOLONJATOVO</h1>
        </div>
        <div class="connex">
            <div id="image" classe="bienvenue"></div>
            <div id="info_utilisateur" class="bienvenue">
                <p>Mr Pierre RASOLONJATOVO
                    <?php
                        
                    ?>

                </p>
                <p>Voici votre email : <?php echo $_SESSION['identifiant']; ?></p>
                <p><a href="pages/deconnexion.php">Déconnexion</a></p>
            </div>
        </div>
    <?php } else{?>
        <p class="error">
            Vous devez passer par la page connexion.
        </p>
    <?php }  ?>
    </section>
    <footer>

    </footer>
</body>
</html>