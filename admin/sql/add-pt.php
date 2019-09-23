<?php
	if (isset($_POST)){
		include("../../config.php");
		$_POST['d1']=addslashes($_POST['d1']);
		$_POST['d2']=addslashes($_POST['d2']);
		$_POST['d3']=addslashes($_POST['d3']);
		$_POST['d4']=addslashes($_POST['d4']);
		$_POST['d5']=addslashes($_POST['d5']);
		mysqli_query($connect, "insert into phongthi(mapt, tenpt, soluongts, ghichu, macathi) values('".($_POST['d1']."-".$_POST['d2'])."', '".$_POST['d3']."', ".$_POST['d4'].", '".$_POST['d5']."', '".$_POST['d1']."')");
		if (mysqli_error($connect)) echo mysqli_error($connect);
	}
?>