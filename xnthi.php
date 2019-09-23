<?php
	session_start();
	if (!isset($_SESSION['sbd'])) echo "<script>alert('Bạn chưa đăng nhập!'); window.location='index.php';</script>";
	require_once("config.php");
	$ran = rand(1, 3); sleep($ran);
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	$boolean = 0;
	if (isset($_GET['id'])){
		$s = mysqli_query($connect, "select tongcauhoi, tgthi from thoigianthi where mamodun ='".$_GET['id']."'");
		$r = mysqli_fetch_array($s, MYSQLI_ASSOC);
		$tongch = $r['tongcauhoi']; //Tổng số câu hỏi
		$ttime = $r['tgthi']; //Tổng time làm bài
		$_SESSION['time12'] = $r['tgthi'];
		$_SESSION['modunid'] = $_GET['id'];
		$t1 = mysqli_query($connect, "select dethisinh.macauhoi from dethisinh where dethisinh.mamodun='".$_GET['id']."' and dethisinh.sbd='".$_SESSION['sbd']."'");
		$t2 = mysqli_query($connect, "select timeconlai from diem where sbd='".$_SESSION['sbd']."' and mamodun='".$_GET['id']."'");
		if (mysqli_num_rows($t1)>0){ // Nếu bài đang làm dở. Đã có đề thi
			if (mysqli_num_rows($t2)>0){
				$time= mysqli_fetch_array($t2, MYSQLI_ASSOC);
				if ($time['timeconlai']>0){
					$sum= mysqli_query($connect, "select mabode, tenbode from bode");
					$i=0; $ii=1; $st=1; $_SESSION['rangeb0']=0; $tongcauhoi=0;
					while ($sum1=mysqli_fetch_array($sum, MYSQLI_ASSOC)){
						$sql=mysqli_query($connect,"select sum(soluong) as soluong from dethiprofile where cauhoi='".$sum1['mabode']."' and mamodun='".$_GET['id']."' and soluong>0"); //Lấy số câu hỏi của các phần
						$_SESSION['phan'.$ii]=$sum1['tenbode'];
						while ($row=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
							if ($row['soluong']>0){
								$_SESSION['rangea'.$ii]=$st;
								$_SESSION['rangeb'.$ii]=$row['soluong']+($_SESSION['rangea'.$ii]-1);
								$st=$_SESSION['rangeb'.$ii]+1;
								$ii++;
								$tongcauhoi+=$row['soluong'];
							}
						}
					}
					$_SESSION['tongcauhoi']=$tongcauhoi;
					$_SESSION['tongphanthi']=--$ii;

				} else if($time['timeconlai']<=0){
					unset($_SESSION['sbd']);
					die("Bạn đã hoàn thành bài thi của môn này!");
				}
			}
		}else {
			$boolean=1;
			// Lấy danh sách nội dung thi của môn thi
			$sum=mysqli_query($connect,"select mabode, tenbode from bode where mamodun='".$_GET['id']."'");
			$i=0; $ii=1; $st=1;
			// Lặp danh sách các môn thi
			while ($sum1=mysqli_fetch_array($sum, MYSQLI_ASSOC)){
				$sql=mysqli_query($connect,"select sum(soluong) as soluong from dethiprofile where cauhoi='".$sum1['mabode']."' and mamodun='".$_GET['id']."' and (soluong>0)"); //Lấy tổng số câu hỏi của các phần
					$_SESSION['phan'.$ii]=$sum1['tenbode']; // Đánh dấu tên các phần nội dung thi
					while ($row=mysqli_fetch_array($sql, MYSQLI_ASSOC)){
						if ($row['soluong']>0){
							$_SESSION['rangea'.$ii]=$st;
							$_SESSION['rangeb'.$ii]=$row['soluong']+($_SESSION['rangea'.$ii]-1);
							$st=$_SESSION['rangeb'.$ii]+1;
							$ii++;
							$ui=mysqli_query($connect,"select cauhoi.macauhoi, cauhoi.dapan, cauhoi.paA, cauhoi.paB, cauhoi.paC, cauhoi.paD, cauhoi.paE, cauhoi.paF, cauhoi.imgviaupaA, cauhoi.imgviaupaB, cauhoi.imgviaupaC, cauhoi.imgviaupaD, cauhoi.imgviaupaE, cauhoi.imgviaupaF, cauhoi.tron from cauhoi, bode where bode.mabode=cauhoi.mabode and cauhoi.mabode='".$sum1['mabode']."' ORDER BY RAND() LIMIT ".$row['soluong']."");
							while ($r=mysqli_fetch_array($ui, MYSQLI_ASSOC)){
								$i++;
								// $r['macauhoi']=addslashes($r['macauhoi']);
								// $r['dapan']=addslashes($r['dapan']);
								// $r['paA']=addslashes($r['paA']);
								// $r['paB']=addslashes($r['paB']);
								// $r['paC']=addslashes($r['paC']);
								// $r['paD']=addslashes($r['paD']);
								// $r['paE']=addslashes($r['paE']);
								// $r['paF']=addslashes($r['paF']);

								// $r['imgviaupaA']=addslashes($r['imgviaupaA']);
								// $r['imgviaupaB']=addslashes($r['imgviaupaB']);
								// $r['imgviaupaC']=addslashes($r['imgviaupaC']);
								// $r['imgviaupaD']=addslashes($r['imgviaupaD']);
								// $r['imgviaupaE']=addslashes($r['imgviaupaE']);
								// $r['imgviaupaF']=addslashes($r['imgviaupaF']);

								$_GET['id']=addslashes($_GET['id']);

								if ($r['tron']==0) mysqli_query($connect,"insert into dethisinh(sbd, macauhoi, socau, dapan, dapanA, dapanB, dapanC, dapanD, dapanE, dapanF, imgviaupaA, imgviaupaB, imgviaupaC, imgviaupaD, imgviaupaE, imgviaupaF, mamodun) values('".$_SESSION['sbd']."','".$r['macauhoi']."','$i','".$r['dapan']."','".$r['paA']."','".$r['paB']."','".$r['paC']."','".$r['paD']."','".$r['paE']."','".$r['paF']."','".$r['imgviaupaA']."','".$r['imgviaupaB']."','".$r['imgviaupaC']."','".$r['imgviaupaD']."','".$r['imgviaupaE']."','".$r['imgviaupaF']."','".$_GET['id']."')");
								else if ($r['tron']!=0){
									if (!empty($r['paE'])&&empty($r['paF'])) {
										$dp=rand(1,5);
										if ($dp==1){
											if ($r['dapan']=="A") mysqli_query($connect,"insert into dethisinh (sbd, macauhoi, socau, dapan, dapanA, dapanB, dapanC, dapanD, dapanE, imgviaupaA, imgviaupaB, imgviaupaC, imgviaupaD, imgviaupaE, mamodun) values('".$_SESSION['sbd']."','".$r['macauhoi']."','$i','A','".$r['paA']."','".$r['paB']."','".$r['paC']."','".$r['paD']."','".$r['paE']."','".$r['imgviaupaA']."','".$r['imgviaupaB']."','".$r['imgviaupaC']."','".$r['imgviaupaD']."','".$r['imgviaupaE']."','".$_GET['id']."')");
											if ($r['dapan']=="B") mysqli_query($connect,"insert into dethisinh (sbd, macauhoi, socau, dapan, dapanA, dapanB, dapanC, dapanD, dapanE, imgviaupaA, imgviaupaB, imgviaupaC, imgviaupaD, imgviaupaE, mamodun) 
											values('".$_SESSION['sbd']."','".$r['macauhoi']."','$i','A','".$r['paB']."','".$r['paA']."','".$r['paC']."','".$r['paD']."','".$r['paE']."','".$r['imgviaupaB']."','".$r['imgviaupaA']."','".$r['imgviaupaC']."','".$r['imgviaupaD']."','".$r['imgviaupaE']."','".$_GET['id']."')");
											if ($r['dapan']=="C") mysqli_query($connect,"insert into dethisinh (sbd, macauhoi, socau, dapan, dapanA, dapanB, dapanC, dapanD, dapanE, imgviaupaA, imgviaupaB, imgviaupaC, imgviaupaD, imgviaupaE, mamodun)
											values('".$_SESSION['sbd']."','".$r['macauhoi']."','$i','A','".$r['paC']."','".$r['paB']."','".$r['paA']."','".$r['paD']."','".$r['paE']."','".$r['imgviaupaC']."','".$r['imgviaupaB']."','".$r['imgviaupaA']."','".$r['imgviaupaD']."','".$r['imgviaupaE']."','".$_GET['id']."')");
											if ($r['dapan']=="D") mysqli_query($connect,"insert into dethisinh (sbd, macauhoi, socau, dapan, dapanA, dapanB, dapanC, dapanD, dapanE, imgviaupaA, imgviaupaB, imgviaupaC, imgviaupaD, imgviaupaE, mamodun) 
											values('".$_SESSION['sbd']."','".$r['macauhoi']."','$i','A','".$r['paD']."','".$r['paB']."','".$r['paC']."','".$r['paA']."','".$r['paE']."','".$r['imgviaupaD']."','".$r['imgviaupaB']."','".$r['imgviaupaC']."','".$r['imgviaupaA']."','".$r['imgviaupaE']."','".$_GET['id']."')"); // Ghi đề của thí sinh
											if ($r['dapan']=="E") mysqli_query($connect,"insert into dethisinh (sbd, macauhoi, socau, dapan, dapanA, dapanB, dapanC, dapanD, dapanE, imgviaupaA, imgviaupaB, imgviaupaC, imgviaupaD, imgviaupaE, mamodun) values('".$_SESSION['sbd']."','".$r['macauhoi']."','$i','A','".$r['paE']."','".$r['paB']."','".$r['paC']."','".$r['paD']."','".$r['paA']."','".$r['imgviaupaE']."','".$r['imgviaupaB']."','".$r['imgviaupaC']."','".$r['imgviaupaD']."','".$r['imgviaupaA']."','".$_GET['id']."')"); //Ghi đề của thí sinh
										}
										if ($dp==2){
											if ($r['dapan']=="A") mysqli_query($connect,"insert into dethisinh (sbd, macauhoi, socau, dapan, dapanA, dapanB, dapanC, dapanD, dapanE, imgviaupaA, imgviaupaB, imgviaupaC, imgviaupaD, imgviaupaE, mamodun) values('".$_SESSION['sbd']."','".$r['macauhoi']."','$i','B','".$r['paC']."','".$r['paA']."','".$r['paB']."','".$r['paE']."','".$r['paD']."','".$r['imgviaupaC']."','".$r['imgviaupaA']."','".$r['imgviaupaB']."','".$r['imgviaupaE']."','".$r['imgviaupaD']."','".$_GET['id']."')"); //Ghi đề của thí sinh
											if ($r['dapan']=="B") mysqli_query($connect,"insert into dethisinh (sbd, macauhoi, socau, dapan, dapanA, dapanB, dapanC, dapanD, dapanE, imgviaupaA, imgviaupaB, imgviaupaC, imgviaupaD, imgviaupaE, mamodun) values('".$_SESSION['sbd']."','".$r['macauhoi']."','$i','B','".$r['paC']."','".$r['paB']."','".$r['paA']."','".$r['paE']."','".$r['paD']."','".$r['imgviaupaC']."','".$r['imgviaupaB']."','".$r['imgviaupaA']."','".$r['imgviaupaE']."','".$r['imgviaupaD']."','".$_GET['id']."')"); //Ghi đề của thí sinh
											if ($r['dapan']=="C") mysqli_query($connect,"insert into dethisinh (sbd, macauhoi, socau, dapan, dapanA, dapanB, dapanC, dapanD, dapanE, imgviaupaA, imgviaupaB, imgviaupaC, imgviaupaD, imgviaupaE, mamodun) values('".$_SESSION['sbd']."','".$r['macauhoi']."','$i','B','".$r['paA']."','".$r['paC']."','".$r['paB']."','".$r['paE']."','".$r['paD']."','".$r['imgviaupaA']."','".$r['imgviaupaC']."','".$r['imgviaupaB']."','".$r['imgviaupaE']."','".$r['imgviaupaD']."','".$_GET['id']."')"); //Ghi đề của thí sinh
											if ($r['dapan']=="D") mysqli_query($connect,"insert into dethisinh (sbd, macauhoi, socau, dapan, dapanA, dapanB, dapanC, dapanD, dapanE, imgviaupaA, imgviaupaB, imgviaupaC, imgviaupaD, imgviaupaE, mamodun) values('".$_SESSION['sbd']."','".$r['macauhoi']."','$i','B','".$r['paC']."','".$r['paD']."','".$r['paB']."','".$r['paE']."','".$r['paA']."','".$r['imgviaupaC']."','".$r['imgviaupaD']."','".$r['imgviaupaB']."','".$r['imgviaupaE']."','".$r['imgviaupaA']."','".$_GET['id']."')"); //Ghi đề của thí sinh
											if ($r['dapan']=="E") mysqli_query($connect,"insert into dethisinh (sbd, macauhoi, socau, dapan, dapanA, dapanB, dapanC, dapanD, dapanE, imgviaupaA, imgviaupaB, imgviaupaC, imgviaupaD, imgviaupaE, mamodun) values('".$_SESSION['sbd']."','".$r['macauhoi']."','$i','B','".$r['paC']."','".$r['paE']."','".$r['paB']."','".$r['paA']."','".$r['paD']."','".$r['imgviaupaC']."','".$r['imgviaupaE']."','".$r['imgviaupaB']."','".$r['imgviaupaA']."','".$r['imgviaupaD']."','".$_GET['id']."')"); //Ghi đề của thí sinh
										}
										if ($dp==3){
											if ($r['dapan']=="A") mysqli_query($connect,"insert into dethisinh (sbd, macauhoi, socau, dapan, dapanA, dapanB, dapanC, dapanD, dapanE, imgviaupaA, imgviaupaB, imgviaupaC, imgviaupaD, imgviaupaE, mamodun) values('".$_SESSION['sbd']."','".$r['macauhoi']."','$i','C','".$r['paE']."','".$r['paD']."','".$r['paA']."','".$r['paB']."','".$r['paC']."','".$r['imgviaupaE']."','".$r['imgviaupaD']."','".$r['imgviaupaA']."','".$r['imgviaupaB']."','".$r['imgviaupaC']."','".$_GET['id']."')"); //Ghi đề của thí sinh
											if ($r['dapan']=="B") mysqli_query($connect,"insert into dethisinh (sbd, macauhoi, socau, dapan, dapanA, dapanB, dapanC, dapanD, dapanE, imgviaupaA, imgviaupaB, imgviaupaC, imgviaupaD, imgviaupaE, mamodun) values('".$_SESSION['sbd']."','".$r['macauhoi']."','$i','C','".$r['paE']."','".$r['paD']."','".$r['paB']."','".$r['paA']."','".$r['paC']."','".$r['imgviaupaE']."','".$r['imgviaupaD']."','".$r['imgviaupaB']."','".$r['imgviaupaA']."','".$r['imgviaupaC']."','".$_GET['id']."')"); //Ghi đề của thí sinh
											if ($r['dapan']=="C") mysqli_query($connect,"insert into dethisinh (sbd, macauhoi, socau, dapan, dapanA, dapanB, dapanC, dapanD, dapanE, imgviaupaA, imgviaupaB, imgviaupaC, imgviaupaD, imgviaupaE, mamodun) values('".$_SESSION['sbd']."','".$r['macauhoi']."','$i','C','".$r['paE']."','".$r['paD']."','".$r['paC']."','".$r['paB']."','".$r['paA']."','".$r['imgviaupaE']."','".$r['imgviaupaD']."','".$r['imgviaupaC']."','".$r['imgviaupaB']."','".$r['imgviaupaA']."','".$_GET['id']."')"); //Ghi đề của thí sinh
											if ($r['dapan']=="D") mysqli_query($connect,"insert into dethisinh (sbd, macauhoi, socau, dapan, dapanA, dapanB, dapanC, dapanD, dapanE, imgviaupaA, imgviaupaB, imgviaupaC, imgviaupaD, imgviaupaE, mamodun) values('".$_SESSION['sbd']."','".$r['macauhoi']."','$i','C','".$r['paE']."','".$r['paA']."','".$r['paD']."','".$r['paB']."','".$r['paC']."','".$r['imgviaupaE']."','".$r['imgviaupaA']."','".$r['imgviaupaD']."','".$r['imgviaupaB']."','".$r['imgviaupaC']."','".$_GET['id']."')"); //Ghi đề của thí sinh
											if ($r['dapan']=="E") mysqli_query($connect,"insert into dethisinh (sbd, macauhoi, socau, dapan, dapanA, dapanB, dapanC, dapanD, dapanE, imgviaupaA, imgviaupaB, imgviaupaC, imgviaupaD, imgviaupaE, mamodun) values('".$_SESSION['sbd']."','".$r['macauhoi']."','$i','C','".$r['paA']."','".$r['paD']."','".$r['paE']."','".$r['paB']."','".$r['paC']."','".$r['imgviaupaA']."','".$r['imgviaupaD']."','".$r['imgviaupaE']."','".$r['imgviaupaB']."','".$r['imgviaupaC']."','".$_GET['id']."')"); //Ghi đề của thí sinh
										}
										if ($dp==4){
											if ($r['dapan']=="A") mysqli_query($connect,"insert into dethisinh (sbd, macauhoi, socau, dapan, dapanA, dapanB, dapanC, dapanD, dapanE, imgviaupaA, imgviaupaB, imgviaupaC, imgviaupaD, imgviaupaE, mamodun) values('".$_SESSION['sbd']."','".$r['macauhoi']."','$i','D','".$r['paB']."','".$r['paC']."','".$r['paD']."','".$r['paA']."','".$r['paE']."','".$r['imgviaupaB']."','".$r['imgviaupaC']."','".$r['imgviaupaD']."','".$r['imgviaupaA']."','".$r['imgviaupaE']."','".$_GET['id']."')"); //Ghi đề của thí sinh
											if ($r['dapan']=="B") mysqli_query($connect,"insert into dethisinh (sbd, macauhoi, socau, dapan, dapanA, dapanB, dapanC, dapanD, dapanE, imgviaupaA, imgviaupaB, imgviaupaC, imgviaupaD, imgviaupaE, mamodun) values('".$_SESSION['sbd']."','".$r['macauhoi']."','$i','D','".$r['paA']."','".$r['paC']."','".$r['paD']."','".$r['paB']."','".$r['paE']."','".$r['imgviaupaA']."','".$r['imgviaupaC']."','".$r['imgviaupaD']."','".$r['imgviaupaB']."','".$r['imgviaupaE']."','".$_GET['id']."')"); //Ghi đề của thí sinh
											if ($r['dapan']=="C") mysqli_query($connect,"insert into dethisinh (sbd, macauhoi, socau, dapan, dapanA, dapanB, dapanC, dapanD, dapanE, imgviaupaA, imgviaupaB, imgviaupaC, imgviaupaD, imgviaupaE, mamodun) values('".$_SESSION['sbd']."','".$r['macauhoi']."','$i','D','".$r['paB']."','".$r['paA']."','".$r['paD']."','".$r['paC']."','".$r['paE']."','".$r['imgviaupaB']."','".$r['imgviaupaA']."','".$r['imgviaupaD']."','".$r['imgviaupaC']."','".$r['imgviaupaE']."','".$_GET['id']."')"); //Ghi đề của thí sinh
											if ($r['dapan']=="D") mysqli_query($connect,"insert into dethisinh (sbd, macauhoi, socau, dapan, dapanA, dapanB, dapanC, dapanD, dapanE, imgviaupaA, imgviaupaB, imgviaupaC, imgviaupaD, imgviaupaE, mamodun) values('".$_SESSION['sbd']."','".$r['macauhoi']."','$i','D','".$r['paB']."','".$r['paC']."','".$r['paA']."','".$r['paD']."','".$r['paE']."','".$r['imgviaupaB']."','".$r['imgviaupaC']."','".$r['imgviaupaA']."','".$r['imgviaupaD']."','".$r['imgviaupaE']."','".$_GET['id']."')"); //Ghi đề của thí sinh
											if ($r['dapan']=="E") mysqli_query($connect,"insert into dethisinh (sbd, macauhoi, socau, dapan, dapanA, dapanB, dapanC, dapanD, dapanE, imgviaupaA, imgviaupaB, imgviaupaC, imgviaupaD, imgviaupaE, mamodun) values('".$_SESSION['sbd']."','".$r['macauhoi']."','$i','D','".$r['paB']."','".$r['paC']."','".$r['paD']."','".$r['paE']."','".$r['paA']."','".$r['imgviaupaB']."','".$r['imgviaupaC']."','".$r['imgviaupaD']."','".$r['imgviaupaE']."','".$r['imgviaupaA']."','".$_GET['id']."')"); //Ghi đề của thí sinh
										}
										if ($dp==5){
											if ($r['dapan']=="A") mysqli_query($connect,"insert into dethisinh (sbd, macauhoi, socau, dapan, dapanA, dapanB, dapanC, dapanD, dapanE, imgviaupaA, imgviaupaB, imgviaupaC, imgviaupaD, imgviaupaE, mamodun) values('".$_SESSION['sbd']."','".$r['macauhoi']."','$i','E','".$r['paE']."','".$r['paC']."','".$r['paB']."','".$r['paD']."','".$r['paA']."','".$r['imgviaupaE']."','".$r['imgviaupaC']."','".$r['imgviaupaB']."','".$r['imgviaupaD']."','".$r['imgviaupaA']."','".$_GET['id']."')"); //Ghi đề của thí sinh
											if ($r['dapan']=="B") mysqli_query($connect,"insert into dethisinh (sbd, macauhoi, socau, dapan, dapanA, dapanB, dapanC, dapanD, dapanE, imgviaupaA, imgviaupaB, imgviaupaC, imgviaupaD, imgviaupaE, mamodun) values('".$_SESSION['sbd']."','".$r['macauhoi']."','$i','E','".$r['paE']."','".$r['paC']."','".$r['paA']."','".$r['paD']."','".$r['paB']."','".$r['imgviaupaE']."','".$r['imgviaupaC']."','".$r['imgviaupaA']."','".$r['imgviaupaD']."','".$r['imgviaupaB']."','".$_GET['id']."')"); //Ghi đề của thí sinh
											if ($r['dapan']=="C") mysqli_query($connect,"insert into dethisinh (sbd, macauhoi, socau, dapan, dapanA, dapanB, dapanC, dapanD, dapanE, imgviaupaA, imgviaupaB, imgviaupaC, imgviaupaD, imgviaupaE, mamodun) values('".$_SESSION['sbd']."','".$r['macauhoi']."','$i','E','".$r['paE']."','".$r['paA']."','".$r['paB']."','".$r['paD']."','".$r['paC']."','".$r['imgviaupaE']."','".$r['imgviaupaA']."','".$r['imgviaupaB']."','".$r['imgviaupaD']."','".$r['imgviaupaC']."','".$_GET['id']."')"); //Ghi đề của thí sinh
											if ($r['dapan']=="D") mysqli_query($connect,"insert into dethisinh (sbd, macauhoi, socau, dapan, dapanA, dapanB, dapanC, dapanD, dapanE, imgviaupaA, imgviaupaB, imgviaupaC, imgviaupaD, imgviaupaE, mamodun) values('".$_SESSION['sbd']."','".$r['macauhoi']."','$i','E','".$r['paE']."','".$r['paC']."','".$r['paB']."','".$r['paA']."','".$r['paD']."','".$r['imgviaupaE']."','".$r['imgviaupaC']."','".$r['imgviaupaB']."','".$r['imgviaupaA']."','".$r['imgviaupaD']."','".$_GET['id']."')"); //Ghi đề của thí sinh
											if ($r['dapan']=="E") mysqli_query($connect,"insert into dethisinh (sbd, macauhoi, socau, dapan, dapanA, dapanB, dapanC, dapanD, dapanE, imgviaupaA, imgviaupaB, imgviaupaC, imgviaupaD, imgviaupaE, mamodun) values('".$_SESSION['sbd']."','".$r['macauhoi']."','$i','E','".$r['paA']."','".$r['paC']."','".$r['paB']."','".$r['paD']."','".$r['paE']."','".$r['imgviaupaA']."','".$r['imgviaupaC']."','".$r['imgviaupaB']."','".$r['imgviaupaD']."','".$r['imgviaupaE']."','".$_GET['id']."')"); //Ghi đề của thí sinh
										}
									}
									else if (!empty($r['paE'])&&!empty($r['paF'])){
										$dp=rand(1,6);
										if ($dp==1){
										if ($r['dapan']=="A") mysqli_query($connect,"insert into dethisinh (sbd, macauhoi, socau, dapan, dapanA, dapanB, dapanC, dapanD, dapanE, dapanF, imgviaupaA, imgviaupaB, imgviaupaC, imgviaupaD, imgviaupaE, imgviaupaF, mamodun) values('".$_SESSION['sbd']."','".$r['macauhoi']."','$i','A','".$r['paA']."','".$r['paB']."','".$r['paF']."','".$r['paC']."','".$r['paD']."','".$r['paE']."','".$r['imgviaupaA']."','".$r['imgviaupaB']."','".$r['imgviaupaF']."','".$r['imgviaupaC']."','".$r['imgviaupaD']."','".$r['imgviaupaE']."','".$_GET['id']."')"); //Ghi đề của thí sinh
										if ($r['dapan']=="B") mysqli_query($connect,"insert into dethisinh (sbd, macauhoi, socau, dapan, dapanA, dapanB, dapanC, dapanD, dapanE, dapanF, imgviaupaA, imgviaupaB, imgviaupaC, imgviaupaD, imgviaupaE, imgviaupaF, mamodun) values('".$_SESSION['sbd']."','".$r['macauhoi']."','$i','A','".$r['paB']."','".$r['paA']."','".$r['paF']."','".$r['paC']."','".$r['paD']."','".$r['paE']."','".$r['imgviaupaB']."','".$r['imgviaupaA']."','".$r['imgviaupaF']."','".$r['imgviaupaC']."','".$r['imgviaupaD']."','".$r['imgviaupaE']."','".$_GET['id']."')");
										if ($r['dapan']=="C") mysqli_query($connect,"insert into dethisinh (sbd, macauhoi, socau, dapan, dapanA, dapanB, dapanC, dapanD, dapanE, dapanF, imgviaupaA, imgviaupaB, imgviaupaC, imgviaupaD, imgviaupaE, imgviaupaF, mamodun) values('".$_SESSION['sbd']."','".$r['macauhoi']."','$i','A','".$r['paC']."','".$r['paB']."','".$r['paF']."','".$r['paA']."','".$r['paD']."','".$r['paE']."','".$r['imgviaupaC']."','".$r['imgviaupaB']."','".$r['imgviaupaF']."','".$r['imgviaupaA']."','".$r['imgviaupaD']."','".$r['imgviaupaE']."','".$_GET['id']."')");
										if ($r['dapan']=="D") mysqli_query($connect,"insert into dethisinh (sbd, macauhoi, socau, dapan, dapanA, dapanB, dapanC, dapanD, dapanE, dapanF, imgviaupaA, imgviaupaB, imgviaupaC, imgviaupaD, imgviaupaE, imgviaupaF, mamodun) values('".$_SESSION['sbd']."','".$r['macauhoi']."','$i','A','".$r['paD']."','".$r['paB']."','".$r['paF']."','".$r['paC']."','".$r['paA']."','".$r['paE']."','".$r['imgviaupaD']."','".$r['imgviaupaB']."','".$r['imgviaupaF']."','".$r['imgviaupaC']."','".$r['imgviaupaA']."','".$r['imgviaupaE']."','".$_GET['id']."')");
										if ($r['dapan']=="E") mysqli_query($connect,"insert into dethisinh (sbd, macauhoi, socau, dapan, dapanA, dapanB, dapanC, dapanD, dapanE, dapanF, imgviaupaA, imgviaupaB, imgviaupaC, imgviaupaD, imgviaupaE, imgviaupaF, mamodun) values('".$_SESSION['sbd']."','".$r['macauhoi']."','$i','A','".$r['paE']."','".$r['paB']."','".$r['paF']."','".$r['paC']."','".$r['paD']."','".$r['paA']."','".$r['imgviaupaE']."','".$r['imgviaupaB']."','".$r['imgviaupaF']."','".$r['imgviaupaC']."','".$r['imgviaupaD']."','".$r['imgviaupaA']."','".$_GET['id']."')");
										if ($r['dapan']=="F") mysqli_query($connect,"insert into dethisinh (sbd, macauhoi, socau, dapan, dapanA, dapanB, dapanC, dapanD, dapanE, dapanF, imgviaupaA, imgviaupaB, imgviaupaC, imgviaupaD, imgviaupaE, imgviaupaF, mamodun) values('".$_SESSION['sbd']."','".$r['macauhoi']."','$i','A','".$r['paF']."','".$r['paB']."','".$r['paA']."','".$r['paC']."','".$r['paD']."','".$r['paE']."','".$r['imgviaupaF']."','".$r['imgviaupaB']."','".$r['imgviaupaA']."','".$r['imgviaupaC']."','".$r['imgviaupaD']."','".$r['imgviaupaE']."','".$_GET['id']."')");
										}
										if ($dp==2){
										if ($r['dapan']=="A") mysqli_query($connect,"insert into dethisinh (sbd, macauhoi, socau, dapan, dapanA, dapanB, dapanC, dapanD, dapanE, dapanF, imgviaupaA, imgviaupaB, imgviaupaC, imgviaupaD, imgviaupaE, imgviaupaF, mamodun) values('".$_SESSION['sbd']."','".$r['macauhoi']."','$i','B','".$r['paC']."','".$r['paA']."','".$r['paF']."','".$r['paB']."','".$r['paE']."','".$r['paD']."','".$r['imgviaupaC']."','".$r['imgviaupaA']."','".$r['imgviaupaF']."','".$r['imgviaupaB']."','".$r['imgviaupaE']."','".$r['imgviaupaD']."','".$_GET['id']."')"); //Ghi đề của thí sinh
										if ($r['dapan']=="B") mysqli_query($connect,"insert into dethisinh (sbd, macauhoi, socau, dapan, dapanA, dapanB, dapanC, dapanD, dapanE, dapanF, imgviaupaA, imgviaupaB, imgviaupaC, imgviaupaD, imgviaupaE, imgviaupaF, mamodun) values('".$_SESSION['sbd']."','".$r['macauhoi']."','$i','B','".$r['paC']."','".$r['paB']."','".$r['paF']."','".$r['paA']."','".$r['paE']."','".$r['paD']."','".$r['imgviaupaC']."','".$r['imgviaupaB']."','".$r['imgviaupaF']."','".$r['imgviaupaA']."','".$r['imgviaupaE']."','".$r['imgviaupaD']."','".$_GET['id']."')"); //Ghi đề của thí sinh
										if ($r['dapan']=="C") mysqli_query($connect,"insert into dethisinh (sbd, macauhoi, socau, dapan, dapanA, dapanB, dapanC, dapanD, dapanE, dapanF, imgviaupaA, imgviaupaB, imgviaupaC, imgviaupaD, imgviaupaE, imgviaupaF, mamodun) values('".$_SESSION['sbd']."','".$r['macauhoi']."','$i','B','".$r['paA']."','".$r['paC']."','".$r['paF']."','".$r['paB']."','".$r['paE']."','".$r['paD']."','".$r['imgviaupaA']."','".$r['imgviaupaC']."','".$r['imgviaupaF']."','".$r['imgviaupaB']."','".$r['imgviaupaE']."','".$r['imgviaupaD']."','".$_GET['id']."')"); //Ghi đề của thí sinh
										if ($r['dapan']=="D") mysqli_query($connect,"insert into dethisinh (sbd, macauhoi, socau, dapan, dapanA, dapanB, dapanC, dapanD, dapanE, dapanF, imgviaupaA, imgviaupaB, imgviaupaC, imgviaupaD, imgviaupaE, imgviaupaF, mamodun) values('".$_SESSION['sbd']."','".$r['macauhoi']."','$i','B','".$r['paC']."','".$r['paD']."','".$r['paF']."','".$r['paB']."','".$r['paE']."','".$r['paA']."','".$r['imgviaupaC']."','".$r['imgviaupaD']."','".$r['imgviaupaF']."','".$r['imgviaupaB']."','".$r['imgviaupaE']."','".$r['imgviaupaA']."','".$_GET['id']."')"); //Ghi đề của thí sinh
										if ($r['dapan']=="E") mysqli_query($connect,"insert into dethisinh (sbd, macauhoi, socau, dapan, dapanA, dapanB, dapanC, dapanD, dapanE, dapanF, imgviaupaA, imgviaupaB, imgviaupaC, imgviaupaD, imgviaupaE, imgviaupaF, mamodun) values('".$_SESSION['sbd']."','".$r['macauhoi']."','$i','B','".$r['paC']."','".$r['paE']."','".$r['paF']."','".$r['paB']."','".$r['paA']."','".$r['paD']."','".$r['imgviaupaC']."','".$r['imgviaupaE']."','".$r['imgviaupaF']."','".$r['imgviaupaB']."','".$r['imgviaupaA']."','".$r['imgviaupaD']."','".$_GET['id']."')"); //Ghi đề của thí sinh
										if ($r['dapan']=="F") mysqli_query($connect,"insert into dethisinh (sbd, macauhoi, socau, dapan, dapanA, dapanB, dapanC, dapanD, dapanE, dapanF, imgviaupaA, imgviaupaB, imgviaupaC, imgviaupaD, imgviaupaE, imgviaupaF, mamodun) values('".$_SESSION['sbd']."','".$r['macauhoi']."','$i','B','".$r['paC']."','".$r['paF']."','".$r['paA']."','".$r['paB']."','".$r['paE']."','".$r['paD']."','".$r['imgviaupaC']."','".$r['imgviaupaF']."','".$r['imgviaupaA']."','".$r['imgviaupaB']."','".$r['imgviaupaE']."','".$r['imgviaupaD']."','".$_GET['id']."')"); //Ghi đề của thí sinh
										}
										if ($dp==3){
										if ($r['dapan']=="A") mysqli_query($connect,"insert into dethisinh (sbd, macauhoi, socau, dapan, dapanA, dapanB, dapanC, dapanD, dapanE, dapanF, imgviaupaA, imgviaupaB, imgviaupaC, imgviaupaD, imgviaupaE, imgviaupaF, mamodun) values('".$_SESSION['sbd']."','".$r['macauhoi']."','$i','C','".$r['paF']."','".$r['paE']."','".$r['paA']."','".$r['paD']."','".$r['paB']."','".$r['paC']."','".$r['imgviaupaF']."','".$r['imgviaupaE']."','".$r['imgviaupaA']."','".$r['imgviaupaD']."','".$r['imgviaupaB']."','".$r['imgviaupaC']."','".$_GET['id']."')"); //Ghi đề của thí sinh
										if ($r['dapan']=="B") mysqli_query($connect,"insert into dethisinh (sbd, macauhoi, socau, dapan, dapanA, dapanB, dapanC, dapanD, dapanE, dapanF, imgviaupaA, imgviaupaB, imgviaupaC, imgviaupaD, imgviaupaE, imgviaupaF, mamodun) values('".$_SESSION['sbd']."','".$r['macauhoi']."','$i','C','".$r['paF']."','".$r['paE']."','".$r['paB']."','".$r['paD']."','".$r['paC']."','".$r['paA']."','".$r['imgviaupaF']."','".$r['imgviaupaE']."','".$r['imgviaupaB']."','".$r['imgviaupaD']."','".$r['imgviaupaC']."','".$r['imgviaupaA']."','".$_GET['id']."')"); //Ghi đề của thí sinh
										if ($r['dapan']=="C") mysqli_query($connect,"insert into dethisinh (sbd, macauhoi, socau, dapan, dapanA, dapanB, dapanC, dapanD, dapanE, dapanF, imgviaupaA, imgviaupaB, imgviaupaC, imgviaupaD, imgviaupaE, imgviaupaF, mamodun) values('".$_SESSION['sbd']."','".$r['macauhoi']."','$i','C','".$r['paF']."','".$r['paE']."','".$r['paC']."','".$r['paD']."','".$r['paB']."','".$r['paA']."','".$r['imgviaupaF']."','".$r['imgviaupaE']."','".$r['imgviaupaC']."','".$r['imgviaupaD']."','".$r['imgviaupaB']."','".$r['imgviaupaA']."','".$_GET['id']."')"); //Ghi đề của thí sinh
										if ($r['dapan']=="D") mysqli_query($connect,"insert into dethisinh (sbd, macauhoi, socau, dapan, dapanA, dapanB, dapanC, dapanD, dapanE, dapanF, imgviaupaA, imgviaupaB, imgviaupaC, imgviaupaD, imgviaupaE, imgviaupaF, mamodun) values('".$_SESSION['sbd']."','".$r['macauhoi']."','$i','C','".$r['paF']."','".$r['paE']."','".$r['paD']."','".$r['paC']."','".$r['paB']."','".$r['paA']."','".$r['imgviaupaF']."','".$r['imgviaupaE']."','".$r['imgviaupaD']."','".$r['imgviaupaC']."','".$r['imgviaupaB']."','".$r['imgviaupaA']."','".$_GET['id']."')"); //Ghi đề của thí sinh
										if ($r['dapan']=="E") mysqli_query($connect,"insert into dethisinh (sbd, macauhoi, socau, dapan, dapanA, dapanB, dapanC, dapanD, dapanE, dapanF,  imgviaupaA, imgviaupaB, imgviaupaC, imgviaupaD, imgviaupaE, imgviaupaF,mamodun) values('".$_SESSION['sbd']."','".$r['macauhoi']."','$i','C','".$r['paF']."','".$r['paD']."','".$r['paE']."','".$r['paC']."','".$r['paB']."','".$r['paA']."','".$r['imgviaupaF']."','".$r['imgviaupaD']."','".$r['imgviaupaE']."','".$r['imgviaupaC']."','".$r['imgviaupaB']."','".$r['imgviaupaA']."','".$_GET['id']."')"); //Ghi đề của thí sinh
										if ($r['dapan']=="F") mysqli_query($connect,"insert into dethisinh (sbd, macauhoi, socau, dapan, dapanA, dapanB, dapanC, dapanD, dapanE, dapanF, imgviaupaA, imgviaupaB, imgviaupaC, imgviaupaD, imgviaupaE, imgviaupaF, mamodun) values('".$_SESSION['sbd']."','".$r['macauhoi']."','$i','C','".$r['paD']."','".$r['paE']."','".$r['paF']."','".$r['paC']."','".$r['paB']."','".$r['paA']."','".$r['imgviaupaD']."','".$r['imgviaupaE']."','".$r['imgviaupaF']."','".$r['imgviaupaC']."','".$r['imgviaupaB']."','".$r['imgviaupaA']."','".$_GET['id']."')"); //Ghi đề của thí sinh
										}
										if ($dp==4){
										if ($r['dapan']=="A") mysqli_query($connect,"insert into dethisinh (sbd, macauhoi, socau, dapan, dapanA, dapanB, dapanC, dapanD, dapanE, dapanF, imgviaupaA, imgviaupaB, imgviaupaC, imgviaupaD, imgviaupaE, imgviaupaF, mamodun) values('".$_SESSION['sbd']."','".$r['macauhoi']."','$i','D','".$r['paB']."','".$r['paC']."','".$r['paD']."','".$r['paA']."','".$r['paF']."','".$r['paE']."','".$r['imgviaupaB']."','".$r['imgviaupaC']."','".$r['imgviaupaD']."','".$r['imgviaupaA']."','".$r['imgviaupaF']."','".$r['imgviaupaE']."','".$_GET['id']."')"); //Ghi đề của thí sinh
										if ($r['dapan']=="B") mysqli_query($connect,"insert into dethisinh (sbd, macauhoi, socau, dapan, dapanA, dapanB, dapanC, dapanD, dapanE, dapanF, imgviaupaA, imgviaupaB, imgviaupaC, imgviaupaD, imgviaupaE, imgviaupaF, mamodun) values('".$_SESSION['sbd']."','".$r['macauhoi']."','$i','D','".$r['paA']."','".$r['paC']."','".$r['paD']."','".$r['paB']."','".$r['paF']."','".$r['paE']."','".$r['imgviaupaA']."','".$r['imgviaupaC']."','".$r['imgviaupaD']."','".$r['imgviaupaB']."','".$r['imgviaupaF']."','".$r['imgviaupaE']."','".$_GET['id']."')"); //Ghi đề của thí sinh
										if ($r['dapan']=="C") mysqli_query($connect,"insert into dethisinh (sbd, macauhoi, socau, dapan, dapanA, dapanB, dapanC, dapanD, dapanE, dapanF, imgviaupaA, imgviaupaB, imgviaupaC, imgviaupaD, imgviaupaE, imgviaupaF, mamodun) values('".$_SESSION['sbd']."','".$r['macauhoi']."','$i','D','".$r['paB']."','".$r['paA']."','".$r['paD']."','".$r['paC']."','".$r['paF']."','".$r['paE']."','".$r['imgviaupaB']."','".$r['imgviaupaA']."','".$r['imgviaupaD']."','".$r['imgviaupaC']."','".$r['imgviaupaF']."','".$r['imgviaupaE']."','".$_GET['id']."')"); //Ghi đề của thí sinh
										if ($r['dapan']=="D") mysqli_query($connect,"insert into dethisinh (sbd, macauhoi, socau, dapan, dapanA, dapanB, dapanC, dapanD, dapanE, dapanF, imgviaupaA, imgviaupaB, imgviaupaC, imgviaupaD, imgviaupaE, imgviaupaF, mamodun) values('".$_SESSION['sbd']."','".$r['macauhoi']."','$i','D','".$r['paB']."','".$r['paC']."','".$r['paA']."','".$r['paD']."','".$r['paF']."','".$r['paE']."','".$r['imgviaupaB']."','".$r['imgviaupaC']."','".$r['imgviaupaA']."','".$r['imgviaupaD']."','".$r['imgviaupaF']."','".$r['imgviaupaE']."','".$_GET['id']."')"); //Ghi đề của thí sinh
										if ($r['dapan']=="E") mysqli_query($connect,"insert into dethisinh (sbd, macauhoi, socau, dapan, dapanA, dapanB, dapanC, dapanD, dapanE, dapanF, imgviaupaA, imgviaupaB, imgviaupaC, imgviaupaD, imgviaupaE, imgviaupaF, mamodun) values('".$_SESSION['sbd']."','".$r['macauhoi']."','$i','D','".$r['paB']."','".$r['paC']."','".$r['paD']."','".$r['paE']."','".$r['paF']."','".$r['paA']."','".$r['imgviaupaB']."','".$r['imgviaupaC']."','".$r['imgviaupaD']."','".$r['imgviaupaE']."','".$r['imgviaupaF']."','".$r['imgviaupaA']."','".$_GET['id']."')"); //Ghi đề của thí sinh
										if ($r['dapan']=="F") mysqli_query($connect,"insert into dethisinh (sbd, macauhoi, socau, dapan, dapanA, dapanB, dapanC, dapanD, dapanE, dapanF,  imgviaupaA, imgviaupaB, imgviaupaC, imgviaupaD, imgviaupaE, imgviaupaF, mamodun) values('".$_SESSION['sbd']."','".$r['macauhoi']."','$i','D','".$r['paB']."','".$r['paC']."','".$r['paD']."','".$r['paF']."','".$r['paA']."','".$r['paE']."','".$r['imgviaupaB']."','".$r['imgviaupaC']."','".$r['imgviaupaD']."','".$r['imgviaupaF']."','".$r['imgviaupaA']."','".$r['imgviaupaE']."','".$_GET['id']."')"); //Ghi đề của thí sinh
										}
										if ($dp==5){
											if ($r['dapan']=="A") mysqli_query($connect,"insert into dethisinh (sbd, macauhoi, socau, dapan, dapanA, dapanB, dapanC, dapanD, dapanE, dapanF,  imgviaupaA, imgviaupaB, imgviaupaC, imgviaupaD, imgviaupaE, imgviaupaF, mamodun) values('".$_SESSION['sbd']."','".$r['macauhoi']."','$i','E','".$r['paE']."','".$r['paC']."','".$r['paB']."','".$r['paD']."','".$r['paA']."','".$r['paF']."','".$r['imgviaupaE']."','".$r['imgviaupaC']."','".$r['imgviaupaB']."','".$r['imgviaupaD']."','".$r['imgviaupaA']."','".$r['imgviaupaF']."','".$_GET['id']."')"); //Ghi đề của thí sinh
											if ($r['dapan']=="B") mysqli_query($connect,"insert into dethisinh (sbd, macauhoi, socau, dapan, dapanA, dapanB, dapanC, dapanD, dapanE, dapanF, imgviaupaA, imgviaupaB, imgviaupaC, imgviaupaD, imgviaupaE, imgviaupaF, mamodun) values('".$_SESSION['sbd']."','".$r['macauhoi']."','$i','E','".$r['paE']."','".$r['paC']."','".$r['paA']."','".$r['paD']."','".$r['paB']."','".$r['paF']."','".$r['imgviaupaE']."','".$r['imgviaupaC']."','".$r['imgviaupaA']."','".$r['imgviaupaD']."','".$r['imgviaupaB']."','".$r['imgviaupaF']."','".$_GET['id']."')"); //Ghi đề của thí sinh
											if ($r['dapan']=="C") mysqli_query($connect,"insert into dethisinh (sbd, macauhoi, socau, dapan, dapanA, dapanB, dapanC, dapanD, dapanE, dapanF, imgviaupaA, imgviaupaB, imgviaupaC, imgviaupaD, imgviaupaE, imgviaupaF, mamodun) values('".$_SESSION['sbd']."','".$r['macauhoi']."','$i','E','".$r['paE']."','".$r['paA']."','".$r['paB']."','".$r['paD']."','".$r['paC']."','".$r['paF']."','".$r['imgviaupaE']."','".$r['imgviaupaA']."','".$r['imgviaupaB']."','".$r['imgviaupaD']."','".$r['imgviaupaC']."','".$r['imgviaupaF']."','".$_GET['id']."')"); //Ghi đề của thí sinh
											if ($r['dapan']=="D") mysqli_query($connect,"insert into dethisinh (sbd, macauhoi, socau, dapan, dapanA, dapanB, dapanC, dapanD, dapanE, dapanF, imgviaupaA, imgviaupaB, imgviaupaC, imgviaupaD, imgviaupaE, imgviaupaF, mamodun) values('".$_SESSION['sbd']."','".$r['macauhoi']."','$i','E','".$r['paE']."','".$r['paC']."','".$r['paB']."','".$r['paA']."','".$r['paD']."','".$r['paF']."','".$r['imgviaupaE']."','".$r['imgviaupaC']."','".$r['imgviaupaB']."','".$r['imgviaupaA']."','".$r['imgviaupaD']."','".$r['imgviaupaF']."','".$_GET['id']."')"); //Ghi đề của thí sinh
											if ($r['dapan']=="E") mysqli_query($connect,"insert into dethisinh (sbd, macauhoi, socau, dapan, dapanA, dapanB, dapanC, dapanD, dapanE, dapanF, imgviaupaA, imgviaupaB, imgviaupaC, imgviaupaD, imgviaupaE, imgviaupaF, mamodun) values('".$_SESSION['sbd']."','".$r['macauhoi']."','$i','E','".$r['paA']."','".$r['paC']."','".$r['paB']."','".$r['paD']."','".$r['paE']."','".$r['paF']."','".$r['imgviaupaA']."','".$r['imgviaupaC']."','".$r['imgviaupaB']."','".$r['imgviaupaD']."','".$r['imgviaupaE']."','".$r['imgviaupaF']."','".$_GET['id']."')"); //Ghi đề của thí sinh
											if ($r['dapan']=="F") mysqli_query($connect,"insert into dethisinh (sbd, macauhoi, socau, dapan, dapanA, dapanB, dapanC, dapanD, dapanE, dapanF, imgviaupaA, imgviaupaB, imgviaupaC, imgviaupaD, imgviaupaE, imgviaupaF, mamodun) values('".$_SESSION['sbd']."','".$r['macauhoi']."','$i','E','".$r['paE']."','".$r['paC']."','".$r['paB']."','".$r['paD']."','".$r['paF']."','".$r['paA']."','".$r['imgviaupaE']."','".$r['imgviaupaC']."','".$r['imgviaupaB']."','".$r['imgviaupaD']."','".$r['imgviaupaF']."','".$r['imgviaupaA']."','".$_GET['id']."')"); //Ghi đề của thí sinh
										}
										if ($dp==6){
											if ($r['dapan']=="A") mysqli_query($connect,"insert into dethisinh (sbd, macauhoi, socau, dapan, dapanA, dapanB, dapanC, dapanD, dapanE, dapanF, imgviaupaA, imgviaupaB, imgviaupaC, imgviaupaD, imgviaupaE, imgviaupaF, mamodun) values('".$_SESSION['sbd']."','".$r['macauhoi']."','$i','F','".$r['paF']."','".$r['paC']."','".$r['paB']."','".$r['paD']."','".$r['paE']."','".$r['paA']."','".$r['imgviaupaF']."','".$r['imgviaupaC']."','".$r['imgviaupaB']."','".$r['imgviaupaD']."','".$r['imgviaupaE']."','".$r['imgviaupaA']."','".$_GET['id']."')"); //Ghi đề của thí sinh
											if ($r['dapan']=="B") mysqli_query($connect,"insert into dethisinh (sbd, macauhoi, socau, dapan, dapanA, dapanB, dapanC, dapanD, dapanE, dapanF, imgviaupaA, imgviaupaB, imgviaupaC, imgviaupaD, imgviaupaE, imgviaupaF, mamodun) values('".$_SESSION['sbd']."','".$r['macauhoi']."','$i','F','".$r['paF']."','".$r['paC']."','".$r['paA']."','".$r['paD']."','".$r['paE']."','".$r['paB']."','".$r['imgviaupaF']."','".$r['imgviaupaC']."','".$r['imgviaupaA']."','".$r['imgviaupaD']."','".$r['imgviaupaE']."','".$r['imgviaupaB']."','".$_GET['id']."')"); //Ghi đề của thí sinh
											if ($r['dapan']=="C") mysqli_query($connect,"insert into dethisinh (sbd, macauhoi, socau, dapan, dapanA, dapanB, dapanC, dapanD, dapanE, dapanF, imgviaupaA, imgviaupaB, imgviaupaC, imgviaupaD, imgviaupaE, imgviaupaF, mamodun) values('".$_SESSION['sbd']."','".$r['macauhoi']."','$i','F','".$r['paF']."','".$r['paA']."','".$r['paB']."','".$r['paD']."','".$r['paE']."','".$r['paC']."','".$r['imgviaupaF']."','".$r['imgviaupaA']."','".$r['imgviaupaB']."','".$r['imgviaupaD']."','".$r['imgviaupaE']."','".$r['imgviaupaC']."','".$_GET['id']."')"); //Ghi đề của thí sinh
											if ($r['dapan']=="D") mysqli_query($connect,"insert into dethisinh (sbd, macauhoi, socau, dapan, dapanA, dapanB, dapanC, dapanD, dapanE, dapanF, imgviaupaA, imgviaupaB, imgviaupaC, imgviaupaD, imgviaupaE, imgviaupaF, mamodun) values('".$_SESSION['sbd']."','".$r['macauhoi']."','$i','F','".$r['paF']."','".$r['paC']."','".$r['paB']."','".$r['paA']."','".$r['paE']."','".$r['paD']."','".$r['imgviaupaF']."','".$r['imgviaupaC']."','".$r['imgviaupaB']."','".$r['imgviaupaA']."','".$r['imgviaupaE']."','".$r['imgviaupaD']."','".$_GET['id']."')"); //Ghi đề của thí sinh
											if ($r['dapan']=="E") mysqli_query($connect,"insert into dethisinh (sbd, macauhoi, socau, dapan, dapanA, dapanB, dapanC, dapanD, dapanE, dapanF, imgviaupaA, imgviaupaB, imgviaupaC, imgviaupaD, imgviaupaE, imgviaupaF, mamodun) values('".$_SESSION['sbd']."','".$r['macauhoi']."','$i','F','".$r['paF']."','".$r['paC']."','".$r['paB']."','".$r['paD']."','".$r['paA']."','".$r['paE']."','".$r['imgviaupaF']."','".$r['imgviaupaC']."','".$r['imgviaupaB']."','".$r['imgviaupaD']."','".$r['imgviaupaA']."','".$r['imgviaupaE']."','".$_GET['id']."')"); //Ghi đề của thí sinh
											if ($r['dapan']=="F") mysqli_query($connect,"insert into dethisinh (sbd, macauhoi, socau, dapan, dapanA, dapanB, dapanC, dapanD, dapanE, dapanF, imgviaupaA, imgviaupaB, imgviaupaC, imgviaupaD, imgviaupaE, imgviaupaF, mamodun) values('".$_SESSION['sbd']."','".$r['macauhoi']."','$i','F','".$r['paA']."','".$r['paC']."','".$r['paB']."','".$r['paD']."','".$r['paE']."','".$r['paF']."','".$r['imgviaupaA']."','".$r['imgviaupaC']."','".$r['imgviaupaB']."','".$r['imgviaupaD']."','".$r['imgviaupaE']."','".$r['imgviaupaF']."','".$_GET['id']."')"); //Ghi đề của thí sinh
										}
									}
									else { // Trường họp có 4 đáp án
										$dp=rand(1,4); // Sinh ngẫu nhiên đáp án đúng
										if ($dp==1){
											if ($r['dapan']=="A")
											mysqli_query($connect,"insert into dethisinh (sbd, macauhoi, socau, dapan, dapanA, dapanB, dapanC, dapanD, imgviaupaA, imgviaupaB, imgviaupaC, imgviaupaD, mamodun) values('".$_SESSION['sbd']."','".$r['macauhoi']."','$i','A','".$r['paA']."','".$r['paB']."','".$r['paC']."','".$r['paD']."','".$r['imgviaupaA']."','".$r['imgviaupaB']."','".$r['imgviaupaC']."','".$r['imgviaupaD']."','".$_GET['id']."')"); //Ghi đề của thí sinh
											if ($r['dapan']=="B")
											mysqli_query($connect,"insert into dethisinh (sbd, macauhoi, socau, dapan, dapanA, dapanB, dapanC, dapanD,imgviaupaA, imgviaupaB, imgviaupaC, imgviaupaD, mamodun) values('".$_SESSION['sbd']."','".$r['macauhoi']."','$i','A','".$r['paB']."','".$r['paA']."','".$r['paC']."','".$r['paD']."','".$r['imgviaupaB']."','".$r['imgviaupaA']."','".$r['imgviaupaC']."','".$r['imgviaupaD']."','".$_GET['id']."')"); //Ghi đề của thí sinh
											if ($r['dapan']=="C")
											mysqli_query($connect,"insert into dethisinh (sbd, macauhoi, socau, dapan, dapanA, dapanB, dapanC, dapanD,imgviaupaA, imgviaupaB, imgviaupaC, imgviaupaD, mamodun) values('".$_SESSION['sbd']."','".$r['macauhoi']."','$i','A','".$r['paC']."','".$r['paB']."','".$r['paA']."','".$r['paD']."','".$r['imgviaupaC']."','".$r['imgviaupaB']."','".$r['imgviaupaA']."','".$r['imgviaupaD']."','".$_GET['id']."')"); //Ghi đề của thí sinh
											if ($r['dapan']=="D")
											mysqli_query($connect,"insert into dethisinh (sbd, macauhoi, socau, dapan, dapanA, dapanB, dapanC, dapanD,imgviaupaA, imgviaupaB, imgviaupaC, imgviaupaD, mamodun) values('".$_SESSION['sbd']."','".$r['macauhoi']."','$i','A','".$r['paD']."','".$r['paB']."','".$r['paC']."','".$r['paA']."','".$r['imgviaupaD']."','".$r['imgviaupaB']."','".$r['imgviaupaC']."','".$r['imgviaupaA']."','".$_GET['id']."')"); //Ghi đề của thí sinh
										}
										if ($dp==2){//oke
											if ($r['dapan']=="A")
											mysqli_query($connect,"insert into dethisinh (sbd, macauhoi, socau, dapan, dapanA, dapanB, dapanC, dapanD, imgviaupaA, imgviaupaB, imgviaupaC, imgviaupaD,mamodun) values('".$_SESSION['sbd']."','".$r['macauhoi']."','$i','B','".$r['paC']."','".$r['paA']."','".$r['paB']."','".$r['paD']."','".$r['imgviaupaC']."','".$r['imgviaupaA']."','".$r['imgviaupaB']."','".$r['imgviaupaD']."','".$_GET['id']."')"); //Ghi đề của thí sinh
											if ($r['dapan']=="B")
											mysqli_query($connect,"insert into dethisinh (sbd, macauhoi, socau, dapan, dapanA, dapanB, dapanC, dapanD,imgviaupaA, imgviaupaB, imgviaupaC, imgviaupaD, mamodun) values('".$_SESSION['sbd']."','".$r['macauhoi']."','$i','B','".$r['paC']."','".$r['paB']."','".$r['paA']."','".$r['paD']."','".$r['imgviaupaC']."','".$r['imgviaupaB']."','".$r['imgviaupaA']."','".$r['imgviaupaD']."','".$_GET['id']."')"); //Ghi đề của thí sinh
											if ($r['dapan']=="C")
											mysqli_query($connect,"insert into dethisinh (sbd, macauhoi, socau, dapan, dapanA, dapanB, dapanC, dapanD,imgviaupaA, imgviaupaB, imgviaupaC, imgviaupaD, mamodun) values('".$_SESSION['sbd']."','".$r['macauhoi']."','$i','B','".$r['paB']."','".$r['paC']."','".$r['paA']."','".$r['paD']."','".$r['imgviaupaB']."','".$r['imgviaupaC']."','".$r['imgviaupaA']."','".$r['imgviaupaD']."','".$_GET['id']."')"); //Ghi đề của thí sinh
											if ($r['dapan']=="D")
											mysqli_query($connect,"insert into dethisinh (sbd, macauhoi, socau, dapan, dapanA, dapanB, dapanC, dapanD,imgviaupaA, imgviaupaB, imgviaupaC, imgviaupaD, mamodun) values('".$_SESSION['sbd']."','".$r['macauhoi']."','$i','B','".$r['paC']."','".$r['paD']."','".$r['paB']."','".$r['paA']."','".$r['imgviaupaC']."','".$r['imgviaupaD']."','".$r['imgviaupaB']."','".$r['imgviaupaA']."','".$_GET['id']."')"); //Ghi đề của thí sinh
											
										}
										if ($dp==3){//oke
											if ($r['dapan']=="A")
											mysqli_query($connect,"insert into dethisinh (sbd, macauhoi, socau, dapan, dapanA, dapanB, dapanC, dapanD,imgviaupaA, imgviaupaB, imgviaupaC, imgviaupaD, mamodun) values('".$_SESSION['sbd']."','".$r['macauhoi']."','$i','C','".$r['paB']."','".$r['paD']."','".$r['paA']."','".$r['paC']."','".$r['imgviaupaB']."','".$r['imgviaupaD']."','".$r['imgviaupaA']."','".$r['imgviaupaC']."','".$_GET['id']."')"); //Ghi đề của thí sinh
											if ($r['dapan']=="B")
											mysqli_query($connect,"insert into dethisinh (sbd, macauhoi, socau, dapan, dapanA, dapanB, dapanC, dapanD, imgviaupaA, imgviaupaB, imgviaupaC, imgviaupaD,mamodun) values('".$_SESSION['sbd']."','".$r['macauhoi']."','$i','C','".$r['paC']."','".$r['paD']."','".$r['paB']."','".$r['paA']."','".$r['imgviaupaC']."','".$r['imgviaupaD']."','".$r['imgviaupaB']."','".$r['imgviaupaA']."','".$_GET['id']."')"); //Ghi đề của thí sinh
											if ($r['dapan']=="C")
											mysqli_query($connect,"insert into dethisinh (sbd, macauhoi, socau, dapan, dapanA, dapanB, dapanC, dapanD,imgviaupaA, imgviaupaB, imgviaupaC, imgviaupaD, mamodun) values('".$_SESSION['sbd']."','".$r['macauhoi']."','$i','C','".$r['paB']."','".$r['paA']."','".$r['paC']."','".$r['paD']."','".$r['imgviaupaB']."','".$r['imgviaupaA']."','".$r['imgviaupaC']."','".$r['imgviaupaD']."','".$_GET['id']."')"); //Ghi đề của thí sinh
										
											if ($r['dapan']=="D")
											mysqli_query($connect,"insert into dethisinh (sbd, macauhoi, socau, dapan, dapanA, dapanB, dapanC, dapanD,imgviaupaA, imgviaupaB, imgviaupaC, imgviaupaD, mamodun) values('".$_SESSION['sbd']."','".$r['macauhoi']."','$i','C','".$r['paC']."','".$r['paA']."','".$r['paD']."','".$r['paB']."','".$r['imgviaupaC']."','".$r['imgviaupaA']."','".$r['imgviaupaD']."','".$r['imgviaupaB']."','".$_GET['id']."')"); //Ghi đề của thí sinh
										}
										if ($dp==4){
											if ($r['dapan']=="A")
											mysqli_query($connect,"insert into dethisinh (sbd, macauhoi, socau, dapan, dapanA, dapanB, dapanC, dapanD,imgviaupaA, imgviaupaB, imgviaupaC, imgviaupaD, mamodun) values('".$_SESSION['sbd']."','".$r['macauhoi']."','$i','D','".$r['paD']."','".$r['paC']."','".$r['paB']."','".$r['paA']."','".$r['imgviaupaD']."','".$r['imgviaupaC']."','".$r['imgviaupaB']."','".$r['imgviaupaA']."','".$_GET['id']."')"); //Ghi đề của thí sinh
											if ($r['dapan']=="B")
											mysqli_query($connect,"insert into dethisinh (sbd, macauhoi, socau, dapan, dapanA, dapanB, dapanC, dapanD,imgviaupaA, imgviaupaB, imgviaupaC, imgviaupaD, mamodun) values('".$_SESSION['sbd']."','".$r['macauhoi']."','$i','D','".$r['paC']."','".$r['paA']."','".$r['paD']."','".$r['paB']."','".$r['imgviaupaC']."','".$r['imgviaupaA']."','".$r['imgviaupaD']."','".$r['imgviaupaB']."','".$_GET['id']."')"); //Ghi đề của thí sinh
											if ($r['dapan']=="C")
											mysqli_query($connect,"insert into dethisinh (sbd, macauhoi, socau, dapan, dapanA, dapanB, dapanC, dapanD,imgviaupaA, imgviaupaB, imgviaupaC, imgviaupaD, mamodun) values('".$_SESSION['sbd']."','".$r['macauhoi']."','$i','D','".$r['paD']."','".$r['paA']."','".$r['paB']."','".$r['paC']."','".$r['imgviaupaD']."','".$r['imgviaupaA']."','".$r['imgviaupaB']."','".$r['imgviaupaC']."','".$_GET['id']."')"); //Ghi đề của thí sinh
											if ($r['dapan']=="D")
											mysqli_query($connect,"insert into dethisinh (sbd, macauhoi, socau, dapan, dapanA, dapanB, dapanC, dapanD, imgviaupaA, imgviaupaB, imgviaupaC, imgviaupaD, mamodun) values('".$_SESSION['sbd']."','".$r['macauhoi']."','$i','D','".$r['paC']."','".$r['paA']."','".$r['paB']."','".$r['paD']."','".$r['imgviaupaC']."','".$_GET['id']."')"); //Ghi đề của thí sinh
										}
									}
								}
							}
						}
					}
				}
				$_SESSION['tongcauhoi']=$i;
				$_SESSION['tongphanthi']=--$ii;
			}
	}
?>

<!doctype html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="image/icon.jpg" type="image/x-icon">
    <title>Xác nhận làm bài</title>
    <link rel="stylesheet" href="style/index.css" type="text/css">
    <link rel="stylesheet" href="style/monthi.css" type="text/css">
    <link rel="stylesheet" href="style/xnthi.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="style/bootstrap.min.css">
    <script src="js/jquery-3.1.1.js"></script>
    <script src="js/index.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script>
		$(document).ready(function(e){
			var a="<?php echo $_GET['id'];?>";
			$("#btn").click(function(e){
				window.location='exam.php?ID='+a+"&"+"fx="+parseInt(new Date().getTime()/1000)+"&"+"sc=1&abcdef=<?php if (isset($_GET['abcdef'])) echo $_GET['abcdef']; else echo ""; ?>";
			});
		});

		var t=<?php echo $ttime; ?>;
		// var cookieArr=document.cookie.split(";");
        var lc1;
        var cookieArr=document.cookie.split(";");
        for (var k=0; k<cookieArr.length; k++){
        	lc1=cookieArr[k].split("=");
        	if (lc1[0]=="time" && lc1[1]==0){
        		document.cookie="time="+(t*60)+"; expires=Fri 30 Aug 2029 10:00:00 UTC";
        		break;
        	}
        }

        var bo=<?php echo $boolean; ?>;
        if (bo==1){
        	document.cookie="time="+(t*60)+"; expires=Fri 30 Aug 2029 10:00:00 UTC";
        }
        
		setInterval(timer,1000);
		var mins=1, second=30, m,s;
		var a="<?php echo $_GET['id'];?>";
		function timer(){
			if (second==0){mins--, second=60;}
			second--;
			if (second<10) s='0'+second; else s=second;
			if (m<10) m='0'+mins; else m=mins;
			document.getElementById("time_begin").innerHTML=m+":"+s;
			if (second==0&&mins==0) window.location='exam.php?ID='+a+"&"+"fx="+parseInt(new Date().getTime()/1000)+"&"+"sc=1&abcdef=<?php if (isset($_GET['abcdef'])) echo $_GET['abcdef']; else echo ""; ?>";
		}
		
	</script>
</head>

<body>
	<div class="back_out">
    	<!--show background black-->
    </div>
	<div class="back_over">
    	<!--show background status image gif-->
    </div>
    <div class="row" style="margin-right: 0; margin-left: 0;">
        <div class="col-md-8 col-md-offset-2" style="">
            <div class="row panel">
                <div class="col-md-12 banner"></div>
                <div class="col-md-12">
                	<div class="col-md-12" style="margin-top: 1em; border-bottom: 1px solid #dfdfdf; text-align: center;">
                			<p style="font-weight: bold;">BÀI THI: <span style="text-transform: uppercase; color: red;"><?php if (isset($_GET['abcdef'])) echo $_GET['abcdef']; else echo "";?></span></p>
                		</div>
                </div>
                <div class="col-md-12" style="padding: 1em 3em; border-top: 2px solid blue; font-weight: bold;">
        			<p style="margin-top:1.6em;">
		            	Số lượng câu hỏi:
		            	<span style="color:red; font-size:17px;"><?php echo $tongch; ?></span> câu
		            </p>
					<p>Thời gian làm bài: <span style="color:red; font-size:17px;"><?php echo $ttime; ?></span> phút</p>
		            <p><span style="color: red;">-</span> Bắt đầu vào bài thi thời gian sẽ được tính. Thí sinh bắt buộc phải hoàn thành bài thi của mình trong thời gian cho phép, quá thời gian cho phép hệ thống sẽ tự động dừng bài thi và trả kết quả.</p>
		            <p><span style="color: red;">-</span> Khi thí sinh không bấm nút: <span style="color: red;">"Bắt đầu làm bài"</span>, bài thi tự động bắt đầu sau: <span id="time_begin" style="color: red; font-size: 16px; font-weight: bold;"></span>.</p>
        		</div>
            	<div class="col-md-12" style="padding: 1em; border-top: 1px solid #dfdfdf; text-align: center;">
            		<button id="btn" class="btn btn-md btn-primary">Bắt đầu làm bài</button>
            	</div>
            </div>
        </div>
    </div>
</body>
</html>