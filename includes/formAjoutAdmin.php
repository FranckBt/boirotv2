<form action="index.php?page=ajoutAdmin" method="post" enctype="multipart/form-data">
    <ul>
        <li><input placeholder="Nom" type="text" class="nonAD" name="nonAD" value="<?php echo $nomAD; ?>" />
            <?php if (isset($erreur["nomAD"])) { ?>
                <p class="msgErreurForm"><?= $erreur["nomAD"] ?></p>
                <style>
                    .nonAD {
                        border-bottom: solid 2px red;
                    }
                </style>
            <?php } ?>
        </li>

        <li><input placeholder="Prénom" type="text" class="prenomAD" name="prenomAD" value="<?php echo $prenomAD; ?>" />
            <?php if (isset($erreur["prenomAD"])) { ?>
                <p class="msgErreurForm"><?= $erreur["prenomAD"] ?></p>
                <style>
                    .prenomAD {
                        border-bottom: solid 2px red;
                    }
                </style>
            <?php } ?>
        </li>

        <li><input placeholder="E-mail" type="text" class="emailAD" name="emailAD" value="<?php echo $emailAD; ?>" />
            <?php if (isset($erreur["emailAD"])) { ?>
                <p class="msgErreurForm"><?= $erreur["emailAD"] ?></p>
                <style>
                    .emailAD {
                        border-bottom: solid 2px red;
                    }
                </style>
            <?php } ?>
        </li>
        <li><input placeholder="Mot de passe" type="password" class="motDePasseAD" name="motDePasseAD" />
            <?php if (isset($erreur["motDePasseAD"])) { ?>
                <p class="msgErreurForm"><?= $erreur["motDePasseAD"] ?></p>
                <style>
                    .motDePasseAD {
                        border-bottom: solid 2px red;
                    }
                </style>
            <?php } ?>
        </li>
        <li><input placeholder="Vérification Mot de passe" type="password" class="verifMdpAD" name="verifMdpAD" />
            <?php if (isset($erreur["verifMdpAD"])) { ?>
                <p class="msgErreurForm"><?= $erreur["verifMdpAD"] ?></p>
                <style>
                    .verifMdpAD {
                        border-bottom: solid 2px red;
                    }
                </style>
            <?php } ?>
        </li>
        <li> <select class="selectAjoutAD" name="roles">
                <option value="">Choisir un rôle</option>
                <?php
                $roles = recupRole();
                if (!empty($roles)) {
                    foreach ($roles as $role) { ?>
                        <option value="<?= $role['idrole'] ?>"><?= $role['nomRole'] ?></option>
                        <style>
                            .roles {
                                border: solid 2px red;
                            }
                        </style>
                <?php }
                }
                ?>
            </select>
            <?php if (isset($erreur["roleID"])) { ?>
                <p><?= $erreur["roleID"] ?></p>
                <style>
                    .selectAjoutAD {
                        border: solid 2px red;
                    }
                </style>
            <?php } ?>
        </li>
        <li><input class="butCont" type="reset" value="Effacer" /><input class="butCont" type="submit" value="inscriptionAD" name="inscriptionAD" /></li>
    </ul>
</form>