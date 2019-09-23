<?php
	session_start();
	if (!isset($_SESSION['admin'])) echo "<script>window.location='index.php'</script>";
	require_once("../config.php");
	if (!isset($_POST['mt'])||!isset($_POST['hv'])) die("Đã xảy ra lỗi truyền dữ liệu lên server");
	if ($_POST['mt']==""||$_POST['hv']=="") die();
	$dt=mysqli_query($connect,"select diem, thoigianthi, thoigianketthuc from diem where sbd='".$_POST['hv']."' and mamodun='".$_POST['mt']."'");
	$dt1=mysqli_fetch_array($dt);
?>

<style>
	.tablekq{
		border-collapse:collapse;
		width:100%;
		font-size: 14px;
		font-family: Aria;
		color: black;
	}
	.tablekq tr th{
		font-weight: bold;
		color: black;
	}
	.tablekq tr td{
		padding: 0.4em 0.6em;
		color: black;
	}
	th{
		padding:0.4em;
		text-align:center;
	}
	.tongdiem{
		width:100%;
		font-size:13px;
		margin-bottom:2em;
		padding-top:0.5em;
		padding-bottom:0.4em;
		background:white;
	}
	.tabledapan{width:100%; border:1px solid darkgray; border-collapse:collapse;}
	.tabledapan td,.tabledapan th{border:1px solid darkgray; padding:0.5em; text-align:center;width:50%; font-size:13px;text-transform:none;}
	.tabledapan td{text-align: justify; text-align:left; padding: 0.7em 0.4em;}
	.chitiet{
		background:white;
		width:100%;
		/*padding:1em 0.2em;*/
	}
	.areaexam{
		display:block;
		margin:auto;
	}
	.cauhoi{
		width:48.7%;padding:0.4em;font-family:Helvetica,sans-serif;font-size:15px;margin-top:1em; margin-bottom:0.2em;
	}
	.tencauhoi{
		background:white;margin-top:0.5em;padding:1em;border-bottom:1px dashed rgba(170,170,170,0.3);font-family:Helvetica,sans-serif;font-size:14px;
	}
	.dapan{
		background:white;padding:1em 1em;font-size:13px !important;font-family:Helvetica,sans-serif;
	}
</style>

<script>
		function printContent(){
			var win=window.open();
			var pr=$("#load").html();
			win.document.write(pr);
			win.print();
			win.close();
		}
	</script>

<div class="main">
	<div class="tongdiem">
    	<p style="font-size:20px;text-align:center; font-weight: bold; margin-bottom: 1em;">CHI TIẾT BÀI THI</p>
        <table class="tablekq" border="1">
           	<tr>
                <th width="200px">SBD - Họ tên</th>
                <th width="400px">Môn thi</th>
                <th width="160px">Bắt đầu</th>
                <th width="160px">Kết thúc</th>
                <th width="80px">Tổng điểm</th>
            </tr>
            <tr>
                <td><?php echo $_GET['name_hv'];?></td>
                <td><?php echo $_POST['mt']." - ".$_GET['name_mt'];?></td>
                <td><?php if (isset($dt1['thoigianthi'])) echo date("H:i:s - d/m/Y",strtotime($dt1['thoigianthi']));?></td>
                <td><?php if (isset($dt1['thoigianketthuc'])) echo date("H:i:s - d/m/Y",strtotime($dt1['thoigianketthuc']));?></td>
                <td style="font-weight:bold; color:red; text-align: center;">
					<?php echo $dt1['diem'];?></td>
                </tr>
        </table>
	</div>
    
    
    <div class="chitiet">
    	<?php
			
			function str($st){ //Lấy tên đuôi file
				$j=strlen($st)-1;
				$stemp="";
				while ($st[$j]!="."){
					$stemp=$st[$j].$stemp;
					$j--;
				}
				$stemp=$st[$j].$stemp;
				return $stemp;
			}
			
			function reg($st1, $st3){
				if ($st1!=""){ //Load media phuog án sai 1
					$str=$st1;
					$extend=str($str);
					if ($extend=='.bmp'||$extend=='.exr'||$extend=='.gif'||$extend=='.ico'||$extend=='.jp2'||$extend=='.jpeg'||$extend=='.jpg'||$extend=='.pbm'||$extend=='.pcx'||$extend=='.pgm'||$extend=='.png'||$extend=='.ppm'||$extend=='.psd'||$extend=='.tiff'||$extend=='.tga')
					{
						echo "<br><img src='../upload/".$st3."/".$st1."' width='600' height='400' style='margin-top:0.6em;'>";
					}
					else
						if ($extend=='.3gp'||$extend=='.avi'||$extend=='.flv'||$extend=='.m4v'||$extend=='.mkv'||$extend=='.mov'||$extend=='.mp4'||$extend=='.mpeg'||$extend=='.ogv'||$extend=='.wmv'||$extend=='.webm')
						{
							$sstemp=substr($extend,1);
							echo "<br>
								<video width='400' height='300' controls style='margin:0;'>
								<source src='../upload/".$st3."/".$st1."' type='video/".$sstemp."'>
								</video>
							";
						}
						else
							if ($extend=='.aac'||$extend=='.ac3'||$extend=='.aiff'||$extend=='.amr'||$extend=='.ape'||$extend=='.au'||$extend=='.flac'||$extend=='.m4a'||$extend=='.mka'||$extend=='.mp3'||$extend=='.mpc'||$extend=='.ogg'||$extend=='.ra'||$extend=='.wav'||$extend=='.wma'){
							$sstemp=substr($extend,1);
							echo "<br>
								<audio controls>
									<source src='../upload/".$st3."/".$st1."' type='audio/".$sstemp."'>
								</audio>
							";
						}
					}
				}
			
			$i=1;
			$sql2="select dethisinh.macauhoi, cauhoi.tencauhoi, cauhoi.sodiem, dethisinh.dapan, dethisinh.dapanA as paA, dethisinh.dapanB as paB, dethisinh.dapanC as paC, dethisinh.dapanD as paD, dethisinh.dapanE as paE, dethisinh.dapanF as paF, cauhoi.imgviauTencauhoi, dethisinh.imgviaupaA, dethisinh.imgviaupaB, dethisinh.imgviaupaC, dethisinh.imgviaupaD, dethisinh.imgviaupaE, dethisinh.imgviaupaF, dethisinh.temp from cauhoi, dethisinh where dethisinh.macauhoi=cauhoi.macauhoi and dethisinh.mamodun='".$_POST['mt']."' and dethisinh.sbd='".$_POST['hv']."' ORDER BY dethisinh.socau";
			$dtt=mysqli_query($connect,"$sql2");
			while ($dt2=mysqli_fetch_array($dtt,MYSQLI_ASSOC)){
				// $dt2['tencauhoi']=str_replace("<","&lt;",$dt2['tencauhoi']);
				// $dt3['tencauhoi']=str_replace(">","&gt;",$dt2['tencauhoi']);
				// $dt2['paA']=str_replace("<","&lt;",$dt2['paA']);
				// $dt2['paA']=str_replace(">","&lt;",$dt2['paA']);
				// $dt2['paB']=str_replace("<","&lt;",$dt2['paB']);
				// $dt2['paB']=str_replace(">","&lt;",$dt2['paB']);
				// $dt2['paC']=str_replace("<","&lt;",$dt2['paC']);
				// $dt2['paC']=str_replace(">","&lt;",$dt2['paC']);
				// $dt2['paD']=str_replace("<","&lt;",$dt2['paD']);
				// $dt2['paD']=str_replace(">","&lt;",$dt2['paD']);
				// $dt2['paE']=str_replace("<","&lt;",$dt2['paE']);
				// $dt2['paE']=str_replace(">","&lt;",$dt2['paE']);
				// $dt2['paF']=str_replace("<","&lt;",$dt2['paF']);
				// $dt2['paF']=str_replace(">","&lt;",$dt2['paF']);
				
				if ($dt2['dapan']=="A") {$tldung=$dt2['paA']; $img=$dt2['imgviaupaA'];}
				if ($dt2['dapan']=="B") {$tldung=$dt2['paB']; $img=$dt2['imgviaupaB'];}
				if ($dt2['dapan']=="C") {$tldung=$dt2['paC']; $img=$dt2['imgviaupaC'];}
				if ($dt2['dapan']=="D") {$tldung=$dt2['paD']; $img=$dt2['imgviaupaD'];}
				if ($dt2['dapan']=="E") {$tldung=$dt2['paE']; $img=$dt2['imgviaupaE'];}
				if ($dt2['dapan']=="F") {$tldung=$dt2['paF']; $img=$dt2['imgviaupaF'];}
				
				if ($dt2['temp']=="A") {$tlthisinh=$dt2['paA']; $imgtl=$dt2['imgviaupaA'];}
				if ($dt2['temp']=="B") {$tlthisinh=$dt2['paB']; $imgtl=$dt2['imgviaupaB'];}
				if ($dt2['temp']=="C") {$tlthisinh=$dt2['paC']; $imgtl=$dt2['imgviaupaC'];}
				if ($dt2['temp']=="D") {$tlthisinh=$dt2['paD']; $imgtl=$dt2['imgviaupaD'];}
				if ($dt2['temp']=="E") {$tlthisinh=$dt2['paE']; $imgtl=$dt2['imgviaupaE'];}
				if ($dt2['temp']=="F") {$tlthisinh=$dt2['paF']; $imgtl=$dt2['imgviaupaF'];}
				
				if ($dt2['dapan']==$dt2['temp']){
					echo "
						<div class='areaexam'>
							<div class='cauhoi' id='ch".$i."'>
								Câu hỏi <b>".$i."</b> (".$dt2['sodiem']." điểm) Mã câu hỏi: <strong>".$dt2['macauhoi']."</strong>
							</div>";
							echo "<div class='tencauhoi'>";
							echo $dt2['tencauhoi'];
							if (!empty($dt2['imgviauTencauhoi'])) reg($dt2['imgviauTencauhoi'],"imgcauhoi");
							echo "</div>";
							echo "
								<div class='dapan'>
									<table class='tabledapan'>
										<tr style='background:lavender;'>
											<th style='color:blue'>Đáp án của bạn</th>
											<th style='color:blue'>Đáp án đúng</th>
										</tr>
										<tr>
											<td style='color:blue;background:white;'>"."<label><input type='radio' id='tcau".$i."' name='caus".$i."' checked> ".$dt2['temp'].". ".$tlthisinh."";
											echo "<div>";
											if (!empty($imgtl))
												reg($imgtl,"imgdapan");
											echo "</div>";
											echo "</label>"."<img src='../image/approve.png' style='padding-left:25px;'></td>
											<td style='background:white;'>"."<label><input type='radio' id='tcau".$i."' name='caud".$i."' checked> ".$dt2['dapan'].". ".$tldung."";
											echo "<div>";
											if (!empty($img))
												reg($img,"imgdapan");
											echo "</div>";
											echo "</label>"."</td>
										</tr>
									</table>
								</div>
						</div>";
				}
				else
					if ($dt2['temp']==NULL){
						echo "
						<div class='areaexam'>
							<div class='cauhoi' id='ch".$i."'>
								Câu hỏi <b>".$i."</b> (".$dt2['sodiem']." điểm) Mã câu hỏi: <strong>".$dt2['macauhoi']."</strong>
							</div>";
							echo "<div class='tencauhoi'>";
							echo $dt2['tencauhoi'];
							if (!empty($dt2['imgviauTencauhoi'])) reg($dt2['imgviauTencauhoi'],"imgcauhoi");
							echo "</div>";
							echo "
								<div class='dapan'>
									<table border='1' class='tabledapan'>
										<tr style='background:lavender;'>
											<th style='color:blue'>Đáp án của bạn</th>
											<th style='color:blue'>Đáp án đúng</th>
										</tr>
										<tr>
											<td style='background:rgba(23,15,90); color:red;'><label>Bạn không trả lời câu hỏi này</label></td>
											<td style='background:white;'>"."<label><input type='radio' id='tcau".$i."' name='caud".$i."' checked> ".$dt2['dapan'].". ".$tldung."";
											echo "<div>";
											if (!empty($img))
												reg($img,"imgdapan");
											echo "</div>";
											echo "</label>"."</td>
										</tr>
									</table>
								</div>
						</div>";
				}
				else {
					//$string=substr($dt2['pachon'],3);
					//if ($string==$dt3['pasai1']) $teo=$dt3['imgviauPasai1'];
					//	else if ($string==$dt3['pasai2']) $teo=$dt3['imgviauPasai2'];
					//		else if ($string==$dt3['pasai3']) $teo=$dt3['imgviauPasai3'];
					echo "
						<div class='areaexam'>
							<div class='cauhoi' id='ch".$i."'>
								Câu hỏi <b>".$i."</b> (".$dt2['sodiem']." điểm) Mã câu hỏi: <strong>".$dt2['macauhoi']."</strong>
							</div>";	
								echo "<div class='tencauhoi'>";
								echo $dt2['tencauhoi'];
								if (!empty($dt2['imgviauTencauhoi'])) reg($dt2['imgviauTencauhoi'],"imgcauhoi");
								echo "</div>";
							echo "
								<div class='dapan'>
									<table border='1' class='tabledapan'>
										<tr style='background:lavender;'>
											<th style='color:blue'>Đáp án của bạn</th>
											<th style='color:blue'>Đáp án đúng</th>
										</tr>
										<tr>
											<td style='color:red;background:white;'>"."<label><input type='radio' id='tcau".$i."' name='caus".$i."' checked> ".$dt2['temp'].". ".$tlthisinh."";
											echo "<div>";
												if (!empty($imgtl))
													reg($imgtl,"imgdapan");
												echo "</div>";
											echo "</label>"."<img src='../image/false.png' style='padding-left:25px;'></td>
											<td style='background:white;'>"."<label><input type='radio' id='tcau".$i."' name='caud".$i."' checked> ".$dt2['dapan'].". ".$tldung."";
											echo "<div>";
											if (!empty($img))
												reg($img,"imgdapan");
											echo "</div>";
											echo "</label>"."</td>
										</tr>
									</table>
								</div>
						</div>";
				}
				$i++;	
			}
			mysqli_free_result($dtt);
			mysqli_close($connect);
		?>
    </div>
</div>