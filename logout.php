<?php
	include_once './config.php';
	include_once './db/db_config.php';
?>

<?php

	unset($_SESSION["id"]);
	unset($_SESSION["name"]);
	unset($_SESSION["email"]);
	
	echo("
			<script>
				location.href = 'index.php';
			</script>	
		");
?>