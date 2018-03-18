<?php


// データの取得


$total_data = array();
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
    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($data == false){
        // 全てのデータが入った配列をJSONに変換
        $json_total_data = json_encode($total_data);
        break;
    }
    // 配列にデータを追加
    $total_data[] = $data;
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
    <link rel="stylesheet" type="text/css" href="doko_sumika.css">
  </head>
  <body>
    <div id="map"></div>
    <script>


      function initMap() {
        // 取得したHTML要素に地図を埋め込む
        var map = new google.maps.Map(document.getElementById('map'), {
          // 地図の中心地
          center:{lat:10.3188741,lng:123.9034881},
          // ズームの指定
          zoom: 17
        });
        var infoWindow = new google.maps.InfoWindow({map: map});

        // PHPから来たJSONをJSの配列に変換
        var total_data=JSON.parse('<?php echo $json_total_data; ?>');
        // 配列の要素の数だけlatとlngを取得
        var i =0;
        while(total_data.length > i){
          var latitude = Number(total_data[i]['latitude']);
          var longitude = Number(total_data[i]['longitude']);

          // マーカの自動追加
          var marker = new google.maps.Marker({
            position:{lat:latitude,lng:longitude},
            map:map
            })
          i++;
        }


      }

    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAxNXrYg4kLhq6v3iGy2PBewPSU1EJejys&callback=initMap">
    </script>
  </body>
</html>