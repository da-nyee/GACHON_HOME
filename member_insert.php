<?php 
	include_once './db/db_config.php';
?>

<?php
    $id   = $_POST["id"];
    $pass = $_POST["pass"];
    $name = $_POST["name"];
    $nickname = $_POST["nickname"];
    $email = $_POST["email"];
    $regist_day = date("Y-m-d (H:i)");
   
    $allowed = [
    		'gachon.ac.kr',
    		'gc.gachon.ac.kr'
    ];
    
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
    	$parts = explode('@', $email);
    	
    	$domain = array_pop($parts);
    	
    	if(!in_array($domain, $allowed)){
    		echo "
    			<script>
    				alert('유효하지 않은 이메일 형식입니다. 학교 이메일로 가입해 주세요!');
    				history.go(-1);
    			</script>
    			";
    	}
    	
    	else{
    		$sql = "insert
    					members
    				set
			    		id = '$id',
			    		pass = '$pass',
			    		name = '$name',
			    		nickname = '$nickname',
			    		email = '$email',
			    		regist_day = '$regist_day'
    		";
    		 
    		mysqli_query($con, $sql);
    		mysqli_close($con);
    		 
    		echo "
		      <script>
		          location.href = 'index.php';
		      </script>
		  	";
    	}
    }
?>