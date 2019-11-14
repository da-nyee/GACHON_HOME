<?php
	include_once './config.php';
	include_once './db/db_config.php';
?>

<?php
	if(isset($_SESSION["id"])) $userid = $_SESSION["id"];
	else $userid = "";
	if(isset($_SESSION["num"])) $usernum = $_SESSION["num"];
	else $usernum = "";
	if(isset($_SESSION["nickname"])) $usernickname = $_SESSION["nickname"];
	else $usernickname = "";
	
	if($usernum != 1)
	{
		echo("
					<script>
						alert('공지사항 글쓰기는 관리자만 가능합니다!');
						history.go(-1);
					</script>
				");
		exit;
	}
?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		
		<title><?=$sys['name']?></title>
		
		<link rel="stylesheet" type="text/css" href="./css/free_board_form.css?var=<?=$sys['var']?>">
		<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css?var=<?=$sys['var']?>">
		
		<script src="./js/jquery-1.10.2.js?var=<?=$sys['var']?>"></script>
		<script src="./js/jquery.slim.min.js?var=<?=$sys['var']?>"></script>
		<script src="./js/bootstrap.bundle.min.js?var=<?=$sys['var']?>"></script>
		
		<script>
			function check_input(){
				if(!$("#subject").val()){
					alert("제목을 입력하세요!");
					$("#subject").focus();
					return;
				}

				if(!$("#content").val()){
					alert("내용을 입력하세요!");
					$("#content").focus();
					return;
				}

				$("#notice_board_form").submit();
			}
		</script>
	</head>
	
	<body>
		<header>
			<?php include_once "header.php";?>
		</header>
		<br/><br/><br/>
		
		<div class="container">
			<!-- Page Heading -->
    		<h1 class="my-4">공지사항
      			<small>글쓰기</small>
    		</h1>
    	</div>
		
		<!-- Page Content -->
		<div class="container">
		  	<div class="card border-0 shadow my-5">
		    	<div class="card-body p-5">
		      		<form class="form-horizontal" id="notice_board_form" method="post" action="notice_board_insert.php" enctype="multipart/form-data">
	  					<div class="form-group">						
							<span id="id">작성자: <?=$usernickname?></span>
	  					</div>
	  					
	  					<div class="form-group">					
							<input type="text" name="subject" id="subject" class="form-control" placeholder="제목">
	  					</div>
	  					
			  			<div class="form-group">
			    			<textarea name="content" id="content" class="form-control" rows="15" placeholder="내용을 입력해주세요"></textarea>
			  			</div>
			  			
			  			<div class="form-group">
				  			<div>
				  				<input type="file" name="upfile" id="upfile">	
				  			</div>
			  			</div>
			  			
			  			<div class="form-group">
	    					<div align="right">
      							<button type="button" class="btn btn-primary" onclick="check_input()">작성하기</button>
	    					</div>
	  					</div>
					</form>
		    	</div>
		  	</div>
		</div>
		<br/>
		
		<footer>
			<?php include_once "footer.php";?>
		</footer>
	</body>
</html>