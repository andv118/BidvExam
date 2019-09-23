<?php
    session_start();
    if (!isset($_SESSION['admin'])) echo "<script>window.location='index.php'</script>";
    if (isset($_SESSION['makythi'])){
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quản trị hệ thống &#8212; Setting</title>
    <link href="../style/bootstrap.css" rel="stylesheet">
    <link href="../style/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="../style/jsgrid/dist/jsgrid.min.css"/>
    <link type="text/css" rel="stylesheet" href="../style/jsgrid/dist/jsgrid-theme.min.css" />
    <link href="../style/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <lik href="../style/css/animate.css" rel="stylesheet">
    <link href="../style/css/style.min.css" rel="stylesheet">
    <link href="../style/css/colors/megna.css" id="theme" rel="stylesheet">
</head>

<body>
    <?php include("sitebar.php"); ?>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row bg-title" style="margin-bottom: 0.5em; padding: 0.5em;">
                <div class="col-md-12">
                    <h4>THỐNG KÊ NHANH</h4>
                    <p style="font-weight: bold; color: #c36565;"><?php echo $_SESSION['tenkythi']; ?></p>
                </div>
            </div>
            <div class="row white-box" style="margin-top: 0;">
            	<?php
	                include("../config.php");
	                $d=mysqli_query($connect, "select macathi, tencathi from cathi where makythi='".$_SESSION['makythi']."'");
	                $monthi= mysqli_query($connect, "select mamodun from modun where makythi='".$_SESSION['makythi']."'");
	                $tong1=0; $tong2=0; $tong3=0; $tong4=0;
	                $tthi1=0; $tthi2=0; $tthi3=0; $tthi4=0;
	                while ($rmonthi= mysqli_fetch_array($monthi, MYSQLI_ASSOC)){
	                	$diem= mysqli_query($connect, "select sbd, diem from diem where mamodun='".$rmonthi['mamodun']."'");
	                	$tongthi= mysqli_num_rows($diem);
	                	$tongdat= 0;
	                	if ($rmonthi['mamodun']=='M1'){
		                	while ($rdiem= mysqli_fetch_array($diem, MYSQLI_ASSOC)){
		                		if ($rdiem['diem']>59){
		                			$t1=0; $t2=0; $t3=0; $t4=0;
		                			$kn1= mysqli_query($connect, "select macauhoi from dethisinh where mamodun='".$rmonthi['mamodun']."' and temp=dapan and sbd='".$rdiem['sbd']."' and socau between 21 and 30");
		                			while ($rkn1= mysqli_fetch_array($kn1, MYSQLI_ASSOC)){
		                				$sodiem= mysqli_query($connect, "select sodiem from cauhoi where macauhoi='".$rkn1['macauhoi']."'");
		                				$rsodiem=mysqli_fetch_array($sodiem, MYSQLI_ASSOC);
		                				$t1+=$rsodiem['sodiem'];
		                			}
		                			
		                			$kn2= mysqli_query($connect, "select macauhoi, dapan, temp from dethisinh where mamodun='".$rmonthi['mamodun']."' and temp=dapan and sbd='".$rdiem['sbd']."' and socau between 31 and 40");
		                			while ($rkn2= mysqli_fetch_array($kn2, MYSQLI_ASSOC)){
		                				$sodiem= mysqli_query($connect, "select sodiem from cauhoi where macauhoi='".$rkn2['macauhoi']."'");
		                				$rsodiem= mysqli_fetch_array($sodiem, MYSQLI_ASSOC);
		                				$t2+= $rsodiem['sodiem'];
		                			}
		                			// echo mysqli_num_rows($kn2).$rdiem['sbd'].' '.$t2;
		                			$kn3= mysqli_query($connect, "select macauhoi, dapan, temp from dethisinh where mamodun='".$rmonthi['mamodun']."' and temp=dapan and sbd='".$rdiem['sbd']."' and socau between 41 and 50");
		                			while ($rkn3= mysqli_fetch_array($kn3, MYSQLI_ASSOC)){
		                				$sodiem= mysqli_query($connect, "select sodiem from cauhoi where macauhoi='".$rkn3['macauhoi']."'");
		                				$rsodiem= mysqli_fetch_array($sodiem, MYSQLI_ASSOC);
		                				$t3+= $rsodiem['sodiem'];
		                			}
		                			$kn4= mysqli_query($connect, "select macauhoi, dapan, temp from dethisinh where mamodun='".$rmonthi['mamodun']."' and temp=dapan and sbd='".$rdiem['sbd']."' and socau between 51 and 60");
		                			while ($rkn4= mysqli_fetch_array($kn4, MYSQLI_ASSOC)){
		                				$sodiem= mysqli_query($connect, "select sodiem from cauhoi where macauhoi='".$rkn4['macauhoi']."'");
		                				$rsodiem= mysqli_fetch_array($sodiem, MYSQLI_ASSOC);
		                				$t4+= $rsodiem['sodiem'];
		                			}
		                			// echo 'M1 -: '.$t1.' - '.$t2.' - '.$t3.' - '.$t4.'<br>';
		                			if ($t1>5 && $t2>5 && $t3>5 && $t4>5) $tongdat++;
		                		}
		                	}
		                	$tong1=$tongdat;
		                	$tthi1=$tongthi;
	                	} else if ($rmonthi['mamodun']=='M2'){
		                	while ($rdiem= mysqli_fetch_array($diem, MYSQLI_ASSOC)){
		                		if ($rdiem['diem']>59){
		                			$t1=0; $t2=0; $t3=0; $t4=0;
		                			$kn1= mysqli_query($connect, "select macauhoi from dethisinh where mamodun='".$rmonthi['mamodun']."' and temp=dapan and sbd='".$rdiem['sbd']."' and socau between 21 and 30");
		                			while ($rkn1= mysqli_fetch_array($kn1, MYSQLI_ASSOC)){
		                				$sodiem= mysqli_query($connect, "select sodiem from cauhoi where macauhoi='".$rkn1['macauhoi']."'");
		                				$rsodiem=mysqli_fetch_array($sodiem, MYSQLI_ASSOC);
		                				$t1+=$rsodiem['sodiem'];
		                			}
		                			$kn2= mysqli_query($connect, "select macauhoi, dapan, temp from dethisinh where mamodun='".$rmonthi['mamodun']."' and temp=dapan and sbd='".$rdiem['sbd']."' and socau between 31 and 40");
		                			while ($rkn2= mysqli_fetch_array($kn2, MYSQLI_ASSOC)){
		                				$sodiem= mysqli_query($connect, "select sodiem from cauhoi where macauhoi='".$rkn2['macauhoi']."'");
		                				$rsodiem= mysqli_fetch_array($sodiem, MYSQLI_ASSOC);
		                				$t2+= $rsodiem['sodiem'];
		                			}
		                			$kn3= mysqli_query($connect, "select macauhoi, dapan, temp from dethisinh where mamodun='".$rmonthi['mamodun']."' and temp=dapan and sbd='".$rdiem['sbd']."' and socau between 41 and 50");
		                			while ($rkn3= mysqli_fetch_array($kn3, MYSQLI_ASSOC)){
		                				$sodiem= mysqli_query($connect, "select sodiem from cauhoi where macauhoi='".$rkn3['macauhoi']."'");
		                				$rsodiem= mysqli_fetch_array($sodiem, MYSQLI_ASSOC);
		                				$t3+= $rsodiem['sodiem'];
		                			}
		                			$kn4= mysqli_query($connect, "select macauhoi, dapan, temp from dethisinh where mamodun='".$rmonthi['mamodun']."' and temp=dapan and sbd='".$rdiem['sbd']."' and socau between 51 and 60");
		                			while ($rkn4= mysqli_fetch_array($kn4, MYSQLI_ASSOC)){
		                				$sodiem= mysqli_query($connect, "select sodiem from cauhoi where macauhoi='".$rkn4['macauhoi']."'");
		                				$rsodiem= mysqli_fetch_array($sodiem, MYSQLI_ASSOC);
		                				$t4+= $rsodiem['sodiem'];
		                			}
		                			// echo 'M2 -: '.$t1.' - '.$t2.' - '.$t3.' - '.$t4.'<br>';
		                			if ($t1>5 && $t2>5 && $t3>5 && $t4>5) $tongdat++;
		                		}
		                	}
		                	$tong2=$tongdat;
		                	$tthi2=$tongthi;
	                	} else if ($rmonthi['mamodun']=='M3'){
		                	while ($rdiem= mysqli_fetch_array($diem, MYSQLI_ASSOC)){
		                		if ($rdiem['diem']>59){
		                			$t1=0; $t2=0; $t3=0;
		                			$kn1= mysqli_query($connect, "select macauhoi from dethisinh where mamodun='".$rmonthi['mamodun']."' and temp=dapan and sbd='".$rdiem['sbd']."' and socau between 31 and 40");
		                			while ($rkn1= mysqli_fetch_array($kn1, MYSQLI_ASSOC)){
		                				$sodiem= mysqli_query($connect, "select sodiem from cauhoi where macauhoi='".$rkn1['macauhoi']."'");
		                				$rsodiem=mysqli_fetch_array($sodiem, MYSQLI_ASSOC);
		                				$t1+=$rsodiem['sodiem'];
		                			}
		                			$kn2= mysqli_query($connect, "select macauhoi, dapan, temp from dethisinh where mamodun='".$rmonthi['mamodun']."' and temp=dapan and sbd='".$rdiem['sbd']."' and socau between 41 and 50");
		                			while ($rkn2= mysqli_fetch_array($kn2, MYSQLI_ASSOC)){
		                				$sodiem= mysqli_query($connect, "select sodiem from cauhoi where macauhoi='".$rkn2['macauhoi']."'");
		                				$rsodiem= mysqli_fetch_array($sodiem, MYSQLI_ASSOC);
		                				$t2+= $rsodiem['sodiem'];
		                			}
		                			$kn3= mysqli_query($connect, "select macauhoi, dapan, temp from dethisinh where mamodun='".$rmonthi['mamodun']."' and temp=dapan and sbd='".$rdiem['sbd']."' and socau between 51 and 60");
		                			while ($rkn3= mysqli_fetch_array($kn3, MYSQLI_ASSOC)){
		                				$sodiem= mysqli_query($connect, "select sodiem from cauhoi where macauhoi='".$rkn3['macauhoi']."'");
		                				$rsodiem= mysqli_fetch_array($sodiem, MYSQLI_ASSOC);
		                				$t3+= $rsodiem['sodiem'];
		                			}
		                			// echo 'M3 -: '.$t1.' - '.$t2.' - '.$t3.'<br>';
		                			if ($t1>7 && $t2>7 && $t3>7) $tongdat++;
		                		}
		                	}
		                	$tong3=$tongdat;
		                	$tthi3=$tongthi;
	                	} else if ($rmonthi['mamodun']=='M4'){
		                	while ($rdiem= mysqli_fetch_array($diem, MYSQLI_ASSOC)){
		                		if ($rdiem['diem']>59){
		                			$t1=0; $t2=0; $t3=0;
		                			$kn1= mysqli_query($connect, "select macauhoi from dethisinh where mamodun='".$rmonthi['mamodun']."' and temp=dapan and sbd='".$rdiem['sbd']."' and socau between 31 and 40");
		                			while ($rkn1= mysqli_fetch_array($kn1, MYSQLI_ASSOC)){
		                				$sodiem= mysqli_query($connect, "select sodiem from cauhoi where macauhoi='".$rkn1['macauhoi']."'");
		                				$rsodiem=mysqli_fetch_array($sodiem, MYSQLI_ASSOC);
		                				$t1+=$rsodiem['sodiem'];
		                			}
		                			$kn2= mysqli_query($connect, "select macauhoi, dapan, temp from dethisinh where mamodun='".$rmonthi['mamodun']."' and temp=dapan and sbd='".$rdiem['sbd']."' and socau between 41 and 50");
		                			while ($rkn2= mysqli_fetch_array($kn2, MYSQLI_ASSOC)){
		                				$sodiem= mysqli_query($connect, "select sodiem from cauhoi where macauhoi='".$rkn2['macauhoi']."'");
		                				$rsodiem= mysqli_fetch_array($sodiem, MYSQLI_ASSOC);
		                				$t2+= $rsodiem['sodiem'];
		                			}
		                			$kn3= mysqli_query($connect, "select macauhoi, dapan, temp from dethisinh where mamodun='".$rmonthi['mamodun']."' and temp=dapan and sbd='".$rdiem['sbd']."' and socau between 51 and 60");
		                			while ($rkn3= mysqli_fetch_array($kn3, MYSQLI_ASSOC)){
		                				$sodiem= mysqli_query($connect, "select sodiem from cauhoi where macauhoi='".$rkn3['macauhoi']."'");
		                				$rsodiem= mysqli_fetch_array($sodiem, MYSQLI_ASSOC);
		                				$t3+= $rsodiem['sodiem'];
		                			}
		                			// echo 'M4 -: '.$t1.' - '.$t2.' - '.$t3.'<br>';
		                			if ($t1>7 && $t2>7 && $t3>7) $tongdat++;
		                		}
		                	}
		                	$tong4=$tongdat;
		                	$tthi4=$tongthi;
	                	}
	                }
	            ?>
	            <table class="table table-hover">
        		<thead>
        			<tr>
        				<th>STT</th>
        				<th>Vị trí/ Đề kiểm tra</th>
        				<th>Tổng số cán bộ kiểm tra</th>
        				<th>Số lượng đạt</th>
        				<th>Tỷ lệ (%)</th>
        			</tr>
        		</thead>
        		<tbody>
        			<tr>
        				<td>1</td>
        				<td>Bổ nhiệm lại Trưởng phòng</td>
        				<td><?php echo $tthi1; ?></td>
        				<td><?php echo $tong1; ?></td>
        				<td><?php if ($tthi1>0) echo round(($tong1*100)/$tthi1, 2); ?></td>
        			</tr>
        			<tr>
        				<td>2</td>
        				<td>Quy hoạch Trưởng phòng</td>
        				<td><?php echo $tthi2; ?></td>
        				<td><?php echo $tong2; ?></td>
        				<td><?php if ($tthi2>0) echo round(($tong2*100)/$tthi2, 2); ?></td>
        			</tr>
        			<tr>
        				<td>3</td>
        				<td>Bổ nhiệm lại phó Trưởng phòng</td>
        				<td><?php echo $tthi3; ?></td>
        				<td><?php echo $tong3; ?></td>
        				<td><?php if ($tthi3>0) echo round(($tong3*100)/$tthi3, 2); ?></td>
        			</tr>
        			<tr>
        				<td>4</td>
        				<td>Quy hoạch phó Trưởng phòng</td>
        				<td><?php echo $tthi4; ?></td>
        				<td><?php echo $tong4; ?></td>
        				<td><?php if ($tthi4>0) echo round(($tong4*100)/$tthi4, 2); ?></td>
        			</tr>
            	</tbody>
            	</table>
           </div>
           <a href="statistic-full.php"><button class="btn btn-md btn-primary">Tải bảng thống kê chi tiết</button></a><br><br>
           <a href="thong-ke.php?kythi=<?php echo $_SESSION['makythi']; ?>"><button class="btn btn-md btn-primary">Báo cáo thống kê câu hỏi</button></a>
           <a href="thong-ke-tmp.php"><button class="btn btn-md btn-primary">Thống kê</button></a>
        </div>
    </div>
    <!-- jquery -->
    <script src="../js/js/jquery-1.11.0.min.js"></script>
    <script src="../js/dist/js/tether.min.js"></script>
    <script src="../js/dist/js/bootstrap.min.js"></script>
    <script src="../style/bootstrap-extension/js/bootstrap-extension.min.js"></script>
    <script src="../style/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <script src="../js/js/jquery.slimscroll.js"></script>
    <script src="../js/js/waves.js"></script>
    <script src="../js/raphael/raphael-min.js"></script>
    <script src="../js/morrisjs/morris.js"></script>
    <script src="../js/peity/jquery.peity.min.js"></script>
    <script src="../js/peity/jquery.peity.init.js"></script>
    <script src="../js/js/custom.min.js"></script>
    <script src="../js/js/dashboard1.js"></script>
    <script src="../js/jsgrid/db.js"></script>
    <script type="text/javascript" src="../js/jsgrid/dist/jsgrid.min.js"></script>
    <script src="../js/js/jsgrid-init.js"></script>
</body>

</html>

<?php
    }
?>