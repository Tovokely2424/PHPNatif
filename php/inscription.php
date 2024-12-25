<?php
    require 'config/bdd_connect.php';
    $erreur = '';
    if (isset($_POST['lance_inscription'])) {
        if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['password_confirm'])) {
            $mail = htmlspecialchars($_POST['email']);
            $passord =hash("SHA256",htmlspecialchars($_POST['password']));
            $confirm =hash("SHA256",htmlspecialchars($_POST['password_confirm']));
            if ($passord === $confirm) {
                $requete = $db_conect->prepare("INSERT INTO user(email, cpassword) VALUES (:email, :pass)");
                $requete->bindvalue(':email', $mail);
                $requete->bindvalue(':pass', $passord);

                $resultat = $requete->execute();
            }
            else{
                $erreur = "Le mot de passe et la confirmation sont différente";
            }
            
        }
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
                    <h1>Inscription</h1>
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
                        <div class="conteneurChamp">
                            <div class="formgauche"><span>Confirm</span></div>
                            <div class="formdroite"><input type="password" name="password_confirm" id="password_confirm"></div>
                        </div>
                        <div class="redir">
                                <span>Vous avez déjà un compte?  </span>
                                <a href="connexion.php">Se connecter</a>
                        </div>
                        <div id="validation">
                            <input type="submit" value="S'inscrire" name="lance_inscription">
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