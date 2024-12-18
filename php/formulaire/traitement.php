<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>traitement de mon formulaire</title>
    <link rel="stylesheet" href="css/styleformulaire.css">
</head>
<body>
    <header>

    </header>
    <section>
        <div class="container">
            <?php 
                $nom = htmlspecialchars($_POST['nom']);
                $prenom = strip_tags($_POST['prenom']);
                $email = htmlspecialchars($_POST['email']);
                $pays = $_POST['pays'];
            ?>
            <p>Bienvenu <?php echo $nom.' '.$prenom; ?></p>
            <p>Votre email est <?php echo $email; ?> . Vous êtes de <?php echo $pays; ?>.</p>
        </div>
    </section>
    <footer>

    </footer>
    <script src=""></script>
</body>
</html>