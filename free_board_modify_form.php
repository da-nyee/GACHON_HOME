<?php 
	include_once './config.php';
	include_once './db/db_config.php';
?>

<?php
	if(isset($_SESSION["nickname"])) $usernickname = $_SESSION["nickname"];
	else $usernickname = "";
?>

<?php 
	$num = $_GET["num"];
	$page = $_GET["page"];
	
	$sql = "select
				*
			from
				board
			where
				num = $num";
	
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_array($result);
	
	$subject = $row["subject"];
	$content = $row["content"];
	$file_name = $row["file_name"];
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

				$("#free_board_modify_form").submit();
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
    		<h1 class="my-4">자유게시판
      			<small>글쓰기</small>
    		</h1>
    	</div>

		<!-- Page Content -->
		<div class="container">
		  	<div class="card border-0 shadow my-5">
		    	<div class="card-body p-5">
		      		<form class="form-horizontal" id="free_board_modify_form" method="post" action="free_board_modify.php?num=<?=$num?>&page=<?=$page?>" enctype="multipart/form-data">
	  					<div class="form-group">						
							<span id="nickname">작성자: <?=$usernickname?></span>
	  					</div>
	  					
	  					<div class="form-group">					
							<input type="text" name="subject" id="subject" class="form-control" placeholder="제목" value="<?=$subject?>">
	  					</div>
	  					
			  			<div class="form-group">
			    			<textarea name="content" id="content" class="form-control" rows="15" placeholder="내용을 입력해주세요"><?=$content?></textarea>
			  			</div>
<?php 
	if($file_name){
?>
			  			<div class="form-group">
			  				<span>첨부파일: <?=$file_name?></span>
			  			</div>
<?php 
	}
?>	
			  			<div class="form-group">
				  			<div>
<?php 
	if($file_name){
?>
				  				<span>변경파일: </span>
<?php 
	}
?>
				  				<input type="file" name="upfile" id="upfile">
				  			</div>
			  			</div>
			  			
			  			<div class="form-group">
	    					<div align="right">
      							<button type="button" class="btn btn-primary" onclick="check_input()">수정하기</button>
      							<button type="button" class="btn btn-primary" onclick="location.href='./free_board_list.php?page=<?=$page?>'">목록보기</button>
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