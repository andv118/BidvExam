<?php
	session_start();
	if (!isset($_SESSION['admin'])) echo "<script>window.location='index.php'</script>";
	if (isset($_GET['pt'])&&isset($_GET['mt'])){
		include("../config.php");
		mysqli_set_charset($connect,'utf8');
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		//Excel
		require_once("PHPExcel.php");
		
		$excel= new PHPExcel();
		$excel->getActiveSheet();
		$excel->getActiveSheet()->getColumnDimension("A")->setWidth(6);
		$excel->getActiveSheet()->getColumnDimension("B")->setWidth(20);
		$excel->getActiveSheet()->getColumnDimension("C")->setWidth(8);
		$excel->getActiveSheet()->getColumnDimension("D")->setWidth(20);
		$excel->getActiveSheet()->getColumnDimension("E")->setWidth(20);
		$excel->getActiveSheet()->getColumnDimension("F")->setWidth(20);
		$excel->getActiveSheet()->getColumnDimension("G")->setWidth(20);
		$excel->getActiveSheet()->getColumnDimension("H")->setWidth(20);
		
		$excel->getActiveSheet()->setCellValue("A1","TRƯỜNG ĐÀO TẠO CÁN BỘ BIDV");
		$excel->getActiveSheet()->setCellValue("A2","");
		$excel->getActiveSheet()->setCellValue("A3","");
		
		$excel->getActiveSheet()->setCellValue("A6","BẢNG ĐIỂM KỲ THI KIỂM TRA NĂNG LỰC QUẢN LÝ ĐỢT 1 NĂM 2019");
		$excel->getActiveSheet()->setCellValue("A7","Khóa thi, ".date("\\n\g\à\y: d/m/Y",time()));
		$excel->getActiveSheet()->setCellValue("A8","Phòng thi: ".($_GET['pt']." - ".$_GET['name_pt'])."");
		$excel->getActiveSheet()->setCellValue("A9","Môn thi: ".($_GET['mt']." - ".$_GET['name_mt'])."");
		
		$excel->getActiveSheet()->setCellValue("A12","STT");
		$excel->getActiveSheet()->setCellValue("B12","Họ và tên");
		$excel->getActiveSheet()->setCellValue("C12","SBD");

		$border=array(
			'borders'=>array(
				'allborders'=>array(
					'style'=>PHPExcel_Style_Border::BORDER_THIN
				)
			)
		);

		$excel->getActiveSheet()->getStyle("A12")->applyFromArray($border);
		$excel->getActiveSheet()->getStyle("B12")->applyFromArray($border);
		$excel->getActiveSheet()->getStyle("C12")->applyFromArray($border);
		$bode=mysqli_query($connect,"select mabode, tenbode, diemmax from bode, modun where modun.mamodun=bode.mamodun and modun.mamodun='".$_GET['mt']."'");
		$ascii=68;
		while ($boderow=mysqli_fetch_array($bode)){
			$excel->getActiveSheet()->setCellValue(chr($ascii)."12",$boderow['tenbode']);
			$excel->getActiveSheet()->getStyle(chr($ascii)."12")->applyFromArray($border);
			$ascii++;
		}
		$excel->getActiveSheet()->setCellValue(chr($ascii)."12","Tổng điểm toàn bài");
		$excel->getActiveSheet()->getStyle(chr($ascii)."12")->applyFromArray($border);
		$ascii++;
		$excel->getActiveSheet()->setCellValue(chr($ascii)."12","Ký tên");
		$excel->getActiveSheet()->getStyle(chr($ascii)."12")->applyFromArray($border);
		$i=13;$j=1;
		$s1=mysqli_query($connect,"select hocvien.sbd, hocvien.hoten, hocvien.noisinh, hocvien.ngaysinh from hocvien where hocvien.mapt='".$_GET['pt']."' order by sbd");
		
		while ($r=mysqli_fetch_array($s1)){
			$bode=mysqli_query($connect,"select mabode, tenbode, diemmax from bode, modun where modun.mamodun=bode.mamodun and modun.mamodun='".$_GET['mt']."'");
			$s2=mysqli_query($connect,"select sbd, diem.mamodun, diem, socaudung, thoigianthi, thoigianketthuc, modun.tenmodun from diem, modun where modun.mamodun=diem.mamodun and sbd='".$r['sbd']."' and diem.mamodun='".$_GET['mt']."' order by sbd, diem.mamodun"); //Lấy điểm thi
			$excel->getActiveSheet()->setCellValue("A".$i,$j);
			$excel->getActiveSheet()->setCellValue("C".$i,$r['sbd']);
			$excel->getActiveSheet()->setCellValue("B".$i,$r['hoten']);
			$excel->getActiveSheet()->getStyle("A".$i)->applyFromArray($border);
			$excel->getActiveSheet()->getStyle("B".$i)->applyFromArray($border);
			$excel->getActiveSheet()->getStyle("C".$i)->applyFromArray($border);
			$ascii=68;

			if (mysqli_num_rows($s2)>0){
				while ($ds2=mysqli_fetch_array($s2)){ //Lặp danh sách điểm thành phần thí sinh có điểm của phòng
					$sum=0;
					while ($brows=mysqli_fetch_array($bode)){
						$diemp=mysqli_query($connect,"select dethisinh.macauhoi, dethisinh.dapan, dethisinh.temp, socau, cauhoi.sodiem from cauhoi, bode, dethisinh where cauhoi.macauhoi=dethisinh.macauhoi and cauhoi.mabode=bode.mabode and bode.mabode='".$brows['mabode']."' and sbd='".$r['sbd']."' ORDER by dethisinh.socau");
						if (mysqli_num_rows($diemp)>0){
							$caudung=0; $sum_temp=0; $dtongtp=0;
							while ($d=mysqli_fetch_array($diemp)){
								if ($d['temp']===$d['dapan']){
									$sum_temp+=$d['sodiem'];
									$caudung++;
								} $dtongtp+=$d['sodiem'];
							}
							if ($dtongtp<$brows['diemmax']) $dtongtp=$brows['diemmax'];
							$excel->getActiveSheet()->setCellValue(chr($ascii).$i, $sum_temp."/".$dtongtp);
							$excel->getActiveSheet()->getStyle(chr($ascii).$i)->applyFromArray($border);
							$sum+=$sum_temp;
						}else $excel->getActiveSheet()->setCellValue(chr($ascii).$i,""); $ascii++;
						$excel->getActiveSheet()->getStyle(chr($ascii).$i)->applyFromArray($border);
					}
					$excel->getActiveSheet()->setCellValue(chr($ascii).$i,$sum);
					$excel->getActiveSheet()->getStyle(chr($ascii).$i)->applyFromArray($border);
					$ascii++;
					$excel->getActiveSheet()->setCellValue(chr($ascii).$i,"");
					$excel->getActiveSheet()->getStyle(chr($ascii).$i)->applyFromArray($border);
					$i++;$j++;
				}
			}
			else {
				while ($brows=mysqli_fetch_array($bode)){
					$excel->getActiveSheet()->setCellValue(chr($ascii).$i,"");
					$excel->getActiveSheet()->getStyle(chr($ascii).$i)->applyFromArray($border);
					$ascii++;
				}
				$excel->getActiveSheet()->setCellValue(chr($ascii).$i,"");
				$excel->getActiveSheet()->getStyle(chr($ascii).$i)->applyFromArray($border);
				$ascii++;
				$excel->getActiveSheet()->setCellValue(chr($ascii).$i,"");
				$excel->getActiveSheet()->getStyle(chr($ascii).$i)->applyFromArray($border);
				$i++;$j++;
			}
			}
		$excel->getActiveSheet()->setCellValue("H".($i+1),"........., ".$time_bd=date("\\n\g\à\y: d/m/Y",time()));
		$excel->getActiveSheet()->getStyle('B'.($i+2))->getAlignment()->setWrapText(true);
		$excel->getActiveSheet()->setCellValue("B".($i+2),"Giám thị 1\n(Kí, họ tên)");
		$excel->getActiveSheet()->getStyle('D'.($i+2))->getAlignment()->setWrapText(true);
		$excel->getActiveSheet()->setCellValue("D".($i+2),"Giám thị 2\n(Kí, họ tên)");
		$excel->getActiveSheet()->getStyle('G'.($i+2))->getAlignment()->setWrapText(true);
		$excel->getActiveSheet()->setCellValue("G".($i+2),"Chủ tịch Hội đồng\n(Kí, họ tên)");
		
		header("Content-Type: application/vnd.ms-excel");
		header("Content-Disposition: attachment; filename='SCORE-TEST-[".($_GET['pt']."] ".$_GET['name_pt']).".xlsx'");
		header("Cache-Control: max-age=0");
		include("PHPExcel/IOFactory.php");
		$write=PHPExcel_IOFactory::createWriter($excel,"Excel2007");
		ob_clean();
		flush(); 
		$write->save("php://output");
	}
	else die("Chưa chọn phòng cần xuất điểm");
?>