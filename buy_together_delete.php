<?php
	include_once './config.php';
	include_once './db/db_config.php';
?>

<?php 
	$num = $_GET["num"];
	$page = $_GET["page"];
	
	$sql = "select
				*
			from
				buy
			where
				num = $num";
	
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_array($result);
	
	$copied_name = $row["file_copied"];
	
	if($copied_name){
		$file_path = "./data/".$copied_name;
		unlink($file_path);
	}

	$sql = "delete
				from
					buy
				where
					num = $num";
	
	mysqli_query($con, $sql);
	mysqli_close($con);
	
	echo "
			<script>
				location.href = 'buy_together_list.php?page=$page';
			</script>
		";
?>