        <header class="entete">
            <div id="marque">
                <p id="logo"><a href="index.php">CNTMAD</a></p>
            </div>
            <div id="menu">
                <ul class="list" id="les_uls">
                    <li><a href="">Actualités</a></li>
                    <li id="pdrop"><a href="">Espace Compte</a>

                        <ul class="dropdown-menu">
                        <?php
                        if (isset($_SESSION['id'])) {
                        
                        ?>
                            <li><a href="">Espace <?=$_SESSION['username'] ?? 'Compte'?></a></li>
                            <li><a href="">Dashboard</a></li>
                            <li><a href="deconnexion.php">Deconnexion</a></li>
                        <?php }else {
                        ?>
                            <li><a href="connexion.php">Se connecter</a></li>
                            <li><a href="inscription.php">S'inscrire</a></li>
                        <?php } ?>
                        </ul>
                    </li>
                    <li><a href="">Contact</a></li>
                    <li><a href="">Blog</a></li>

                </ul>
                <button class="btn">MENU</button>
            </div>
        </header>