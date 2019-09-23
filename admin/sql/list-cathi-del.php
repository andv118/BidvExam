<?php
	session_start();
	if (!isset($_SESSION['admin'])) echo "<script>window.location='../index.php'</script>";
	if (isset($_POST['d1'])){
		require("../../config.php");
		$_POST['d1']=trim($_POST['d1']);
		$_POST['d1']=addslashes($_POST['d1']);
		// 
		$h51="DELETE matkhau FROM matkhau, hocvien, phongthi, cathi, kythi WHERE kythi.makythi = '".$_SESSION['makythi']."' AND kythi.makythi = cathi.makythi and cathi.macathi=phongthi.macathi and cathi.macathi='".$_POST['d1']."' and phongthi.mapt = hocvien.mapt and hocvien.sbd=matkhau.sbd";

		$h3="DELETE dethisinh FROM dethisinh, hocvien, phongthi, cathi, kythi where kythi.makythi=cathi.makythi and cathi.macathi=phongthi.macathi and phongthi.mapt=hocvien.mapt and hocvien.sbd=dethisinh.sbd and kythi.makythi='".$_SESSION['makythi']."' and cathi.macathi='".$_POST['d1']."'";
		
		$h00="DELETE remote FROM remote, hocvien, phongthi, cathi, kythi where kythi.makythi=cathi.makythi and cathi.macathi=phongthi.macathi and phongthi.mapt=hocvien.mapt and hocvien.sbd=remote.sbd and kythi.makythi='".$_SESSION['makythi']."' and cathi.macathi='".$_POST['d1']."'";
		$h01="DELETE cpthi FROM cpthi, hocvien, phongthi, cathi, kythi where kythi.makythi=cathi.makythi and cathi.macathi=phongthi.macathi and phongthi.mapt=hocvien.mapt and hocvien.sbd=cpthi.sbd and kythi.makythi='".$_SESSION['makythi']."' and cathi.macathi='".$_POST['d1']."'";
		$h02="DELETE diem FROM diem, hocvien, phongthi, cathi, kythi where kythi.makythi=cathi.makythi and cathi.macathi=phongthi.macathi and phongthi.mapt=hocvien.mapt and hocvien.sbd=diem.sbd and kythi.makythi='".$_SESSION['makythi']."' and cathi.macathi='".$_POST['d1']."'";
		$h7="DELETE hocvien FROM hocvien, phongthi, cathi, kythi WHERE kythi.makythi = '".$_SESSION['makythi']."' and kythi.makythi = cathi.makythi and cathi.macathi='".$_POST['d1']."' and cathi.macathi=phongthi.macathi and phongthi.mapt = hocvien.mapt";
		$hpt="delete phongthi from phongthi, cathi, kythi WHERE kythi.makythi = '".$_SESSION['makythi']."' and kythi.makythi = cathi.makythi and cathi.macathi=phongthi.macathi and cathi.macathi='".$_POST['d1']."'";

		$hct="delete cathi from cathi, kythi WHERE kythi.makythi = '".$_SESSION['makythi']."' and kythi.makythi = cathi.makythi and cathi.macathi='".$_POST['d1']."'";

		// delete via modun
		// mysqli_query($connect,$h1);
		mysqli_query($connect,$h51);
		mysqli_query($connect,$h3);
		mysqli_query($connect,$h00);
		mysqli_query($connect,$h01);
		mysqli_query($connect,$h02);
		mysqli_query($connect,$h7);
		mysqli_query($connect,$hpt);
		mysqli_query($connect,$hct);
		
		if (mysqli_error($connect)) echo mysqli_error($connect); else echo "true";
	}
?>