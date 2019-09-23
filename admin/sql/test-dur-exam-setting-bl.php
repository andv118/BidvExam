<?php
	session_start();
	if (isset($_POST['mt'])){
		include("../../config.php");
		if (isset($_POST['hv'])&&$_POST['hv']!=""){ // Đặt lại bài làm cho một học viên theo số báo danh
			mysqli_query($connect, "update remote set estatus='Đang thi' where sbd='".$_POST['hv']."' and mamodun='".$_POST['mt']."'");
			$t=mysqli_query($connect, "select tgthi from thoigianthi where mamodun='".$_POST['mt']."'");
			$r=mysqli_fetch_array($t, MYSQLI_ASSOC);
			mysqli_query($connect, "update diem set diem=0, thoigianketthuc='', timeconlai=".($r['tgthi']*60)." where sbd='".$_POST['hv']."' and mamodun='".$_POST['mt']."'");
			mysqli_query($connect, "update dethisinh set temp='' where sbd='".$_POST['hv']."' and mamodun='".$_POST['mt']."'");
		} else { // Đặt lại bài làm theo phòng  // Chưa làm
			$t=mysqli_query($connect, "select tgthi from thoigianthi where mamodun='".$_POST['mt']."'");
			$r=mysqli_fetch_array($t, MYSQLI_ASSOC);
			mysqli_query($connect, "update diem, hocvien, phongthi set diem=0, thoigianketthuc='', timeconlai=".($r['tgthi']*60)." where diem.sbd=hocvien.sbd and hocvien.mapt=phongthi.mapt and phongthi.mapt='".$_POST['pt']."' and diem.mamodun='".$_POST['mt']."'");

			mysqli_query($connect, "update dethisinh, hocvien, phongthi set temp='' where dethisinh.sbd=hocvien.sbd and hocvien.mapt=phongthi.mapt and phongthi.mapt='".$_POST['pt']."' and dethisinh.mamodun='".$_POST['mt']."'");

			mysqli_query($connect, "update remote, hocvien, phongthi set estatus='Đang thi' where remote.sbd=hocvien.sbd and hocvien.mapt=phongthi.mapt and phongthi.mapt='".$_POST['pt']."' and remote.mamodun='".$_POST['mt']."'");
		}
	}