<?php 
	include_once './config.php';
	include_once './db/db_config.php';
?>

<?php
	if(isset($_SESSION["id"])) $userid = $_SESSION["id"];
	else $userid = "";
	
	if(!$userid)
	{
		echo("
					<script>
						alert('자유게시판은 로그인 후 이용해 주세요!');
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
</head>

<body>
	<header>
		<?php include_once 'header.php';?>
	</header>
	<br/><br/><br/>
	
	<!-- Page Content -->
    <div class="container">

    	<!-- Page Heading -->
    	<h1 class="my-4">자유게시판</h1>
    	<br/>
    	
      	<!-- table -->
      	<table class="table table-hover">
      		<thead>
      		<tr>
      			<th>번호</th>
      			<th>제목</th>
      			<th>아이디</th>
      			<th>첨부</th>
      			<th>날짜</th>
      			<th>조회수</th>
      		</tr>
      		</thead>
<?php 
	if(isset($_GET["page"])) $page = $_GET["page"];
	else $page = 1;
	
	$sql = "select
				*
			from
				board
			order by
				num desc";
	
	$result = mysqli_query($con, $sql);
	$total_record = mysqli_num_rows($result);	// 전체 글 수
	
	$scale = 5;
	
	// 전체 페이지 수($total_page) 계산
	if($total_record % $scale == 0)
		$total_page = floor($total_record/$scale);
	else
		$total_page = floor($total_record/$scale) + 1;
	
	// 표시할 페이지($page)에 따라 $start 계산
	$start = ($page - 1) * $scale;
	
	$number = $total_record - $start;
	
	for($i = $start; $i < $start+$scale && $i < $total_record; $i++)
	{
		mysqli_data_seek($result, $i);
		
		// 가져올 레코드로 포인터 이동
		$row = mysqli_fetch_array($result);
		
		// 하나의 레코드 가져오기
		$num = $row["num"];
		$id = $row["id"];
		$name = $row["name"];
		$subject = $row["subject"];
		$regist_day = $row["regist_day"];
		$hit = $row["hit"];
		
		if($row["file_name"])
			$file_image = "<img src='./img/file.gif'>";
		else
			$file_image = " ";
?>
      		<tbody>
      			<tr>
      				<td><?=$number?></td>
      				<td><a href="./free_board_view.php?num=<?=$num?>&page=<?=$page?>"><?=$subject?></a></td>
      				<td><?=$id?></td>
      				<td><?=$file_image?></td>
      				<td><?=$regist_day?></td>
      				<td><?=$hit?></td>
      			</tr>
      		</tbody>
<?php 
		$number--;
	}
	mysqli_close($con);
?>
      	</table>
      	
      	<br/>
      	<div class="form-group">
	    		<div align="right">
      				<button type="button" class="btn btn-primary" onclick="location.href='free_board_form.php'">글쓰기</button>
	    		</div>
	  	</div>

		<br/>
      	<!-- Pagination -->
      	<ul class="pagination justify-content-center">
<?php 
	if($total_page >= 2 && $page >= 2)
	{
		$new_page = $page-1;
?>
		<li class="page-item">
          	<a class="page-link" href="free_board_list.php?page=<?=$new_page?>" aria-label="Previous">
            	<span aria-hidden="true">&laquo;</span>
            	<span class="sr-only">이전</span>
          	</a>
        </li>
<?php	
	} else{
?>
		<li class="page-item">&nbsp;</li>
<?php
	}
	
	for($i = 1; $i <= $total_page; $i++)
	{
		if($page == $i)	// 현재 페이지 번호 링크 안 함
		{
?>
			<li class="page-item">
				<a class="page-link"><?=$i?></a>
			</li>
<?php
		} else{
?>
			<li class="page-item">
				<a class="page-link" href="free_board_list.php?page=<?=$i?>"><?=$i?></a>
			</li>
<?php
		}
	}
	
	if($total_page >= 2 && $page != $total_page)
	{
		$new_page = $page+1;
?>
		<li class="page-item">
          	<a class="page-link" href="free_board_list.php?page=<?=$new_page?>" aria-label="Next">
            	<span aria-hidden="true">&raquo;</span>
            	<span class="sr-only">다음</span>
          	</a>
        </li>
<?php
	} else{
?>
		<li class="page-item">&nbsp;</li>
<?php 
	}
?>      	
      	</ul>
    </div>
    <!-- /.container -->
	
	<footer>
		<?php include_once 'footer.php';?>
	</footer>
</body>
</html>