<?php
	include_once './db/db_config.php';
?>

<?php 
	$id = $_GET["id"];
	
	$pass = $_POST["pass"];
	$nickname = $_POST["nickname"];
	
	$sql = "update
				members
			set
				pass='$pass',
				nickname='$nickname'
			where
				id='$id'
			";
	
	mysqli_query($con, $sql);
	mysqli_close($con);
	
	echo "
			<script>
				alert('정보가 수정되었습니다!');
				location.href = 'index.php';
			</script>
		";
?>