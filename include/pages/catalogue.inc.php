<?php
$produitManager = new ProduitManager(new Mypdo());


if (empty($_POST["recherche"])) {
    $produits = $produitManager->getAll();
} else {
    $produits = $produitManager->rechercher($_POST["recherche"]);
}

?>
<div class="row">

    <div class="col-lg-9">
        <div class="row">
            <?php if (!empty($produits)) {
                foreach ($produits as $produit) { ?>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card h-100">
                            <a href="#">
                                <img class="card-img-top" src="./img/<?php echo $produit->getImg(); ?>"
                                     alt="<?php echo $produit->getLibelle(); ?>" width="250px"
                                     height="150px">
                            </a>
                            <div class="card-body">
                                <h4 class="card-title">
                                    <a href="#"><?php echo $produit->getLibelle(); ?></a>
                                    <p style="float: right"><?php echo $produit->getPrix(); ?>€</p>
                                </h4>
                            </div>
                        </div>
                    </div>
                <?php }
            } else { ?>
            <div class="col-sm-8 offset-sm-2" id="noResultat">
                <h1>Aucun résultat.</h1>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
