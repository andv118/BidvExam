<?php
	session_start();
	if (!isset($_SESSION['admin'])) echo "<script>window.location='index.php'</script>";
	if (isset($_GET['kythi'])){
		include("../config.php");
		mysqli_set_charset($connect,'utf8');
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		require_once("PHPExcel.php");
		$excel= new PHPExcel();
		$excel->getActiveSheet();
		$excel->getActiveSheet()->getColumnDimension("A")->setWidth(4);
		$excel->getActiveSheet()->getColumnDimension("B")->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension("C")->setWidth(8);
		$excel->getActiveSheet()->getColumnDimension("D")->setWidth(28);
		$excel->getActiveSheet()->getColumnDimension("E")->setWidth(10);
		$excel->getActiveSheet()->getColumnDimension("F")->setWidth(12);
		$excel->getActiveSheet()->getColumnDimension("G")->setWidth(12);
		$excel->getActiveSheet()->getColumnDimension("H")->setWidth(12);
		$excel->getActiveSheet()->getColumnDimension("I")->setWidth(12);
		$excel->getActiveSheet()->getColumnDimension("J")->setWidth(12);
		$excel->getActiveSheet()->getColumnDimension("K")->setWidth(12);
		$excel->getActiveSheet()->getColumnDimension("L")->setWidth(12);
		$excel->getActiveSheet()->setCellValue("A1","STT");
		$excel->getActiveSheet()->setCellValue("B1","MÃ CÂU HỎI");
		$excel->getActiveSheet()->setCellValue("C1","ĐÁP ÁN");
		$excel->getActiveSheet()->setCellValue("D1","LOẠI ĐỀ");
		$excel->getActiveSheet()->setCellValue("E1","TỔNG TS");
		$excel->getActiveSheet()->setCellValue("F1","TRẢ LỜI A");
		$excel->getActiveSheet()->setCellValue("G1","TRẢ LỜI B");
		$excel->getActiveSheet()->setCellValue("H1","TRẢ LỜI C");
		$excel->getActiveSheet()->setCellValue("I1","TRẢ LỜI D");
		$excel->getActiveSheet()->setCellValue("J1","TRẢ LỜI E");
		$excel->getActiveSheet()->setCellValue("K1","TRẢ LỜI F");
		$excel->getActiveSheet()->setCellValue("L1","KHÔNG TRẢ LỜI");

		$border=array(
			'borders'=>array(
				'allborders'=>array(
					'style'=>PHPExcel_Style_Border::BORDER_THIN
				)
			)
		);

		$monthi=mysqli_query($connect, "select mamodun, tenmodun from modun where makythi='".$_GET['kythi']."'");
		// echo mysqli_num_rows($monthi);
		$ceil=2;
		while ($r=mysqli_fetch_array($monthi, MYSQLI_ASSOC)) {
		// 	// Lấy danh sách câu hỏi của mỗi bộ đề
			// echo "a"."<br>";
			$cauhoi=mysqli_query($connect, "select macauhoi, dapan from bode, cauhoi where bode.mabode=cauhoi.mabode and bode.mamodun='".$r['mamodun']."'");
			while ($rcauhoi=mysqli_fetch_array($cauhoi, MYSQLI_ASSOC)) {
				// Tổng số thí sinh trả lời câu hỏi hiện tại
				$sumts=mysqli_query($connect, "select count(sbd) as tong from dethisinh where macauhoi='".$rcauhoi['macauhoi']."'");
				$rsum1=mysqli_fetch_array($sumts);
				if ($rsum1['tong']>0) {
					// Số thí sinh trả lời A
					$sumts1=mysqli_query($connect, "select count(sbd) as tong1 from dethisinh where macauhoi='".$rcauhoi['macauhoi']."' and temp='A'");
					$rsum11=mysqli_fetch_array($sumts1);
					// Số thí sinh trả lời B
					$sumts2=mysqli_query($connect, "select count(sbd) as tong2 from dethisinh where macauhoi='".$rcauhoi['macauhoi']."' and temp='B'");
					$rsum12=mysqli_fetch_array($sumts2);
					// Số thí sinh trả lời C
					$sumts3=mysqli_query($connect, "select count(sbd) as tong3 from dethisinh where macauhoi='".$rcauhoi['macauhoi']."' and temp='C'");
					$rsum13=mysqli_fetch_array($sumts3);
					// Số thí sinh trả lời D
					$sumts4=mysqli_query($connect, "select count(sbd) as tong4 from dethisinh where macauhoi='".$rcauhoi['macauhoi']."' and temp='D'");
					$rsum14=mysqli_fetch_array($sumts4);
					// Số thí sinh trả lời E
					$sumts5=mysqli_query($connect, "select count(sbd) as tong5 from dethisinh where macauhoi='".$rcauhoi['macauhoi']."' and temp='E'");
					$rsum15=mysqli_fetch_array($sumts5);
					// Số thí sinh trả lời F
					$sumts6=mysqli_query($connect, "select count(sbd) as tong6 from dethisinh where macauhoi='".$rcauhoi['macauhoi']."' and temp='F'");
					$rsum16=mysqli_fetch_array($sumts6);
					// Số thí sinh không trả lời
					$sumts7=mysqli_query($connect, "select count(sbd) as tong7 from dethisinh where macauhoi='".$rcauhoi['macauhoi']."' and temp IS NULL");
					$rsum17=mysqli_fetch_array($sumts7);

					$excel->getActiveSheet()->setCellValue("A".$ceil, ($ceil-1));
					$excel->getActiveSheet()->setCellValue("B".$ceil, $rcauhoi['macauhoi']);
					$excel->getActiveSheet()->setCellValue("C".$ceil, $rcauhoi['dapan']);
					$excel->getActiveSheet()->setCellValue("D".$ceil, $r['tenmodun']);
					$excel->getActiveSheet()->setCellValue("E".$ceil, $rsum1['tong']);
					$t1=round(($rsum11['tong1']*100)/$rsum1['tong'], 2);
					$t2=round(($rsum12['tong2']*100)/$rsum1['tong'], 2);
					$t3=round(($rsum13['tong3']*100)/$rsum1['tong'], 2);
					$t4=round(($rsum14['tong4']*100)/$rsum1['tong'], 2);
					$t5=round(($rsum15['tong5']*100)/$rsum1['tong'], 2);
					$t6=round(($rsum16['tong6']*100)/$rsum1['tong'], 2);
					$t7=round(($rsum17['tong7']*100)/$rsum1['tong'], 2);
					$excel->getActiveSheet()->setCellValue("F".$ceil, $rsum11['tong1']." - ".$t1."%");
					$excel->getActiveSheet()->setCellValue("G".$ceil, $rsum12['tong2']." - ".$t2."%");
					$excel->getActiveSheet()->setCellValue("H".$ceil, $rsum13['tong3']." - ".$t3."%");
					$excel->getActiveSheet()->setCellValue("I".$ceil, $rsum14['tong4']." - ".$t4."%");
					$excel->getActiveSheet()->setCellValue("J".$ceil, $rsum15['tong5']." - ".$t5."%");
					$excel->getActiveSheet()->setCellValue("K".$ceil, $rsum16['tong6']." - ".$t6."%");
					$excel->getActiveSheet()->setCellValue("L".$ceil, $rsum17['tong7']." - ".$t7."%");
				}
				$ceil++;
			}
		}
		
		header("Content-Type: application/vnd.ms-excel");
		header("Content-Disposition: attachment; filename='Bao cao thong ke cau hoi.xlsx'");
		header("Cache-Control: max-age=0");
		include("PHPExcel/IOFactory.php");
		$write=PHPExcel_IOFactory::createWriter($excel,"Excel2007");
		ob_clean();
		flush(); 
		$write->save("php://output");
	}
	else die("Chưa chọn kỳ thi");
?>