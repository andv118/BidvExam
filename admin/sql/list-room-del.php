<?php
	session_start();
	if (!isset($_SESSION['admin'])) echo "<script>window.location='../index.php'</script>";
	if (isset($_POST['d1'])){
		require("../../config.php");
		$_POST['d1']=trim($_POST['d1']);
		$_POST['d1']=addslashes($_POST['d1']);
		$_POST['d2']=trim($_POST['d2']);
		$_POST['d2']=addslashes($_POST['d2']);
		// 
		$h51="DELETE matkhau FROM matkhau, hocvien, phongthi WHERE phongthi.mapt = hocvien.mapt and phongthi.mapt='".$_POST['d1']."' and hocvien.sbd=matkhau.sbd";

		$h3="DELETE dethisinh FROM dethisinh, hocvien, phongthi where phongthi.mapt = hocvien.mapt and phongthi.mapt='".$_POST['d1']."' and hocvien.sbd=dethisinh.sbd";
		
		$h00="DELETE remote FROM remote, hocvien, phongthi where phongthi.mapt = hocvien.mapt and phongthi.mapt='".$_POST['d1']."' and hocvien.sbd=remote.sbd";

		$h01="DELETE cpthi FROM cpthi, hocvien, phongthi where phongthi.mapt = hocvien.mapt and phongthi.mapt='".$_POST['d1']."' and hocvien.sbd=cpthi.sbd";

		$h02="DELETE diem FROM diem, hocvien, phongthi where phongthi.mapt = hocvien.mapt and phongthi.mapt='".$_POST['d1']."' and hocvien.sbd=diem.sbd";

		$h7="DELETE hocvien FROM hocvien, phongthi where phongthi.mapt = hocvien.mapt and phongthi.mapt='".$_POST['d1']."'";

		$hpt="delete phongthi from phongthi WHERE mapt='".$_POST['d1']."'";

		// delete via modun
		// mysqli_query($connect,$h1);
		mysqli_query($connect,$h51);
		mysqli_query($connect,$h3);
		mysqli_query($connect,$h00);
		mysqli_query($connect,$h01);
		mysqli_query($connect,$h02);
		mysqli_query($connect,$h7);
		mysqli_query($connect,$hpt);
		
		if (mysqli_error($connect)) echo mysqli_error($connect); else echo "true";
	}
?>