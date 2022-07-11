<h2>Inscription Admin</h2>
<?php

if (isset($_POST['inscriptionAD'])) {
    $nomAD = htmlentities(mb_strtoupper(trim($_POST['nonAD']))) ?? '';
    $prenomAD = htmlentities(ucfirst(mb_strtolower(trim($_POST['prenomAD'])))) ?? '';
    $emailAD = trim(mb_strtolower($_POST['emailAD'])) ?? '';
    $motDePasseAD = htmlentities(trim($_POST['motDePasseAD'])) ?? '';
    $verifMdpAD = htmlentities(trim($_POST['verifMdpAD'])) ?? '';
    $roleID = htmlentities(trim($_POST['roles']));

    $erreur = array();


    if (preg_match('/(*UTF8)^[[:alpha:]]+$/', html_entity_decode($nomAD)) !== 1)
        $erreur['nomAD'] ="Veuillez saisir votre nom"; 
    
    else
       $nomAD = html_entity_decode($nomAD); 
    
        

    if (preg_match('/(*UTF8)^[[:alpha:]]+$/', html_entity_decode($prenomAD)) !== 1) $erreur["prenomAD"] = "Veuillez saisir votre prénom";
    else $prenomAD = html_entity_decode($prenomAD);

    if (!filter_var($emailAD, FILTER_VALIDATE_EMAIL)) $erreur["emailAD"] = "Veuillez saisir un e-mail valide";
    

    if (strlen($motDePasseAD) === 0) $erreur["motDePasseAD"] = "Veuillez saisir un mot de passe";
        

    if (!is_numeric($roleID)) $erreur["roleID"] = "Veuillez saisir un role";


    if (strlen($verifMdpAD) === 0) $erreur["verifMdpAD"] = "Veuillez saisir la vérification de votre mot de passe";


    if ($motDePasseAD !== $verifMdpAD) $erreur["verifMdpAD"] = "Vos mots de passe ne correspondent pas";


    if (count($erreur) === 0) {
        try {
            $conn = getPdo();
            
            $motDePasseAD = password_hash($motDePasseAD, PASSWORD_DEFAULT);

            $requete = $conn->prepare("SELECT * FROM administrateur WHERE mail='$emailAD'");
            $requete->execute();
            $resultat = $requete->fetchAll(PDO::FETCH_OBJ);

            if (count($resultat) !== 0) {
                echo "<p>Votre adresse est déjà enregistrée dans la base de données</p>";
            } else {

                $query = $conn->prepare("
                INSERT INTO administrateur(nom, prenom, mail, MotDePasse, role_idrole)
                VALUES (:nom, :prenom, :email, :MotDePasse, :role_idrole)
                ");

                $query->bindParam(':nom', $nomAD, PDO::PARAM_STR_CHAR);
                $query->bindParam(':prenom', $prenomAD, PDO::PARAM_STR_CHAR);
                $query->bindParam(':email', $emailAD, PDO::PARAM_STR_CHAR);
                $query->bindParam(':MotDePasse', $motDePasseAD);
                $query->bindParam(':role_idrole', $roleID);
                $query->execute();

                echo "<p>Insertions admin effectuées</p>";
            }
        } catch (PDOException $e) {
            die("Erreur :  " . $e->getMessage());
        }

        $conn = null;
    }
} else {
    echo "<h2>Merci de renseigner le formulaire&nbsp;:</h2>";
    $nomAD = $prenomAD = $emailAD = $pseudo = '';

}
include 'formAjoutAdmin.php';
