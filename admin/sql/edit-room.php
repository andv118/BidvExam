<?php
	if (isset($_GET['id'])&&isset($_POST)){
		include("../../config.php");
		$_POST['d1']=addslashes($_POST['d1']);
		$_POST['d2']=addslashes($_POST['d2']);
		$_POST['d3']=addslashes($_POST['d3']);
		$_POST['d4']=addslashes($_POST['d4']);
		$_POST['d5']=addslashes($_POST['d5']);
		mysqli_query($connect, "update phongthi set mapt='".$_POST['d1']."', tenpt='".$_POST['d2']."', soluongts=".$_POST['d3'].", ghichu='".$_POST['d4']."', macathi='".$_POST['d5']."' where mapt='".$_GET['id']."'");
		if (mysqli_error($connect)) echo mysqli_error($connect);
	}