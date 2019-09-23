<?php
	session_start();
	if (!isset($_SESSION['admin'])) echo "<script>window.location='../index.php'</script>";
	if (isset($_POST['d1'])){
		require("../../config.php");
		$_POST['d1']=trim($_POST['d1']);
		$_POST['d1']=addslashes($_POST['d1']);

		$h01="DELETE cpthi FROM cpthi, modun where modun.mamodun=cpthi.mamodun and cpthi.mamodun='".$_POST['d1']."'";
		$h3="DELETE dethisinh FROM dethisinh, modun where modun.mamodun=dethisinh.mamodun and dethisinh.mamodun='".$_POST['d1']."'";
		$h4="DELETE dethiprofile FROM dethiprofile, modun where modun.mamodun=dethiprofile.mamodun and dethiprofile.mamodun='".$_POST['d1']."'";
		$h5="DELETE thoigianthi FROM thoigianthi, modun where modun.mamodun=thoigianthi.mamodun and thoigianthi.mamodun='".$_POST['d1']."'";
		$h00="DELETE remote FROM remote, modun where modun.mamodun=remote.mamodun and remote.mamodun='".$_POST['d1']."'";
		$h02="DELETE diem FROM diem, modun where modun.mamodun=diem.mamodun and diem.mamodun='".$_POST['d1']."'";

		$hdts="DELETE cauhoi FROM cauhoi, bode, modun where cauhoi.mabode=bode.mabode and bode.mamodun=modun.mamodun and bode.mamodun='".$_POST['d1']."'";
		$h7="DELETE bode FROM bode, modun where modun.mamodun=bode.mamodun and bode.mamodun='".$_POST['d1']."'";
		$h8="delete from modun WHERE mamodun='".$_POST['d1']."'";

		// delete via modun
		mysqli_query($connect,$h01);
		mysqli_query($connect,$h3);
		mysqli_query($connect,$h4);
		mysqli_query($connect,$h5);
		mysqli_query($connect,$h00);
		mysqli_query($connect,$h02);
		mysqli_query($connect,$hdts);
		mysqli_query($connect,$h7);
		mysqli_query($connect,$h8);
		
		if (mysqli_error($connect)) echo mysqli_error($connect); else echo "true";
	}
?>