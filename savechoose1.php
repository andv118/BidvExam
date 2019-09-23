<?php
	session_start();
	require("config.php");
	if (isset($_POST['id'])&&isset($_POST['name'])){
		$res=mysqli_query($connect, "select traloi from temp where sbd='".$_SESSION['sbd']."'");
		$r=mysqli_fetch_array($res, MYSQLI_ASSOC);
		$arr=explode(',', $r['traloi']);
		$arr[$_POST['name']-1]=$_POST['id'];
		$str=implode(",", $arr);
		mysqli_query($connect, "update temp set traloi='".$str."'");
		// $sql="update dethisinh set temp='".$_POST['id']."' where (sbd='".$_SESSION['sbd']."') and (mamodun='".$_SESSION['modunid']."') and (socau='".$_POST['name']."')";
		// mysqli_query($connect,$sql);
		// mysqli_close($connect);
	}
?>