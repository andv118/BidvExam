<?php
	session_start();
	if (!isset($_SESSION['admin'])) echo "<script>window.location='../admin/index.php'</script>";
	include("../config.php");
	date_default_timezone_set("Asia/Ho_Chi_Minh");
	mysqli_set_charset($connect,'utf8');
	$sql="select hocvien.sbd, hocvien.hoten, matkhau.matkhau from hocvien, matkhau where hocvien.sbd=matkhau.sbd and hocvien.mapt='".$_GET['id']."'";
	$diem=mysqli_query($connect,$sql);
	
	require_once("PHPExcel.php");
		
		$excel= new PHPExcel();
		$excel->getActiveSheet();
		
		$excel->getActiveSheet()->getColumnDimension("A")->setWidth(10);
		$excel->getActiveSheet()->getColumnDimension("B")->setWidth(22);
		$excel->getActiveSheet()->getColumnDimension("C")->setWidth(17);
		$excel->getActiveSheet()->getColumnDimension("D")->setWidth(20);
		$excel->getActiveSheet()->getColumnDimension("E")->setWidth(30);
		$excel->getActiveSheet()->getColumnDimension("F")->setWidth(16);
		$excel->getActiveSheet()->getColumnDimension("G")->setWidth(10);
		$excel->getActiveSheet()->getColumnDimension("H")->setWidth(8);
		$excel->getActiveSheet()->getColumnDimension("I")->setWidth(25);
		$excel->getActiveSheet()->getColumnDimension("J")->setWidth(14);
		
		$excel->getActiveSheet()->setCellValue("B2","BẢNG MẬT KHẨU PHÒNG: ".$_GET['id']);
		$excel->getActiveSheet()->setCellValue("A4","SBD");
		$excel->getActiveSheet()->setCellValue("B4","Họ và tên");
		$excel->getActiveSheet()->setCellValue("C4","Mật khẩu");
		
		$excel->getActiveSheet()->getStyle("A4")->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$excel->getActiveSheet()->getStyle("B4")->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$excel->getActiveSheet()->getStyle("C4")->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		
		$i=5;
		while ($r=mysqli_fetch_array($diem))
		{
			$excel->getActiveSheet()->setCellValue("A".$i,$r['sbd']);
			$excel->getActiveSheet()->setCellValue("B".$i,$r['hoten']);
			$excel->getActiveSheet()->setCellValue("C".$i,$r['matkhau']);
			
			$excel->getActiveSheet()->getStyle("A".$i)->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			$excel->getActiveSheet()->getStyle("B".$i)->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			$excel->getActiveSheet()->getStyle("C".$i)->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			$i++;
		}

		header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
		header("Content-Disposition: attachment; filename='PASSWORD-".$_GET['id'].".xlsx'");
		header("Cache-Control: max-age=0");
		include("PHPExcel/IOFactory.php");
		$write=PHPExcel_IOFactory::createWriter($excel,"Excel2007");
		ob_clean();
		flush(); 
		$write->save("php://output");
?>