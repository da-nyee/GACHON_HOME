<?php
	include_once './config.php';
	include_once './db/db_config.php';
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		
		<title><?=$sys['name']?></title>
		
		<link rel="stylesheet" type="text/css" href="./css/member_form.css?var=<?=$sys['var']?>">
		<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css?var=<?=$sys['var']?>">
		<link rel="stylesheet" type="text/css" href="./css/all.css?var=<?=$sys['var']?>">
		
		<script src="./js/jquery-1.10.2.js?var=<?=$sys['var']?>"></script>
		<script src="./js/jquery.slim.min.js?var=<?=$sys['var']?>"></script>
		<script src="./js/bootstrap.bundle.min.js?var=<?=$sys['var']?>"></script>
	
		<script>

			$(function(){
				$("#inputID").blur(function(){
					if($(this).val() == ""){
						alert("아이디를 입력해주세요.");
					}
					else{
						checkIdAjax();
					}
				});
			});
		
			function checkIDAjax(){
				$.ajax({
					url:"./ajax/check_id.php",
					type:"post",
					dataType:"json",
					data:{
						"id":$("#inputID").val()
					},
					success:function(data){
						if(data.check){
							$("#id_check_msg").html("사용 가능한 아이디입니다.").css("color","blue").attr("data-check","1");
						}
						else{
							$("#id_check_msg").html("중복된 아이디입니다.").css("color","red").attr("data-check","0");
						}
					}
				});
			}

			$(function(){
				$("#save_frm").click(function(){
					check_input();
				});
			});

			function check_input(){
				if(!$("#inputUserame").val()){
					alert("이름을 입력하세요!");
					$("#inputUserame").focus();
					return;
				}

				if(!$("#inputEmail").val()){
					alert("이메일을 입력하세요!");
					$("#inputEmail").focus();
					return;
				}

				if(!$("#inputID").val()){
					alert("아이디를 입력하세요!");
					$("#inputID").focus();
					return;
				}

				if(!$("#inputPassword").val()){
					alert("비밀번호를 입력하세요!");
					$("#inputPassword").focus();
					return;
				}

				if($("#inputPassword").val() !=
					$("#inputConfirmPassword").val()){
						alert("비밀번호 확인을 입력하세요!");
						$("#inputConfirmPassword").focus();
						$("#inputConfirmPassword").select();
						return;
				}

				$("#member_form").submit();
			}
		</script>
	</head>
	
	<body>
		<header>
    		<?php include_once "header.php";?>
		</header>
		
		<br/><br/><br/>
		<!-- This snippet uses Font Awesome 5 Free as a dependency. You can download it at fontawesome.io! -->
		<div class="container">
    		<div class="row">
      			<div class="col-lg-10 col-xl-9 mx-auto">
        			<div class="card card-signin flex-row my-5">
        				<div class="card-img-left d-none d-md-flex"></div>
        				
        <!-- Background image for card set in CSS! -->
        <div class="card-body">
        	<h5 class="card-title text-center">Sign Up</h5>
            <form class="form-signin" name="member_form" id="member_form" method="post" action="member_insert.php">
             <div class="form-label-group">
                <input type="text" id="inputUserame" name="name" class="form-control" placeholder="Username" autofocus>
                <label for="inputUserame">이름</label>
             </div>

             <div class="form-label-group">
                <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address">
                <label for="inputEmail">이메일 (ex. abc@gc.gachon.ac.kr)</label>
             </div>
             
             <hr>

             <div class="form-label-group">
                <input type="text" id="inputID" name="id" class="form-control" placeholder="ID">
                <label for="inputID" id="id_check_msg">아이디</label>
             </div>
             
             <div class="form-label-group">
                <input type="password" id="inputPassword" name="pass" class="form-control" placeholder="Password">
                <label for="inputPassword">비밀번호</label>
             </div>
              
             <div class="form-label-group">
                <input type="password" id="inputConfirmPassword" name="pass_confirm" class="form-control" placeholder="Password">
                <label for="inputConfirmPassword">비밀번호 확인</label>
             </div>

             <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" id="save_frm" onclick="check_input()">Register</button>
          	</form>
        </div>
					</div>
				</div>
    		</div>
		</div>
		<footer>
		<?php include_once 'footer.php';?>
		</footer>
</body>
</html>