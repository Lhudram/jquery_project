<h1>Compte de <?php echo $_SESSION["login"] ?></h1>
<div class="row">
    <div class="col-md-3">
        <h5 class="menu" id="consulter_commande">Consulter commande</a></h5>
        <h5 class="menu" id="consulter_livraison">Consulter livraison</a></h5>
        <h5 class="menu" id="facture_document">Regler factures documents</a></h5>
        <h5 class="menu" id="consulter_penalite">Consulter penalites</a></h5>
        <h5 class="menu" id="reclamation">Saisir reclamation</a></h5>
        <h5 class="menu" id="historique_achat">Historique achat</a></h5>
    </div>

    <div class="col-md-9">
        <div id="affichage_menu"></div>
    </div>
    <div id="retour_js"></div>
</div>
<script src="js/page_compte.js"></script>