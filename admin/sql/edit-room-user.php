<?php

	if (isset($_GET['id'])&&isset($_POST)){
		include("../../config.php");
		$_POST['d1']=addslashes($_POST['d1']);
		$_POST['d2']=addslashes($_POST['d2']);
		$_POST['d3']=addslashes($_POST['d3']);
		$_POST['d4']=addslashes($_POST['d4']);
		$_POST['d5']=addslashes($_POST['d5']);
		mysqli_query($connect, "update hocvien set sbd='".$_POST['d1']."', hoten='".$_POST['d2']."', ngaysinh='".$_POST['d3']."', noisinh='".$_POST['d4']."', tendv='".$_POST['d5']."', mapt='".$_POST['d6']."' where sbd='".$_GET['id']."'");
		if (mysqli_error($connect)) echo mysqli_error($connect);
	}