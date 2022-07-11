<?php

try {
    $conn = getPdo();

    $requete = $conn->prepare("SELECT * FROM revuedepresse ORDER BY dateArticle ASC");
    $requete->execute();
    $resultat = $requete->fetchAll(PDO::FETCH_ASSOC);

    $html = "<ul>";

    for ($i = 0; $i < 4; $i++) {
        $idRevue = $resultat[$i]['idRevueDePresse'];
        $dateArticle = $resultat[$i]['dateArticle'];
        $lienArticle = $resultat[$i]['lienArticle'];
        $nomArticle = $resultat[$i]['NomArticle'];
        $article = $resultat[$i]['ContenuArticle'];
        $signature = $resultat[$i]['signature'];
       
        // nombre de caracteres affiché
        $article = substr($article , 0, 100);

        // Gestion format de la date

        $dateArticle=date("d.m.y", strtotime($dateArticle));
        
        if ($lienArticle != null) {
            $html .= "<img class=\"imgR\" src=\"img/logoArt.png\"";
            $html .= "<li class=\"titreR\"><a class=\"titreR\" href=\"$lienArticle\"> $nomArticle</a></li>";
            $html .= "<br>";
            $html .= "<li class=\"articleR\">$article ...</li>";
            $html .= "<br>";
            $html .= "<li class=\"dateR\">$dateArticle</li>";
            $html .= "<li class=\"signatureR\">Par: $signature</li>";
        } else {
            $html .= "<img class=\"penR\" src=\"img/penR.svg\"";
            $html .= "<li class=\"titreR\"><a class=\"titreR\" href=\"index.php?page=revues#$idRevue\"> $nomArticle</a></li>";
            $html .= "<br>";
            $html .= "<li class=\"articleR\"> $article  ...</li>";
            $html .= "<br>"; 
            $html .= "<li class=\"dateR\">$dateArticle </li>";
            $html .= "<li class=\"signatureR\">Par: $signature</li>";
        }
    }
    $html .= "</lu>";

    echo $html;
} catch (PDOException $e) {
    echo ("Erreur : " . $e->getMessage());
}
$conn = null;
