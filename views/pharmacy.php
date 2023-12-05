<?php
    include '../controllers/pharmacy.controller.php';
?>
<!doctype html>
<html lang="en" class="h-100">

<?php
  $stores = new PharmacyController();
  $storesList = $stores->getListPharmacy();
  // $row = $pharmacyList->fetch_assoc();
  $listRow = array();
  while($row = $storesList->fetch_assoc()){
    array_push($listRow,$row);
  }
?>

<head>

    <title>DrugStore</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <script>
        let map;
        let maker;
        let lattitude = <?php echo $listRow[0]["latitude"]; ?>;
        let longitude = <?php echo $listRow[0]["longitude"]; ?>;
        function initMap() {
            var phar = { lat: parseFloat(lattitude), lng: parseFloat(longitude)}
            map = new google.maps.Map(document.getElementById("map"), {
                center: phar,
                zoom: 18,
            });
            marker = new google.maps.Marker({
                position: phar,
                map: map
            });
        }
        function newLocation(newLat,newLng)
        {   
          map.setCenter({
              lat : parseFloat(newLat),
              lng : parseFloat(newLng)
          });
          marker = new google.maps.Marker({
              position: { lat: parseFloat(newLat), lng: parseFloat(newLng)},
              map: map
          });
        }
    </script>

    <style>
      .map-body{
        padding: 15px;
      }
      .buttonMap{
        min-width: 250px;
      }
    </style>
</head>

<body>
    <header>
        <?php include "header.php";?>
    </header>
    <div class="map-body">
      <div class="row">
        <div class="col-sm-2">
          <div class="btn-group-vertical">
            <button type="button" class="btn btn-secondary btn-sm buttonMap" id="btn1">ShopCo1</button>
            <button type="button" class="btn btn-secondary btn-sm buttonMap" id="btn2">ShopCo2</button>
            <button type="button" class="btn btn-secondary btn-sm buttonMap" id="btn3">ShopCo3</button>
            <button type="button" class="btn btn-secondary btn-sm buttonMap" id="btn4"></button>
            <button type="button" class="btn btn-secondary btn-sm buttonMap" id="btn5"></button>
            <button type="button" class="btn btn-secondary btn-sm buttonMap" id="btn6"></button>
            <button type="button" class="btn btn-secondary btn-sm buttonMap" id="btn7"></button>
            <button type="button" class="btn btn-secondary btn-sm buttonMap" id="btn8"></button>
            <button type="button" class="btn btn-secondary btn-sm buttonMap" id="btn9"></button>
            <button type="button" class="btn btn-secondary btn-sm buttonMap" id="btn10"></button>
            <button type="button" class="btn btn-secondary btn-sm buttonMap" id="btn11"></button>
            <button type="button" class="btn btn-secondary btn-sm buttonMap" id="btn12"></button>
          </div>
        </div>
        <div class="col-sm-10">
          <body>
            <div id="map" style="width: 100%; height: 500px;"></div>
          </body>
        </div>
      </div>
    </div>
    <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
    <footer>
        <?php include "footer.php" ?>
    </footer>
    <script>
      $(document).ready(function ()
      {
        $("#btn1").on('click', function ()
        {
          let lattitude = <?php echo $listRow[0]["latitude"]; ?>;
          let longitude = <?php echo $listRow[0]["longitude"]; ?>;
          newLocation(lattitude,longitude);
        });

        $("#btn2").on('click', function ()
        {
          let lattitude = <?php echo $listRow[1]["latitude"]; ?>;
          let longitude = <?php echo $listRow[1]["longitude"]; ?>;
          newLocation(lattitude,longitude);
        });

        $("#btn3").on('click', function ()
        {
          let lattitude = <?php echo $listRow[2]["latitude"]; ?>;
          let longitude = <?php echo $listRow[2]["longitude"]; ?>;
          newLocation(lattitude,longitude);
        });

      });
    </script>
    <script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDHvHZYM62M9i_8v1MWvS2dkAvovUpEltA&callback=initMap"     
    ></script>
    </main>
</html>