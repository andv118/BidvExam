<?php
	session_start();
	if (!isset($_SESSION['admin'])) echo "<script>window.location='../index.php'</script>";
	if (isset($_POST['d1'])){
		require("../../config.php");
		$_POST['d1']=trim($_POST['d1']);
		$_POST['d1']=addslashes($_POST['d1']);

		mysqli_query($connect, "delete cpthi from cpthi, hocvien where hocvien.sbd=cpthi.sbd and cpthi.sbd='".$_POST['d1']."'");
		mysqli_query($connect, "delete dethisinh from dethisinh, hocvien where hocvien.sbd=dethisinh.sbd and dethisinh.sbd='".$_POST['d1']."'");
		mysqli_query($connect, "delete remote from remote, hocvien where hocvien.sbd=remote.sbd and remote.sbd='".$_POST['d1']."'");
		mysqli_query($connect, "delete matkhau from matkhau, hocvien where hocvien.sbd=matkhau.sbd and matkhau.sbd='".$_POST['d1']."'");
		mysqli_query($connect, "delete diem from diem, hocvien where hocvien.sbd=diem.sbd and diem.sbd='".$_POST['d1']."'");
		mysqli_query($connect, "delete from hocvien where hocvien.sbd='".$_POST['d1']."'");
		if (mysqli_error($connect)) echo mysqli_error($connect); else echo "true";
	}