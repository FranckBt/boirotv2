<?php

try {
    $conn = getPdo();

    $requete = $conn->prepare("SELECT * FROM administrateur ORDER BY nom DESC");
    $requete->execute();
    $resultat = $requete->fetchAll(PDO::FETCH_ASSOC);

    $html = "<form method='post'>";
    $html .= "<ul>";

    for ($i = 0; $i < count($resultat); $i++) {

        $idAdmin = $resultat[$i]['id_admin'];
        $nomAdmin = $resultat[$i]['nom'];
        $prenomAdmin = $resultat[$i]['prenom'];
        $mailAdmin = $resultat[$i]['mail'];


        $html .= "<hr>";
        $html .= "<li>$nomAdmin $prenomAdmin $mailAdmin";
        $html .= "<input type='submit' value='🗑️' name='supAd$idAdmin'/></li>";


        if (isset($_POST['supAd' . $idAdmin])) {
            try {
                $conn5 = getPdo();

                $query5 = $conn5->prepare("
                    DELETE FROM `administrateur` WHERE `administrateur`.`id_admin`= $idAdmin
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
    }
    $html .= "</lu>";
    $html .= "</form>";
    echo $html;
} catch (PDOException $e) {
    die("Erreur : " . $e->getMessage());
}
$conn = null;
