<?php


// サニタイズ化と表示
if(isset($_POST) && !empty($_POST['word'])){
	$word = htmlspecialchars($_POST['word']);
	//１データベースに接続
	$dsn='mysql:dbname=sumika;host=localhost;';
	$user='root';
	$password='';
	$dbh=new PDO($dsn,$user,$password);
	$dbh->query('SET NAMES utf8');

	//２ SQL文を実行する
	$sql="INSERT INTO `sumika` (`id`, `word`) VALUES (NULL, ?);";

	$data = array($word);
	$stmt=$dbh -> prepare($sql);
	$stmt->execute($data);
	// データベースの切断
	$dbh=null;
}

?>





<!DOCTYPE html>
<html>
<head>
	<title>SUMIKA</title>
	<meta charset="utf-8">
	<!-- css -->
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

	<!-- 音声ファイル -->
	<audio id="sound-file" preload="auto">
		<source src="hanma.wav" type="audio/wav">
	</audio>

	<header>
		<!-- ハンバーガー -->
		<span><i class="fas fa-align-justify fa-2x"></i></span>


		<!-- タイトル -->
	<span class="title">SUMIKA</span>
	</header>

	<!-- 背景 -->
	<div class="main">
		<img class = "background" src="sumika.png">
		<!-- メインスミカとメインスミト -->

		<i class="fas fa-home fa-4x main-sumika"></i>
		<i class="fas fa-male fa-1x main-sumito"></i>
	</div>


	<!-- スミカを作る -->
	<h3 class="main-text">スミカを作る</h3>

	<!-- モーダル -->
	<div class = "login-modal-wrapper" id ="sumika-create-modal">
		<div class="modal">

      <div>
      </div>
      <div id="login-form">
        <h2>場所と時間</h2>
        <form method ="POST" action="sumika.php">
        	<p class="print-time"></p>
					<p class="print-latitude"></p>
					<p class="print-longitude"></p>
          <div id="submit-btn">ここに住む</div>
        </form>
    	</div>
  	</div>
  </div>

	<p class="print-time"></p>
	<p class="print-latitude"></p>
	<p class="print-longitude"></p>
	<a href="#"><i class="fas fa-gavel fa-2x create-sumika"></i></a>



	<!-- スミト -->

	<h3 class="main-text">スミトを選ぶ</h3>
		<div class="humans">
				<a href="#" class="human"><i class="fas fa-male fa-5x red-human"></i></a>
				<a href="#" class="human"><i class="fas fa-male fa-5x green-human"></i></a>
				<a href="#" class="human"><i class="fas fa-male fa-5x pink-human"></i></a>
				<a href="#" class="human"><i class="fas fa-male fa-5x yellow-human"></i></a>
				<a href="#" class="human"><i class="fas fa-male fa-5x blue-human"></i></a>
				<a href="#" class="human"><i class="fas fa-male fa-5x
				black-human">
				</i></a>
		</div>



	<!-- ヒトコト -->
	<h3 class="main-text">ヒトコト</h3>
		<form method="POST" action="sumika.php">
			<input type="text" name="word" id = "input" size="55" placeholder="ヒトコト">
			<input type="submit" name="name" value="クラス">
		</form>


	</div>



	<!-- js -->
	<script type="text/javascript">
		// データを保持する連想配列
		var total_data = {};



		// 日付やジオデータを表示しtotal_dataに代入する関数
		function echo_geodata(position){

			// 日付データ
			var time = new Date();
			total_data['time'] = time;


			// ジオデータ
			var latitude = position.coords.latitude;
			total_data['latitude'] = latitude;
			var longitude= position.coords.longitude;
			total_data['longitude'] = longitude;


			// 日付とジオデータを表示
			$('.print-time').text(time);
			$('.print-latitude').text(latitude);
			$('.print-longitude').text(longitude);


			// サーバーへの送信
			$.post()
		}


		// 音声ファイルを再生する関数
		function sound(){
			document.getElementById( 'sound-file' ).play();
		}


		// ここに住むボタンを押した時の関数
		function Hello(a){
			alert(a);
		}




		// JQuery------------------------------------------------
		// カナヅチを押した時の動作
		$('.create-sumika').click(function(){
			navigator.geolocation.getCurrentPosition(echo_geodata);
    		$('.main-sumika').animate({opacity: '1'},5000);
    		sound();
    		$('#sumika-create-modal').fadeIn();

    	});

		// モーダルを閉じる
		$('#submit-btn').click(function(){
			$('#sumika-create-modal').fadeOut();
		});


		// スミトをクリック
		$('.fa-male').click(function(){
			$(this).css('opacity','1');
			var color = $(this).css('color');
			$('.main-sumito').css('color',color).css('opacity','1');
			// 色の値を配列に代入
			total_data['color'] = color;
			console.log(total_data);
		});

		// 入力した時のイベント
		$('#input').keyup(function(){
			var text = $('#input').val();
			total_data['text'] = text;
		});





	</script>
</body>
</html>