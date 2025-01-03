<?php
    require 'config/bdd_connect.php';
    require 'config/fonctions.php';
    $erreur = '';
    $message_error = ''; // initialisation de la variable d'erreur
    $message_success = ''; // initialisation de la variable de succès
    
    if (isset($_POST['lance_inscription'])) {
        // Validation du champ 'username'
        if (empty($_POST['username'])) {
            $message_error = "Username ne peut pas être vide !";
        } elseif (!preg_match('/[a-zA-Z0-9]+/', $_POST['username'])) {
            $message_error = "Seules les alphanumériques sont autorisées dans le champ username!";
        }

        // Si une erreur a été trouvée dans le champ 'username', on arrête la validation et on n'affiche pas les autres erreurs
        if (empty($message_error)) {
            // Validation du champ 'email'
            if (empty($_POST['email'])) {
                $message_error = "Champs mail requis";
            } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $message_error = "Email invalide inséré";
            } else {
                // Vérification si l'email existe déjà dans la base de données
                $mail = $_POST['email'];
                $query = "SELECT email FROM user WHERE email=:mail";
                $requete = $db_conect->prepare($query);
                $requete->bindParam(':mail', $mail, PDO::PARAM_STR);
                $requete->execute();
                $ligne = $requete->fetchAll(PDO::FETCH_ASSOC);
                if (count($ligne) > 0) {
                    $message_error = "Il y a déjà un compte lié à ce mail. Cliquez <a href=\"reinitialiser_mdp.php\">ici</a> pour réinitialiser votre mot de passe.";
                }
            }
        }

        // Si aucune erreur n'a été trouvée pour username et email, on passe à la validation des mots de passe
        if (empty($message_error)) {
            // Validation du mot de passe et confirmation
            if (empty($_POST['password']) || empty($_POST['password_confirm'])) {
                $message_error = "Les champs mot de passe et confirmation doivent être remplis";
            } elseif ($_POST['password'] != $_POST['password_confirm']) {
                $message_error = "Le mot de passe saisi est différent de la confirmation";
            }
        }

        // Si aucune erreur, l'inscription est réussie
        if (empty($message_error)) {
            $token = token_random(25);
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $insertion = $db_conect->prepare("INSERT INTO user (username, email, cpassword, token) VALUES (:username, :email, :cpassword, :token)");
            $insertion->bindParam(':username', $_POST['username'], PDO::PARAM_STR);
            $insertion->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
            $insertion->bindParam('cpassword', $password, PDO::PARAM_STR);
            $insertion->bindvalue(':token', $token);
            $result_insertion = $insertion->execute();
            if ($result_insertion) {
                $message_success = "Félicitations, inscription réussie. Un mail vous a été envoyé. Veuillez le confirmer!";
                $lien = "<a href=\"activation_compte.php?token=".$token."&email=".$_POST['email']."\">valider ici</a>";
            }
            else{
                $error_info = $insertion->errorInfo();
                $message_error = "Erreur lors de l'insertion : " . $error_info[2];
            }
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
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
                if (!empty($message_error)) {
                    
                ?>
                <div class="error_message">
                    <?php 
                        echo $message_error;
                    ?>
                </div>
                <?php } elseif (!empty($message_success)) {
                    
                ?>
                <div class="success_message">
                    <?php 
                        echo $message_success;
                        echo $lien; 
                    ?>
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