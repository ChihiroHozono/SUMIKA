
<!DOCTYPE html>
<html>
<head>
	<title>SUMIKA</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="sumika.css">
	<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>
	<div class="container">
		<header>
		    <!-- ハンバーガー -->
			<span><i class="fas fa-align-justify fa-2x"></i></span>
			<!-- タイトル -->
			<span class="title">SUMIKA</span>
			<!-- メニュー -->
			<div id="hide-menu">
				<ul>
					<a id= "doko-sumika-link" href="doko_sumika.php">スミカをみる</a>
				</ul>
			</div>
		</header>


		<div class="main-wrapper">
		 	<!-- 背景 -->
			<img class = "background" src="sumika_file/sumika.png">
			 <!-- メインスミカとメインスミト -->
			<i class="fas fa-home fa-4x main-sumika"></i>
			<i class="fas fa-male fa-1x main-sumito"></i>
			 <!-- 音声ファイル -->
			<audio id="sound-file" preload="auto">
				<source src="sumika_file/hanma.wav" type="audio/wav">
			</audio>
		</div>


	<!-- スミカを作る -->
	<h3 class="main-text">スミカを作る</h3>
	<!-- モーダル -->
	<div class = "login-modal-wrapper" id ="sumika-create-modal">
		<div class="modal">
      		<div id="login-form">
        		<h2>場所と時間</h2>
		  		<div id="map" style="width:400px; height:300px"></div>
          		<div id="submit-btn">ここに住む</div>
    		</div>
  		</div>
  	</div>
  	<!-- カナヅチ -->
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
		<input type="text" name="word" id = "input" size="55" placeholder="ヒトコト">

	<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAxNXrYg4kLhq6v3iGy2PBewPSU1EJejys&callback=initMap">
    </script>
    <script src="sumika.js"></script>
</body>
</html>
