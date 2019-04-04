<?php
session_start();
if (isset($_GET["logout"])) {
    session_destroy();
    header('Location: index.php?page=1');
}
include("include/autoLoad.inc.php");
include("include/config.inc.php");
include("include/function.inc.php");
include("include/numpage.inc.php");

if (!empty($_GET["page"]) && $_GET["page"] == $pages["traitements_requetes"]) {
    include("include/pages/traitements_requetes.inc.php");
} else {
    include("include/header.inc.php");
    ?>
    <body>
    <?php
if ($page != $pages['accueil']){
    ?>
<div class=container>
    <?php
}
    include("include/menu.inc.php");
    include("include/text.inc.php");
    if ($page != $pages['accueil']) {
        ?>
        </div>
        <?php
    }
    include("include/footer.inc.php");
}
