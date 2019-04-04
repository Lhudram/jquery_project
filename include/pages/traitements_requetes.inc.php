<?php

if (!empty($_POST['id'])) {
    if ($_POST['id'] == 1) {
        $detailsventesmanager = new DetailsVenteManager(new Mypdo());
        $commandesutilisateur = $detailsventesmanager->getAllByIdLogin($_SESSION['idorganisme']);
        $i = 0;
        $resultat = null;
        foreach ($commandesutilisateur as $commande) {
            foreach ((array)$commande as $element) {
                $resultat[$i][] = $element;
            }
            $i++;
        }
        for ($i = 0; $i < count($resultat); $i++) {
            $resultat[$i][1] = (new ProduitManager(new Mypdo()))->getNomParId($resultat[$i][1]);
        }
        echo json_encode($resultat);
    }

    if ($_POST["id"] == 2) {
        //consulter livraison
        $detailsventesmanager = new DetailsVenteManager(new Mypdo());
        $commandesutilisateur = $detailsventesmanager->getAllByIdLogin($_SESSION['idorganisme']);
        $i = 0;
        $resultat = null;
        foreach ($commandesutilisateur as $commande) {
            foreach ((array)$commande as $element) {
                $resultat[$i][] = $element;
            }
            $i++;
        }
        echo json_encode($resultat);
    }

    if ($_POST["id"] == 3) {
        //facture document
    }

    if ($_POST["id"] == 4) {
        //consulter pénalité
    }

    if ($_POST["id"] == 5) {
        //saisir réclamation
    }

    if ($_POST["id"] == 6) {
        //historique achat
    }
}

