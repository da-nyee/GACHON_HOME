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

	<script>
		$(function(){
			$("#update").click(function(){
				check_input();
			});
		});

		function check_input(){
		//	if(!$("#nickname").val()){
		//		alert("닉네임을 입력하세요!");
		//		$("#nickname").focus();
		//		return;
		//	}
			
			if($("#pass").val() !=
				$("#pass_confirm").val()){
					alert("비밀번호가 일치하지 않습니다.\n다시 입력해 주세요!");
					$("#pass").focus();
					$("#pass").select();
					return;
			}

			$("#member_modify_form").submit();
		}
	</script>
</head>

<body>
	<header>
		<?php include_once 'header.php';?>
	</header>
	<br/><br/><br/>
	
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
	$nickname = $row["nickname"];
	
	$name = $row["name"];
	$email = $row["email"];
	
	mysqli_close($con);
?>
	<div class="container">
		<div class="row">
			<div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
				<div class="card card-signin my-5">
					<div class="card-body">
						<h5 class="card-title text-center">Settings</h5>
						<form class="form-signin" name="member_modify_form" id="member_modify_form" method="post" action="member_modify.php?id=<?=$userid?>">
							<div class="form-label-group">
								이름: <?=$name?>
							</div>
							
							<div class="form-label-group">
								<!-- 닉네임: <input type="text" id="nickname" name="nickname" class="form-control" placeholder="닉네임" value="<?=$nickname?>"> -->
								닉네임: <?=$nickname?>
							</div>
							
							<div class="form-label-group">
								이메일: <?=$email?>
							</div>
							
							<div class="form-label-group">
								아이디: <?=$userid?>
							</div>
							
							<div class="form-label-group">
								비밀번호: <input type="password" id="pass" name="pass" class="form-control" placeholder="비밀번호" value="<?=$pass?>">
							</div>
							
							<div class="form-label-group">
								비밀번호 확인: <input type="password" id="pass_confirm" name="pass_confirm" class="form-control" placeholder="비밀번호 확인" value="<?=$pass?>">
							</div>
							<br/>
							
							<button class="btn btn-lg btn-primary btn-block text-uppercase" id="update" type="button" onclick="check_input()">Update</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<br/>
	<footer>
		<?php include_once 'footer.php';?>
	</footer>
</body>

</html>