<?php
	session_start();
	if (!isset($_SESSION['admin'])) echo "<script>window.location='../index.php'</script>";
	if (isset($_POST['d1'])&&isset($_POST['d2'])&&isset($_POST['d3'])){
		require("../../config.php");
		
		$_POST['d1']=trim($_POST['d1']);
		$_POST['d2']=trim($_POST['d2']);
		$_POST['d3']=trim($_POST['d3']);
		$_POST['d1']=addslashes($_POST['d1']);
		$_POST['d2']=addslashes($_POST['d2']);
		$_POST['d3']=addslashes($_POST['d3']);
		$_POST['d4']=addslashes($_POST['d4']);
		
		mysqli_query($connect,"update bode set mabode='".$_POST['d1']."', tenbode='".$_POST['d2']."', diemmax=".$_POST['d3']." where mabode='".$_GET['id']."'");
		mysqli_query($connect,"update dethiprofile set cauhoi='".$_POST['d1']."' where cauhoi='".$_GET['id']."'");

		if (mysqli_error($connect)) echo mysqli_error($connect);
	} else echo "false";
?>