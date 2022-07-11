<?php
if (isset($_POST['archive'.$idRevue])) {
    try {

        $conn7 = getPdo();
        $query7 = $conn7->prepare("
                    INSERT INTO brouillonrevue(NomArticle, lienArticle, ContenuArticle, signature, dateArticle)
                    VALUES ('$nomArticle', '$lienArticle', '$article','$signature', '$dateArticle')
                    ");
        $query7->execute();

        $conn6 = getPdo();
        $query6 = $conn6->prepare("
        DELETE FROM `revuedepresse` WHERE `revuedepresse`.`idRevueDePresse`= $idRevue
        ");
        $query6->execute();

        echo ("<meta http-equiv='refresh' content='1'>");

        $conn6 = null;
        $conn7 = null;

    } catch (PDOException $e) {
        die("Erreur :  " . $e->getMessage());
        $conn6 = null;
    }
}
