	<?php
	// サニタイズ化と表示
		$name = htmlspecialchars($_POST['name']);
		//１データベースに接続
		$dsn='mysql:dbname=sumika;host=localhost;';
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


		<!-- データの表示 -->
	<?php
		// １．データベースに接続する
		$dsn = 'mysql:dbname=sumika;host=localhost';
		$user = 'root';
		$password = '';
		$dbh = new PDO($dsn, $user, $password);
		$dbh->query('SET NAMES utf8');

		// ２．SQL文を実行する
		$sql = 'SELECT * FROM `test`';
		$stmt = $dbh->prepare($sql);
		$stmt->execute();

		while (1) {
		  $rec = $stmt->fetch(PDO::FETCH_ASSOC);
		  if ($rec == false) {
		    break;
		  }
		  echo $rec['id'] . '<br>';
		  echo $rec['name'] . '<br>';

		}

		// ３．データベースを切断する
		$dbh = null;

	?>

	<?php
	// サニタイズ化と表示
	$word = htmlspecialchars($_POST['word']);
	//１データベースに接続
	$dsn='mysql:dbname=sumika;host=localhost;';
	$user='root';
	$password='';
	$dbh=new PDO($dsn,$user,$password);
	$dbh->query('SET NAMES utf8');

	//２ SQL文を実行する
	$sql="INSERT INTO `sumika` (`id`, `word`) VALUES (NULL, 'aaaaa');";

	$data = array($word);
	$stmt=$dbh -> prepare($sql);
	$stmt->execute($data);

	// データベースの切断
	$dbh=null;

	?>
