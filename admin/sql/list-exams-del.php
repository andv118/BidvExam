<?php
	session_start();
	if (!isset($_SESSION['admin'])) echo "<script>window.location='../index.php'</script>";
	if (isset($_POST['d1'])){
		require("../../config.php");
		$_POST['d1']=trim($_POST['d1']);
		$_POST['d1']=addslashes($_POST['d1']);
		
		$h0="DELETE thoigianthi FROM thoigianthi, modun, kythi WHERE kythi.makythi = '".$_POST['d1']."' AND kythi.makythi = modun.makythi AND modun.mamodun = thoigianthi.mamodun";
		$h4="DELETE dethiprofile FROM dethiprofile, modun, kythi WHERE kythi.makythi = '".$_POST['d1']."' AND kythi.makythi = modun.makythi AND modun.mamodun = dethiprofile.mamodun";
		$h00="DELETE remote FROM remote, modun, kythi WHERE kythi.makythi = '".$_POST['d1']."' AND kythi.makythi = modun.makythi AND modun.mamodun = remote.mamodun";

		$h2="DELETE diem FROM diem, modun, kythi WHERE kythi.makythi = '".$_POST['d1']."' AND kythi.makythi = modun.makythi AND modun.mamodun = diem.mamodun";

		$h3="DELETE dethisinh FROM dethisinh,modun,kythi WHERE kythi.makythi = '".$_POST['d1']."' AND kythi.makythi = modun.makythi and dethisinh.mamodun=modun.mamodun";

		$h52="DELETE cauhoi FROM cauhoi,modun,bode,kythi WHERE kythi.makythi='".$_POST['d1']."' AND kythi.makythi = modun.makythi AND modun.mamodun=bode.mamodun and bode.mabode=cauhoi.mabode";
		$h5="DELETE bode FROM bode,modun,kythi WHERE kythi.makythi = '".$_POST['d1']."' AND kythi.makythi = modun.makythi AND modun.mamodun = bode.mamodun";

		$h51="DELETE matkhau FROM matkhau, hocvien, phongthi, cathi, kythi WHERE kythi.makythi = '".$_POST['d1']."' AND kythi.makythi = cathi.makythi and cathi.macathi=phongthi.macathi and phongthi.mapt = hocvien.mapt and hocvien.sbd=matkhau.sbd";

		$h7="DELETE hocvien FROM hocvien, phongthi, cathi, kythi WHERE kythi.makythi = '".$_POST['d1']."' and kythi.makythi = cathi.makythi and cathi.macathi=phongthi.macathi and phongthi.mapt = hocvien.mapt";
		$hpt="delete phongthi from phongthi, cathi, kythi WHERE kythi.makythi = '".$_POST['d1']."' and kythi.makythi = cathi.makythi and cathi.macathi=phongthi.macathi";
		$hct="delete cathi from cathi, kythi WHERE kythi.makythi = '".$_POST['d1']."' and kythi.makythi = cathi.makythi";
		$h6="delete modun from kythi, modun where kythi.makythi=modun.makythi and kythi.makythi='".$_POST['d1']."'";
		$h8="delete from kythi where makythi='".$_POST['d1']."'";
		
		// delete via modun
		// mysqli_query($connect,$h1);
		mysqli_query($connect,$h0);
		mysqli_query($connect,$h4);
		mysqli_query($connect,$h00);
		mysqli_query($connect,$h2);
		mysqli_query($connect,$h3);
		mysqli_query($connect,$h52);
		mysqli_query($connect,$h5);
		
		// delete via hocvien
		// mysqli_query($connect,$h53);
		mysqli_query($connect,$h51);
		mysqli_query($connect,$h7);
		mysqli_query($connect,$hpt);
		mysqli_query($connect,$hct);
		mysqli_query($connect,$h6);		
		mysqli_query($connect,$h8);
		
		if (mysqli_error($connect)) echo mysqli_error($connect); else echo "true";
	}
?>