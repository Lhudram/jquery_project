<?php
switch ($page) {
    case $pages['accueil']:
        include("include/pages/accueil.inc.php");
        break;
    case $pages['catalogue']:
        include("include/pages/catalogue.inc.php");
        break;
    case $pages['connexion']:
        include("include/pages/connexion.inc.php");
        break;
    case $pages['monCompte']:
        include("include/pages/monCompte.inc.php");
        break;
    case $pages['livraison']:
        include("include/pages/livraison.inc.php");
        break;
    default:
        include("include/pages/accueil.inc.php");
        break;
}



