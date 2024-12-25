<?php
    require 'config/bdd_connect.php';
    if (isset($_GET['id_a_supprimer'])) {
        $id=$_GET['id_a_supprimer'];
        $data = $db_conect->query("SELECT * FROM clients WHERE client_id=".$id);
        $ligne = $data->fetch(PDO::FETCH_ASSOC);
        $client = $ligne['nom'];
       $requete = "DELETE FROM clients WHERE client_id=".$id;
       if (isset($_POST['supprimer'])) {
        $result = $db_conect->exec($requete);
        if (!$result) {
            echo "<script>alert('Un problème est survenu durant la suppresion de $client');</script>";
        }
        else {
            echo "<script>alert('$client a bien été supprimé de la base');</script>";
            header('Location:admin.php');
        }
       }
   

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suppression de <?php echo $ligne['nom']." ".$ligne['prenom'] ?></title>
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
                    <h1>Suppression profile</h1>
                </div>
                <div class="champs">
                    <form action="" id="form" method="POST">
                        <div class="conteneurChamp">
                            <div class="formgauche"><span>Email</span></div>
                            <div class="formdroite"><p><?=$ligne['email']?></p></div>
                        </div>
                        <div class="conteneurChamp">
                            <div class="formgauche"><span>Nom</span></div>
                            <div class="formdroite"><p><?=$ligne['nom']?></p></div>
                        </div>
                        <div class="conteneurChamp">
                            <div class="formgauche"><span>Prénom</span></div>
                            <div class="formdroite"><p><?=$ligne['prenom']?></p></div>
                        </div>
                        <div class="conteneurChamp">
                            <div class="formgauche"><span>Adresse</span></div>
                            <div class="formdroite"><p><?=$ligne['adresse']?></p></div>
                        </div>
                        <div class="conteneurChamp">
                            <div class="formgauche"><span>Ville</span></div>
                            <div class="formdroite"><p><?=$ligne['ville']?></p></div>
                        </div>
                        <div class="conteneurChamp">
                            <div class="formgauche"><span>Pays</span></div>
                            <div class="formdroite"><p><?=$ligne['pays']?></p></div>
                        </div>
                        <div id="validation">
                            <input type="submit" value="Appliquer" name="supprimer">
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
<?php 
$data -> closeCursor();
 } else{
    header('Location:index.php');
} ?>