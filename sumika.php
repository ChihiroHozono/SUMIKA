<!DOCTYPE html>
<html>
<head>
	<title>SUMIKA</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="sumika.css">
	<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
	<script type="text/javascript" src = "sumika.js"></script>
</head>
<body>

<div class="container">
<!-- タイトル -->
	<div class="top">
		<h3>SUMIKA</h3>
	</div>

<!-- スミトの選択 -->
	<div class="humans">
		<span class="human"><i class="fas fa-male fa-2x red-human"></i></span>
		<span class="human"><i class="fas fa-male fa-2x green-human"></i></span>
		<span class="human"><i class="fas fa-male fa-2x pink-human"></i></span>
		<span class="human"><i class="fas fa-male fa-2x yellow-human"></i></span>
		<span class="human"><i class="fas fa-male fa-2x blue-human"></i></span>
		<span class="human"><i class="fas fa-male fa-2x"></i></span>
	</div>

<!-- 位置の取得 -->
	<form method="POST" action="recieve.php">
		<input type="button" value = "SUMIKA" name="location"
		onClick='navigator.geolocation.getCurrentPosition(echo_geodata)'>
		<input type="button" value = "KURASU" name="redord">
	</form>
</div>



</body>
</html>