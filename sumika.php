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
		<form method="post" action="sumika.php" id="submit" >
			<input type="text" name="word" id = "input" size="55" placeholder="ヒトコト">
			<input type="hidden" id = "jtd" name="jtd" value="">
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
		}
		// 音声ファイルを再生する関数
		function sound(){
			document.getElementById( 'sound-file' ).play();
		}
		// JQuery------------------------------------------------
		// ハンバーガーをタップした時の動作（メニューとオーバーレイ）

		var num = 0;
		$('.fa-align-justify').click(function(){
			$("body").append('<div id="modal-overlay"></div>');
			$(this).data("click",++num);
			var click = $(this).data("click");
			if(click % 2 == 1){
				$('#hide-menu').css('display','block');
				$('#modal-overlay').fadeIn();
			}else{
				$('#hide-menu').css('display','none');
				$('#modal-overlay').fadeOut();
			}
		})






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
		});

		// 入力した時のイベント
		$('#input').keyup(function(){
			var text = $('#input').val();
			total_data['text'] = text;
		});

		// メインスミカをタップした時のイベント
		$('.main-sumika').click(function(){
			var json_total_data = JSON.stringify(total_data);
			console.log(json_total_data);
			// hiddenタグのvalueに変数を入れる
			$('#jtd').val(json_total_data);
			// submit
        	$('#submit').submit();
		});

		// エンターを押した時のsubmitを防ぐ
		$('input[type="text"]').keypress(function(e){
    	if((e.which == 13) || (e.keyCode == 13)){ return false; }
		});

	</script>
</body>
</html>
