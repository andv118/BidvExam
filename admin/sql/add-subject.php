<?php
	if (isset($_POST)){
		session_start();
		include("../../config.php");
		$_POST['d1']=addslashes($_POST['d1']);
		$_POST['d2']=addslashes($_POST['d2']);

		mysqli_query($connect, "insert into modun (mamodun, tenmodun, makythi) values ('".$_POST['d1']."', '".$_POST['d2']."', '".$_SESSION['makythi']."')");

		//Cho phép tất cả thí sinh đều được thi môn vừa thêm
		if (!mysqli_error($connect)){
			$hv=mysqli_query($connect,"select sbd from hocvien, phongthi, cathi, kythi where hocvien.mapt=phongthi.mapt and phongthi.macathi=cathi.macathi and cathi.makythi=kythi.makythi and kythi.makythi='".$_SESSION['makythi']."'");
				while ($r=mysqli_fetch_array($hv))
					mysqli_query($connect,"insert into cpthi (sbd, mamodun, cp) values('".$r['sbd']."', '".$_POST['d1']."', 'C')");
		}
		if (mysqli_error($connect)) echo mysqli_error($connect);
	}