<?php
	include_once './config.php';
	include_once './db/db_config.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?=$sys['name']?></title>
	<link rel="stylesheet" type="text/css" href="./css/login_form.css?var=<?=$sys['var']?>">
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css?var=<?=$sys['var']?>">
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css?var=<?=$sys['var']?>">

	<script src="./js/jquery-1.10.2.js?var=<?=$sys['var']?>"></script>
	<script src="./js/jquery.slim.min.js?var=<?=$sys['var']?>"></script>
	<script src="./js/bootstrap.bundle.min.js?var=<?=$sys['var']?>"></script>
</head>

<body>

	<header>
		<?php include_once 'header.php';?>
	</header>
	<br/><br/><br/><br/><br/>
	
<?php 
	$sql = "select
				*
			from
				members
			where
				id='$userid'
			";
	
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_array($result);
	
	$pass = $row["pass"];
	$name = $row["name"];
	
	mysqli_close($con);
?>
	<div class="container">
		<div class="row">
			<div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
				<div class="card card-signin my-5">
					<div class="card-body">
						<h5 class="card-title text-center">Settings</h5>
						<form class="form-signin" name="member_modify_form" id="member_modify_form" method="post" action="member_modify.php">
							<div class="form-label-group">
								<input type="text" id="id" name="id" class="form-control" placeholder="아이디">
								<label for="id">아이디</label>
							</div>
							
							<div class="form-label-group">
								<input type="password" id="pass" name="pass" class="form-control" placeholder="비밀번호">
								<label for="pass">비밀번호</label>
							</div>
							<br/>
							<button class="btn btn-lg btn-primary btn-block text-uppercase" type="button" onclick="check_input()">Save</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<br/><br/><br/>
	<footer>
		<?php include_once 'footer.php';?>
	</footer>
</body>

</html>