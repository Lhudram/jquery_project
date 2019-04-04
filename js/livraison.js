$("#consulter_livraison").click(function () {
    $.ajax({
        method: "POST",
        url: "index.php?page=5",
        data: {id: 1}
    })
        .done(function (response) {
            $("#affichage_menu").html('Liste des livraions :');
            $("#affichage_menu").append('<br />');
            for (let i = 0; i < JSON.parse(response).length; i++) {
                for (let j= 0; j < JSON.parse(response)[i].length; j++) {
                    $("#affichage_menu").append(JSON.parse(response)[i][j]);
                    $("#affichage_menu").append(" ");
                }
                $("#affichage_menu").append('<br />');
            }
        })
        .fail(function () {
            notification("danger", "<strong>ERREUR CRITIQUE !</strong> Une erreur est survenue lors de la requête. Merci de reporter cette erreur.");
        });
});

$("#consulter_livraison").click(function () {
    $("#affichage_menu").html("Liste des livraisons :")
});
