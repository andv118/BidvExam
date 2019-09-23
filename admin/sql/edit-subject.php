<?php
	session_start();
	if (!isset($_SESSION['admin'])) echo "<script>window.location='../admin/index.php'</script>";
	if (isset($_POST['d1'])&&isset($_POST['d2'])){
		require("../../config.php");
		
		$_POST['d1']=trim($_POST['d1']);
		$_POST['d2']=trim($_POST['d2']);
		$_POST['d1']=addslashes($_POST['d1']);
		$_POST['d2']=addslashes($_POST['d2']);
		
		if (mysqli_query($connect,"update modun set mamodun='".$_POST['d1']."', tenmodun='".$_POST['d2']."' where mamodun='".$_GET['id']."'")){
		} else echo mysqli_error($connect);
	} else echo "false";
?>