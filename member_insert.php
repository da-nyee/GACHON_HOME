<?php 
include_once './db/db_config.php';
?>

<?php
    $id   = $_POST["id"];
    $pass = $_POST["pass"];
    $name = $_POST["name"];
    $email = $_POST["email"];

    $sql = "insert
    			members
    		set
    			id = '$id',
    			pass = '$pass',
    			name = '$name',
    			email = '$email'
    		";
    
	mysqli_query($con, $sql);
    mysqli_close($con);     
    
    echo "
	      <script>
	          location.href = 'index.php';
	      </script>
	  ";
?>