<?php
	session_start();
	if (isset($_SESSION['makythi'])){
		include("../../config.php");
		$_POST['d1']=addslashes($_POST['d1']);
		$_POST['d2']=addslashes($_POST['d2']);
		$_POST['d3']=addslashes($_POST['d3']);
		$_POST['d4']=addslashes($_POST['d4']);
		$_POST['d5']=addslashes($_POST['d5']);
		mysqli_query($connect, "insert into cathi (macathi, tencathi, bd, kt, ghichu, makythi) values ('".($_SESSION['makythi']."-".$_POST['d1'])."', '".$_POST['d2']."', '".$_POST['d3']."', '".$_POST['d4']."', '".$_POST['d5']."', '".$_SESSION['makythi']."')");
		if (mysqli_error($connect)) echo mysqli_error($connect);
	}
?>