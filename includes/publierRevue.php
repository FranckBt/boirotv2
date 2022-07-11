<?php
if (isset($_POST['publier' . $idBr])) {
    try {

        $conn7 = getPdo();

        $query7 = $conn7->prepare("
                    INSERT INTO revuedepresse(NomArticle, lienArticle, ContenuArticle, signature, dateArticle)
                    VALUES ('$nomBr', '$lienBr', '$contenuBr','$signatureBr', '$dateBr')
                    ");
        $query7->execute();

        $conn6 = getPdo();

        $query6 = $conn6->prepare("
        DELETE FROM `brouillonrevue` WHERE `brouillonrevue`.`id_Brouilon`= $idBr
        ");
        $query6->execute();

        echo ("<meta http-equiv='refresh' content='1'>");
        $conn6 = null;
    } catch (PDOException $e) {
        die("Erreur :  " . $e->getMessage());
        $conn6 = null;
    }
}
