<div id="formulaire">
    <form method="post" action="index.php?page=home#contact">
        <ul>
            <li><input placeholder="* Nom" minlength="3" type="text" id="nom" name="nom" value="<?php echo $nom; ?>" required /></li>

            <li><input placeholder="* E-mail" type="email" id="mail" name="mail" value="<?php echo $mail; ?>" required /></li>

            <li><input placeholder="Prénom" type="text" id="prenom" name="prenom" value="<?php echo $prenom; ?>" /></li>

            <li><input placeholder="Téléphone" type="tel" id="telephone" name="telephone" value="<?php echo $telephone; ?>" /></li>

            <li><textarea placeholder="* Objet" id="objet" name="objet" value="<?php echo $objet; ?>"></textarea></li>

            <li><textarea placeholder="* Votre message ici" id="message" name="message" value="<?php echo $message; ?>"></textarea></li>
            
            <li><input class="btn btn-alert" type="reset" value="Effacer" /><input class="btn" type="submit" value="Envoyer" name="contact" /></li>
        </ul>
        <small>(*) Champs obligatoire</small>
    </form>
</div>