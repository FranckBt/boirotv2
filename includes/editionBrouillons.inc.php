
<?php
if (isset($_SESSION['login']) && $_SESSION['login'] === true) {
    try {
        $conn = getPdo();

        $requete = $conn->prepare("SELECT * FROM brouillonrevue ORDER BY dateArticle ASC");
        $requete->execute();
        $resultat = $requete->fetchAll(PDO::FETCH_ASSOC);

        $html = "<form method='post'>";

        for ($i = 0; $i < count($resultat); $i++) {
            $idBr = $resultat[$i]['id_Brouilon'];
            $dateBr = $resultat[$i]['dateArticle'];
            $lienBr = $resultat[$i]['lienArticle'];
            $nomBr = $resultat[$i]['NomArticle'];
            $contenuBr = $resultat[$i]['ContenuArticle'];
            $signatureBr = $resultat[$i]['signature'];

            $html .= "<li>date article : $dateBr</li>";
            if ($lienBr == !null) {
                $html .= "<li>lien : $lienBr</li>";
            } else {
                $html .= "<li>lien : pas de lien</li>";
            }
            $html .= "<li>Nom article : $nomBr</li>";
            $html .= "<li>Contenu article: $contenuBr </li>";
            $html .= "<li>Fait par : $signatureBr</li>";
            $html .= "<input class='inputCache' type='text' value='sup$idBr' name='sup$idBr'";
            $html .= "<li><input type='submit' value='🗑️' name='supBr$idBr' />";
            $html .= "<input type='submit' value='🖊️' name='editBr$idBr' />";
            $html .= "<input type='submit' value='👁️‍🗨️' name='visuBr$idBr' /></li>";
            $html .= "<li><input class=\"butCont\" type='submit' value='Publier' name='publier$idBr' /></li>";
            $html .= "<hr>";

            if (isset($_POST['supBr' . $idBr])) {
                try {
                    $conn5 = getPdo();

                    $query5 = $conn5->prepare("
                DELETE FROM `brouillonrevue` WHERE `brouillonrevue`.`id_Brouilon`= $idBr
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
       
            include 'publierRevue.php';

            include 'modifBrouillon.php';
        }
        $html .= "</form>";
        echo $html;
    } catch (PDOException $e) {
        die("Erreur : " . $e->getMessage());
    }
    $conn = null;
} else {

    echo "<p>Vous ne disposez des droits nécessaires</p>";
}
