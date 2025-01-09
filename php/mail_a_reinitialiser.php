<?php
    require_once 'config/bdd_connect.php';
    require_once 'config/fonctions.php';
    if (isset($_POST['lance_reset'])) {
        if (empty($_POST['email'])) {
            $message_error = "L'adresse email requis";
        }
        else {
            if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
                $message_error = "L'adresse email entré n'est pas valide!";
            }
            else {
                $new_token = token_random(30);
                $requete = $db_conect->prepare("SELECT * from user WHERE email=:email");
                $requete->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
                $requete->execute();
                $resultat = $requete->fetch(PDO::FETCH_ASSOC);
                if ($resultat) {
                    $request_update = $db_conect->prepare("UPDATE user SET token=:token WHERE email=:email");
                    $request_update->bindParam(':token', $new_token, PDO::PARAM_STR);
                    $request_update->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
                    $result_maj = $request_update->execute();
                    if ($resultat['confirm']==1) {
                        if ($result_maj) {
                            $message_success = "Un mail vous à été envoyé.";
                            $lien = '<a href="reinitialisation_mot_de_passe.php?token='.$new_token.'&email_a_reinitialiser='.$_POST['email'].'">Reinitialisation ici</a>';
                        }
                        else {
                            $message_error="Une erreur lors de l'envoi du requete, pour la reinitialisationS";
                        }
                    }
                    else {
                        $message_error = "Mail jamais confirmé depuis inscription.";
                        $lien = '<a href="activation_compte.php?token='.$new_token.'&email='.$_POST['email'].'">activation compte</a>';
                    }
                    
                }
                else {
                    $message_error = "Aucun compte lié à ce mail n'est trouvé. Veuillez vous inscrire.";
                }
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reinitialisation Compte</title>
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
                    <h1>Votre adresse email</h1>
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
                <?php
                if (!empty($message_success)) {
                    
                ?>
                <div class="success_message">
                    <?php 
                        echo $message_success;
                        if (isset($lien)) {
                            echo $lien;
                        }
                    ?>
                </div>
                <?php } ?>
                <div class="champs">
                    <form action="" id="form" method="POST">
                        <div class="conteneurChamp">
                            <div class="formgauche"><span>Votre email</span></div>
                            <div class="formdroite"><input type="email" name="email" id="email"></div>
                        </div>
                        <div class="redir">
                                <span>Vous connaissez votre mot de passe? </span>
                                <a href="connexion.php">Se connecter</a>
                        </div>
                        <div id="validation">
                            <input type="submit" value="Confirmer" name="lance_reset">
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