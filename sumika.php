<!DOCTYPE html>
<html>
<head>
	<title>SUMIKA</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="sumika.css">
	<!-- フォントオーサム -->
	<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">

	<!-- JQuery-->
	<script
	  	src="https://code.jquery.com/jquery-3.3.1.js"
	  	integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
	  	crossorigin="anonymous">
  	</script>
</head>
<body>

	<div class="container">
	<!-- タイトル -->
		<div class="top">
			<h3>SUMIKA</h3>
		</div>

	<!-- スミト -->
		<div class="humans">
				<a href="#" class="human"><i class="fas fa-male fa-2x red-human"></i></a>
				<span class="human"><i class="fas fa-male fa-2x green-human"></i></span>
				<span class="human"><i class="fas fa-male fa-2x pink-human"></i></span>
				<span class="human"><i class="fas fa-male fa-2x yellow-human"></i></span>
				<span class="human"><i class="fas fa-male fa-2x blue-human"></i></span>
				<span class="human"><i class="fas fa-male fa-2x"></i></span>
		</div>

	<!-- 位置の取得 -->
		<form method="POST" action="sumika.php">
			<input type="text" name="name">
			<input type="button" value = "SUMIKA" name="location"
			onClick='navigator.geolocation.getCurrentPosition(echo_geodata)'>
			<input type="submit" name="KURASU" value='KURASU'>
		</form>
	</div>


	<!-- PHP -->
	<?php
	// サニタイズ化と表示
		$name = htmlspecialchars($_POST['name']);
		//１データベースに接続
		$dsn='mysql:dbname=sumika;host=localhost';
		$user='root';
		$password='';
		$dbh=new PDO($dsn,$user,$password);
		$dbh->query('SET NAMES utf8');

		//２ SQL文を実行する
		$sql="INSERT INTO `test` (`id`, `name`) VALUES (NULL,?);";

		$data = array($name);
		$stmt=$dbh -> prepare($sql);
		$stmt->execute($data);

		// データベースの切断
		$dbh=null;

	?>



	<!-- js -->
	<script type="text/javascript">
		function echo_geodata(position){
			// 空の連想配列
			var data = [];

			// 日付データ
			var time = new Date();
			data['time'] = time;
			alert(data['time']);


			// ジオデータ
			data['latitude'] = position.coords.latitude;
			data['longitude'] = position.coords.longitude;
			alert(data['latitude'])
			alert(data['longitude'])
		}



		// JQuery
		$('.red-human').click(function(){
			$('.red-human').css('color:red')
		});

	</script>
</body>
</html>