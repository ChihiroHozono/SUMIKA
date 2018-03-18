<?php
if(isset($_POST["jtd"])){
	// POSTで受け取ったJSONの値を連想配列にデコード
	$jtd = json_decode($_POST["jtd"],true);
	print_r($jtd);
	//１データベースに接続
	$dsn='mysql:dbname=sumika;host=localhost;';
	$user='root';
	$password='';
	$dbh=new PDO($dsn,$user,$password);
	$dbh->query('SET NAMES utf8');
	//２ SQL文を実行する
	$sql="INSERT INTO `sumika` (`id`, `time`, `text`, `latitude`, `longitude`, `color`) VALUES (NULL, ?, ?, ?, ?, ?)";
	$data = array($jtd['time'],$jtd['text'],$jtd['latitude'],$jtd['longitude'],$jtd['color'],);
	$stmt=$dbh -> prepare($sql);
	$stmt->execute($data);
	// データベースの切断
	$dbh=null;
}
?>


<!-- データベースから取り出した値をecho -->
echo $data['id'] . '<br>';
echo $data['time'] . '<br>';
echo $data['text'] . '<br>';
echo $data['latitude'] . '<br>';
echo $data['longitude']. '<br>';
echo $data['color'].'<br>';
echo '<hr>';