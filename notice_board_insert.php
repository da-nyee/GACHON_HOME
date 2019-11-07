<?php
	include_once './config.php';
	include_once './db/db_config.php';
?>

<meta charset="utf-8">
<?php 
	if(isset($_SESSION["id"])) $userid = $_SESSION["id"];
	else $userid = "";
	if(isset($_SESSION["name"])) $username = $_SESSION["name"];
	else $username = "";
	
	$subject = $_POST["subject"];
	$content = $_POST["content"];
	
	$subject = htmlspecialchars($subject, ENT_QUOTES);
	$content = htmlspecialchars($content, ENT_QUOTES);
	
	$regist_day = date("Y-m-d (H:i)");
	
	$upload_dir = './data/';
	
	$upfile_name = $_FILES["upfile"]["name"];
	$upfile_tmp_name = $_FILES["upfile"]["tmp_name"];
	$upfile_type = $_FILES["upfile"]["type"];
	$upfile_size = $_FILES["upfile"]["size"];
	$upfile_error = $_FILES["upfile"]["error"];
	
	if($upfile_name && !$upfile_error)
	{
		$file = explode(".", $upfile_name); // .을 기준으로 나눔
		$file_name = $file[0];	// 파일명
		$file_ext  = $file[1];	// 파일 확장자
		
		$new_file_name = date("Y_m_d_H_i_s");
		$new_file_name = $new_file_name;
		$copied_file_name = $new_file_name.".".$file_ext;
		$uploaded_file = $upload_dir.$copied_file_name;
		
		if( $upfile_size  > 1000000000 ) {
			echo("
				<script>
				alert('업로드 파일 크기가 지정된 용량(1GB)을 초과합니다!<br>파일 크기를 체크해주세요! ');
				history.go(-1)
				</script>
				");
			exit;
		}
		
		if (!move_uploaded_file($upfile_tmp_name, $uploaded_file) )		// ex. ./data/2019_11_01_14_20_36.txt // if not , 쓰기권한이 없는 경우일 수 있음 especially Linux !!
		{
			echo("
					<script>
					alert('파일을 지정한 디렉토리에 복사하는데 실패했습니다.');
					history.go(-1)
					</script>
				");
			exit;
		}
	}
	else
	{
		$upfile_name = "";
		$upfile_type = "";
		$copied_file_name = "";
	}
	
	$sql = "insert
				notice
			set
				id = '$userid',
				name = '$username',
				subject = '$subject',
				content = '$content',
				regist_day = '$regist_day',
				hit = 0,
				file_name = '$upfile_name',
				file_type = '$upfile_type',
				file_copied = '$copied_file_name'
			";
	
	mysqli_query($con, $sql);
	mysqli_close($con);
	
	echo "
		<script>
			location.href = 'notice_board_list.php';
		</script>				
	";
?>