<?php
	include_once './config.php';
	include_once './db/db_config.php';
?>

<!DOCTYPE html>
<html lang="en">
	<head> 
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 		<meta name="description" content="">
  		<meta name="author" content="">
  		
		<title><?=$sys['name']?></title>
		
		<!-- Font Awesome Icons -->
  		<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  		<!-- Google Fonts -->
  		<link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet">
  		<link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>

  		<!-- Plugin CSS -->
  		<link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

  		<!-- Theme CSS - Includes Bootstrap -->
  		<link href="css/creative.min.css" rel="stylesheet">
	</head>

	<body> 
		<header>
    		<?php include_once "header.php";?>
    	</header>
		<section>
	   		<?php include_once "main.php";?>
		</section> 
		<footer>
   			<?php include_once "footer.php";?>
    	</footer>
	</body>
</html>