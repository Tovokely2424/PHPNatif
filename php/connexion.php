<?php
    require_once 'config/bdd_connect.php';
    if (isset($_POST['lance_connexion'])) {
        //coce
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="assets/css/styleconnexion.css">
</head>
<body>
    <div class="container">
        <header class="entete">
            <div id="marque">
                <p id="logo"><a href="">CNTMAD</a></p>
            </div>
            <div id="menu">
            </div>
        </header>
        <section class="principale">
            <div id="conteneur_form">
                <div class="titre">
                    <h1>Connexion</h1>
                </div>
                <div class="champs">
                    <form action="" id="form" method="POST">
                        <div class="conteneurChamp">
                            <div class="formgauche"><span>Email</span></div>
                            <div class="formdroite"><input type="email" name="email" id="email"></div>
                        </div>
                        <div class="conteneurChamp">
                            <div class="formgauche"><span>Password</span></div>
                            <div class="formdroite"><input type="password" name="password" id="password"></div>
                        </div>
                        <div class="redir">
                                <span>Vous n'avez pas encore de compte ? </span>
                                <a href="inscription.php">S'inscrire</a>
                        </div>
                        <div id="validation">
                            <input type="submit" value="Se connecter" name="lance_connexion">
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <footer id="pied">

        </footer>
    </div>
    
</body>
</html>