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
    	
      	<!-- Project One -->
      	<div class="row">
        	<div>
          		<h3>Project One</h3>
          		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium veniam exercitationem expedita laborum at voluptate. Labore, voluptates totam at aut nemo deserunt rem magni pariatur quos perspiciatis atque eveniet unde.</p>
          		<a class="btn btn-primary" href="#">View Project</a>
        	</div>
      	</div>
      	
      	<hr>

      	<!-- Project One -->
      	<div class="row">
        	<div>
          		<h3>Project One</h3>
          		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium veniam exercitationem expedita laborum at voluptate. Labore, voluptates totam at aut nemo deserunt rem magni pariatur quos perspiciatis atque eveniet unde.</p>
          		<a class="btn btn-primary" href="#">View Project</a>
        	</div>
      	</div>
      	
      	<hr>

      	<!-- Project One -->
      	<div class="row">
        	<div>
          		<h3>Project One</h3>
          		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium veniam exercitationem expedita laborum at voluptate. Labore, voluptates totam at aut nemo deserunt rem magni pariatur quos perspiciatis atque eveniet unde.</p>
          		<a class="btn btn-primary" href="#">View Project</a>
        	</div>
      	</div>
      	
      	<br/>
      	<div class="form-group">
	    		<div align="right">
      				<button type="button" class="btn btn-primary" onclick="location.href='free_board_form.php'">글쓰기</button>
	    		</div>
	  	</div>

		<br/>
      	<!-- Pagination -->
      	<ul class="pagination justify-content-center">
        	<li class="page-item">
          		<a class="page-link" href="#" aria-label="Previous">
            		<span aria-hidden="true">&laquo;</span>
            		<span class="sr-only">Previous</span>
          		</a>
        	</li>
        	<li class="page-item">
          		<a class="page-link" href="#">1</a>
        	</li>
        	<li class="page-item">
          		<a class="page-link" href="#">2</a>
        	</li>
        	<li class="page-item">
          		<a class="page-link" href="#">3</a>
        	</li>
        	<li class="page-item">
          		<a class="page-link" href="#" aria-label="Next">
            		<span aria-hidden="true">&raquo;</span>
            	<span class="sr-only">Next</span>
          		</a>
        	</li>
      	</ul>
    </div>
    <!-- /.container -->
	
	<footer>
		<?php include_once 'footer.php';?>
	</footer>
</body>
</html>