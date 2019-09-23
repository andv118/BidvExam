<style type="text/css">
	.table{
		width: 100%;
	}
	.table tr th{
		text-align: center;
	}
</style>

<?php
	session_start();
	require_once("../../config.php");
	if (isset($_POST['phongthi'])&&isset($_POST['monthi'])&&$_POST['phongthi']!=""&&$_POST['monthi']!=""){

		function format($time){
			return ($time<10?'0':'').$time;
		}

		$pt=mysqli_query($connect, "select hocvien.sbd, hocvien.hoten from phongthi, hocvien where phongthi.mapt=hocvien.mapt and phongthi.mapt='".$_POST['phongthi']."'");
		$i=1;
		echo "<table class='table table-bordered'>";
			echo "<tr>";
				echo "<th>STT</th>";
				echo "<th>SBD</th>";
				echo "<th>Họ và tên</th>";
				echo "<th>Địa chỉ máy</th>";
				echo "<th>Bắt đầu thi</th>";
				echo "<th>Kết thúc</th>";
				echo "<th>Tình trạng</th>";
				echo "<th>Time còn lại</th>";
			echo "</tr>";
		while ($rpt=mysqli_fetch_array($pt, MYSQLI_ASSOC)){
			// echo $_POST['monthi']." ".$rpt['sbd']."<br>";
			$ql=mysqli_query($connect,"select remote.ipaddress, remote.estatus from remote, hocvien where hocvien.sbd=remote.sbd and remote.sbd='".$rpt['sbd']."' and remote.mamodun='".$_POST['monthi']."'");
			$score=mysqli_query($connect,"select diem.thoigianthi, diem.thoigianketthuc, diem.timeconlai from diem, hocvien where hocvien.sbd=diem.sbd and diem.sbd='".$rpt['sbd']."' and diem.mamodun='".$_POST['monthi']."'");
			// echo mysqli_num_rows($ql)."<br>";
			if (mysqli_num_rows($ql)>0&&mysqli_num_rows($score)>0){
				$r1=mysqli_fetch_array($ql, MYSQLI_ASSOC);
				$r2=mysqli_fetch_array($score, MYSQLI_ASSOC);
				$temp1=$r2['timeconlai'];
				$hour=format((int)($r2['timeconlai']/3600));
				$r2['timeconlai']%=3600;
				$minute=format((int)($r2['timeconlai']/60));
				$second=format($r2['timeconlai']%60);
				// echo $hour.":".$minute.":".$second;
					if ($r1['estatus']=="Đang thi"){
						echo "<tr style='background: palegoldenrod; color: red;'>";
							echo "<td style='text-align: center;'>$i</td>";
							echo "<td>".$rpt['sbd']."</td>";
							echo "<td>".$rpt['hoten']."</td>";
							echo "<td>".$r1['ipaddress']."</td>";
							if ($r2['thoigianthi']!="") echo "<td>".date("H:i:s - d/m/Y",strtotime($r2['thoigianthi']))."</td>";
							else echo "<td>".$r2['thoigianthi']."</td>";
							if ($r2['thoigianketthuc']!="") echo "<td>".date("H:i:s - d/m/Y",strtotime($r2['thoigianketthuc']))."</td>";
							else echo "<td>".$r2['thoigianketthuc']."</td>";
							echo "<td>".$r1['estatus']."</td>";
							echo "<td style='text-align: right;'>".$hour.":".$minute.":".$second."</td>";
						echo "</tr>";
					} else{
						echo "<tr style='background: white; color: blue;'>";
							echo "<td style='text-align: center;'>$i</td>";
							echo "<td>".$rpt['sbd']."</td>";
							echo "<td>".$rpt['hoten']."</td>";
							echo "<td>".$r1['ipaddress']."</td>";
							if ($r2['thoigianthi']!="") echo "<td>".date("H:i:s - d/m/Y",strtotime($r2['thoigianthi']))."</td>";
							else echo "<td>".$r2['thoigianthi']."</td>";
							if ($r2['thoigianketthuc']!="") echo "<td>".date("H:i:s - d/m/Y",strtotime($r2['thoigianketthuc']))."</td>";
							else echo "<td>".$r2['thoigianketthuc']."</td>";
							echo "<td>".$r1['estatus']."</td>";
							echo "<td style='text-align: right;'>".$hour.":".$minute.":".$second."</td>";
						echo "</tr>";
					}
				
				$i++;
			}
		
		}echo "</table>";
	}
	