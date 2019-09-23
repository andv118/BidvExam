<?php
	#Kết nối cơ sở dữ liệu
	$server	=	"127.0.0.1";
	$user	=	"root";
	$mk		=	"";
	$csdl	=	"bidv_hcm";
	$connect=	mysqli_connect($server, $user, $mk, $csdl) or die("Lỗi kết nối cơ sở dữ liệu");
	mysqli_set_charset($connect, "utf8");
?>