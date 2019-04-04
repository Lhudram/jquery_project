<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Commande Coop</title>

    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/shop-homepage.css" rel="stylesheet">

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>

    <script src="js/notification.js"></script>

    <script src="http://maps.google.com/maps/api/js"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDEOTtSmo3CMIszcuRDGrn6UwqdSY9-zpY&callback=initMap" type="text/javascript"></script>

    <!-- Clé d'API google Maps : AIzaSyDEOTtSmo3CMIszcuRDGrn6UwqdSY9-zpY -->

    <script src="js/gmaps.min.js"></script>
    <?php
    if (!empty($_POST["login"]) && !empty($_POST["pwd"])) {
        $res = (new ConnexionManager(new Mypdo()))->connexion($_POST["login"], $_POST["pwd"]);
        if (isset($res)) {
            $_SESSION["login"] = $res['nom'];
            $_SESSION["idorganisme"] = $res['id'];
            header('Location: index.php?page=' . $pages['monCompte']);
        } else {
            echo '<script>$(document).ready(function() {
        notification("danger", "<strong>ERREUR !</strong> Login ou mot de passe incorrect.")});</script>';
        }
    }
    if (empty($_GET["page"])) {
        $page = $pages['accueil'];
    } else {
        $page = $_GET["page"];
    }

    $nonadmin = [$pages['monCompte']];
    if (empty($_SESSION["login"]) && in_array($page, $nonadmin)) {
        $page = $pages['accueil'];
    }

    switch ($page) {
        case $pages['accueil']:
            break;
        case $pages['catalogue']:
            break;
        case $pages['connexion']:
            break;
        case $pages['monCompte']:
            echo '<link rel="stylesheet" type="text/css" href="css/stylesheet_moncompte.css"> ';
            break;
        default:
            break;
    }
    ?>
</head>
