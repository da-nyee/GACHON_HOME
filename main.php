<?php
	include_once './config.php';
	include_once './db/db_config.php';
?>

<?php
	if(isset($_SESSION["name"])) $username = $_SESSION["name"];
	else $username = "";
	if(isset($_SESSION["email"])) $useremail = $_SESSION["email"];
	else $useremail = "";
?>

<body>
  <!-- Masthead -->
  <header class="masthead">
    <div class="container h-100">
      <div class="row h-100 align-items-center justify-content-center text-center">
        <div class="col-lg-10 align-self-end">
          <h1 class="text-uppercase text-white font-weight-bold">GACHON HOME:</h1>
          <h1 class="text-uppercase text-white font-weight-bold">가천대학교 기숙사 커뮤니티</h1>
          <hr class="divider my-4">
        </div>
        
<?php 
  	if(!$userid){
?>
        <div class="col-lg-8 align-self-baseline">
          <p class="text-white-75 font-weight-light mb-5">로그인 해주세요.</p>
        </div>
<?php 
  	} else {
?>
        <div class="col-lg-8 align-self-baseline">
          <p class="text-white-75 font-weight-light mb-5"><?=$logged = $username."(".$useremail.")님 반갑습니다.";?></p>
          <a class="btn btn-primary btn-xl js-scroll-trigger" href="#contact">더보기</a>
        </div>
      </div>
    </div>
  </header>

  <section class="page-section" id="contact">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 text-center">
          <h2 class="mt-0">Let's Get In Touch!</h2>
          <hr class="divider my-4">
          <p class="text-muted mb-5">Who develops this website:</p>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4 ml-auto text-center mb-5 mb-lg-0">
          <i class="fas fa-phone fa-3x mb-3 text-muted"></i>
          <div>+82-10-5633-2902</div>
        </div>
        <div class="col-lg-4 mr-auto text-center">
          <i class="fas fa-envelope fa-3x mb-3 text-muted"></i>
          <!-- Make sure to change the email address in anchor text AND the link below! -->
          <a class="d-block" href="mailto:leede0418@gmail.com">leede0418@gmail.com</a>
        </div>
      </div>
    </div>
  </section>
<?php 
  	}
?>
</body>