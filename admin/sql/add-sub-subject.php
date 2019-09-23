<?php
	session_start();
	if (!isset($_SESSION['admin'])) echo "<script>window.location='../admin/index.php'</script>";
	if (isset($_POST['d1'])&&isset($_POST['d2'])&&isset($_POST['d3'])&&isset($_POST['d4'])){
		require("../../config.php");
		
		$_POST['d1']=trim($_POST['d1']);
		$_POST['d2']=trim($_POST['d2']);
		$_POST['d3']=trim($_POST['d3']);
		$_POST['d4']=trim($_POST['d4']);

		$_POST['d1']=addslashes($_POST['d1']);
		$_POST['d2']=addslashes($_POST['d2']);
		$_POST['d3']=addslashes($_POST['d3']);
		$_POST['d4']=addslashes($_POST['d4']);
		
		mysqli_query($connect,"insert into bode (mabode, tenbode, diemmax, mamodun) values('".($_POST['d4']."-".$_POST['d1'])."','".$_POST['d2']."','".$_POST['d3']."','".$_POST['d4']."')");
		if (mysqli_error($connect)) echo mysqli_error($connect);
	}
?>