<?php
	if (isset($_POST)){
		$_POST['d2']=addslashes($_POST['d2']);
		$_POST['d3']=addslashes($_POST['d3']);
		$_POST['d4']=addslashes($_POST['d4']);

		include("../../config.php");

		mysqli_query($connect,"update kythi set tenkythi='".$_POST['d2']."', tgbatdau='".$_POST['d3']."', tgketthuc='".$_POST['d4']."' where makythi='".$_GET['id']."'");
		if (mysqli_error($connect)) echo mysqli_error($connect);
	}
?>