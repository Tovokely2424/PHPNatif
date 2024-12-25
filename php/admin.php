<?php
    require 'config/bdd_connect.php';
    $resultat = $db_conect -> query("SELECT * FROM clients ORDER BY nom ASC");
    $nombre_client = $resultat->rowCount();
    if (!$resultat) {
        $erreur = "Erreur lors de la récupération des clients";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TP Gestion espace membre en php natif</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="container">
        <?php
            include 'src/View/header.php';
        ?>
        <section class="principale">
        <div class="container_body">
                <div class="head_body">
                    <p>
                        <h1>Réupération de tous les clients actuels</h1>
                    </p>
                </div>
                <div class="realcontent">
                    <div id="menu_body">
                        <h3>Menu</h3>
                        <ol>
                            <li><a href="admin.php">Admin</a></li>
                            <li><a href="membre.php">Membre</a></li>
                            <li><a href="">Table de matières</a></li>
                        </ol>
                    </div>
                    <article class="article">
                        <h3>Tableau contenant le client </h3>
                        <p>
                            <table border="1">
                                <tr>
                                    <th>Id</th>
                                    <th>Nom</th>
                                    <th>Prenom</th>
                                    <th>Email</th>
                                    <th>Date de naissance</th>
                                    <th>Adresse</th>
                                    <th>Ville</th>
                                    <th>Pays</th>
                                    <th>Date création</th>
                                    <th>Modificatio</th>
                                    <th>Suppression</th>
                                </tr>
                                <?php 
                                while ($ligne = $resultat->fetch(PDO::FETCH_ASSOC)) {
                                    echo "<tr>";
                                    foreach ($ligne as $valeur) {
                                        echo "<td>".$valeur."</td>";
                                    }
                                    $id_ligne = $ligne['client_id'];
                                    echo "<td><a href=\"modif_client.php?id_a_modifier=$id_ligne\">Modifier</a></td>";
                                    echo "<td><a href=\"supprimer_client.php?id_a_supprimer=$id_ligne\">Supprimer</a></td>";
                                    echo "</tr>";
                                }
                                ?>
                            </table>
                        </p>
                    </article>
                </div>
            </div>
        </section>
        <footer id="pied">

        </footer>
    </div>
    
</body>
</html>