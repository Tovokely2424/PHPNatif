<?php
    require_once 'config/bdd_connect.php';
    if (isset($_GET['token']) && isset($_GET['email'])) {
        $email = filter_var($_GET['email'], FILTER_SANITIZE_EMAIL);
        $token = htmlspecialchars($_GET['token']);
        $requete = $db_conect->prepare("SELECT * FROM user WHERE email=:email AND token=:token");
        $requete->bindParam(':email', $email, PDO::PARAM_STR);
        $requete->bindParam(':token', $token, PDO::PARAM_STR);
        $requete->execute();
        $ligne = $requete->fetchAll(PDO::FETCH_ASSOC);
        $user = $ligne[0]['username'];
        if (count($ligne) > 0) {
            $requeteMAJ = $db_conect->prepare("UPDATE user SET confirm=1 WHERE email=:email");
            $requeteMAJ->bindvalue('email', $email);
            $requeteMAJ->execute();
            $message_success = "Votre insciption est bien confirmé!";
        }
        else {
            $message_error = "Ce lien n'est plus valide. Merci de vous ressouscrire";
        }
    }else{
        $message_error="erreur de la validation";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validation inscription <?=$user ?? 'utilisateur' ?> </title>
</head>
<body>
    <?php
        if (isset($message_error)) {
            echo $message_error;
        }
        elseif(isset($message_success)){
            echo $message_success;
        }
    ?>
</body>
</html>