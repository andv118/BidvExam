<?php
	session_start();
	include("../config.php");
	date_default_timezone_set("Asia/Ho_Chi_Minh");
	$cathi = mysqli_query($connect, "select cathi.bd, cathi.kt from cathi, kythi where cathi.makythi= kythi.makythi and kythi.makythi='".$_SESSION['kt']."'");
	$r = mysqli_fetch_array($cathi, MYSQLI_ASSOC);
	
	if (strtotime($r['bd'])>time()) echo "notstart";
		else if (strtotime($r['kt'])<time()) echo "stop";
			else if (strtotime($r['bd'])<=time()&&strtotime($r['kt'])>=time()) echo "pass";
?>