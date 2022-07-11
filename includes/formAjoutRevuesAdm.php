<form method="post">
    <ul>
        <li><label for="titreRevue"> Titre de l'article : </label>
            <input placeholder="obligatoire" type="texte" id="titreRevue" name="titreRevue" value="<?php echo $titreRevue; ?>">
        </li>

        <li><label for="lienRevue"> Lien de l'article internet : </label>
            <input placeholder="facultatif" type="texte" id="lienRevue" name="lienRevue" value="<?php echo $lienRevue; ?>">
        </li>

        <li><label for="descriptionRevue"> ContenuArticle/ resumé article internet : </label>
            <textarea placeholder="obligatoire" id="descriptionRevue" name="descriptionRevue"><?php echo $descriptionRevue; ?></textarea>
        </li>

        <li><label for="signatureRevue"> Signature auteur/site d'origine : </label>
            <input placeholder="obligatoire" type="text" id="signatureRevue" name="signatureRevue" value="<?php echo $signatureRevue; ?>">
        </li>

        <li><label for="releaseDateRevue"> Date de l'article : </label>
            <input placeholder="obligatoire" type="date" id="releaseDateRevue" name="releaseDateRevue" value="<?php echo $releaseDateRevue; ?>">
        </li>

        <li><input class="butCont" type="reset" value="Effacer">
            <input class="butCont" type="submit" value="Enregistrer le brouillon" name="adRevue">
        </li>
    </ul>
</form>