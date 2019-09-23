<?php
	if (isset($_POST)){
		$_POST['d1']=addslashes($_POST['d1']);
		$_POST['d2']=addslashes($_POST['d2']);
		$_POST['d3']=addslashes($_POST['d3']);
		$_POST['d4']=addslashes($_POST['d4']);

		include("../../config.php");

		mysqli_query($connect,"insert into kythi(makythi,tenkythi,tgbatdau,tgketthuc) values('".$_POST['d1']."','".$_POST['d2']."','".$_POST['d3']."','".$_POST['d4']."')");
		if (mysqli_error($connect)) echo mysqli_error($connect);
	}
?>