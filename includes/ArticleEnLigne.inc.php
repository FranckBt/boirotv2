<h2>Article en ligne</h2>
<?php
try {
    $conn = getPdo();

    $requete = $conn->prepare("SELECT * FROM revuedepresse ORDER BY dateArticle ASC");
    $requete->execute();
    $resultat = $requete->fetchAll(PDO::FETCH_ASSOC);

    $html = "<ul>";
    $html .=  "<form method='post'>";
    for ($i = 0; $i < count($resultat); $i++) {
        $idRevue = $resultat[$i]['idRevueDePresse'];
        $dateArticle = $resultat[$i]['dateArticle'];
        $lienArticle = $resultat[$i]['lienArticle'];
        $nomArticle = $resultat[$i]['NomArticle'];
        $article = $resultat[$i]['ContenuArticle'];
        $signature = $resultat[$i]['signature'];
       
        $dateArticle=date("d.m.y", strtotime($dateArticle));

        if ($lienArticle != null) {
            $html .= "<li class=\"titreR\"> $nomArticle</a></li>";
            $html .= "<br>";
            $html .= "<li class=\"articleR\">$article ...</li>";
            $html .= "<br>";
            $html .= "<li class=\"dateR\">$dateArticle</li>";
            $html .= "<li class=\"signatureR\">Par: $signature</li>";
            $html .= "<li><input type='submit' value=\"Suprimer l'article 🗑️\" name='supRevue$idRevue' />";
            $html .= "<input type='submit' value=\"Mettre cet article dans les brouillons\" name='archive$idRevue' /></li>";
            $html .= "<hr>";
        } else {
            $html .= "<li class=\"titreR\"> $nomArticle</a></li>";
            $html .= "<br>";
            $html .= "<li class=\"articleR\"> $article  ...</li>";
            $html .= "<br>"; 
            $html .= "<li class=\"dateR\">$dateArticle </li>";
            $html .= "<li class=\"signatureR\">Par: $signature</li>";
            $html .= "<li><input type='submit' value=\"Suprimer l'article 🗑️\" name='supRevue$idRevue' />";
            $html .= "<input type='submit' value=\"Mettre cet article dans les brouillons\" name='archive$idRevue' /></li>";
            $html .= "<hr>";
        }
        if (isset($_POST['supRevue'.$idRevue])) {
            try {
                $conn5 = getPdo();
    
                $query5 = $conn5->prepare("
                DELETE FROM `revuedepresse` WHERE `revuedepresse`.`idRevueDePresse`= $idRevue
                ");
                $query5->execute();
                echo "<p>Brouillon suprimé</p>";
                echo ("<meta http-equiv='refresh' content='1'>");
                $conn5 = null;
            } catch (PDOException $e) {
                die("Erreur :  " . $e->getMessage());
                $conn5 = null;
            }
        }
        include 'archivage.php';
    }
    $html .= "</lu>";
    $html .= "</form>";
    echo $html;
} catch (PDOException $e) {
    die("Erreur : " . $e->getMessage());
}
$conn = null;
