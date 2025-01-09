
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
                <p id="logo"><a href="index.php">CNTMAD</a></p>
            </div>
            <div id="menu">
            </div>
        </header>
        <section class="principale">
            <div id="conteneur_form">
                <div class="titre">
                    <h1>Connexion</h1>
                </div>
                <?php
                if (!empty($message_error)) {
                    
                ?>
                <div class="error_message">
                    <?php 
                        echo $message_error;
                        if (isset($lien)) {
                            echo $lien;
                        }
                    ?>
                </div>
                <?php } ?>
                <div class="champs">
                    <form action="" id="form" method="POST">
                        <?php
                        if (isset($_SESSION['id'])) {
                        ?>   
                        
                        <div class="conteneurChamp">
                            <div class="formgauche"><span>Acien</span></div>
                            <div class="formdroite"><input type="password" name="last_password" id="last_password"></div>
                        </div>
                        <?php }
                        ?>
                        <div class="conteneurChamp">
                            <div class="formgauche"><span>Nouveau</span></div>
                            <div class="formdroite"><input type="password" name="new_password" id="confirmation_new_password"></div>
                        </div>
                        <div class="conteneurChamp">
                            <div class="formgauche"><span>Confirmation</span></div>
                            <div class="formdroite"><input type="password" name="confirmation_new_password" id="confirmation_new_password"></div>
                        </div>
                        <div class="redir">
                                <span>Vous connaissez votre mot de passe? </span>
                                <a href="connexion.php">Se connecter</a>
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