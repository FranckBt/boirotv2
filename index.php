<?php
require_once './librairies/database.php';
require_once './functions/autoLoadFunction.php';

session_start();
date_default_timezone_set('Europe/Paris');
setlocale(LC_ALL, 'fr_FR', 'fr', 'FR', 'fr_FR@euro');

spl_autoload_register(function ($className) {
    include './classes/' . $className . '.php';
});

if(isset($_SESSION['login']) && $_SESSION['login'] === true){
    require_once './includes/headAdmin.php';
    require_once './includes/navAdm.php';
    require_once './includes/admin.php';
    require_once './includes/footerAdmin.php';

}else{
    // appel fichier FrontOffice
    require_once './includes/head.php';
    require_once './includes/nav.php';
    require_once './includes/main.php';
    require_once './includes/footer.php';
}
