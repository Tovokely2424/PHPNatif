<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Se connecter</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>

    </header>
    <section id="conteneur">
        <div class="titre">
            <h1>Bienvenu</h1>
        </div>
        <div class="connex">
            <form action="traitement/connexion.php" method="POST">
                <?php
                    if (isset($_COOKIE['email'])) {
                        
                    
                ?>
                Bonjour <?php echo $_COOKIE['email'];?>, pour acceder a votre espace mebre, entrez votre mot de passe.
                <?php }else { ?>
                <input class="champ" type="text" name="email" placeholder="email">
                <?php } ?>
                <input class="champ" type="password" name="password" placeholder="..........">
                <input class="btn" type="submit" value="Se connecter">
            </form>
        </div>
    </section>
    <footer>

    </footer>
</body>
</html>