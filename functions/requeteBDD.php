<?php

use LDAP\Result;

function recupRole()
{
    try {
        $conn = getPdo();
        $requete = $conn->prepare("SELECT * FROM role ");
        $requete->execute();
        $roles = $requete->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("Erreur : " . $e->getMessage());
    }
    $conn = null;
    return $roles;
}

function listRevues($number = null) {
    $conn = getPdo();

    if (is_int($number)) {
        $sql = "SELECT * FROM revuedepresse ORDER BY dateArticle ASC LIMIT $number";
    } else {
        $sql = "SELECT * FROM revuedepresse ORDER BY dateArticle ASC";
    }

    $requete = $conn->prepare($sql);
    $requete->execute();
    $resultat = $requete->fetchAll(PDO::FETCH_OBJ);

    $conn = null;
    return $resultat;
}