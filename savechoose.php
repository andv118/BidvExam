<?php
	session_start();
	require("config.php");
	if (isset($_POST['id'])&&isset($_POST['name'])){
		$sql="update dethisinh set temp='".$_POST['id']."' where sbd='".$_SESSION['sbd']."' and mamodun='".$_SESSION['modunid']."' and socau='".$_POST['name']."'";
		mysqli_query($connect, $sql);
	}
?>