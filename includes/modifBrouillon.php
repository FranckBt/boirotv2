<?php
if (isset($_POST['editBr' . $idBr])) {
?>
    <form method="post">
        <ul>
            <li><label for="titreRevue"> Titre de l'article : </label>
                <input placeholder="obligatoire" type="texte" id="titreRevue" name="titreRevue" value="<?php echo $nomBr; ?>">
            </li>

            <li><label for="lienRevue"> Lien de l'article internet : </label>
                <input placeholder="facultatif" type="texte" id="lienRevue" name="lienRevue" value="<?php echo $lienBr; ?>">
            </li>

            <li><label for="descriptionRevue"> ContenuArticle/ resumé article internet : </label>
                <textarea placeholder="obligatoire" id="descriptionRevue" name="descriptionRevue"><?php echo $contenuBr; ?></textarea>
            </li>

            <li><label for="signatureRevue"> Signature auteur/site d'origine : </label>
                <input placeholder="obligatoire" type="text" id="signatureRevue" name="signatureRevue" value="<?php echo $signatureBr; ?>">
            </li>

            <li><label for="releaseDateRevue"> Date de l'article : </label>
                <input placeholder="obligatoire" type="date" id="releaseDateRevue" name="releaseDateRevue" value="<?php echo $dateBr; ?>">
            </li>
            <li>
                <input class="butCont" type="submit" value="Enregistrer le brouillon" name="modifBrouillon"/>
            </li>
        </ul>
    </form>
    <hr>
<?php
}
if (isset($_POST['modifBrouillon'])){

try{
    $conn6 = getPdo();

    $dateBr = $_POST['releaseDateRevue'];
    $lienBr = $_POST['lienRevue'];
    $nomBr = $_POST['titreRevue'];
    $contenuBr = $_POST['descriptionRevue'];
    $signatureBr = $_POST['signatureRevue'];

    $query6 = $conn6->prepare("
    UPDATE brouillonrevue SET lienArticle = '$lienBr', NomArticle = '$nomBr', ContenuArticle = '$contenuBr', signature = '$signatureBr', dateArticle = '$dateBr'
    WHERE id_Brouilon = '$idBr'
    ");
    $query6->execute();
    echo "<p>Brouillon modifié</p>";
    echo ("<meta http-equiv='refresh' content='1'>");
    $conn6 = null;
}catch (PDOException $e) {
    die("Erreur :  " . $e->getMessage());
    $conn6 = null;
}
}