<?php

if (isset($_POST['adRevue'])) {

    $titreRevue = htmlentities(trim($_POST['titreRevue'])) ?? '';
    $lienRevue = htmlentities(trim($_POST['lienRevue'])) ?? '';
    $descriptionRevue = htmlentities(trim($_POST['descriptionRevue'])) ?? '';
    $signatureRevue = htmlentities(trim($_POST['signatureRevue'])) ?? '';
    $releaseDateRevue = trim($_POST['releaseDateRevue']) ?? '';


    $erreur = array();

    if (strlen($titreRevue) === 0)
        array_push($erreur, "Veuillez saisir un titre");

    if (strlen($releaseDateRevue) === 0)
        array_push($erreur, "Veuillez saisir la date de l'article");

    if (strlen($descriptionRevue) === 0)
        array_push($erreur, "Veuillez saisir une description");

    if (strlen($signatureRevue) === 0)
        array_push($erreur, "Veuillez saisir l'auteur de cet article");

    if (count($erreur) === 0) {
                try {
                    $conn = getPdo();

                    $query = $conn->prepare("
                    INSERT INTO brouillonrevue(NomArticle, lienArticle, ContenuArticle, signature, dateArticle)
                    VALUES ('$titreRevue', '$lienRevue', '$descriptionRevue','$signatureRevue', '$releaseDateRevue')
                    ");

                    $query->execute();

                } catch (PDOException $e) {
                    die("Erreur :  " . $e->getMessage());
                }
                $conn = null;
                echo "<p>Insertions effectuées</p>";
                include 'formAjoutRevuesAdm.php';
        
    } else {
        $messageErreur = "<ul>";
        $i = 0;
        do {
            $messageErreur .= "<li>" . $erreur[$i] . "</li>";
            $i++;
        } while ($i < count($erreur));

        $messageErreur .= "</ul>";

        echo $messageErreur;
        include 'formAjoutRevuesAdm.php';
    }
} else {
    echo "<h2>Merci de renseigner le formulaire&nbsp;:</h2>";
    $titreRevue = $descriptionRevue = $signatureRevue = $releaseDateRevue = $lienRevue = '';
    include 'formAjoutRevuesAdm.php';
}
