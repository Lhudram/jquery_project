affichage_menu = $("#affichage_menu");

$("#consulter_commande").click(function () {
    $.ajax({
        method: "POST",
        url: "index.php?page=5",
        data: {id: 1}
    })
        .done(function (response) {
            const reponse = JSON.parse(response);
            affichage_menu.html('Liste des commandes :');
            affichage_menu.append('<br />');
            affichage_menu.append('<table>');
            let numCmd = null;
            let table = null;
            for (let i = 0; i < reponse.length; i++) {
                if (numCmd !== reponse[i][0]) {
                    affichage_menu.append("<table><br/>");
                    numCmd = reponse[i][0];
                    table = $("table").last();
                    table.append("<tr><td class='sansborder'>Commande n°" + reponse[i][0] + "</td></tr>");
                    table.append('<tr><td>Produit</td><td>Quantite</td><td>Remise (en %)</td></tr>');
                }
                table.append("<tr><td>" + reponse[i][1] + "</td><td>" + reponse[i][2] + "</td><td>" + reponse[i][3] + "</td></tr>");
            }
        })
        .fail(function () {
            notification("danger", "<strong>ERREUR CRITIQUE !</strong> Une erreur est survenue lors de la requête. Merci de reporter cette erreur.");
        });
});

$("#consulter_livraison").click(function () {
    $.ajax({
        method: "POST",
        url: "index.php?page=5",
        data: {id: 2}
    })
        .done(function (response) {
            affichage_menu.text(response);
            console.log(response);
        })
        .fail(function () {
            notification("danger", "<strong>ERREUR CRITIQUE !</strong> Une erreur est survenue lors de la requête. Merci de reporter cette erreur.");
        });

    affichage_menu.html("test")
});

$("#facture_document").click(function () {
    $.ajax({
        method: "POST",
        url: "index.php?page=5",
        data: {id: 3}
    })
        .done(function (response) {
            affichage_menu.text("test");
            console.log(response);
        })
        .fail(function () {
            notification("danger", "<strong>ERREUR CRITIQUE !</strong> Une erreur est survenue lors de la requête. Merci de reporter cette erreur.");
        });

    affichage_menu.html("test")
});

$("#consulter_penalite").click(function () {
    $.ajax({
        method: "POST",
        url: "index.php?page=5",
        data: {id: 4}
    })
        .done(function (response) {
            affichage_menu.text("test");
            console.log(response);
        })
        .fail(function () {
            notification("danger", "<strong>ERREUR CRITIQUE !</strong> Une erreur est survenue lors de la requête. Merci de reporter cette erreur.");
        });

    affichage_menu.html("test")
});

$("#reclamation").click(function () {
    $.ajax({
        method: "POST",
        url: "index.php?page=5",
        data: {id: 5}
    })
        .done(function (response) {
            affichage_menu.text("test");
            console.log(response);
        })
        .fail(function () {
            notification("danger", "<strong>ERREUR CRITIQUE !</strong> Une erreur est survenue lors de la requête. Merci de reporter cette erreur.");
        });

    affichage_menu.html("test")
});

$("#historique_achat").click(function () {
    $.ajax({
        method: "POST",
        url: "index.php?page=5",
        data: {id: 6}
    })
        .done(function (response) {
            affichage_menu.text("test");
            console.log(response);
        })
        .fail(function () {
            notification("danger", "<strong>ERREUR CRITIQUE !</strong> Une erreur est survenue lors de la requête. Merci de reporter cette erreur.");
        });

    affichage_menu.html("test")
});