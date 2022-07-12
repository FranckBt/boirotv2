<?php
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
