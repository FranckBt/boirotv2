<div id="formulaire">
    <form method="post" action="index.php?page=home#contact">
        <ul>
            <li><input placeholder="Nom" type="text" id="nom" name="nom" value="<?php echo $nom; ?>" /></li>

            <li><input placeholder="Prénom" type="text" id="prenom" name="prenom" value="<?php echo $prenom; ?>" /></li>

            <li><input placeholder="Télephone" type="tel" id="telephone" name="telephone" value="<?php echo $telephone; ?>" /></li>

            <li><input placeholder="E-mail" type="text" id="mail" name="mail" value="<?php echo $mail; ?>" /></li>

            <li><textarea placeholder="Objet" id="objet" name="objet" value="<?php echo $objet; ?>"></textarea></li>

            <li><textarea placeholder="Rédigez votre message ici" id="message" name="message" value="<?php echo $message; ?>"></textarea></li>
            <li><input class="btn btn-alert" type="reset" value="Effacer" /><input class="btn" type="submit" value="Envoyer" name="contact" /></li>
        </ul>
    </form>
</div>