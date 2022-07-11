<?php
if (isset($_POST['envoi'])) {
    $mail = htmlentities(trim($_POST['mail'])) ?? '';
    $mdp = htmlentities(trim($_POST['mdp'])) ?? '';

    $erreur = array();

    if (strlen($mail) === 0)
        array_push($erreur, "<p class=\"msgErreur\">Veuillez saisir votre nom </p>");

    if (strlen($mdp) === 0)
        array_push($erreur, "<p class='msgErreur'>Veuillez saisir un mot de passe </p>");

    if (count($erreur) === 0) {
        try{
            $conn = getPdo();

            $requete = $conn->prepare("SELECT * FROM administrateur WHERE mail='$mail'");
            $requete->execute();
            $resultat = $requete->fetchAll(PDO::FETCH_OBJ);
         
            if(count($resultat) === 0) {
                echo "Pas de résultat avec votre login/mot de passe";
            }

            else {
                $mdpRequete = $resultat[0]->MotDePasse;
                if(password_verify($mdp, $mdpRequete)) {
                    if(!isset($_SESSION['login'])){
                        $_SESSION['login'] = true;
                         $_SESSION['nom'] = $resultat[0]->nom;
                         $_SESSION['prenom'] = $resultat[0]->prenom;
                        // echo "<script>
                        // document.location.replace('http://localhost/BoirotAvocat/');
                        // </script>";
                        redirectJS('home');
                    }
                    else {
                        echo "<p>Vous êtes déjà connecté";
                    }
                }
                else {
                    echo "Bien tenté";
                }
            }
                
        }
        catch(PDOException $e){
            die("Erreur :  " . $e->getMessage());
        }   

        $conn = null;
    } else {
        $messageErreur = "<ul>";
        $i = 0;
        do {
            $messageErreur .= "<li>";
            $messageErreur .= $erreur[$i];
            $messageErreur .= "</li>";
            $i++;
        } while ($i < count($erreur));

        $messageErreur .= "</ul>";

        echo $messageErreur;
    }
} else {
    echo "<h2>Merci de renseigner le formulaire&nbsp;:</h2>";
    $mail = $mdp = '';
}

include 'frmLogin.php';