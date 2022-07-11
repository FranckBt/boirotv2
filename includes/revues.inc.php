<h2>Revues de presse</h2>

<?php

try {
    $conn = getPdo();

    $requete = $conn->prepare("SELECT * FROM revuedepresse ORDER BY dateArticle DESC");
    $requete->execute();
    $resultat = $requete->fetchAll(PDO::FETCH_ASSOC);


    $html = "<ul>";

    for ($i = 0; $i < count($resultat); $i++) {

        $idRevue = $resultat[$i]['idRevueDePresse'];
        $dateArticle = $resultat[$i]['dateArticle'];
        $lienArticle = $resultat[$i]['lienArticle'];
        $nomArticle = $resultat[$i]['NomArticle'];
        $article = $resultat[$i]['ContenuArticle'];
        $signature = $resultat[$i]['signature'];

        // Gestion format de la date

        $dateArticle=date("d.m.y", strtotime($dateArticle));

        if ($lienArticle == null) {
            $html .= "<li id=\"$idRevue\" class=\"titreR\"> $nomArticle</li>";
            $html .= "<li class=\"dateR\">$dateArticle </li>";
            $html .= "<li class=\"articleR\"> $article  ...</li>";
            $html .= "<br>"; 
            $html .= "<li class=\"signatureR\">Par: $signature</li>";
        }
    }
    $html .= "</lu>";
    echo $html;
} catch (PDOException $e) {
    die("Erreur : " . $e->getMessage());
}
$conn = null;
