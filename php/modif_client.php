<?php
    require 'config/bdd_connect.php';
    if (isset($_GET['id_a_modifier'])) {
        $id=$_GET['id_a_modifier'];
        $requete = $db_conect->query("SELECT *  FROM clients WHERE client_id='$id'");
        $ligne = $requete->fetch(PDO::FETCH_ASSOC);
        if (isset($_POST['lance_inscription'])) {
            if (isset($_POST['email']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['adresse']) && isset($_POST['ville']) && isset($_POST['pays'])) {
                $requeteMAJ = $db_conect->prepare("UPDATE clients SET email=:email, nom=:nom, prenom=:prenom, adresse=:adresse, ville=:ville, pays=:pays WHERE client_id=:id");
                $requeteMAJ->bindvalue(':email', $_POST['email']);
                $requeteMAJ->bindvalue(':nom', $_POST['nom']);
                $requeteMAJ->bindvalue(':prenom', $_POST['prenom']);
                $requeteMAJ->bindvalue(':adresse', $_POST['adresse']);
                $requeteMAJ->bindvalue(':ville', $_POST['ville']);
                $requeteMAJ->bindvalue(':pays', $_POST['pays']);
                $requeteMAJ->bindvalue(':id', $_GET['id_a_modifier']);
            
                $result = $requeteMAJ->execute();
                if ($result) {
                    echo "<script>alert('Mise à jour de la base de donnée $id effectué');</script>";
                }
                else {
                    echo "<script>alert('Erreur lors de la mise à jour de la base de donnée');</script>";
                }
            }else{
                echo "<script>alert('Tous les champs son requis');</script>";
            }
            
        }
   

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification profile de <?php echo $ligne['nom']." ".$ligne['prenom'] ?></title>
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
                    <h1>Modification profile</h1>
                </div>
                <div class="champs">
                    <form action="" id="form" method="POST">
                        <div class="conteneurChamp">
                            <div class="formgauche"><span>Email</span></div>
                            <div class="formdroite"><input type="email" name="email" id="email" value="<?=$ligne['email']?>"></div>
                        </div>
                        <div class="conteneurChamp">
                            <div class="formgauche"><span>Nom</span></div>
                            <div class="formdroite"><input type="text" name="nom" id="nom" value="<?=$ligne['nom']?>"></div>
                        </div>
                        <div class="conteneurChamp">
                            <div class="formgauche"><span>Prénom</span></div>
                            <div class="formdroite"><input type="text" name="prenom" id="prenom" value="<?=$ligne['prenom']?>"></div>
                        </div>
                        <div class="conteneurChamp">
                            <div class="formgauche"><span>Adresse</span></div>
                            <div class="formdroite"><input type="text" name="adresse" id="adresse" value="<?=$ligne['adresse']?>"></div>
                        </div>
                        <div class="conteneurChamp">
                            <div class="formgauche"><span>Ville</span></div>
                            <div class="formdroite"><input type="text" name="ville" id="ville" value="<?=$ligne['ville']?>"></div>
                        </div>
                        <div class="conteneurChamp">
                            <div class="formgauche"><span>Pays</span></div>
                            <div class="formdroite"><input type="text" name="pays" id="pays" value="<?=$ligne['pays']?>"></div>
                        </div>
                        <div id="validation">
                            <input type="submit" value="Appliquer" name="lance_inscription">
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
<?php $requete -> closeCursor(); } else{
    header('Location:index.php');
} ?>