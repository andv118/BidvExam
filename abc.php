$cathi=mysqli_query($connect, "select cathi.macathi, cathi.tencathi from kythi, cathi where kythi.makythi=cathi.makythi and kythi.makythi='".$_GET['kythi']."'");
		$row=2;
		$a1=array();
		$a2=array();
		$a3=array();
		$a4=array();

		$m1=mysqli_query($connect, "select macauhoi from cauhoi, bode where bode.mabode=cauhoi.mabode and bode.mamodun='M1'");
		while ($rm1=mysqli_fetch_array($m1, MYSQLI_ASSOC)){
			array_push($a1, $rm1['macauhoi']);
		}
		
		$m2=mysqli_query($connect, "select macauhoi from cauhoi, bode where bode.mabode=cauhoi.mabode and bode.mamodun='M2'");
		while ($rm2=mysqli_fetch_array($m2, MYSQLI_ASSOC)){
			array_push($a2, $rm2['macauhoi']);
		}

		$m3=mysqli_query($connect, "select macauhoi from cauhoi, bode where bode.mabode=cauhoi.mabode and bode.mamodun='M3'");
		while ($rm3=mysqli_fetch_array($m3, MYSQLI_ASSOC)){
			array_push($a3, $rm3['macauhoi']);
		}

		$m4=mysqli_query($connect, "select macauhoi from cauhoi, bode where bode.mabode=cauhoi.mabode and bode.mamodun='M4'");
		while ($rm4=mysqli_fetch_array($m4, MYSQLI_ASSOC)){
			array_push($a4, $rm4['macauhoi']);
		}

		// echo "<pre>";
		// print_r($a1);
		// echo "</pre>";
		// echo "<pre>";
		// print_r($a2);
		// echo "</pre>";
		// echo "<pre>";
		// print_r($a3);
		// echo "</pre>";
		// echo "<pre>";
		// print_r($a4);
		// echo "</pre>";
		while ($res=mysqli_fetch_array($cathi, MYSQLI_ASSOC)){
			$hocvien = mysqli_query($connect,"select hocvien.sbd, hocvien.hoten, hocvien.ngaysinh, phongthi.ghichu from cathi, phongthi, hocvien where cathi.macathi=phongthi.macathi and phongthi.mapt=hocvien.mapt and cathi.macathi='".$res['macathi']."'");
			while ($rh=mysqli_fetch_array($hocvien, MYSQLI_ASSOC)){
				$excel->getActiveSheet()->setCellValue("A".$row, $rh['hoten']);
				$excel->getActiveSheet()->setCellValue("B".$row, $rh['sbd']);
				$excel->getActiveSheet()->setCellValue("C".$row, "");
				$excel->getActiveSheet()->setCellValue("D".$row, "");
				$excel->getActiveSheet()->setCellValue("E".$row, $rh['ghichu']);
				$excel->getActiveSheet()->setCellValue("F".$row, "");
				$excel->getActiveSheet()->setCellValue("G".$row, $rh['ngaysinh']);
				$aa1=array();
				if ($rh['ghichu']=='Bổ nhiệm lại Trưởng phòng'){
					for ($i=0; $i<count($a1); $i++){
						$my=mysqli_query($connect, "select dethisinh.temp from dethisinh where sbd='".$rh['sbd']."' and macauhoi='".$a1[$i]."'");
						$rmy=mysqli_fetch_array($my, MYSQLI_ASSOC);
						array_push($aa1, $rmy['temp']);
					}
					$tmp=$aa1[1];
					for ($i1=1; $i1<=8; $i1++) $aa1[$i1]=$aa1[$i1+1];
					$aa1[9]=$tmp;
					$tmp=$aa1[11];
					for ($i1=11; $i1<=18; $i1++) $aa1[$i1]=$aa1[$i1+1];
					$aa1[19]=$tmp;

					$tmp=$aa1[21];
					for ($i1=21; $i1<=28; $i1++) $aa1[$i1]=$aa1[$i1+1];
					$aa1[29]=$tmp;

					$tmp=$aa1[31];
					for ($i1=31; $i1<=38; $i1++) $aa1[$i1]=$aa1[$i1+1];
					$aa1[39]=$tmp;

					$tmp=$aa1[41];
					for ($i1=41; $i1<=48; $i1++) $aa1[$i1]=$aa1[$i1+1];
					$aa1[49]=$tmp;

					$tmp=$aa1[51];
					for ($i1=51; $i1<=58; $i1++) $aa1[$i1]=$aa1[$i1+1];
					$aa1[59]=$tmp;

					$excel->getActiveSheet()->setCellValue("H".$row, $aa1[0]);
					$excel->getActiveSheet()->setCellValue("I".$row, $aa1[1]);
					$excel->getActiveSheet()->setCellValue("J".$row, $aa1[2]);
					$excel->getActiveSheet()->setCellValue("K".$row, $aa1[3]);
					$excel->getActiveSheet()->setCellValue("L".$row, $aa1[4]);
					$excel->getActiveSheet()->setCellValue("M".$row, $aa1[5]);
					$excel->getActiveSheet()->setCellValue("N".$row, $aa1[6]);
					$excel->getActiveSheet()->setCellValue("O".$row, $aa1[7]);
					$excel->getActiveSheet()->setCellValue("P".$row, $aa1[8]);
					$excel->getActiveSheet()->setCellValue("Q".$row, $aa1[9]);
					$excel->getActiveSheet()->setCellValue("R".$row, $aa1[10]);
					$excel->getActiveSheet()->setCellValue("S".$row, $aa1[11]);
					$excel->getActiveSheet()->setCellValue("T".$row, $aa1[12]);
					$excel->getActiveSheet()->setCellValue("U".$row, $aa1[13]);
					$excel->getActiveSheet()->setCellValue("V".$row, $aa1[14]);
					$excel->getActiveSheet()->setCellValue("W".$row, $aa1[15]);
					$excel->getActiveSheet()->setCellValue("X".$row, $aa1[16]);
					$excel->getActiveSheet()->setCellValue("Y".$row, $aa1[17]);
					$excel->getActiveSheet()->setCellValue("Z".$row, $aa1[18]);
					$excel->getActiveSheet()->setCellValue("AA".$row, $aa1[19]);
					$excel->getActiveSheet()->setCellValue("AB".$row, $aa1[20]);
					$excel->getActiveSheet()->setCellValue("AC".$row, $aa1[21]);
					$excel->getActiveSheet()->setCellValue("AD".$row, $aa1[22]);
					$excel->getActiveSheet()->setCellValue("AE".$row, $aa1[23]);
					$excel->getActiveSheet()->setCellValue("AF".$row, $aa1[24]);
					$excel->getActiveSheet()->setCellValue("AG".$row, $aa1[25]);
					$excel->getActiveSheet()->setCellValue("AH".$row, $aa1[26]);
					$excel->getActiveSheet()->setCellValue("AI".$row, $aa1[27]);
					$excel->getActiveSheet()->setCellValue("AJ".$row, $aa1[28]);
					$excel->getActiveSheet()->setCellValue("AK".$row, $aa1[29]);
					$excel->getActiveSheet()->setCellValue("AL".$row, $aa1[30]);
					$excel->getActiveSheet()->setCellValue("AM".$row, $aa1[31]);
					$excel->getActiveSheet()->setCellValue("AN".$row, $aa1[32]);
					$excel->getActiveSheet()->setCellValue("AO".$row, $aa1[33]);
					$excel->getActiveSheet()->setCellValue("AP".$row, $aa1[34]);
					$excel->getActiveSheet()->setCellValue("AQ".$row, $aa1[35]);
					$excel->getActiveSheet()->setCellValue("AR".$row, $aa1[36]);
					$excel->getActiveSheet()->setCellValue("AS".$row, $aa1[37]);
					$excel->getActiveSheet()->setCellValue("AT".$row, $aa1[38]);
					$excel->getActiveSheet()->setCellValue("AU".$row, $aa1[39]);
					$excel->getActiveSheet()->setCellValue("AV".$row, $aa1[40]);
					$excel->getActiveSheet()->setCellValue("AW".$row, $aa1[41]);
					$excel->getActiveSheet()->setCellValue("AX".$row, $aa1[42]);
					$excel->getActiveSheet()->setCellValue("AY".$row, $aa1[43]);
					$excel->getActiveSheet()->setCellValue("AZ".$row, $aa1[44]);
					$excel->getActiveSheet()->setCellValue("BA".$row, $aa1[45]);
					$excel->getActiveSheet()->setCellValue("BB".$row, $aa1[46]);
					$excel->getActiveSheet()->setCellValue("BC".$row, $aa1[47]);
					$excel->getActiveSheet()->setCellValue("BD".$row, $aa1[48]);
					$excel->getActiveSheet()->setCellValue("BE".$row, $aa1[49]);
					$excel->getActiveSheet()->setCellValue("BF".$row, $aa1[50]);
					$excel->getActiveSheet()->setCellValue("BG".$row, $aa1[51]);
					$excel->getActiveSheet()->setCellValue("BH".$row, $aa1[52]);
					$excel->getActiveSheet()->setCellValue("BI".$row, $aa1[53]);
					$excel->getActiveSheet()->setCellValue("BJ".$row, $aa1[54]);
					$excel->getActiveSheet()->setCellValue("BK".$row, $aa1[55]);
					$excel->getActiveSheet()->setCellValue("BL".$row, $aa1[56]);
					$excel->getActiveSheet()->setCellValue("BM".$row, $aa1[57]);
					$excel->getActiveSheet()->setCellValue("BN".$row, $aa1[58]);
					$excel->getActiveSheet()->setCellValue("BO".$row, $aa1[59]);
if ($rh['sbd']=='QL0731') {
					echo "<pre>";
					print_r($aa1);
					echo "</pre>";}
				} else if ($rh['ghichu']=='Quy hoạch Trưởng phòng'){
					for ($i=0; $i<count($a2); $i++){
						$my=mysqli_query($connect, "select dethisinh.temp from dethisinh where sbd='".$rh['sbd']."' and macauhoi='".$a2[$i]."'");
						$rmy=mysqli_fetch_array($my, MYSQLI_ASSOC);
						array_push($aa1, $rmy['temp']);
					}
					$tmp=$aa1[1];
					for ($i1=1; $i1<=8; $i1++) $aa1[$i1]=$aa1[$i1+1];
					$aa1[9]=$tmp;
					$tmp=$aa1[11];
					for ($i1=11; $i1<=18; $i1++) $aa1[$i1]=$aa1[$i1+1];
					$aa1[19]=$tmp;

					$tmp=$aa1[21];
					for ($i1=21; $i1<=28; $i1++) $aa1[$i1]=$aa1[$i1+1];
					$aa1[29]=$tmp;

					$tmp=$aa1[31];
					for ($i1=31; $i1<=38; $i1++) $aa1[$i1]=$aa1[$i1+1];
					$aa1[39]=$tmp;

					$tmp=$aa1[41];
					for ($i1=41; $i1<=48; $i1++) $aa1[$i1]=$aa1[$i1+1];
					$aa1[49]=$tmp;

					$tmp=$aa1[51];
					for ($i1=51; $i1<=58; $i1++) $aa1[$i1]=$aa1[$i1+1];
					$aa1[59]=$tmp;

					$excel->getActiveSheet()->setCellValue("H".$row, $aa1[0]);
					$excel->getActiveSheet()->setCellValue("I".$row, $aa1[1]);
					$excel->getActiveSheet()->setCellValue("J".$row, $aa1[2]);
					$excel->getActiveSheet()->setCellValue("K".$row, $aa1[3]);
					$excel->getActiveSheet()->setCellValue("L".$row, $aa1[4]);
					$excel->getActiveSheet()->setCellValue("M".$row, $aa1[5]);
					$excel->getActiveSheet()->setCellValue("N".$row, $aa1[6]);
					$excel->getActiveSheet()->setCellValue("O".$row, $aa1[7]);
					$excel->getActiveSheet()->setCellValue("P".$row, $aa1[8]);
					$excel->getActiveSheet()->setCellValue("Q".$row, $aa1[9]);
					$excel->getActiveSheet()->setCellValue("R".$row, $aa1[10]);
					$excel->getActiveSheet()->setCellValue("S".$row, $aa1[11]);
					$excel->getActiveSheet()->setCellValue("T".$row, $aa1[12]);
					$excel->getActiveSheet()->setCellValue("U".$row, $aa1[13]);
					$excel->getActiveSheet()->setCellValue("V".$row, $aa1[14]);
					$excel->getActiveSheet()->setCellValue("W".$row, $aa1[15]);
					$excel->getActiveSheet()->setCellValue("X".$row, $aa1[16]);
					$excel->getActiveSheet()->setCellValue("Y".$row, $aa1[17]);
					$excel->getActiveSheet()->setCellValue("Z".$row, $aa1[18]);
					$excel->getActiveSheet()->setCellValue("AA".$row, $aa1[19]);
					$excel->getActiveSheet()->setCellValue("AB".$row, $aa1[20]);
					$excel->getActiveSheet()->setCellValue("AC".$row, $aa1[21]);
					$excel->getActiveSheet()->setCellValue("AD".$row, $aa1[22]);
					$excel->getActiveSheet()->setCellValue("AE".$row, $aa1[23]);
					$excel->getActiveSheet()->setCellValue("AF".$row, $aa1[24]);
					$excel->getActiveSheet()->setCellValue("AG".$row, $aa1[25]);
					$excel->getActiveSheet()->setCellValue("AH".$row, $aa1[26]);
					$excel->getActiveSheet()->setCellValue("AI".$row, $aa1[27]);
					$excel->getActiveSheet()->setCellValue("AJ".$row, $aa1[28]);
					$excel->getActiveSheet()->setCellValue("AK".$row, $aa1[29]);
					$excel->getActiveSheet()->setCellValue("AL".$row, $aa1[30]);
					$excel->getActiveSheet()->setCellValue("AM".$row, $aa1[31]);
					$excel->getActiveSheet()->setCellValue("AN".$row, $aa1[32]);
					$excel->getActiveSheet()->setCellValue("AO".$row, $aa1[33]);
					$excel->getActiveSheet()->setCellValue("AP".$row, $aa1[34]);
					$excel->getActiveSheet()->setCellValue("AQ".$row, $aa1[35]);
					$excel->getActiveSheet()->setCellValue("AR".$row, $aa1[36]);
					$excel->getActiveSheet()->setCellValue("AS".$row, $aa1[37]);
					$excel->getActiveSheet()->setCellValue("AT".$row, $aa1[38]);
					$excel->getActiveSheet()->setCellValue("AU".$row, $aa1[39]);
					$excel->getActiveSheet()->setCellValue("AV".$row, $aa1[40]);
					$excel->getActiveSheet()->setCellValue("AW".$row, $aa1[41]);
					$excel->getActiveSheet()->setCellValue("AX".$row, $aa1[42]);
					$excel->getActiveSheet()->setCellValue("AY".$row, $aa1[43]);
					$excel->getActiveSheet()->setCellValue("AZ".$row, $aa1[44]);
					$excel->getActiveSheet()->setCellValue("BA".$row, $aa1[45]);
					$excel->getActiveSheet()->setCellValue("BB".$row, $aa1[46]);
					$excel->getActiveSheet()->setCellValue("BC".$row, $aa1[47]);
					$excel->getActiveSheet()->setCellValue("BD".$row, $aa1[48]);
					$excel->getActiveSheet()->setCellValue("BE".$row, $aa1[49]);
					$excel->getActiveSheet()->setCellValue("BF".$row, $aa1[50]);
					$excel->getActiveSheet()->setCellValue("BG".$row, $aa1[51]);
					$excel->getActiveSheet()->setCellValue("BH".$row, $aa1[52]);
					$excel->getActiveSheet()->setCellValue("BI".$row, $aa1[53]);
					$excel->getActiveSheet()->setCellValue("BJ".$row, $aa1[54]);
					$excel->getActiveSheet()->setCellValue("BK".$row, $aa1[55]);
					$excel->getActiveSheet()->setCellValue("BL".$row, $aa1[56]);
					$excel->getActiveSheet()->setCellValue("BM".$row, $aa1[57]);
					$excel->getActiveSheet()->setCellValue("BN".$row, $aa1[58]);
					$excel->getActiveSheet()->setCellValue("BO".$row, $aa1[59]);
 
					// echo "<pre>";
					// print_r($aa1);
					// echo "</pre>";
				} else if (trim($rh['ghichu'])=='Bổ nhiệm lại Phó Trưởng phòng'){
					for ($i=0; $i<count($a3); $i++){
						$my=mysqli_query($connect, "select dethisinh.temp from dethisinh where sbd='".$rh['sbd']."' and macauhoi='".$a3[$i]."'");
						$rmy=mysqli_fetch_array($my, MYSQLI_ASSOC);
						array_push($aa1, $rmy['temp']);
					}
					$tmp=$aa1[1];
					for ($i1=1; $i1<=8; $i1++) $aa1[$i1]=$aa1[$i1+1];
					$aa1[9]=$tmp;
					
					$tmp=$aa1[11]; $aa1[11]=$aa1[21]; $aa1[21]=$tmp;
					$tmp=$aa1[12]; $aa1[12]=$aa1[23]; $aa1[23]=$tmp;
					$tmp=$aa1[13]; $aa1[13]=$aa1[24]; $aa1[24]=$tmp;
					$tmp=$aa1[14]; $aa1[14]=$aa1[25]; $aa1[25]=$tmp;
					$tmp=$aa1[15]; $aa1[15]=$aa1[26]; $aa1[26]=$tmp;
					$tmp=$aa1[16]; $aa1[16]=$aa1[27]; $aa1[27]=$tmp;
					$tmp=$aa1[17]; $aa1[17]=$aa1[28]; $aa1[28]=$tmp;
					$tmp=$aa1[18]; $aa1[18]=$aa1[29]; $aa1[29]=$tmp;
					$tmp=$aa1[19]; $aa1[19]=$aa1[21]; $aa1[21]=$tmp;
					$tmp=$aa1[20]; $aa1[20]=$aa1[23]; $aa1[23]=$tmp;
					$tmp=$aa1[21]; $aa1[21]=$aa1[24]; $aa1[24]=$tmp;
					$tmp=$aa1[22]; $aa1[22]=$aa1[25]; $aa1[25]=$tmp;
					$tmp=$aa1[23]; $aa1[23]=$aa1[26]; $aa1[26]=$tmp;
					$tmp=$aa1[24]; $aa1[24]=$aa1[27]; $aa1[27]=$tmp;
					$tmp=$aa1[25]; $aa1[25]=$aa1[28]; $aa1[28]=$tmp;
					$tmp=$aa1[26]; $aa1[26]=$aa1[29]; $aa1[29]=$tmp;
					$tmp=$aa1[28]; $aa1[28]=$aa1[29]; $aa1[29]=$tmp;
					// 

					$tmp=$aa1[31];
					for ($i1=31; $i1<=38; $i1++) $aa1[$i1]=$aa1[$i1+1];
					$aa1[39]=$tmp;

					$tmp=$aa1[41];
					for ($i1=41; $i1<=48; $i1++) $aa1[$i1]=$aa1[$i1+1];
					$aa1[49]=$tmp;

					$tmp=$aa1[51];
					for ($i1=51; $i1<=58; $i1++) $aa1[$i1]=$aa1[$i1+1];
					$aa1[59]=$tmp;

					$excel->getActiveSheet()->setCellValue("H".$row, $aa1[0]);
					$excel->getActiveSheet()->setCellValue("I".$row, $aa1[1]);
					$excel->getActiveSheet()->setCellValue("J".$row, $aa1[2]);
					$excel->getActiveSheet()->setCellValue("K".$row, $aa1[3]);
					$excel->getActiveSheet()->setCellValue("L".$row, $aa1[4]);
					$excel->getActiveSheet()->setCellValue("M".$row, $aa1[5]);
					$excel->getActiveSheet()->setCellValue("N".$row, $aa1[6]);
					$excel->getActiveSheet()->setCellValue("O".$row, $aa1[7]);
					$excel->getActiveSheet()->setCellValue("P".$row, $aa1[8]);
					$excel->getActiveSheet()->setCellValue("Q".$row, $aa1[9]);
					$excel->getActiveSheet()->setCellValue("R".$row, $aa1[10]);
					$excel->getActiveSheet()->setCellValue("S".$row, $aa1[11]);
					$excel->getActiveSheet()->setCellValue("T".$row, $aa1[12]);
					$excel->getActiveSheet()->setCellValue("U".$row, $aa1[13]);
					$excel->getActiveSheet()->setCellValue("V".$row, $aa1[14]);
					$excel->getActiveSheet()->setCellValue("W".$row, $aa1[15]);
					$excel->getActiveSheet()->setCellValue("X".$row, $aa1[16]);
					$excel->getActiveSheet()->setCellValue("Y".$row, $aa1[17]);
					$excel->getActiveSheet()->setCellValue("Z".$row, $aa1[18]);
					$excel->getActiveSheet()->setCellValue("AA".$row, $aa1[19]);
					$excel->getActiveSheet()->setCellValue("AB".$row, $aa1[20]);
					$excel->getActiveSheet()->setCellValue("AC".$row, $aa1[21]);
					$excel->getActiveSheet()->setCellValue("AD".$row, $aa1[22]);
					$excel->getActiveSheet()->setCellValue("AE".$row, $aa1[23]);
					$excel->getActiveSheet()->setCellValue("AF".$row, $aa1[24]);
					$excel->getActiveSheet()->setCellValue("AG".$row, $aa1[25]);
					$excel->getActiveSheet()->setCellValue("AH".$row, $aa1[26]);
					$excel->getActiveSheet()->setCellValue("AI".$row, $aa1[27]);
					$excel->getActiveSheet()->setCellValue("AJ".$row, $aa1[28]);
					$excel->getActiveSheet()->setCellValue("AK".$row, $aa1[29]);
					$excel->getActiveSheet()->setCellValue("AL".$row, $aa1[30]);
					$excel->getActiveSheet()->setCellValue("AM".$row, $aa1[31]);
					$excel->getActiveSheet()->setCellValue("AN".$row, $aa1[32]);
					$excel->getActiveSheet()->setCellValue("AO".$row, $aa1[33]);
					$excel->getActiveSheet()->setCellValue("AP".$row, $aa1[34]);
					$excel->getActiveSheet()->setCellValue("AQ".$row, $aa1[35]);
					$excel->getActiveSheet()->setCellValue("AR".$row, $aa1[36]);
					$excel->getActiveSheet()->setCellValue("AS".$row, $aa1[37]);
					$excel->getActiveSheet()->setCellValue("AT".$row, $aa1[38]);
					$excel->getActiveSheet()->setCellValue("AU".$row, $aa1[39]);
					$excel->getActiveSheet()->setCellValue("AV".$row, $aa1[40]);
					$excel->getActiveSheet()->setCellValue("AW".$row, $aa1[41]);
					$excel->getActiveSheet()->setCellValue("AX".$row, $aa1[42]);
					$excel->getActiveSheet()->setCellValue("AY".$row, $aa1[43]);
					$excel->getActiveSheet()->setCellValue("AZ".$row, $aa1[44]);
					$excel->getActiveSheet()->setCellValue("BA".$row, $aa1[45]);
					$excel->getActiveSheet()->setCellValue("BB".$row, $aa1[46]);
					$excel->getActiveSheet()->setCellValue("BC".$row, $aa1[47]);
					$excel->getActiveSheet()->setCellValue("BD".$row, $aa1[48]);
					$excel->getActiveSheet()->setCellValue("BE".$row, $aa1[49]);
					$excel->getActiveSheet()->setCellValue("BF".$row, $aa1[50]);
					$excel->getActiveSheet()->setCellValue("BG".$row, $aa1[51]);
					$excel->getActiveSheet()->setCellValue("BH".$row, $aa1[52]);
					$excel->getActiveSheet()->setCellValue("BI".$row, $aa1[53]);
					$excel->getActiveSheet()->setCellValue("BJ".$row, $aa1[54]);
					$excel->getActiveSheet()->setCellValue("BK".$row, $aa1[55]);
					$excel->getActiveSheet()->setCellValue("BL".$row, $aa1[56]);
					$excel->getActiveSheet()->setCellValue("BM".$row, $aa1[57]);
					$excel->getActiveSheet()->setCellValue("BN".$row, $aa1[58]);
					$excel->getActiveSheet()->setCellValue("BO".$row, $aa1[59]);

					// echo "<pre>";
					// print_r($aa1);
					// echo "</pre>";
				} else if (trim($rh['ghichu'])=='Quy hoạch Phó Trưởng phòng'){
					for ($i=0; $i<count($a4); $i++){
						$my=mysqli_query($connect, "select dethisinh.temp from dethisinh where sbd='".$rh['sbd']."' and macauhoi='".$a4[$i]."'");
						$rmy=mysqli_fetch_array($my, MYSQLI_ASSOC);
						array_push($aa1, $rmy['temp']);
					}
					$tmp=$aa1[1];
					for ($i1=1; $i1<=8; $i1++) $aa1[$i1]=$aa1[$i1+1];
					$aa1[9]=$tmp;
					
					$tmp=$aa1[11]; $aa1[11]=$aa1[21]; $aa1[21]=$tmp;
					$tmp=$aa1[12]; $aa1[12]=$aa1[23]; $aa1[23]=$tmp;
					$tmp=$aa1[13]; $aa1[13]=$aa1[24]; $aa1[24]=$tmp;
					$tmp=$aa1[14]; $aa1[14]=$aa1[25]; $aa1[25]=$tmp;
					$tmp=$aa1[15]; $aa1[15]=$aa1[26]; $aa1[26]=$tmp;
					$tmp=$aa1[16]; $aa1[16]=$aa1[27]; $aa1[27]=$tmp;
					$tmp=$aa1[17]; $aa1[17]=$aa1[28]; $aa1[28]=$tmp;
					$tmp=$aa1[18]; $aa1[18]=$aa1[29]; $aa1[29]=$tmp;
					$tmp=$aa1[19]; $aa1[19]=$aa1[21]; $aa1[21]=$tmp;
					$tmp=$aa1[20]; $aa1[20]=$aa1[23]; $aa1[23]=$tmp;
					$tmp=$aa1[21]; $aa1[21]=$aa1[24]; $aa1[24]=$tmp;
					$tmp=$aa1[22]; $aa1[22]=$aa1[25]; $aa1[25]=$tmp;
					$tmp=$aa1[23]; $aa1[23]=$aa1[26]; $aa1[26]=$tmp;
					$tmp=$aa1[24]; $aa1[24]=$aa1[27]; $aa1[27]=$tmp;
					$tmp=$aa1[25]; $aa1[25]=$aa1[28]; $aa1[28]=$tmp;
					$tmp=$aa1[26]; $aa1[26]=$aa1[29]; $aa1[29]=$tmp;
					$tmp=$aa1[28]; $aa1[28]=$aa1[29]; $aa1[29]=$tmp;
					// 

					$tmp=$aa1[31];
					for ($i1=31; $i1<=38; $i1++) $aa1[$i1]=$aa1[$i1+1];
					$aa1[39]=$tmp;

					$tmp=$aa1[41];
					for ($i1=41; $i1<=48; $i1++) $aa1[$i1]=$aa1[$i1+1];
					$aa1[49]=$tmp;

					$tmp=$aa1[51];
					for ($i1=51; $i1<=58; $i1++) $aa1[$i1]=$aa1[$i1+1];
					$aa1[59]=$tmp;

					$excel->getActiveSheet()->setCellValue("H".$row, $aa1[0]);
					$excel->getActiveSheet()->setCellValue("I".$row, $aa1[1]);
					$excel->getActiveSheet()->setCellValue("J".$row, $aa1[2]);
					$excel->getActiveSheet()->setCellValue("K".$row, $aa1[3]);
					$excel->getActiveSheet()->setCellValue("L".$row, $aa1[4]);
					$excel->getActiveSheet()->setCellValue("M".$row, $aa1[5]);
					$excel->getActiveSheet()->setCellValue("N".$row, $aa1[6]);
					$excel->getActiveSheet()->setCellValue("O".$row, $aa1[7]);
					$excel->getActiveSheet()->setCellValue("P".$row, $aa1[8]);
					$excel->getActiveSheet()->setCellValue("Q".$row, $aa1[9]);
					$excel->getActiveSheet()->setCellValue("R".$row, $aa1[10]);
					$excel->getActiveSheet()->setCellValue("S".$row, $aa1[11]);
					$excel->getActiveSheet()->setCellValue("T".$row, $aa1[12]);
					$excel->getActiveSheet()->setCellValue("U".$row, $aa1[13]);
					$excel->getActiveSheet()->setCellValue("V".$row, $aa1[14]);
					$excel->getActiveSheet()->setCellValue("W".$row, $aa1[15]);
					$excel->getActiveSheet()->setCellValue("X".$row, $aa1[16]);
					$excel->getActiveSheet()->setCellValue("Y".$row, $aa1[17]);
					$excel->getActiveSheet()->setCellValue("Z".$row, $aa1[18]);
					$excel->getActiveSheet()->setCellValue("AA".$row, $aa1[19]);
					$excel->getActiveSheet()->setCellValue("AB".$row, $aa1[20]);
					$excel->getActiveSheet()->setCellValue("AC".$row, $aa1[21]);
					$excel->getActiveSheet()->setCellValue("AD".$row, $aa1[22]);
					$excel->getActiveSheet()->setCellValue("AE".$row, $aa1[23]);
					$excel->getActiveSheet()->setCellValue("AF".$row, $aa1[24]);
					$excel->getActiveSheet()->setCellValue("AG".$row, $aa1[25]);
					$excel->getActiveSheet()->setCellValue("AH".$row, $aa1[26]);
					$excel->getActiveSheet()->setCellValue("AI".$row, $aa1[27]);
					$excel->getActiveSheet()->setCellValue("AJ".$row, $aa1[28]);
					$excel->getActiveSheet()->setCellValue("AK".$row, $aa1[29]);
					$excel->getActiveSheet()->setCellValue("AL".$row, $aa1[30]);
					$excel->getActiveSheet()->setCellValue("AM".$row, $aa1[31]);
					$excel->getActiveSheet()->setCellValue("AN".$row, $aa1[32]);
					$excel->getActiveSheet()->setCellValue("AO".$row, $aa1[33]);
					$excel->getActiveSheet()->setCellValue("AP".$row, $aa1[34]);
					$excel->getActiveSheet()->setCellValue("AQ".$row, $aa1[35]);
					$excel->getActiveSheet()->setCellValue("AR".$row, $aa1[36]);
					$excel->getActiveSheet()->setCellValue("AS".$row, $aa1[37]);
					$excel->getActiveSheet()->setCellValue("AT".$row, $aa1[38]);
					$excel->getActiveSheet()->setCellValue("AU".$row, $aa1[39]);
					$excel->getActiveSheet()->setCellValue("AV".$row, $aa1[40]);
					$excel->getActiveSheet()->setCellValue("AW".$row, $aa1[41]);
					$excel->getActiveSheet()->setCellValue("AX".$row, $aa1[42]);
					$excel->getActiveSheet()->setCellValue("AY".$row, $aa1[43]);
					$excel->getActiveSheet()->setCellValue("AZ".$row, $aa1[44]);
					$excel->getActiveSheet()->setCellValue("BA".$row, $aa1[45]);
					$excel->getActiveSheet()->setCellValue("BB".$row, $aa1[46]);
					$excel->getActiveSheet()->setCellValue("BC".$row, $aa1[47]);
					$excel->getActiveSheet()->setCellValue("BD".$row, $aa1[48]);
					$excel->getActiveSheet()->setCellValue("BE".$row, $aa1[49]);
					$excel->getActiveSheet()->setCellValue("BF".$row, $aa1[50]);
					$excel->getActiveSheet()->setCellValue("BG".$row, $aa1[51]);
					$excel->getActiveSheet()->setCellValue("BH".$row, $aa1[52]);
					$excel->getActiveSheet()->setCellValue("BI".$row, $aa1[53]);
					$excel->getActiveSheet()->setCellValue("BJ".$row, $aa1[54]);
					$excel->getActiveSheet()->setCellValue("BK".$row, $aa1[55]);
					$excel->getActiveSheet()->setCellValue("BL".$row, $aa1[56]);
					$excel->getActiveSheet()->setCellValue("BM".$row, $aa1[57]);
					$excel->getActiveSheet()->setCellValue("BN".$row, $aa1[58]);
					$excel->getActiveSheet()->setCellValue("BO".$row, $aa1[59]);

					// echo "<pre>";
					// print_r($aa1);
					// echo "</pre>";
				}
				$row++;
			}
		}