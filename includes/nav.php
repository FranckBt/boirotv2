<header>
    <div class="wrap-std">
        <div class="menuBurger">
            <nav>
                <div class="burger-button">
                    <span class="burger-top"></span>
                    <span class="burger-middle"></span>
                    <span class="burger-bottom"></span>
                </div>
                <div class="burger-menu">
                    <a onclick="hideBurger()" href="index.php?page=home#cabinet">Présentation</a>
                    <a onclick="hideBurger()" href="index.php?page=home#competences">Compétences</a>
                    <a onclick="hideBurger()" href="index.php?page=home#honoraires">Honoraires</a>
                    <a onclick="hideBurger()" href="index.php?page=home#revues">Revues de presse</a>
                    <a onclick="hideBurger()" href="index.php?page=home#contact">Contact</a>

                </div>
                <div class="logo">
                    <!-- <a href="index.php?page=home">
                        <img id="logoHeader" src="img/logo-couleur.png" alt="logo Boirot Avocat">
                        <img id="textHeader" src="img/texteLogo.png" alt="logo Boirot Avocat">
                    </a> -->
                    <div><img id="logoHeader" src="img/logo-couleur.png" alt="logo Boirot Avocat"></div>
                    <div><img id="textHeader" src="img/texteLogo.png" alt="logo Boirot Avocat"></div>
                </div>
            </nav>
        </div>
        <div class="head">
            <img id="logoHeader" src="img/logo-couleur.png" alt="logo Boirot Avocat">
            <div class="navPc">
                <nav role="navigation">
                    <ul>
                        <li><a href="index.php?page=home#cabinet">Présentation</a></li>
                        <li><a href="index.php?page=home#competences">Compétences</a></li>
                        <li><a href="index.php?page=home#honoraires">Honoraires</a></li>
                        <li><a href="index.php?page=home#revues">Revues de presse</a></li>
                        <li><a href="index.php?page=home#contact">Contact</a></li>
                        <?php
                        if (isset($_SESSION['login']) && $_SESSION['login'] === true) {
                            echo "<li><a href=\"index.php?page=logout\">Deconnexion</a></li>";
                        }
                        ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>