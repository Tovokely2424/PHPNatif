<?php
    require 'config/bdd_connect.php';
    $erreur = '';
    if (isset($_POST['lance_inscription'])) {
        if (empty($_POST['username']) || !preg_match('/[a-zA-Z0-9]+/', $_POST['username'])) {
            if (empty($_POST['username'])) {
                $message_error="Username ne peut pas être vide !";
            }
            elseif (!preg_match('/[a-zA-Z0-9]+/', $_POST['username'])) {
                $message_error = "Seule les alphanumeriques sont autorisés dans le champs username!";
            }
        }
        elseif (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            if (empty($_POST['email'])) {
                $message_error = "Champs mail requiert";
            }
            elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
                $message_error="Email invalide inséré";
                
            }
        }
        elseif (isset($_POST['email'])) {
                $mail = $_POST['email'];
                $query = "SELECT email FROM user WHERE email=:mail";
                $requete = $db_conect->prepare($query);
                $requete->bindParam(':mail', $mail, PDO::PARAM_STR);
                $requete->execute();
                $ligne = $requete->fetchAll(PDO::FETCH_ASSOC);
                // $requete->bindvalue(':mail', $mail);
                // $resultat=$requete->exec($requete);
                if (count($ligne) > 0) {
                    
                    $message_error = "Il y a deja un compte lié à se mail.Cliquez <a href=\"reinitialiser_mdp.php\">ici</a> pour reinitialiser votre mot de passe.";
                }
        }
        elseif (empty($_POST['password']) || empty($_POST['password_confirm'])) {
            $message_error = "Les champs pass et confirmation doivent être remplis";
        }
        elseif($_POST['password'] != $_POST['password_confirm']){
            $message_error = "le mot de passe saisi est différent de confirmation";
        }


        if($message_error==""){
            $message_success = "Felicitation, inscription réussie. Un mail vous a été envoyé. Veuillez le confirmer! ";
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
                <p id="logo"><a href="index.php">CNTMAD</a></p>
            </div>
            <div id="menu">
            </div>
        </header>
        <section class="principale">
            <div id="conteneur_form">
                <div class="titre">
                    <h1>Inscription</h1>
                </div>
                <?php
                if (isset($message_error)) {
                    
                ?>
                <div class="error_message">
                    <?php echo $message_error; ?>
                </div>
                <?php } elseif (isset($message_success)) {
                    
                ?>
                <div class="success_message">
                    <?php echo $message_success; ?>
                </div>
                <?php } ?>
                <div class="champs">
                    <form action="" id="form" method="POST">
                        <div class="conteneurChamp">
                            <div class="formgauche"><span>Username</span></div>
                            <div class="formdroite"><input type="text" name="username" id="username" ></div>
                        </div>
                        <div class="conteneurChamp">
                            <div class="formgauche"><span>Email</span></div>
                            <div class="formdroite"><input type="email" name="email" id="email" ></div>
                        </div>
                        <div class="conteneurChamp">
                            <div class="formgauche"><span>Password</span></div>
                            <div class="formdroite"><input type="password" name="password" id="password" ></div>
                        </div>
                        <div class="conteneurChamp">
                            <div class="formgauche"><span>Confirm</span></div>
                            <div class="formdroite"><input type="password" name="password_confirm" id="password_confirm" ></div>
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