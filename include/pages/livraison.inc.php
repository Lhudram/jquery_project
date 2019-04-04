
<style type="text/css">
  #map {
    width: 400px;
    height: 400px;
  }
</style>
<script type="text/javascript">
  var map;
  $(document).ready(function(){

    map = new GMaps({
      div: '#map',
      lat: 45.835049,
      lng: 1.230206,
      zoom: 15,
      click: function(e){
        map.addMarker({
          lat: e.latLng.lat(),
          lng: e.latLng.lng()
        });
      }
    });

    let adresses = [];

    $.getJSON('json/livraisons.json', function(data) {
      for (var i = 0; i < data.length; i++)
        //console.log(data[i]);
        //adresses.push(data[i].commande.adresseLivraison.rueNumero);
        console.log(data[i].commande.adresseLivraison);
        //+ (data.commande.adresseLivraison.rueType == null ? 'RUE' : data.commande.adresseLivraison.rueType) + data.commande.adresseLivraison.rueNom + data.commande.adresseLivraison.codePostal + data.commande.adresseLivraison.ville
    })

    for (var j = 0; j < adresses.length; j++) {
      $('#geocoding_form').submit(function(e) {
        e.preventDefault();
        GMaps.geocode({
          address: adresses[j],
          callback: function(results, status){
            if(status=='OK'){
              var latlng = results[0].geometry.location;
              map.setCenter(latlng.lat(), latlng.lng());
              map.addMarker({
                lat: latlng.lat(),
                lng: latlng.lng()
              });
            }
          }
        });
      });

      $('#adresses').append('option');
      $('#adresses:last-child').val(i);
      $('#adresses:last-child').text(adresses[i]);
    }

  });
</script>

<div class="row">
    <div class="col-md-12">
      <form method="post" id="geocoding_form">
          <select name="adresses" id="adresses">
          </select>
          <input type="submit" class="btn" value="Rechercher">
        </form>
        <div id="map"></div>
    </div>
</div>
