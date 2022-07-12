<?php

$revues = listRevues(5);

if (!empty($revues)) {
    foreach ($revues as $revue) {
        $icn = 'icn-art';
        $lien = $revue->lienArticle;
    
        if (empty($lien)) {
            $icn = 'penR';
            $lien = "index.php?page=revues#" . $revue->idRevueDePresse;
        }
    
        $dateArticle = date("d.m.y", strtotime($revue->dateArticle));
    
        require './templates/revue.html.php';
    }
}
