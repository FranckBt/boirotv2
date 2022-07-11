<?php

try {
    $conn = getPdo();

    $requete = $conn->prepare("SELECT * FROM formcontact ORDER BY dateMessage DESC" );
    $requete->execute();
    $resultat = $requete->fetchAll(PDO::FETCH_ASSOC);


    $html = "<ul>";

    for ($i = 0; $i < count($resultat); $i++) {

        $idClient = $resultat[$i]['iduser'];
        $nomClient = $resultat[$i]['nom'];
        $prenomClient = $resultat[$i]['prenom'];
        $mailClient = $resultat[$i]['mail'];
        $telephoneClient = $resultat[$i]['telephone'];
        $objetClient = $resultat[$i]['objet'];
        $messageClient = $resultat[$i]['message'];
        $dateMsg = $resultat[$i]['dateMessage'];
        // Gestion format de la date

        $dateMsg=date("d.m.y H:i", strtotime($dateMsg));

            $html .= "<hr>";
            $html .= "<li>$dateMsg</li>";
            $html .= "<li> $nomClient $prenomClient </li>";
            $html .= "<li> $mailClient </li>";
            $html .= "<li> Objet: $objetClient</li>"; 
            $html .= "<li>$messageClient</li>";
            $html .= "<li>$telephoneClient</li>";
            
        
    }
    $html .= "</lu>";
    echo $html;
} catch (PDOException $e) {
    die("Erreur : " . $e->getMessage());
}
$conn = null;