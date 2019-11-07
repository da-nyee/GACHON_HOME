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
						alert('공동구매는 로그인 후 이용해 주세요!');
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
    	<h1 class="my-4">공동구매</h1>
    	
    	<br/>
    	
		<div class="row">
		<!-- Team Member 1 -->
			<div class="col-xl-3 col-md-6 mb-4">
		      	<div class="card border-0 shadow">
		        	<img src="https://source.unsplash.com/TMgQMXoglsM/500x350" class="card-img-top" alt="...">
		        	<div class="card-body text-center">
		          		<h5 class="card-title mb-0">Team Member</h5>
		          		<div class="card-text text-black-50">Web Developer</div>
		        	</div>
		      	</div>
		    </div>
		
		<!-- Team Member 2 -->
		    <div class="col-xl-3 col-md-6 mb-4">
		      	<div class="card border-0 shadow">
		        	<img src="https://source.unsplash.com/9UVmlIb0wJU/500x350" class="card-img-top" alt="...">
		        	<div class="card-body text-center">
		          		<h5 class="card-title mb-0">Team Member</h5>
		          		<div class="card-text text-black-50">Web Developer</div>
		        	</div>
		      	</div>
		    </div>
		
		<!-- Team Member 3 -->
		    <div class="col-xl-3 col-md-6 mb-4">
		    	<div class="card border-0 shadow">
		        	<img src="https://source.unsplash.com/sNut2MqSmds/500x350" class="card-img-top" alt="...">
		        	<div class="card-body text-center">
		          		<h5 class="card-title mb-0">Team Member</h5>
		          	<div class="card-text text-black-50">Web Developer</div>
		        	</div>
		      	</div>
		    </div>
		
		<!-- Team Member 4 -->
		    <div class="col-xl-3 col-md-6 mb-4">
		      	<div class="card border-0 shadow">
		        	<img src="https://source.unsplash.com/ZI6p3i9SbVU/500x350" class="card-img-top" alt="...">
		        	<div class="card-body text-center">
		          		<h5 class="card-title mb-0">Team Member</h5>
		          		<div class="card-text text-black-50">Web Developer</div>
		        	</div>
		      	</div>
		    </div>
		</div>
		<!-- /.row -->
      	
      	<br/>
      	<div class="form-group">
	    		<div align="right">
      				<button type="button" class="btn btn-primary" onclick="location.href='buy_together_form.php'">글쓰기</button>
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