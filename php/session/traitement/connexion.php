<?php
if ( isset($_POST['email']) && isset($_POST['email']) && $_POST['email'] && $_POST['password']) 
{
    setcookie("email", $_POST['email'], time()+24*3600, '/', true, true);
    session_start();
}
    $identifiant = 'rasolonjatovo.pi@gmail.com';
    $pass = '586Helisoa@@@';
    
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Traitement du formulaire</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/stylebievenue.css">
</head>
<body>
    <header>

    </header>
    
    <section id="conteneur">
    <?php 
    if ( isset($_POST['email']) && isset($_POST['email']) && $_POST['email']==$identifiant && $_POST['password']==$pass) 
    {
        $_SESSION['identifiant'] = $identifiant;
        $_SESSION['pass'] = $pass;
    ?>
        <div class="titre">
            <h1>Bienvenue  ?></h1>
        </div>
        <div class="connex">
            <div id="image" classe="bienvenue"></div>
            <div id="info_utilisateur" class="bienvenue">
                <p>Mr Pierre RASOLONJATOVO
                    <?php
                        
                    ?>

                </p>
                <p>Voici votre email : <?php echo $identifiant; ?></p>
                <p><a href="../espace_membre.php">Espace membre</a></p>
            </div>
        </div>
    <?php } else{?>
        <p class="error">
            Identifiant ou mot de passe non valide.
        </p>
    <?php }  ?>
    </section>
    <footer>

    </footer>
</body>
</html>