<?php 
	include_once './config.php';
	include_once './db/db_config.php';
?>

<?php
	if(isset($_SESSION["id"])) $userid = $_SESSION["id"];
	else $userid = "";
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
			function confirmDelete(){
				var del = confirm("정말로 삭제하시겠습니까?");

				if(del == true){
					alert("삭제되었습니다!");
				}
				else{
					alert("취소되었습니다!");
				}
				return del;
			}
		</script>
	</head>
	
	<body>
		<header>
			<?php include_once 'header.php';?>
		</header>
		<br/><br/><br/>
		
		<div class="container">
    		<h1 class="my-4">자유게시판</h1>
    	</div>
		
<?php 
	$num = $_GET["num"];
	$page = $_GET["page"];
	
	$sql = "select
				*
			from
				board
			where
				num=$num";
	
	$result = mysqli_query($con, $sql);
	
	$row = mysqli_fetch_array($result);
	$id = $row["id"];
	$name = $row["name"];
	$nickname = $row["nickname"];
	$regist_day = $row["regist_day"];
	$subject = $row["subject"];
	$content = $row["content"];
	$file_name = $row["file_name"];
	$file_type = $row["file_type"];
	$file_copied = $row["file_copied"];
	$hit = $row["hit"];
	
	$content = str_replace(" ", "&nbsp;", $content);
	$content = str_replace("\n", "<br/>", $content);
	
	$new_hit = $hit+1;
	
	$sql = "update
				board
			set
				hit = $new_hit
			where
				num = $num";
	
	mysqli_query($con, $sql);
?>
		<!-- Page Content -->
		<div class="container">
		  	<div class="card border-0 shadow my-5">
		    	<div class="card-body p-5">
		      		<form class="form-horizontal" id="free_board_view">
	  					<div class="form-group" style="text-align: center;">	
	  						<span id="subject" style="font-size: 20pt;"><b><?=$subject?></b></span>
	  					</div>
	  					<br/>
	  					
	  					<div class="form-group">
	  						<span id="id">작성자: <?=$nickname?></span>
	  						<span id="regist_day" style="float: right">작성일: <?=$regist_day?></span>
	  					</div>
	  					<hr>
	  					
<?php 
	if($file_name){
		$real_name = $file_copied;
		$file_path = "./data/".$real_name;
		$file_size = filesize($file_path);
?>
						<div class="form-group">		
							<span id="upfile">
								<a>첨부파일: </a>
								<a href="free_board_download.php?num=<?=$num?>&real_name=<?=$real_name?>&file_name=<?=$file_name?>&file_type=<?=$file_type?>">
								<?=$file_name?></a>
								<a>(<?=$file_size?> byte)</a>
							</span>
						</div>
			  			<hr>
<?php
	}
?>
						<div class="form-group">
							<?=$content?>
						</div> 
						<br/><br/><br/>
						
						<div class="form-group">
	    					<div align="right">
<?php 
	if($userid == $id){	    					
?>
      							<button type="button" class="btn btn-primary" onclick="location.href='./free_board_modify_form.php?num=<?=$num?>&page=<?=$page?>'">수정하기</button>
	    						<a href="./free_board_delete.php?num=<?=$num?>&page=<?=$page?>" class="btn btn-danger btn-xs" onclick="return confirmDelete()">삭제하기</a>
								<br/><br/>
<?php 
	}
?>
	    						<button type="button" class="btn btn-primary" onclick="location.href='./free_board_list.php?page=<?=$page?>'">목록보기</button>
	    					</div>
	  					</div>
					</form>
		    	</div>
		  	</div>
		</div>
		<br/>
		
		<footer>
			<?php include_once 'footer.php';?>
		</footer>
	</body>
</html>