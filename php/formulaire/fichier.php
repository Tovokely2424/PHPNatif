<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transferer un fichier sur un server</title>
    <link rel="stylesheet" href="css/styleformulaire.css">
</head>
<body>
    <header>

    </header>
    <section>
        <form action="transmettref.php" enctype="multipart/form-data" method="post">
            <input type="hidden" name="MAX_FILE_SIZE" value="1000000"/>
            <input type="file" name="fichier" class="">
            <input type="submit" value="Envoyer le fichier">
        </form>
    </section>
    <footer>

    </footer>
</body>
</html>