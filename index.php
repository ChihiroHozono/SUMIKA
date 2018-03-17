<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
<script type="text/javascript">

$.ajax({
	async: true,// 非同期処理
	url: 'recieve.php',
	type: "POST",
	dataType: 'json',
	data: {
		'user_id': 21
	}
}).done(function (data) {
	console.log(data.name + "を取得しました。");
}).fail(function () {
	console.log("処理に失敗しました。");
});




</script>

</body>
</html>