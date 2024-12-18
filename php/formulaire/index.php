<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire avec php</title>
    <link rel="stylesheet" href="css/styleformulaire.css">
</head>
<body>
    <header>
        <form action="traitement.php" method="POST">
            <div class="titreform">
                <h2>1er formulaire</h2>
            </div>
            <div class="champ">
                <p>
                    <label for="nom">Nom </label>
                    <input type="text" name="nom" class="champs">
                </p>
                <p>
                    <label for="prenom">Prenom</label>
                    <input type="text" name="prenom" class="champs">
                </p>
                <p>
                    <label for="email">Email</label>
                    <input type="email" name="email" class="champs">
                </p>

                <p> <label for="pays">Pays :</label>
                    <select name="pays" id="pays">
                        <option value="Madagascar">Madagascar</option>
                        <option value="France">France</option>
                        <option value="Maurice">Maurice</option>
                    </select>
                </p>
                <p>
                    <a href="fichier.php">transferer plutot un fichier</a>
                </p>
                <p>
                    <input type="submit" value="Envoyer" class="bokotra">
                    <input type="reset" value="Reinitialiser" class="bokotra">
                </p>
            </div>
        </form>
    </header>
    <section>

    </section>
    <footer>

    </footer>
</body>
</html>