<?php


// データの取得

  //１データベースに接続
  $dsn='mysql:dbname=sumika;host=localhost;';
  $user='root';
  $password='';
  $dbh=new PDO($dsn,$user,$password);
  $dbh->query('SET NAMES utf8');
  //２ SQL文を実行する
  $sql='SELECT * FROM `sumika`';
  $stmt = $dbh -> prepare($sql);
  $stmt->execute();

  while (1) {
  $rec = $stmt->fetch(PDO::FETCH_ASSOC);
  if ($rec == false) {
    break;
  }
  echo $rec['id'] . '<br>';
  echo $rec['time'] . '<br>';
  echo $rec['text'] . '<br>';
  echo $rec['latitude'] . '<br>';
  echo $rec['longitude']. '<br>';
  echo $rec['color'].'<br>';
  echo '<hr>';
  }

  // データベースの切断
  $dbh=null;




 ?>



<!DOCTYPE html>
<html>
  <head>
    <title>Geolocation</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
  </head>
  <body>
    <div id="map"></div>
    <script>


      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -34.397, lng: 150.644},
          zoom: 6
        });
        var infoWindow = new google.maps.InfoWindow({map: map});

        // Try HTML5 geolocation.
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };

            infoWindow.setPosition(pos);
            infoWindow.setContent('Location found.');
            map.setCenter(pos);
          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }
      }

      function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Your browser doesn\'t support geolocation.');
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAxNXrYg4kLhq6v3iGy2PBewPSU1EJejys&callback=initMap">
    </script>
  </body>
</html>