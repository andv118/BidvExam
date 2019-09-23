<?php
	session_start();
	if (!isset($_SESSION['admin'])) echo "<script>window.location='../index.php'</script>";

	if (isset($_POST['id'])){
		include("../../config.php"); $_SESSION['monthi1']=$_POST['id'];
		echo "<hr>";
		echo "<label style='margin-left:1em;font-size:18px;'>Tổng số câu hỏi: &nbsp;</label>";
		if ($tong=mysqli_query($connect,"select tongcauhoi from thoigianthi where mamodun='".$_POST['id']."'")){ //Tổng câu hỏi
			$tongt=mysqli_fetch_array($tong);
			echo "<input type='text' value='".$tongt['tongcauhoi']."' name='stong' id='stong' size='5'/>";
		} else echo "<input type='text' value='0' name='stong' id='stong' size='5'/>";
		
		echo "<label style='margin-left:1em;font-size:18px;'>Thời gian làm bài: &nbsp;</label>";
		if ($tong=mysqli_query($connect,"select tgthi from thoigianthi where mamodun='".$_POST['id']."'")){ //Thời gian
			$tongt=mysqli_fetch_array($tong);
			echo "<input type='text' value='".$tongt['tgthi']."' name='time' id='time' size='8'/>";
		} else echo "<input type='text' value='0' name='time' id='time' size='8'/>";

		echo "<span>&nbsp;&nbsp;(phút)</span>"; echo "<hr>";
		echo "<form method='post' id='capnhatdt'>";
		echo "<div class='row'>";
		$d=mysqli_query($connect,"select mabode, tenbode from bode where mamodun='".$_POST['id']."'"); // Kết quả là mảng chứa tên bộ đề
		$i=0;
		while ($r=mysqli_fetch_array($d)){
			echo "<div class='col-md-12' style='margin-top:1em;'><span style='font-size:15px; font-weight:bold; color: blue;'>".$r['mabode']."-".$r['tenbode']."</span></div>";

			echo "<table class='table table-hover table-striped table-bordered' style='font-size:13px;'>";
				echo "<tr>
					<th style='text-align:center;'>Mức độ</th>
					<th style='text-align:center;'>Số lượng</th>
					<th style='text-align:center;'>Số câu chọn</th>
				</tr>";
				
				if ($e=mysqli_query($connect,"select count(macauhoi) as 'sde' from cauhoi where mabode='".$r['mabode']."' and mucdo='Dễ'")){
					$er=mysqli_fetch_array($e);
					if ($num=mysqli_query($connect,"select soluong from dethiprofile where cauhoi='".$r['mabode']."' and pmucdo=0")){
						$nump=mysqli_fetch_array($num);
						$temp=$nump['soluong'];
					}
					else $temp=0;
					echo "<tr>
						<td>Dễ</td>
						<td>".$er['sde']."</td>
						<th><input type='text' name='".$r['mabode']."~0"."' value='".$temp."' size='3' class='form-control'></th>
					</tr>";
					$i++;
				}

				if ($m=mysqli_query($connect,"select count(macauhoi) as 'stb' from cauhoi where mabode='".$r['mabode']."' and mucdo='Trung bình'")){
					$mr=mysqli_fetch_array($m);
					if ($num=mysqli_query($connect,"select soluong from dethiprofile where cauhoi='".$r['mabode']."' and pmucdo=1")){
						$nump=mysqli_fetch_array($num);
						$temp=$nump['soluong'];
					}
					else $temp=0;
					echo "<tr>
						<td>Trung bình</td>
						<td>".$mr['stb']."</td>
						<th><input type='text' name='".$r['mabode']."~1"."' value='".$temp."' class='form-control'></th>
					</tr>";
					$i++;
				}

				if ($h=mysqli_query($connect,"select count(macauhoi) as 'skho' from cauhoi where mabode='".$r['mabode']."' and mucdo='Khó'")){
					$hr=mysqli_fetch_array($h);
					if ($num=mysqli_query($connect,"select soluong from dethiprofile where cauhoi='".$r['mabode']."' and pmucdo=2"))
					{
						$nump=mysqli_fetch_array($num);
						$temp=$nump['soluong'];
					}
					else $temp=0;
					echo "<tr>
						<td>Khó</td>
						<td>".$hr['skho']."</td>
						<th><input type='text' name='".$r['mabode']."~2"."' value='".$temp."' class='form-control'></th>
					</tr>";
					$i++;
				}
				
			echo "</table>";
		}
		
		$_SESSION['tongm']=$i;
	}
	echo "</div>";
	echo "</form>";
	echo "<input style='display:block; margin:auto; margin-top:1em; margin-bottom:1em; color:white; cursor:pointer; padding:0.8em 3em; background:blue; border:none;' type='submit' name='sb' id='sb' value='Cập nhật'>";
?>

<script>
	$(document).ready(function(e) {
        $("#sb").click(function(e) {
        	$(".preloader").show();
			var data=$("#capnhatdt").serialize();
			
			$.ajax({
				type:'post',
				url: 'qldethiupdate.php?SUM='+$('#stong').val()+'&time='+$('#time').val(), //sent by GET
				data: {id:data},
				success: function(data){
					alert(data);
					if (data!="false") alert('Đã cập nhật!'); else alert("Số câu hỏi lựa chọn chưa bằng tổng số câu hỏi bạn đã nhập! Vui lòng kiểm tra lại.");
					$(".preloader").hide();
				}
			});
        });
    });
</script>