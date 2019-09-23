<?php
	session_start();
	if (!isset($_SESSION['sbd'])) echo "<script>window.location='index.php';</script>";
	require_once("config.php");
	// mysqli_set_charset($connect,'utf8');
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	// $temp=$_GET['temp'];
	// $t=$_GET['tg'];
	// $d=json_encode($_GET['d']);
	// var_dump($d);
	$tm=600-$_GET['tgth'];
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
            document.cookie="lll=0; expires=Fri 30 Aug 1970 10:00:00 UTC";
        }
    </script>
</head>

<body>
	
    <div class="examcontent_p2">
    	<div class="examcontent_p2_1">
            <p>GIAO DIỆN ĐIỂM THI</span></p>
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
                        <td></td>
                        <td></td>
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
				// $bode=mysqli_query($connect,"select mabode,tenbode,diemmax from bode where mamodun='".$_SESSION['modunid']."'");
                $tl=mysqli_query($connect, "select traloi from temp where sbd='".$_SESSION['sbd']."'");
                $rtl=mysqli_fetch_array($tl, MYSQLI_ASSOC);
                $artl=explode(",", $rtl['traloi']);
                $diemp=mysqli_query($connect,"select dapan from dethisinhthu order by socau");
                $arraydiem=array();
                while($rdiem=mysqli_fetch_array($diemp, MYSQLI_ASSOC)){
                    array_push($arraydiem, $rdiem['dapan']);
                }
                // 6 Module
				$sum=0; $k=1;
				while ($k<=6){
					$sum_temp=0;
					$caudung=0;
					echo "<tr>";
					switch ($k) {
                        case 1:
                            echo "<td style='font-weight:bold;'>Kiến thức quản lý</td>";
                            for ($d=1; $d<=10; $d++) {
                                if ($artl[$d-1]===$arraydiem[$d-1]){
                                    $sum_temp+=2;
                                    $caudung++;
                                }
                            }
                            echo "<td style='text-align:center;'>".$caudung."/10</td>";
                            $sum+=$sum_temp;
                            echo "<td style='text-align:center;'>$sum_temp/20</td>";
                            echo "</tr>";
                            break;
                        case 2:
                            echo "<td style='font-weight:bold;'>Kiến thức BIDV</td>";
                            for ($d=11; $d<=20; $d++) {
                                if ($artl[$d-1]===$arraydiem[$d-1]){
                                    $sum_temp+=2;
                                    $caudung++;
                                }
                            }
                            echo "<td style='text-align:center;'>".$caudung."/10</td>";
                            $sum+=$sum_temp;
                            echo "<td style='text-align:center;'>$sum_temp/20</td>";
                            echo "</tr>";
                            break;
                        case 3:
                            echo "<td style='font-weight:bold;'>Tạo ảnh hưởng</td>";
                            for ($d=21; $d<=30; $d++) {
                                if ($artl[$d-1]===$arraydiem[$d-1]){
                                    $sum_temp+=1.5;
                                    $caudung++;
                                }
                            }
                            echo "<td style='text-align:center;'>".$caudung."/10</td>";
                            $sum+=$sum_temp;
                            echo "<td style='text-align:center;'>$sum_temp/15</td>";
                            echo "</tr>";
                            break;
                        case 4:
                            echo "<td style='font-weight:bold;'>Hướng dẫn kèm cặp cán bộ</td>";
                            for ($d=31; $d<=40; $d++) {
                                if ($artl[$d-1]===$arraydiem[$d-1]){
                                    $sum_temp+=1.5;
                                    $caudung++;
                                }
                            }
                            echo "<td style='text-align:center;'>".$caudung."/10</td>";
                            $sum+=$sum_temp;
                            echo "<td style='text-align:center;'>$sum_temp/15</td>";
                            echo "</tr>";
                            break;
                        case 5:
                            echo "<td style='font-weight:bold;'>Làm việc nhóm</td>";
                            for ($d=41; $d<=50; $d++) {
                                if ($artl[$d-1]===$arraydiem[$d-1]){
                                    $sum_temp+=1.5;
                                    $caudung++;
                                }
                            }
                            echo "<td style='text-align:center;'>".$caudung."/10</td>";
                            $sum+=$sum_temp;
                            echo "<td style='text-align:center;'>$sum_temp/15</td>";
                            echo "</tr>";
                            break;
                        default:
                            echo "<td style='font-weight:bold;'>Lập kế hoạch</td>";
                            for ($d=51; $d<=60; $d++) {
                                if ($artl[$d-1]===$arraydiem[$d-1]){
                                    $sum_temp+=1.5;
                                    $caudung++;
                                }
                            }
                            echo "<td style='text-align:center;'>".$caudung."/10</td>";
                            $sum+=$sum_temp;
                            echo "<td style='text-align:center;'>$sum_temp/15</td>";
                            echo "</tr>";
                            break;
                    }
                    if ($k==1) {   
                        
                    }
                    $k++;
				}
			?>
            <tr>
            	<td>---</td>
            	<td><strong style="color:blue;">TỔNG ĐIỂM TOÀN BÀI THI</strong></td>
                <td style=" text-align: center;"><span style="color:#FE2000; font-size:17px; font-weight:bold;"><?php echo $sum; ?></span></td>
            </tr>
            </table>
        </div>
    </div>
</body>
</html>