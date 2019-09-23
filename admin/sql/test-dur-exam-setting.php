<?php
	session_start();
	if (isset($_POST['mt'])){
		include("../../config.php");
		if (isset($_POST['hv'])&&$_POST['hv']!=""){ // Đặt lại đề cho một học viên theo số báo danh
			mysqli_query($connect, "delete from remote where sbd='".$_POST['hv']."' and mamodun='".$_POST['mt']."'");
			mysqli_query($connect, "delete from diem where sbd='".$_POST['hv']."' and mamodun='".$_POST['mt']."'");
			mysqli_query($connect, "delete from dethisinh where sbd='".$_POST['hv']."' and mamodun='".$_POST['mt']."'");
		} else { // Đặt lại đề thi theo phòng
			mysqli_query($connect, "delete diem from diem, hocvien, phongthi where diem.sbd=hocvien.sbd and hocvien.mapt=phongthi.mapt and phongthi.mapt='".$_POST['pt']."' and diem.mamodun='".$_POST['mt']."'");
			// echo $_POST['pt']." ".$_POST['mt'];
			mysqli_query($connect, "delete dethisinh from dethisinh, hocvien, phongthi where dethisinh.sbd=hocvien.sbd and hocvien.mapt=phongthi.mapt and phongthi.mapt='".$_POST['pt']."' and dethisinh.mamodun='".$_POST['mt']."'");
			mysqli_query($connect, "delete remote from remote, hocvien, phongthi where remote.sbd=hocvien.sbd and hocvien.mapt=phongthi.mapt and phongthi.mapt='".$_POST['pt']."' and remote.mamodun='".$_POST['mt']."'");
			 // echo "er";
		} 
	}