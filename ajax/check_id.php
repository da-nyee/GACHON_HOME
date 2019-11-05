<?php 
include_once './db/db_config.php';
?>

<?php
	!empty($_POST['id']) ? $id = $_POST['id'] : $id="";
	
	$ret['check'] = false;
	
	if($id != ""){
		$sql = "select
					id
				from
					members
				where
					id = '{$id}'
				";
		$result = mysqli_query($con, $sql);
		$num = mysqli_num_rows($result);	// return the number of rows
		
		if($num == 0)
		{
			$ret['check'] = true;
		}
		echo json_encode($ret);
	}
?>