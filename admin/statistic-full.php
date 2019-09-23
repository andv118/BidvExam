<?php
	session_start();
	if (!isset($_SESSION['admin'])) echo "<script>window.location='index.php'</script>";
	include("../config.php");
	mysqli_set_charset($connect,'utf8');
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	//Excel
	require_once("PHPExcel.php");
	
	$excel= new PHPExcel();
	$excel->getActiveSheet();
	$excel->getActiveSheet()->getColumnDimension("A")->setWidth(6);
	$excel->getActiveSheet()->getColumnDimension("B")->setWidth(20);
	$excel->getActiveSheet()->getColumnDimension("C")->setWidth(12);
	$excel->getActiveSheet()->getColumnDimension("D")->setWidth(20);
	$excel->getActiveSheet()->getColumnDimension("E")->setWidth(12);
	$excel->getActiveSheet()->getColumnDimension("F")->setWidth(14);
	$excel->getActiveSheet()->getColumnDimension("G")->setWidth(10);
	$excel->getActiveSheet()->getColumnDimension("H")->setWidth(10);
	$excel->getActiveSheet()->getColumnDimension("I")->setWidth(10);
	$excel->getActiveSheet()->getColumnDimension("J")->setWidth(10);
	$excel->getActiveSheet()->getColumnDimension("K")->setWidth(10);
	$excel->getActiveSheet()->getColumnDimension("L")->setWidth(10);
	$excel->getActiveSheet()->getColumnDimension("M")->setWidth(10);
	$excel->getActiveSheet()->getColumnDimension("N")->setWidth(20);

	$excel->getActiveSheet()->getStyle('A1:N1')->getAlignment()->setWrapText(true);
	$excel->getActiveSheet()->getStyle('A1:N1')->getFont()->setBold(true);
	
	$excel->getActiveSheet()->setCellValue("A1","STT");
	$excel->getActiveSheet()->setCellValue("B1","Họ tên thí sinh");
	$excel->getActiveSheet()->setCellValue("C1","Số báo danh");
	$excel->getActiveSheet()->setCellValue("D1","Vị trí kiểm tra");
	$excel->getActiveSheet()->setCellValue("E1","Ca thi");
	$excel->getActiveSheet()->setCellValue("F1","Phòng thi");
	$excel->getActiveSheet()->setCellValue("G1","Kiến thức quản lý");
	$excel->getActiveSheet()->setCellValue("H1","Kiến thức BIDV");
	$excel->getActiveSheet()->setCellValue("I1","Tạo ảnh hưởng");
	$excel->getActiveSheet()->setCellValue("J1","Hướng dẫn kèm cặp cán bộ");
	$excel->getActiveSheet()->setCellValue("K1","Làm việc nhóm");
	$excel->getActiveSheet()->setCellValue("L1","Lập kế hoạch");
	$excel->getActiveSheet()->setCellValue("M1","Tổng điểm");
	$excel->getActiveSheet()->setCellValue("N1","ĐẠT/ KHÔNG ĐẠT");

	$border=array(
		'borders'=>array(
			'allborders'=>array(
				'style'=>PHPExcel_Style_Border::BORDER_THIN
			)
		)
	);
	$alig=array(
		array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,)
	);

	$excel->getActiveSheet()->getStyle("A1:N1")->applyFromArray($border);
	$sql=mysqli_query($connect, "select hocvien.sbd, hocvien.hoten, cathi.tencathi, phongthi.tenpt, phongthi.ghichu from hocvien, cathi, phongthi WHERE hocvien.mapt=phongthi.mapt and phongthi.macathi=cathi.macathi");
	$icell=2; $dat_ac=0; $nodat_ac=0;
	while ($r=mysqli_fetch_array($sql)){
		$excel->getActiveSheet()->setCellValue("A".$icell, ($icell-1));
		$excel->getActiveSheet()->setCellValue("B".$icell, $r['hoten']);
		$excel->getActiveSheet()->setCellValue("C".$icell, $r['sbd']);
		$excel->getActiveSheet()->setCellValue("D".$icell, $r['ghichu']);
		$excel->getActiveSheet()->setCellValue("E".$icell, $r['tencathi']);
		$excel->getActiveSheet()->setCellValue("F".$icell, $r['tenpt']);

		$resro=mysqli_query($connect, "select diem from diem where sbd='".$r['sbd']."'");
		$number=mysqli_num_rows($resro);
		if ($number>0) {
			// Ghi điểm
			$tong=0; $t1=true; $t2=true; $t3=true; $t4=true; $t5=true; $t6=true;
			if ($r['ghichu']=='Bổ nhiệm lại Trưởng phòng') {
				// Điểm kiến thức quản lý
				$res=mysqli_query($connect, "select dethisinh.macauhoi, cauhoi.sodiem from dethisinh, cauhoi where cauhoi.macauhoi=dethisinh.macauhoi and sbd='".$r['sbd']."' and mamodun='M1' and temp=dethisinh.dapan and socau BETWEEN 1 and 10 order by socau");
				$sodiem=0;
				while ($rres=mysqli_fetch_array($res)) $sodiem+=$rres['sodiem'];
				$excel->getActiveSheet()->setCellValue("G".$icell, $sodiem);
				if ($sodiem==0) $t1=false;
				$tong+=$sodiem;
				// Điểm kiến thức BIDV
				$res=mysqli_query($connect, "select dethisinh.macauhoi, cauhoi.sodiem from dethisinh, cauhoi where cauhoi.macauhoi=dethisinh.macauhoi and sbd='".$r['sbd']."' and mamodun='M1' and temp=dethisinh.dapan and socau BETWEEN 11 and 20 order by socau");
				$sodiem=0;
				while ($rres=mysqli_fetch_array($res)) $sodiem+=$rres['sodiem'];
				$excel->getActiveSheet()->setCellValue("H".$icell, $sodiem);
				if ($sodiem==0) $t2=false;
				$tong+=$sodiem;
				// Điểm TAH
				$res=mysqli_query($connect, "select dethisinh.macauhoi, cauhoi.sodiem from dethisinh, cauhoi where cauhoi.macauhoi=dethisinh.macauhoi and sbd='".$r['sbd']."' and mamodun='M1' and temp=dethisinh.dapan and socau BETWEEN 21 and 30 order by socau");
				$sodiem=0;
				while ($rres=mysqli_fetch_array($res)) $sodiem+=$rres['sodiem'];
				$excel->getActiveSheet()->setCellValue("I".$icell, $sodiem);
				if ($sodiem<6) $t3=false;
				$tong+=$sodiem;
				// Điểm HDKC
				$res=mysqli_query($connect, "select dethisinh.macauhoi, cauhoi.sodiem from dethisinh, cauhoi where cauhoi.macauhoi=dethisinh.macauhoi and sbd='".$r['sbd']."' and mamodun='M1' and temp=dethisinh.dapan and socau BETWEEN 31 and 40 order by socau");
				$sodiem=0;
				while ($rres=mysqli_fetch_array($res)) $sodiem+=$rres['sodiem'];
				$excel->getActiveSheet()->setCellValue("J".$icell, $sodiem);
				if ($sodiem<6) $t4=false;
				$tong+=$sodiem;
				// Điểm làm việc nhóm
				$res=mysqli_query($connect, "select dethisinh.macauhoi, cauhoi.sodiem from dethisinh, cauhoi where cauhoi.macauhoi=dethisinh.macauhoi and sbd='".$r['sbd']."' and mamodun='M1' and temp=dethisinh.dapan and socau BETWEEN 41 and 50 order by socau");
				$sodiem=0;
				while ($rres=mysqli_fetch_array($res)) $sodiem+=$rres['sodiem'];
				$excel->getActiveSheet()->setCellValue("K".$icell, $sodiem);
				if ($sodiem<6) $t5=false;
				$tong+=$sodiem;
				// Điểm lập kế hoạch
				$res=mysqli_query($connect, "select dethisinh.macauhoi, cauhoi.sodiem from dethisinh, cauhoi where cauhoi.macauhoi=dethisinh.macauhoi and sbd='".$r['sbd']."' and mamodun='M1' and temp=dethisinh.dapan and socau BETWEEN 51 and 60 order by socau");
				$sodiem=0;
				while ($rres=mysqli_fetch_array($res)) $sodiem+=$rres['sodiem'];
				$excel->getActiveSheet()->setCellValue("L".$icell, $sodiem);
				if ($sodiem<6) $t6=false;
				$tong+=$sodiem;
				$excel->getActiveSheet()->setCellValue("M".$icell, $tong);

				if ($t1 && $t2 && $t3 && $t4 && $t5 && $t6 && $tong>59) {
					$excel->getActiveSheet()->setCellValue("N".$icell, "ĐẠT");
					$dat_ac++;
				} else {
					$excel->getActiveSheet()->setCellValue("N".$icell, "KHÔNG ĐẠT");
					$nodat_ac++;
				}
			} else if ($r['ghichu']=='Quy hoạch Trưởng phòng') {
				// Điểm kiến thức quản lý
				$res=mysqli_query($connect, "select dethisinh.macauhoi, cauhoi.sodiem from dethisinh, cauhoi where cauhoi.macauhoi=dethisinh.macauhoi and sbd='".$r['sbd']."' and mamodun='M2' and temp=dethisinh.dapan and socau BETWEEN 1 and 10 order by socau");
				$sodiem=0;
				while ($rres=mysqli_fetch_array($res)) $sodiem+=$rres['sodiem'];
				$excel->getActiveSheet()->setCellValue("G".$icell, $sodiem);
				if ($sodiem==0) $t1=false;
				$tong+=$sodiem;
				// Điểm kiến thức BIDV
				$res=mysqli_query($connect, "select dethisinh.macauhoi, cauhoi.sodiem from dethisinh, cauhoi where cauhoi.macauhoi=dethisinh.macauhoi and sbd='".$r['sbd']."' and mamodun='M2' and temp=dethisinh.dapan and socau BETWEEN 11 and 20 order by socau");
				$sodiem=0;
				while ($rres=mysqli_fetch_array($res)) $sodiem+=$rres['sodiem'];
				$excel->getActiveSheet()->setCellValue("H".$icell, $sodiem);
				if ($sodiem==0) $t2=false;
				$tong+=$sodiem;
				// Điểm TAH
				$res=mysqli_query($connect, "select dethisinh.macauhoi, cauhoi.sodiem from dethisinh, cauhoi where cauhoi.macauhoi=dethisinh.macauhoi and sbd='".$r['sbd']."' and mamodun='M2' and temp=dethisinh.dapan and socau BETWEEN 21 and 30 order by socau");
				$sodiem=0;
				while ($rres=mysqli_fetch_array($res)) $sodiem+=$rres['sodiem'];
				$excel->getActiveSheet()->setCellValue("I".$icell, $sodiem);
				if ($sodiem<6) $t3=false;
				$tong+=$sodiem;
				// Điểm HDKC
				$res=mysqli_query($connect, "select dethisinh.macauhoi, cauhoi.sodiem from dethisinh, cauhoi where cauhoi.macauhoi=dethisinh.macauhoi and sbd='".$r['sbd']."' and mamodun='M2' and temp=dethisinh.dapan and socau BETWEEN 31 and 40 order by socau");
				$sodiem=0;
				while ($rres=mysqli_fetch_array($res)) $sodiem+=$rres['sodiem'];
				$excel->getActiveSheet()->setCellValue("J".$icell, $sodiem);
				if ($sodiem<6) $t4=false;
				$tong+=$sodiem;
				// Điểm làm việc nhóm
				$res=mysqli_query($connect, "select dethisinh.macauhoi, cauhoi.sodiem from dethisinh, cauhoi where cauhoi.macauhoi=dethisinh.macauhoi and sbd='".$r['sbd']."' and mamodun='M2' and temp=dethisinh.dapan and socau BETWEEN 41 and 50 order by socau");
				$sodiem=0;
				while ($rres=mysqli_fetch_array($res)) $sodiem+=$rres['sodiem'];
				$excel->getActiveSheet()->setCellValue("K".$icell, $sodiem);
				if ($sodiem<6) $t5=false;
				$tong+=$sodiem;
				// Điểm lập kế hoạch
				$res=mysqli_query($connect, "select dethisinh.macauhoi, cauhoi.sodiem from dethisinh, cauhoi where cauhoi.macauhoi=dethisinh.macauhoi and sbd='".$r['sbd']."' and mamodun='M2' and temp=dethisinh.dapan and socau BETWEEN 51 and 60 order by socau");
				$sodiem=0;
				while ($rres=mysqli_fetch_array($res)) $sodiem+=$rres['sodiem'];
				$excel->getActiveSheet()->setCellValue("L".$icell, $sodiem);
				if ($sodiem<6) $t6=false;
				$tong+=$sodiem;
				$excel->getActiveSheet()->setCellValue("M".$icell, $tong);

				if ($t1 && $t2 && $t3 && $t4 && $t5 && $t6 && $tong>59) {
					$excel->getActiveSheet()->setCellValue("N".$icell, "ĐẠT");
					$dat_ac++;
				} else {
					$excel->getActiveSheet()->setCellValue("N".$icell, "KHÔNG ĐẠT");
					$nodat_ac++;
				}
			} else if ($r['ghichu']=='Bổ nhiệm lại Phó Trưởng phòng') {
				// Điểm kiến thức quản lý
				$res=mysqli_query($connect, "select dethisinh.macauhoi, cauhoi.sodiem from dethisinh, cauhoi where cauhoi.macauhoi=dethisinh.macauhoi and sbd='".$r['sbd']."' and mamodun='M3' and temp=dethisinh.dapan and socau BETWEEN 1 and 10 order by socau");
				$sodiem=0;
				while ($rres=mysqli_fetch_array($res)) $sodiem+=$rres['sodiem'];
				$excel->getActiveSheet()->setCellValue("G".$icell, $sodiem);
				if ($sodiem==0) $t1=false;
				$tong+=$sodiem;
				// Điểm kiến thức BIDV
				$res=mysqli_query($connect, "select dethisinh.macauhoi, cauhoi.sodiem from dethisinh, cauhoi where cauhoi.macauhoi=dethisinh.macauhoi and sbd='".$r['sbd']."' and mamodun='M3' and temp=dethisinh.dapan and socau BETWEEN 11 and 30 order by socau");
				$sodiem=0;
				while ($rres=mysqli_fetch_array($res)) $sodiem+=$rres['sodiem'];
				$excel->getActiveSheet()->setCellValue("H".$icell, $sodiem);
				if ($sodiem==0) $t2=false;
				$tong+=$sodiem;
				// Điểm TAH
				$res=mysqli_query($connect, "select dethisinh.macauhoi, cauhoi.sodiem from dethisinh, cauhoi where cauhoi.macauhoi=dethisinh.macauhoi and sbd='".$r['sbd']."' and mamodun='M3' and temp=dethisinh.dapan and socau BETWEEN 31 and 40 order by socau");
				$sodiem=0;
				while ($rres=mysqli_fetch_array($res)) $sodiem+=$rres['sodiem'];
				$excel->getActiveSheet()->setCellValue("I".$icell, $sodiem);
				if ($sodiem<8) $t3=false;
				$tong+=$sodiem;
				// Điểm HDKC
				$res=mysqli_query($connect, "select dethisinh.macauhoi, cauhoi.sodiem from dethisinh, cauhoi where cauhoi.macauhoi=dethisinh.macauhoi and sbd='".$r['sbd']."' and mamodun='M3' and temp=dethisinh.dapan and socau BETWEEN 41 and 50 order by socau");
				$sodiem=0;
				while ($rres=mysqli_fetch_array($res)) $sodiem+=$rres['sodiem'];
				$excel->getActiveSheet()->setCellValue("J".$icell, $sodiem);
				if ($sodiem<8) $t4=false;
				$tong+=$sodiem;
				// Điểm làm việc nhóm
				$res=mysqli_query($connect, "select dethisinh.macauhoi, cauhoi.sodiem from dethisinh, cauhoi where cauhoi.macauhoi=dethisinh.macauhoi and sbd='".$r['sbd']."' and mamodun='M3' and temp=dethisinh.dapan and socau BETWEEN 51 and 60 order by socau");
				$sodiem=0;
				while ($rres=mysqli_fetch_array($res)) $sodiem+=$rres['sodiem'];
				$excel->getActiveSheet()->setCellValue("K".$icell, $sodiem);
				if ($sodiem<8) $t5=false;
				$tong+=$sodiem;
				$excel->getActiveSheet()->setCellValue("M".$icell, $tong);

				if ($t1 && $t2 && $t3 && $t4 && $t5 && $tong>59) {
					$excel->getActiveSheet()->setCellValue("N".$icell, "ĐẠT");
					$dat_ac++;
				} else {
					$excel->getActiveSheet()->setCellValue("N".$icell, "KHÔNG ĐẠT");
					$nodat_ac++;
				}
			} else if ($r['ghichu']=='Quy hoạch Phó Trưởng phòng') {
				// Điểm kiến thức quản lý
				$res=mysqli_query($connect, "select dethisinh.macauhoi, cauhoi.sodiem from dethisinh, cauhoi where cauhoi.macauhoi=dethisinh.macauhoi and sbd='".$r['sbd']."' and mamodun='M4' and temp=dethisinh.dapan and socau BETWEEN 1 and 10 order by socau");			
				$sodiem=0;
				while ($rres=mysqli_fetch_array($res)) $sodiem+=$rres['sodiem'];
				$excel->getActiveSheet()->setCellValue("G".$icell, $sodiem);
				if ($sodiem==0) $t1=false;
				$tong+=$sodiem;
				// Điểm kiến thức BIDV
				$res=mysqli_query($connect, "select dethisinh.macauhoi, cauhoi.sodiem from dethisinh, cauhoi where cauhoi.macauhoi=dethisinh.macauhoi and sbd='".$r['sbd']."' and mamodun='M4' and temp=dethisinh.dapan and socau BETWEEN 11 and 30 order by socau");
				$sodiem=0;
				while ($rres=mysqli_fetch_array($res)) $sodiem+=$rres['sodiem'];
				$excel->getActiveSheet()->setCellValue("H".$icell, $sodiem);
				if ($sodiem==0) $t2=false;
				$tong+=$sodiem;
				// Điểm TAH
				$res=mysqli_query($connect, "select dethisinh.macauhoi, cauhoi.sodiem from dethisinh, cauhoi where cauhoi.macauhoi=dethisinh.macauhoi and sbd='".$r['sbd']."' and mamodun='M4' and temp=dethisinh.dapan and socau BETWEEN 31 and 40 order by socau");
				$sodiem=0;
				while ($rres=mysqli_fetch_array($res)) $sodiem+=$rres['sodiem'];
				$excel->getActiveSheet()->setCellValue("I".$icell, $sodiem);
				if ($sodiem<8) $t3=false;
				$tong+=$sodiem;
				// Điểm HDKC
				$res=mysqli_query($connect, "select dethisinh.macauhoi, cauhoi.sodiem from dethisinh, cauhoi where cauhoi.macauhoi=dethisinh.macauhoi and sbd='".$r['sbd']."' and mamodun='M4' and temp=dethisinh.dapan and socau BETWEEN 41 and 50 order by socau");
				$sodiem=0;
				while ($rres=mysqli_fetch_array($res)) $sodiem+=$rres['sodiem'];
				$excel->getActiveSheet()->setCellValue("J".$icell, $sodiem);
				if ($sodiem<8) $t4=false;
				$tong+=$sodiem;
				// Điểm làm việc nhóm
				$res=mysqli_query($connect, "select dethisinh.macauhoi, cauhoi.sodiem from dethisinh, cauhoi where cauhoi.macauhoi=dethisinh.macauhoi and sbd='".$r['sbd']."' and mamodun='M4' and temp=dethisinh.dapan and socau BETWEEN 51 and 60 order by socau");
				$sodiem=0;
				while ($rres=mysqli_fetch_array($res)) $sodiem+=$rres['sodiem'];
				$excel->getActiveSheet()->setCellValue("K".$icell, $sodiem);
				if ($sodiem<8) $t5=false;
				$tong+=$sodiem;
				$excel->getActiveSheet()->setCellValue("M".$icell, $tong);

				if ($t1 && $t2 && $t3 && $t4 && $t5 && $tong>59) {
					$excel->getActiveSheet()->setCellValue("N".$icell, "ĐẠT");
					$dat_ac++;
				} else {
					$excel->getActiveSheet()->setCellValue("N".$icell, "KHÔNG ĐẠT");
					$nodat_ac++;
				}
			}
		}
		$icell++;
		
	}
	$excel->getActiveSheet()->setCellValue("N".$icell, "ĐẠT: ".$dat_ac);
	$excel->getActiveSheet()->setCellValue("N".($icell+1), "KHÔNG ĐẠT: ".$nodat_ac);
	
	header("Content-Type: application/vnd.ms-excel");
	header("Content-Disposition: attachment; filename='Thong-ke-chi-tiet.xlsx");
	header("Cache-Control: max-age=0");
	include("PHPExcel/IOFactory.php");
	$write=PHPExcel_IOFactory::createWriter($excel,"Excel2007");
	ob_clean();
	flush(); 
	$write->save("php://output");
?>