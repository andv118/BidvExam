<?php
	session_start();
	include("../config.php");
	mysqli_set_charset($connect,'utf8');
	date_default_timezone_get("Asia/Ho_Chi_Minh");
	if (!isset($_SESSION['admin'])) echo "<script>window.location='index.php'</script>";
	if (!isset($_POST['cathi'])||!isset($_POST['phongthi'])||!isset($_POST['monthi'])) die("Error! Opp");
	if ($_POST['phongthi']==""||$_POST['monthi']=="") die();
	$_SESSION['tenphong']=$_POST['phongthi'];
	$_SESSION['diemmonthi']=$_POST['monthi'];
?>
<div id="div-pdf" style="margin-top: 0.6em;">
<style>	
	.tabt1,.tabt1 td,.tabt1 th{border:1px solid rgba(187,187,187,1);}
	.tabt1{border-collapse:collapse; width:100%; font-size:13px; margin:auto;}
	.tabt1 tr:hover{cursor:default;background:rgba(0,102,153,0.1);}
	.tabt1 th{height:22px; color: black; background: #d6e1ea; text-align: center; font-weight: bold;}
	.tabt1 tr:nth-child(even){background-color:white;}
	.tabt1 tr:nth-child(odd){background-color:#f1f1f1;}
	.tabt1 td,.tabt1 th{padding: 0.2em 0.3em; font-family: Aria;}
	.tabt1 td{color: #333333;}
	
	.download{
		background:rgba(204,204,204,0.5);
		font-size:15px;
		padding-top: 0.3em;
		padding-bottom: 0.3em;
	}
	.download .a1{
		font-weight: bold;
		color: blue;
	}
	.download .a1:hover{
		color: #337ab7;
	}
	.download:hover{
		cursor: pointer;
	}
	#printpdf{color: blue; font-weight: bold;}
	#printpdf:hover{color: #337ab7;}

	.tabt2{width: 100%;}
	.tabt2 tr td{padding-top: 1em;}
</style>

<script type="text/javascript">
	$("#printpdf").click(function(e){
		var cathi="<?php echo $_POST['cathi']; ?>";
		var phongthi="<?php echo $_POST['phongthi']; ?>";
		var monthi="<?php echo $_POST['monthi']; ?>";
		var name_mt="<?php echo $_GET['name_mt']; ?>";
		var name_pt="<?php echo $_GET['name_pt']; ?>";
		$.ajax({
			type: 'post',
			url: 'test-score-filter.php?name_mt='+name_mt+'&name_pt='+name_pt,
			data: {cathi: cathi, phongthi: phongthi, monthi: monthi},
			success: function(e){
				var myWin=window.open();
				myWin.document.write(e);
				myWin.print();
				myWin.close();
			}
		});
        // var myWin=window.open();
        // var data=$("#div-pdf").html();
        // myWin.document.write(data);
        // myWin.print();
        // myWin.close();
    });

    // Sort
    $('th').dblclick(function(){
	    var table = $(this).parents('table').eq(0)
	    var rows = table.find('tr:gt(0)').toArray().sort(comparer($(this).index()))
	    this.asc = !this.asc
	    if (!this.asc){rows = rows.reverse()}
	    for (var i = 0; i < rows.length; i++){table.append(rows[i])}
	});

	function comparer(index) {
	    return function(a, b) {
	        var valA = getCellValue(a, index), valB = getCellValue(b, index)
	        return $.isNumeric(valA) && $.isNumeric(valB) ? valA - valB : valA.localeCompare(valB)
	    }
	}

	function getCellValue(row, index){ return $(row).children('td').eq(index).text() }
</script>
		<div class="row">
			<div class="col-md-12 panel" style="padding-top: 0.5em; padding-left: 1em;">
				<img src="../image/logo_bidv.jpg" style="width: 350px; height: 60px;">
			</div>
			<div class="col-md-12 panel" style="text-align: center; font-family: Aria; color: black; font-size: 17px;">
				<h4 style="font-weight: 500;">BẢNG ĐIỂM KỲ THI KIỂM TRA NĂNG LỰC QUẢN LÝ ĐỢT 1 NĂM 2019</h4>
				<p style="margin-left:2.2em; font-size:14px;">Điểm thi phòng: <span style="color: red; font-weight: bold;"><?php echo $_GET['name_pt']; ?></span> - Môn thi: <span style="color: red; font-weight: bold;"><?php echo $_GET['name_mt'];?></span></p>
			</div>
		</div>
		
		<table id="danhsachdiem" class="tabt1">
			<tr style="color:white; margin-bottom:2em; background:rgba(0,204,0,1); cursor: pointer;">
	    		<th>STT</th>
	    		<th>SBD</th>
	        	<th width="180px">Họ tên</th>
		<?php
				$s1=mysqli_query($connect,"select hocvien.sbd, hocvien.hoten, hocvien.noisinh, hocvien.ngaysinh from hocvien where hocvien.mapt='".$_POST['phongthi']."' order by sbd"); //Lấy danh sách học viên phòng thi số $phong

				$bode=mysqli_query($connect,"select mabode, tenbode, diemmax from bode, modun where modun.mamodun=bode.mamodun and modun.mamodun='".$_POST['monthi']."'");
				$snum=0;
				while ($br=mysqli_fetch_array($bode)){
					echo "<th>".$br['tenbode']." (".$br['diemmax']."đ)</th>"; //Ghi tiêu đề các phần thi trong môn thi.
					$snum++;
				}
				echo "<th>Tổng điểm</th>";
				echo "<th style='width:100px;'>Ký tên</th>";
	   		echo "</tr>";
			
			$i=1;
			while ($r=mysqli_fetch_array($s1)){ // Lặp danh sách thí sinh trong phòng được chọn lấy điểm
				$s2=mysqli_query($connect,"select sbd, diem.mamodun, diem, socaudung, thoigianthi, thoigianketthuc, modun.tenmodun from diem, modun where modun.mamodun=diem.mamodun and sbd='".$r['sbd']."' and diem.mamodun='".$_POST['monthi']."' order by sbd, diem.mamodun"); //Lấy điểm thi của môn $mt

				if (mysqli_num_rows($s2)>0){
					echo "<tr>";
						echo "<td style='text-align: center;'>".$i."</td>";
					  	echo "<td>".$r['sbd']."</td>";
					  	echo "<td>".$r['hoten']."</td>";

						while ($ds2=mysqli_fetch_array($s2)){ //Lặp danh sách điểm thành phần thí sinh có điểm của phòng
							$bode=mysqli_query($connect,"select mabode, tenbode, diemmax from bode, modun where modun.mamodun=bode.mamodun and modun.mamodun='".$_POST['monthi']."'");
							$sum=0;
							while ($brows=mysqli_fetch_array($bode)){
								$diemp=mysqli_query($connect,"select dethisinh.macauhoi, dethisinh.dapan, dethisinh.temp, socau, cauhoi.sodiem from cauhoi, bode, dethisinh where cauhoi.macauhoi=dethisinh.macauhoi and cauhoi.mabode=bode.mabode and bode.mabode='".$brows['mabode']."' and sbd='".$r['sbd']."' ORDER by dethisinh.socau");

								$sum_temp=0; $caudung=0; $dtongtp=0;
								while ($d=mysqli_fetch_array($diemp)){
									if ($d['temp']===$d['dapan']){
										$sum_temp+=$d['sodiem'];
										$caudung++;
									} $dtongtp+=$d['sodiem'];
								}
								$sum+=$sum_temp;
								echo "<td style='text-align: right; padding-right: 0.5em;'><span style='color: blue;'>".$sum_temp."</span></td>";
							}
							echo "<td style='text-align: center; color: red; font-weight: bold; font-size:15px;'>".$sum."</td>";
							echo "<td></td>";
						}
						$i++;
					echo "</tr>";
				} else {
					echo "<tr>";
						echo "<td style='text-align: center;'>".$i."</td>";
						echo "<td>".$r['sbd']."</td>";
						echo "<td>".$r['hoten']."</td>";
						$tmp_snum=$snum;
						while ($tmp_snum>0){ echo "<td></td>"; $tmp_snum--; } $i++;
						echo "<td></td>";
						echo "<td></td>";
					echo "</tr>";
				}
			}
		?>
			</tr>
		</table>

		<table class="tabt2" style="margin-top: 1em; margin-bottom: 5em;">
			<tbody>
				<tr>
					<td style="width: 25%"></td>
					<td style="width: 25%"></td>
					<td style="width: 25%;"></td>
					<td style="text-align: right;"><span style="color: black; font-family: Aria;">............... Ngày <?php echo date("d",time()); ?> tháng <?php echo date("m",time()); ?> năm <?php echo date("Y",time()); ?></span></td>
				</tr>
				<tr>
					<td style="text-align: center; padding-top: 2em;"><span style="color: black; font-family: Aria;">Giám thị 1<br>(Ký, họ tên)</span></td>
					<td style="text-align: center; padding-top: 2em;"><span style="color: black; font-family: Aria;">Giám thị 2<br>(Ký, họ tên)</span></td>
					<td style="text-align: center; padding-top: 2em;"><span style="color: black; font-family: Aria;">Giám sát<br>(Ký, họ tên)</span></td>
					<td style="text-align: center; padding-top: 2em;"><span style="color: black; font-family: Aria;">Trưởng điểm thi<br>(Ký, họ tên)</span></td>
				</tr>
			</tbody>
		</table>
	</div>
<div class="download">
	<a class='a1' href="test-score-excel.php?pt=<?php echo $_POST['phongthi']; ?>&mt=<?php echo $_POST['monthi'] ?>&name_pt=<?php echo $_GET['name_pt']; ?>&name_mt=<?php echo $_GET['name_mt']; ?>">Tải danh sách (.excel)</a> |
	<a id="printpdf" onclick="printpdf();">In danh sách (.pdf)</a>
</div>