<?php
    require_once 'config/bdd_connect.php';
    require 'config/fonctions.php';
    if (isset($_POST['lance_connexion'])) {
        $email=htmlspecialchars($_POST['email']);
        $request = $db_conect->prepare("SELECT * FROM user WHERE email=:email");
        $request->bindParam(':email', $email, PDO::PARAM_STR);
        $request->execute();
        $result = $request->fetchAll(PDO::FETCH_ASSOC);
        if (count($result) > 0) {
            $validation_ok = $result[0]['confirm'];
            if ($validation_ok) {
                $passwordIsOk = password_verify($_POST['password'],$result[0]['cpassword']);
                if ($passwordIsOk) {
                    session_start();
                    $_SESSION['email']=$email;
                    $_SESSION['id'] = $result[0]['id'];
                    $_SESSION['username'] = $result['username'];

                    //if user check se souvenir de moi
                    if (isset($_POST['checkStay'])) {
                        setcookie('email', $_POST['email']);
                        setcookie('password', $_POST['password']);
                    }
                    else {
                        if(isset($_COOKIE['email'])){
                            setcookie('email', "");
                        }
                        if (isset($_COOKIE['password'],)) {
                            setcookie('password', "");
                        }
                    }

                    header('Location:index.php');
                }else{
                    $message_error = "Mot de passe incorecte";
                }
            }else {
                $message_error = "Votre compte n'a pas été confirmé! Verifier votre mail";
                $token = token_random(25);
                $requestMAJ = $db_conect->prepare("UPDATE user SET token=:token WHERE email=:email");
                $requestMAJ->bindvalue(':token', $token);
                $requestMAJ->bindvalue(':email', $email);
                $requestMAJ->execute();
                $lien="<a href=\"activation_compte.php?email=".$email."&token=".$token."\">Cliquez ici</a>";
            }
        }else {
            $message_error = "On n'a pas trouver un email correspondant à ".$_POST['email']."dans notre base. Merci de vous reinscrire";
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
                        <div class="conteneurChamp">
                            <div class="formgauche"><span>Email</span></div>
                            <div class="formdroite"><input type="email" name="email" id="email" value="<?php if(isset($_COOKIE['email'])){ echo($_COOKIE['email']); }?>"></div>
                        </div>
                        <div class="conteneurChamp">
                            <div class="formgauche"><span>Password</span></div>
                            <div class="formdroite"><input type="password" name="password" id="password" value="<?php if(isset($_COOKIE['password'])){ echo($_COOKIE['password']); }?>"></div>
                        </div>
                        <div class="conteneurChamp">
                            <div id="check"><span>Rester connecté</span><input type="checkbox" name="checkStay" id="checkStay"></div>
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