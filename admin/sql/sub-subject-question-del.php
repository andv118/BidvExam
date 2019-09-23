<?php
	session_start();
	if (!isset($_SESSION['admin'])) echo "<script>window.location='../index.php'</script>";
	if (isset($_POST['d1'])){
		require("../../config.php");
		$_POST['d1']=trim($_POST['d1']);
		$_POST['d1']=addslashes($_POST['d1']);

		mysqli_query($connect, "delete dethisinh from dethisinh, cauhoi where cauhoi.macauhoi=dethisinh.macauhoi and cauhoi.macauhoi='".$_POST['d1']."'");
		mysqli_query($connect, "delete from cauhoi where cauhoi.macauhoi='".$_POST['d1']."'");
		if (mysqli_error($connect)) echo mysqli_error($connect); else echo "true";
	}