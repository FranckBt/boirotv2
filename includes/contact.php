<?php

if (isset($_POST['contact'])) {
    $nom = htmlentities(mb_strtoupper(trim($_POST['nom']))) ?? '';
    $prenom = htmlentities(ucfirst(mb_strtolower(trim($_POST['prenom'])))) ?? '';
    $telephone = htmlentities($_POST['telephone']);
    $mail = trim(mb_strtolower($_POST['mail'])) ?? '';
    $objet = htmlentities($_POST['objet']);
    $message = htmlentities($_POST['message']);

    $erreur = array();

    $reg = '/^[\p{L}][\p{L}\-[:blank:]]+$/';
    // EQUIVALENT
    // $reg2 = '/^[\p{L}][\p{L}\s]+$/';

    if (preg_match($reg, html_entity_decode($nom)) !== 1)
        array_push($erreur, "Veuillez saisir un nom");
    else
        $nom = html_entity_decode($nom);

    if (strlen($prenom) > 0) {
        if (preg_match($reg, html_entity_decode($prenom)) !== 1)
        array_push($erreur, "Veuillez saisir un prénom ou laissez ce champs vide");
    } else
        $prenom = html_entity_decode($prenom);

    if (!filter_var($mail, FILTER_VALIDATE_EMAIL))
        array_push($erreur, "Veuillez saisir un e-mail valide");

    if (preg_match("#^0[1-68]([-. ]?[0-9]{2}){4}$#", $telephone)) {
        $meta_carac = array("-", ".", " ");
        $telephone = str_replace($meta_carac, "", $telephone);
        $telephone = chunk_split($telephone, 2, "\r");
    } else
        echo "Le numéro saisi n'est pas un numéro valide";

    if (count($erreur) === 0) {
        try {
            $conn = getPdo();

            $query = $conn->prepare("
                INSERT INTO formcontact(nom, prenom, mail, telephone, objet, message)
                VALUES (:nom, :prenom, :mail, :telephone, :objet, :message)
                ");

            $query->bindParam(':nom', $nom, PDO::PARAM_STR_CHAR);
            $query->bindParam(':prenom', $prenom, PDO::PARAM_STR_CHAR);
            $query->bindParam(':mail', $mail, PDO::PARAM_STR_CHAR);
            $query->bindParam(':telephone', $telephone);
            $query->bindParam(':objet', $objet, PDO::PARAM_STR_CHAR);
            $query->bindParam(':message', $message, PDO::PARAM_STR_CHAR);
            $query->execute();


            include 'formContact.php';
            echo "<p id='confirmationEnvoiMsg'>Message envoyé</p>";
        } catch (PDOException $e) {
            die("Erreur :  " . $e->getMessage());
        }

        $conn = null;
    } else {
        $messageErreur = "<ul>";
        $i = 0;
        do {
            $messageErreur .= "<li>" . $erreur[$i] . "</li>";
            $i++;
        } while ($i < count($erreur));

        $messageErreur .= "</ul>";

        echo $messageErreur;
        include 'formContact.php';
    }
} else {
    $nom = $prenom = $telephone = $mail = $objet = $message = '';
    include 'formContact.php';
}
