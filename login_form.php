<?php
	include_once './config.php';
	include_once './db/db_config.php';
?>

<!-- This snippet uses Font Awesome 5 Free as a dependency. You can download it at fontawesome.io! -->

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
	
	<script>
		function check_input(){
			if(!$("#id").val()){
				alert("아이디를 입력하세요!");
				$("#id").focus();
				return;
			}

			if(!$("#pass").val()){
				alert("비밀번호를 입력하세요!");
				$("#pass").focus();
				return;
			}

			$("#login_form").submit();
		}
	</script>
	
</head>

<!-- This snippet uses Font Awesome 5 Free as a dependency. You can download it at fontawesome.io! -->
<body>

	<header>
		<?php include_once 'header.php';?>
	</header>
	<br/><br/><br/><br/><br/>
	<div class="container">
		<div class="row">
			<div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
				<div class="card card-signin my-5">
					<div class="card-body">
						<h5 class="card-title text-center">Sign In</h5>
						<form class="form-signin" name="login_form" id="login_form" method="post" action="login.php">
							<div class="form-label-group">
								<input type="text" id="id" name="id" class="form-control" placeholder="아이디">
								<label for="id">아이디</label>
							</div>
							
							<div class="form-label-group">
								<input type="password" id="pass" name="pass" class="form-control" placeholder="비밀번호">
								<label for="pass">비밀번호</label>
							</div>
							<br/>
							<button class="btn btn-lg btn-primary btn-block text-uppercase" type="button" onclick="check_input()">Sign in</button>
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