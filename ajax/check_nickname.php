<?php 
	include_once '../db/db_config.php';
?>

<?php
	!empty($_POST['nickname']) ? $nickname = $_POST['nickname'] : $nickname = "";
	
	$ret['check'] = false;
	
	if($nickname != ""){
		$sql = "select
					nickname
				from
					members
				where
					nickname = '{$nickname}'
				";
		
		$result = mysqli_query($con, $sql);
		$num = mysqli_num_rows($result);
		
		if($num == 0)
		{
			$ret['check'] = true;
		}
		echo json_encode($ret);
	}
?>