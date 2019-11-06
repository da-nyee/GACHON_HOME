<?php 
	include_once './config.php';
	include_once './db/db_config.php';
?>

<?php
	if(isset($_SESSION["id"])) $userid = $_SESSION["id"];
	else $userid = "";
	
	if(!$userid)
	{
		echo("
					<script>
						alert('공동구매는 로그인 후 이용해 주세요!');
						history.go(-1);
					</script>
				");
		exit;
	}
?>

<!DOCTYPE html>
<html>
<head>

</head>

<body>
	<header>
		<?php include_once 'header.php';?>
	</header>

	<footer>
		<?php include_once 'footer.php';?>
	</footer>
</body>
</html>