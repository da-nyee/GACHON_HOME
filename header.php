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
	<body id="page-top">
	
  	<!-- Navigation -->
  	<nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
    	<div class="container">
      	<a class="navbar-brand js-scroll-trigger" href=".">GACHON HOME</a>
      	<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        	<span class="navbar-toggler-icon"></span>
      	</button>
      	<div class="collapse navbar-collapse" id="navbarResponsive">
        	<ul class="navbar-nav ml-auto my-2 my-lg-0">
          	<li class="nav-item">
            	<a class="nav-link js-scroll-trigger" href="notice_board_list.php">공지사항</a>
          	</li>
          	<li class="nav-item">
            	<a class="nav-link js-scroll-trigger" href="free_board_list.php">자유게시판</a>
          	</li>
          	<li class="nav-item">
            	<a class="nav-link js-scroll-trigger" href="buy_together_list.php">공동구매</a>
          	</li>
          	
<?php 
  	if(!$userid){
?>
          	<li class="nav-item">
            	<a class="nav-link js-scroll-trigger" href="member_form.php">회원가입</a>
          	</li>
          	<li class="nav-item">
            	<a class="nav-link js-scroll-trigger" href="login_form.php">로그인</a>
          	</li>
<?php 
  	} else {
?>
			<li class="nav-item">
            	<a class="nav-link js-scroll-trigger" href="member_modify_form.php">정보수정</a>
          	</li>
          	<li class="nav-item">
            	<a class="nav-link js-scroll-trigger" href="logout.php">로그아웃</a>
          	</li>
<?php 
  	}
?>
        	</ul>
      	</div>
    	</div>
  	</nav>
	</body>
</html>