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
?>