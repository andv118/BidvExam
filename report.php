<?php
	session_start();
	if (!isset($_SESSION['sbd'])) echo "<script>window.location='index.php';</script>";
	require_once("config.php");
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	$tm=$_SESSION['tgth'];
    $hour=(int)($tm/3600);
    $tm=$tm%3600;
    $minute=(int)($tm/60);
    $tm=$tm%60;
    $second=$tm;
	if ($hour<10) $hour="0".$hour;
	if ($minute<10) $minute="0".$minute;
	if ($second<10) $second="0".$second;
    $re=$hour.":".$minute.":".$second." (giờ:phút:giây)";
?>

<!doctype html>
<html>
<head>
	<meta charset="utf-8">
    <link rel="shortcut icon" href="image/icon.jpg" type="image/x-icon">
	<title>Điểm thi</title>
    <link rel="stylesheet" type="text/css" href="style/report.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <script src="js/jquery-3.1.1.js"></script>
    <script type="text/javascript">
        window.onload=function(){
            document.cookie="time=0; expires=Fri 30 Aug 2029 10:00:00 UTC";
            document.cookie="remember=0; expires=Fri 30 Aug 1970 10:00:00 UTC";
        }
    </script>
</head>

<body>
	
    <div class="examcontent_p2">
    	<div class="examcontent_p2_1">
            <p>KỲ THI KIỂM TRA NĂNG LỰC QUẢN LÝ BIDV NĂM <?php echo date('Y'); ?>: <span style="text-transform: uppercase;"><?php if (isset($_GET['name'])) echo $_GET['name']; else echo ""; ?></span></p>
        </div>
        <div class="examcontent_p2_2">
            <div class="tongdiem">
                <p style="font-size:22px;text-align:center;">KẾT QUẢ BÀI THI</p>
                <table class="tablekq" border="1">
                    <tr>
                        <th>Số báo danh</th>
                        <th>Họ và tên</th>
                        <th>Bắt đầu</th>
                        <th>Kết thúc</th>
                        <th>Thời gian làm bài</th>
                    </tr>
                    <tr>
                        <td><?php echo $_SESSION['sbd']; ?></td>
                        <td><?php echo $_SESSION['hoten']; ?></td>
                        <?php
                            $tgbd=mysqli_query($connect,"select DATE_FORMAT(thoigianthi,'%H:%i:%s - %d/%m/%Y') as thoigianthi, DATE_FORMAT(thoigianketthuc,'%H:%i:%s - %d/%m/%Y') as thoigianketthuc from diem where sbd='".$_SESSION['sbd']."' and mamodun='".$_SESSION['modunid']."'");
                            $tgbd1=mysqli_fetch_array($tgbd, MYSQLI_NUM);
							mysqli_free_result($tgbd);
                        ?>
                        <td><?php
                            echo $tgbd1[0];
                        ?></td>
                        <td><?php
                            echo $tgbd1[1];
                        ?></td>
                        <td><?php echo $re;?></td>
                    </tr>
                </table>
            </div>
        </div>
        
        <div class="examcontent_p2_3">
        	<table class="tbchitiet" border="1">
            	<tr>
                	<th width="62%">Phần thi</th>
                    <th width="22%">Số câu đúng</th>
                    <th width="20%">Điểm thành phần</th>
                </tr>
        	<?php
				$bode=mysqli_query($connect,"select mabode,tenbode,diemmax from bode where mamodun='".$_SESSION['modunid']."'");
				$sum=0;
				while ($boderow=mysqli_fetch_array($bode)){
					$diemp=mysqli_query($connect,"SELECT dethisinh.macauhoi as macauhoi, dethisinh.dapan as dapan, dethisinh.temp as temp, socau, cauhoi.sodiem as diem from cauhoi,bode,dethisinh where cauhoi.macauhoi=dethisinh.macauhoi and cauhoi.mabode=bode.mabode and bode.mabode='".$boderow['mabode']."' and sbd='".$_SESSION['sbd']."' and dethisinh.mamodun='".$_SESSION['modunid']."' ORDER by dethisinh.socau");
					if (mysqli_num_rows($diemp)>0){
						$sum_temp=0;
						$caudung=0;
						echo "<tr>";
						echo "<td style='font-weight:bold;'>".$boderow['tenbode']."</td>";
						while ($d=mysqli_fetch_array($diemp)){
							if ($d['temp']===$d['dapan']){
								$sum_temp+=$d['diem'];
								$caudung++;
							}
						}
						echo "<td style='text-align:center;'>".$caudung."/".mysqli_num_rows($diemp)."</td>";
						$sum+=$sum_temp;
						echo "<td style='text-align:center;'>$sum_temp/".$boderow['diemmax']."</td>";
						echo "</tr>";
					}
				}
			?>
            <tr>
            	<td>---</td>
            	<td><strong style="color:blue;">TỔNG ĐIỂM TOÀN BÀI THI</strong></td>
                <td style=" text-align: center;"><span style="color:#FE2000; font-size:17px; font-weight:bold;"><?php echo $sum; ?></span></td>
            </tr>
            </table>
            <?php
				mysqli_query($connect,"update diem set diem='$sum' where sbd='".$_SESSION['sbd']."' and mamodun='".$_SESSION['modunid']."'");
				unset($_SESSION['sbd']);
				mysqli_close($connect);
			?>
        </div>
    </div>
</body>
</html>