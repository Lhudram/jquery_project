<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="index.php?page=1">
            <img src="./img/ferme.png" width="30" height="30" class="d-inline-block align-top" alt="maison">
            Coopagri</a>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=6">Livraison Temporaire</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=2">Catalogue</a>
                </li>
                <form class="form-inline my-2 my-lg-0" action="index.php?page=<?php echo $pages['catalogue']; ?>" method="post">
                    <input class="form-control mr-sm-2" type="text" name="recherche" placeholder="Recherche" required>
                    <button class="btn btn-secondary my-2 my-sm-0" type="submit">Valider</button>
                </form>
                <?php if (!empty($_SESSION["login"])) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=<?php echo $pages['monCompte']; ?>"><?php echo $_SESSION["login"]; ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?logout">Se déconnecter</a>
                    </li>
                <?php } else { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=<?php echo $pages['connexion']; ?>">Se connecter</a>
                    </li>
                <?php } ?>
                <li class="nav-item">
                    <img src="./img/user.png" width="30" height="30" class="d-inline-block align-top" alt="">
                </li>

            </ul>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>