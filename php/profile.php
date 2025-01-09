<?php
    require_once 'config/bdd_connect.php';
    require 'config/fonctions.php';
    session_start();
    if (isset($_SESSION['id'])) {
        
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile <?=$_SESSION['username'] ?? 'user' ?></title>
    <link rel="stylesheet" href="assets/css/styleconnexion.css">
    <link rel="stylesheet" href="assets/css/styleprofile.css">
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
                    <h1><?php echo $_SESSION['nom']." ".$_SESSION['prenom'] ?? 'Profile'; ?></h1>
                </div>
                <hr>
                <div class="champs">
                    <div id="image">

                    </div>
                    <form action="" id="form" method="POST">
                        <div class="conteneurChamp">
                            <div class="formgauche"><span>Utilisateur</span></div>
                            <div class="formdroite"><span><?php echo $_SESSION['username'] ?? 'Erreur'; ?></span></div>
                        </div>
                        <?php 
                        if(!empty($_SESSION['nom'])){
                        ?>
                        <div class="conteneurChamp">
                            <div class="formgauche"><span>Nom</span></div>
                            <div class="formdroite"><span><?php echo $_SESSION['nom'] ?? 'Erreur' ?></span></div>
                        </div>
                        <?php
                        }
                        ?>
                        <?php 
                        if(!empty($_SESSION['prenom'])){
                        ?>
                        <div class="conteneurChamp">
                            <div class="formgauche"><span>Prenom</span></div>
                            <div class="formdroite"><span><?php echo $_SESSION['prenom'] ?? 'Erreur' ?></span></div>
                        </div>
                        <?php
                        }
                        ?>
                        <div class="conteneurChamp">
                            <div class="formgauche"><span>Email</span></div>
                            <div class="formdroite"><span><?php echo $_SESSION['email'] ?? 'Erreur' ?></span></div>
                        </div>
                        
                        <div class="redir">
                                <a href="deconnexion.php">Se deconnecter</a>
                                <a href="index.php">acceuil</a>
                                <a href="modif_client.php?id_a_modifier=<?=$_SESSION['id']."&email=".$_SESSION['email']?>">Modifier</a>
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
<?php }else{
    header('Location:connexion.php');
} ?>