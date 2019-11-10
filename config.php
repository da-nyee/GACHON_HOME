<?php
	$sys['domain'] = "http://127.0.0.1";
	$sys['name'] = "GACHON HOME: 가천대학교 기숙사 커뮤니티";
	$sys['var'] = "1.0.2";
	
	session_start();
	
	if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
	else $userid = "";
	if (isset($_SESSION["username"])) $username = $_SESSION["username"];
	else $username = "";
	if (isset($_SESSION["usernickname"])) $usernickname = $_SESSION["usernickname"];
	else $usernickname = "";
	if (isset($_SESSION["useremail"])) $userlevel = $_SESSION["useremail"];
	else $userlevel = "";
	if (isset($_SESSION["user_univnum"])) $userpoint = $_SESSION["user_univnum"];
	else $userpoint = "";
?>