<?php
	if (isset($_GET['id'])&&$_GET['id']!=""){
		include("../../config.php");
		$_POST['d1']=addslashes($_POST['d1']);
		$_POST['d2']=addslashes($_POST['d2']);
		$_POST['d3']=addslashes($_POST['d3']);
		$_POST['d4']=addslashes($_POST['d4']);
		$_POST['d5']=addslashes($_POST['d5']);
		mysqli_query($connect, "update cathi set macathi='".$_POST['d1']."', tencathi='".$_POST['d2']."', bd='".$_POST['d3']."', kt='".$_POST['d4']."', ghichu='".$_POST['d5']."' where macathi='".$_GET['id']."'");
		if (mysqli_error($connect)) echo mysqli_error($connect);
	}
?>