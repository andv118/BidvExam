<?php
	if ( isset($_POST['sbd']) && isset($_POST['pass']) ){
		require_once("../config.php");
		session_start();
		date_default_timezone_set("Asia/Ho_Chi_Minh");

		$_POST['pass'] = md5($_POST['pass']);
		$data = mysqli_query($connect, "select sbd, hoten, ngaysinh, noisinh, tendv from hocvien where sbd='".$_POST['sbd']."' and matkhau='".$_POST['pass']."'");

		if (mysqli_num_rows($data)>0){
			$r = mysqli_fetch_array($data, MYSQLI_ASSOC);
			$makythi = mysqli_query($connect, "select kythi.makythi, kythi.tenkythi from kythi, cathi, phongthi, hocvien where kythi.makythi=cathi.makythi and cathi.macathi=phongthi.macathi and phongthi.mapt=hocvien.mapt and sbd='".$r['sbd']."'");
			$r1 = mysqli_fetch_array($makythi, MYSQLI_ASSOC);
			$_SESSION['sbd']=$r['sbd'];
			$_SESSION['sbd']=addslashes($_SESSION['sbd']);
			$_SESSION['hoten']=$r['hoten'];
			$_SESSION['ngaysinh']=$r['ngaysinh'];
			$_SESSION['noisinh']=$r['noisinh'];
			$_SESSION['donvi']=$r['tendv'];
			$_SESSION['kt']=$r1['makythi'];
			$_SESSION['tkt']=$r1['tenkythi'];
		} else echo 'f';
	} else echo "false";
?>