<?php
	session_start();
	if (!isset($_SESSION['sbd'])) echo "<script>alert('Bạn chưa đăng nhập!');window.location='index.php';</script>";
	$sbd = $_SESSION['sbd'];
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	require("config.php");
	// $de=mysqli_query($connect, "select * from dethisinh where sbd='QL0573' order by socau");
	// while ($rde=mysqli_fetch_array($de, MYSQLI_ASSOC)) {
	// 	$cauhois=mysqli_query($connect, "select tencauhoi from cauhoi where macauhoi='".$rde['macauhoi']."'");
	// 	$bv=mysqli_fetch_array($cauhois, MYSQLI_ASSOC);
	// 	mysqli_query($connect, "insert into dethisinhthu (sbd, macauhoi, tencauhoi, socau, dapan, dapanA, dapanB, dapanC, dapanD, dapanE, dapanF) values('QLthithu', '".$rde['macauhoi']."', '".$bv['tencauhoi']."', '".$rde['socau']."', '".$rde['dapan']."', '".$rde['dapanA']."', '".$rde['dapanB']."', '".$rde['dapanC']."', '".$rde['dapanD']."', '".$rde['dapanE']."', '".$rde['dapanF']."')");
	// }
	$socau = 1;
	// $mamonthi = $_GET['ID'];
	// $t2 = mysqli_query($connect,"select timeconlai from diem where (sbd='$sbd') and (mamodun='$mamonthi')");
	// $time = mysqli_fetch_array($t2);
	// if (isset($time['timeconlai'])) $tgconlai = $time['timeconlai']; else $tgconlai=-1;
	// if ($time['timeconlai']>0){
	// 	mysqli_query($connect,"update cpthi set cp='K' where sbd='$sbd' and mamodun='$mamonthi'");
	// } else {
	// 	if (isset($_SESSION['time12'])){
	// 		mysqli_query($connect,"insert into diem(sbd,mamodun) values('$sbd','$mamonthi')");
	// 		mysqli_query($connect,"insert into remote(sbd,mamodun,ipaddress,estatus) values('$sbd','$mamonthi','".$_SERVER['REMOTE_ADDR']."','Đang thi')");
	// 		mysqli_query($connect,"update cpthi set cp='K' where sbd='$sbd' and mamodun='$mamonthi'"); //Chỉ cho thí sinh đăng nhập một lần;
	// 		mysqli_query($connect,"update diem set timeconlai='".($_SESSION['time12']*60)."',
	// 		thoigianthi='".date("Y-m-d H:i:s",time())."' where (sbd='$sbd') and (mamodun='$mamonthi')");
	// 		$tgconlai=$_SESSION['time12']*60;
	// 	}
	// }

	// $profile = mysqli_query($connect,"select profile from hocvien where sbd='$sbd'");
	// $profilei = mysqli_fetch_array($profile);
	// if ($profilei['profile']=="")
	$target="upload/imgthisinh/male.jpg";
	mysqli_query($connect, "insert into temp (sbd) values('".$_SESSION['sbd']."') ");
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Bài thi thử</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="shortcut icon" href="image/icon.jpg" type="image/x-icon">
    <link rel="stylesheet" href="style/exam.css" type="text/css"/>
    <link rel="stylesheet" href="style/index.css" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="style/bootstrap.min.css">
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.1.1.js"></script>
    <!-- <script src="js/exam.js"></script> -->
    <script type="text/javascript">
		var t;
		t=setInterval(function(){run();},1000);
        var hour, minute, second, temp=600, temp1;
        // var lc1;
        // var cookieArr=document.cookie.split(";");
        // for (var k=0; k<cookieArr.length; k++){
        // 	lc1=cookieArr[k].split("=");
        // 	if (lc1[0].trim()=="time" && lc1[1]>0){
        // 		temp=lc1[1];
        // 		break;
        // 	}
        // }

        function run(){
			temp1=temp;
			hour=format(parseInt(temp/3600));
			temp=temp%3600;
			minute=format(parseInt(temp/60));
			temp=temp%60;
			second=format(temp);
			temp=--temp1;
			// document.cookie="time="+temp+";expires=Fri 30 Aug 2019 10:00:00 UTC;";
			
            if (temp<=0){
            	clearInterval(t);
				var tg=parseInt(new Date().getTime()/1000);
				window.location="report1.php?t="+tg+"&tgth="+temp;
			}
			if (temp<31){
				document.getElementById('clock').style.color = 'red';
				(function blink() { 
				  	$('#clock').fadeOut(500).fadeIn(500, blink); 
				})();
			}
            document.getElementById("clock").innerHTML=hour+":"+minute+":"+second;
        }
				
        function format(d){
        	return (d<10?'0':'')+d;
        }
		
		var nel=1;
		
		function scrollToAnchor(aid){
			// $(".back_out").css("display","block");
			// $(".back_over").css("display","block");
			var tag = $("div[id='"+aid+"']").text();
			nel=tag.trim();
			if (nel==1) {
				$("#back").attr("disabled", true);
				$("#next").attr("disabled", false);
			}
			else
				if (nel==60) {
					$("#back").attr("disabled", false);
					$("#next").attr("disabled", true);
				}
				else {
					$("#back").attr("disabled", false);
					$("#next").attr("disabled", false);
				}
			$.ajax({
				type:"POST",
				url: "loadcauhoi1.php",
				data: {tag:tag},
				success: function(e){
					$(".loadch1").html(e);
					// $(".back_out").css("display","none");
					// $(".back_over").css("display","none");
				}
			});
			return false;
		}

		var up1 = function(){
			var nel=$('#val').text();
			var cookie=document.cookie;
			if (cookie.search('lll')==-1) {
				document.cookie='lll='+nel+',; expires=Fri 20 Aug 2030 10:00:00 UTC';
				$('#temp1').append('<div class="socau" style="background-color: yellow; color: green;" id="ts'+nel+'" onClick="scrollToAnchor(\'ts'+nel+'\')">'+nel+'</div>');
			} else {
				var arrayCookie=cookie.split(';');
				var lc1, temp;
				for (var k=0; k<arrayCookie.length; k++){
		        	lc1=arrayCookie[k].split("=");
		        	if (lc1[0].trim()=="lll"){
		        		var atmp=lc1[1].split(',');
		        		if (atmp.indexOf(nel)==-1){
		    				temp=lc1[1]+nel+',';
			        		document.cookie='lll='+temp+'; expires=Fri 20 Aug 2030 10:00:00 UTC';
			        		$('#temp1').append('<div class="socau" style="background-color: yellow; color: green;" id="ts'+nel+'" onClick="scrollToAnchor(\'ts'+nel+'\')">'+nel+'</div>');
		        		} else {
		        			alert('Câu hỏi đã trong danh sách ghi nhớ!');
		        		}   		
		        		break;
		        	}
		        }
			}
		}

		var down1 = function(){
			var nel=$('#val').text();
			document.getElementById('ts'+nel).remove();
			if (document.cookie.search('lll')!=-1) {
				var arrayCookie=document.cookie.split(';');
				var lc1, temp;
				for (var k=0; k<arrayCookie.length; k++){
					lc1=arrayCookie[k].split("=");
					if (lc1[0].trim()=="lll"){
						var atmp=lc1[1].split(',');
						var index=atmp.indexOf(nel);
						atmp.splice(index, 1);
						document.cookie='lll='+atmp.join()+'; expires=Fri 20 Aug 2030 10:00:00 UTC';
						break;
					}
				}
			}
		}

		var writechoose = function(str){
			var data = $(".loadch1 .areaexam .dapan ."+str+" input:radio").val();
			var name = $(".loadch1 .areaexam .dapan ."+str+" input:radio").attr("name");
			$(".loadch1 .areaexam .dapan ."+str+" input:radio").prop("checked", true);
			document.getElementById($.trim("s"+name)).style.backgroundColor="blue";
			$.ajax({
				type: 'POST',
				url: 'savechoose1.php',
				data: {id:data, name:name},
				success: function(data){}
			});
		}

		function chamdiem(){
			if (confirm("Sau khi xác nhận nộp bài, bạn sẽ không thể thay đổi bài làm! Bạn có chắc chắn muốn kết thúc bài thi?")){
				var tg= parseInt((new Date().getTime())/1000);
				window.location="report1.php?t="+tg+"&tgth="+temp;
			}
		}
			
		$(document).ready(function(e){
			var tongpt=60;
			if (nel==1) $("#back").attr("disabled", true); else $("#back").attr("disabled", false);
			if (nel==tongpt) $("#next").attr("disabled", true); else $("#next").attr("disabled", false);

			if (document.cookie.search('lll')!=-1) {
				var arrayCookie=document.cookie.split(';');
				var lc1, temp;
				for (var k=0; k<arrayCookie.length; k++){
					lc1=arrayCookie[k].split("=");
					if (lc1[0].trim()=="lll"){
						var atmp=lc1[1].split(',');
						for (var i=0; i<atmp.length-1; i++){
							$('#temp1').append('<div class="socau" style="background-color: yellow; color: green;" id="ts'+atmp[i]+'" onClick="scrollToAnchor(\'ts'+atmp[i]+'\')">'+atmp[i]+'</div>');
						}
						break;
					}
				}
			}
			
			$("#back").click(function(e){
				var tongpt=60;
				if (nel<=2) $("#back").attr("disabled", true); else $("#back").attr("disabled", false);
				$("#next").attr("disabled", false);
				nel--;
				$.ajax({
					type:"POST",
					url: "loadcauhoi1.php",
					data:{tag:nel},
					success: function(e){
						$(".loadch1").html(e);
					}
				});
            });
			
			$("#next").click(function(e){
				var tongpt=60;
				nel++;
				if (nel>=tongpt) $("#next").attr("disabled", true);
					else $("#next").attr("disabled", false);
				$("#back").attr("disabled", false);
				$.ajax({
					type:"POST",
					url: "loadcauhoi1.php",
					data:{tag:nel},
					success: function(e){
						$(".loadch1").html(e);
					}
				});
            });
			
		});

	</script>
	<style type="text/css">
		.loadch1 .areaexam .dapan span:hover{cursor: pointer; color: green; font-weight: 700;}
		.tencauhoi{font-weight: bold;}
		#up{
			color: #366b24;
			font-weight: bold;
			background-color: #ffdd24;
		}
		#down{
			color: #ffffff;
			font-weight: bold;
			background-color: #70bf70;
		}
		#temp{
			height: 16.3em;
			overflow: auto;
		}
	</style>
</head>

<body onload="toggleFullScreen();">
	<div class="back_out">
    	<!--show background black-->
    </div>
	<div class="back_over">
    	<!--show background status image gif-->
    </div>

	<div class="row col-md-12" style="margin:0; padding-top: 0.5em;">
		<!-- BG col-md-2 -->
		<div class="col-md-2" style="border:1px solid #dfdfdf;">
			<div class="col-md-12" style="text-align: center; padding-top:0.5em; padding-bottom: 0.5em; border-bottom: 1px solid #dfdfdf;">
            	<img src="image/clock.png" height="38" width="38" style="float:left;"/>
				<div id="clock" style="color:mediumseagreen;margin-top:0.1em; margin-left:2em;font-size:25px;font-weight:bold;"></div><!--Hiển thị thời gian còn lại-->
			</div>
            <div class="col-md-12" style="margin-top: 1em; border-bottom: 1px solid #dfdfdf; text-align: center;">
    			<p style="font-weight: bold;">THÔNG TIN THÍ SINH</p>
            </div>
            <hr>
    		<div class="col-md-12" style="border-bottom: 1px solid #dfdfdf; padding: 0.5em 0.3em;">
    			<span>Họ và tên: &nbsp;</span>
				<span><b><?php echo $_SESSION['hoten']; ?></b></span>
    		</div>
    		<div class="col-md-12" style="border-bottom: 1px solid #dfdfdf; padding: 0.5em 0.3em;">
    			<span>SBD: &nbsp;</span>
				<span><b><?php echo $_SESSION['sbd'];?></b></span>
    		</div>
    		<div class="col-md-12" style="border-bottom: 1px solid #dfdfdf; padding: 0.5em 0.3em;">
    			<span>Ngày sinh: &nbsp;</span>
				<span><b><?php echo $_SESSION['ngaysinh'];?></b></span>
    		</div>
    		<div class="col-md-12" style="padding: 0.5em 0.3em; border-bottom: 1px solid #dfdfdf;">
    			<span>Nơi sinh: &nbsp;</span>
				<span><b><?php echo $_SESSION['noisinh'];?></b></span>
    		</div>

    		<div class="col-md-12" style="padding: 0.5em 0.3em;">
    			<input id="submit" class='btn btn-md btn-primary' style="margin:auto;display:block;padding:10px 45px;cursor:pointer;" type="submit" value="Nộp bài" onClick="chamdiem();">
    		</div>

    		<div class="col-md-12" style="padding: 0.5em 0.3em; border-top: 1px solid green; margin-top: 1em; text-align: center;" title="Ghi nhớ câu hỏi bạn chưa chắc chắn với câu trả lời!">
				<p style="font-weight: 700; text-transform: uppercase;">Ghi nhớ</p>
				<div class="row" id="temp1"></div>
    		</div>
		</div>
		<!-- end md-2 -->

		<!-- bg md-10 -->
		<div class="col-md-10">
			<div class="col-md-12" style="margin-bottom: 1em;">
				<div class="examcontent_p2_1">
	            	<p>GIAO DIỆN BÀI THI</p>
	            </div>
			</div>

			<!-- bg 12 -->
			<div class="col-md-12" style="padding-top: 0.7em;">
				<?php
					$tongcauhoi=0;
					$p=array();
					$p[1]="Kiến thức quản lý";
					$p[2]="Kiến thức BIDV";
					$p[3]="Tạo ảnh hưởng";
					$p[4]="Hướng dẫn kèm cặp cán bộ";
					$p[5]="Làm việc nhóm";
					$p[6]="Lập kế hoạch";
					
					$raga=array(); $ragb=array();
					$raga[1]=1; $ragb[1]=10;
					$raga[2]=11; $ragb[2]=20;
					$raga[3]=21; $ragb[3]=30;
					$raga[4]=31; $ragb[4]=40;
					$raga[5]=41; $ragb[5]=50;
					$raga[6]=51; $ragb[6]=60;

					for ($k=1; $k<=6; $k++){
						echo "<div class='row'>";
							echo "<div class='col-md-3'>";
								echo "<p style='font-size:13px;color:blue;margin-left:0.8em; margin-bottom:0.3em; margin-top:0.5em;'>Phần ".$k." - <span style='color:#FE2000; font-weight:bold;'>".$p[$k]."</span></p>";
							echo "</div>";
							echo "<div class='col-md-9'>";
								for ($i=$raga[$k]; $i<=$ragb[$k]; $i++)
								{
									echo "<div class='socau' id='s".$i."' onClick=\"scrollToAnchor('s".$i."');\">".$i."
									</div>";
									$tongcauhoi++;
								}
							echo "</div>";
						echo "</div>";
					}
					$sc1=mysqli_query($connect,"select traloi from temp where sbd='".$_SESSION['sbd']."'");
					// conti
					$ar1=mysqli_fetch_array($sc1, MYSQLI_ASSOC);
					$raa1=explode(",", $ar1['traloi']);
					// print_r($raa1[3]);
					for ($ii=0; $ii<count($raa1); $ii++) {
						// echo ($ii+1)." ";
						if (!$raa1[$ii]) {
							
						} else {
							echo "<script> $('#s".($ii+1)."').css('background','blue');</script>";
						}
					}
				?>
			</div>
			<!-- end 12 -->

			<!-- bg 12 -->
			<div class='col-md-12'>
				<div class="row">
					<div class="loadch1">
						<div class="examcontent_p2_2">
			                <p class="p1">Câu hỏi: <?php echo "<span style='color:red;' id='val'>".$socau."</span>/60";?></p>
			            </div>
			            <div class='areaexam'>
			            	<form method='post' name='examtest' action="report.php">
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
										if ($st1!=""){
											$str=$st1;
											$extend=str($str);
											//.bmp.exr.gif.ico.jp2.jpeg.pbm.pcx.pgm.png.ppm.psd. tiff.tga : Các định dạng file ảnh
											if ($extend=='.bmp'||$extend=='.exr'||$extend=='.gif'||$extend=='.ico'||$extend=='.jp2'||$extend=='.jpeg'||$extend=='.jpg'||$extend=='.pbm'||$extend=='.pcx'||$extend=='.pgm'||$extend=='.png'||$extend=='.ppm'||$extend=='.psd'||$extend=='.tiff'||$extend=='.tga')
											{
												echo "<br><img src='upload/".$st3."/".$st1."' width='600' height='400' style='margin-top:0.6em;'>";
											}
											//.3gp.avi.flv.m4v.mkv.mov.mp4.mpeg.ogv.wmv.webm : các định dạng file video
											else
												if ($extend=='.3gp'||$extend=='.avi'||$extend=='.flv'||$extend=='.m4v'||$extend=='.mkv'||$extend=='.mov'||$extend=='.mp4'||$extend=='.mpeg'||$extend=='.ogv'||$extend=='.wmv'||$extend=='.webm'){
													$sstemp=substr($extend,1);
													echo "<br>
														<video width='400' height='300' controls style='margin:0;'>
														<source src='upload/".$st3."/".$st1."' type='video/".$sstemp."'>
														</video>
													";
												}
											//.aac.ac3.aiff.amr.ape.au.flac.m4a.mka.mp3.mpc.ogg. ra.wav.wma các định dạng audio
											else
												if ($extend=='.aac'||$extend=='.ac3'||$extend=='.aiff'||$extend=='.amr'||$extend=='.ape'||$extend=='.au'||$extend=='.flac'||$extend=='.m4a'||$extend=='.mka'||$extend=='.mp3'||$extend=='.mpc'||$extend=='.ogg'||$extend=='.ra'||$extend=='.wav'||$extend=='.wma'){
												$sstemp=substr($extend,1);
												echo "<br>
													<audio controls>
														<source src='upload/".$st3."/".$st1."' type='audio/".$sstemp."'>
													</audio>
												";
											}
										}
									} //End function
									$cauhoi=mysqli_query($connect,"select tencauhoi, dapanA as paA, dapanB as paB, dapanC as paC, dapanD as paD, dapanE as paE, dapanF as paF from dethisinhthu ORDER by socau LIMIT ".($socau-1).",1");
									$cdata=mysqli_fetch_array($cauhoi,MYSQLI_ASSOC);
									mysqli_free_result($cauhoi);
									// mysqli_close($connect);
									$cdata['tencauhoi']=str_replace("<","&lt;",$cdata['tencauhoi']);
									$cdata['paA']=str_replace("<","&lt;",$cdata['paA']);
									$cdata['paB']=str_replace("<","&lt;",$cdata['paB']);
									$cdata['paC']=str_replace("<","&lt;",$cdata['paC']);
									$cdata['paD']=str_replace("<","&lt;",$cdata['paD']);
									$cdata['paE']=str_replace("<","&lt;",$cdata['paE']);
									$cdata['paF']=str_replace("<","&lt;",$cdata['paF']);
									$cdata['tencauhoi']=str_replace(">","&gt;",$cdata['tencauhoi']);
									$cdata['paA']=str_replace(">","&gt;",$cdata['paA']);
									$cdata['paB']=str_replace(">","&gt;",$cdata['paB']);
									$cdata['paC']=str_replace(">","&gt;",$cdata['paC']);
									$cdata['paD']=str_replace(">","&gt;",$cdata['paD']);
									$cdata['paE']=str_replace(">","&gt;",$cdata['paE']);
									$cdata['paF']=str_replace(">","&gt;",$cdata['paF']);
									$j=1;
									$cc=mysqli_query($connect, "select traloi from temp where sbd='".$_SESSION['sbd']."'");
									$rc=mysqli_fetch_array($cc, MYSQLI_ASSOC);
									$ar=explode(',', $rc['traloi']);
									$cdata['temp']=$ar[$socau-1];
									// echo $cdata['temp'];
									if ($cdata['temp']!=0) echo "<script>document.getElementById($.trim('s'+".$socau.")).style.backgroundColor='blue';</script>";
									if ($cdata['temp']=="A"){
										echo "<div class='tencauhoi'>";
											echo $cdata['tencauhoi'];
											if (!empty($cdata['imgviauTencauhoi'])) reg($cdata['imgviauTencauhoi'],"imgcauhoi");
										echo "</div>";
										echo "<div class='dapan'>";
												if (!empty($cdata['paA'])) echo "<div style='margin-bottom:0.6em;'><span class='choose1' onClick='writechoose(\"choose1\");' onClick=\"fillBackground('s".$socau."');\"><input type='radio' name='".$socau."' value='A' checked>&nbsp;A. ".$cdata['paA']."</span><br>";
												if (!empty($cdata['imgviaupaA'])) reg($cdata['imgviaupaA'],"imgdapan");
												echo "</div>";
												
											if (!empty($cdata['paB'])) echo "<div  style='margin-bottom:0.6em;'><span class='choose2' onClick='writechoose(\"choose2\");' onClick=\"fillBackground('s".$socau."');\"><input type='radio' name='".$socau."' value='B'>&nbsp;B. ".$cdata['paB']."</span><br>";
											if (!empty($cdata['imgviaupaB'])) reg($cdata['imgviaupaB'],"imgdapan");
											echo "</div>";
											if (!empty($cdata['paC'])) echo "<div style='margin-bottom:0.6em;'><span class='choose3' onClick='writechoose(\"choose3\");' onClick=\"fillBackground('s".$socau."');\"><input type='radio' name='".$socau."' value='C'>&nbsp;C. ".$cdata['paC']."</span><br>";
											if (!empty($cdata['imgviaupaC'])) reg($cdata['imgviaupaC'],"imgdapan");
											echo "</div>";
											if (!empty($cdata['paD'])) echo "<div style='margin-bottom:0.6em;'><span class='choose4' onClick='writechoose(\"choose4\");' onClick=\"fillBackground('s".$socau."');\"><input type='radio' name='".$socau."' value='D'>&nbsp;D. ".$cdata['paD']."</span>";
											if (!empty($cdata['imgviaupaD'])) reg($cdata['imgviaupaD'],"imgdapan");
											echo "</div>";
											if (!empty($cdata['paE'])) echo "<div  style='margin-bottom:0.6em;'><span class='choose5' onClick='writechoose(\"choose5\");' onClick=\"fillBackground('s".$socau."');\"><input type='radio' name='".$socau."' value='E'>&nbsp;E. ".$cdata['paE']."</span>";
											if (!empty($cdata['imgviaupaE'])) reg($cdata['imgviaupaE'],"imgdapan");
											echo "</div>";
											if (!empty($cdata['paF'])) echo "<div style='margin-bottom:0.6em;'><span  class='choose6' onClick='writechoose(\"choose6\");' onClick=\"fillBackground('s".$socau."');\"><input type='radio' name='".$socau."' value='F'>&nbsp;F. ".$cdata['paF']."</span>";
											if (!empty($cdata['imgviaupaF'])) reg($cdata['imgviaupaF'],"imgdapan");
											echo "</div>
												</div>
											</div>";
									} else if ($cdata['temp']=="B"){
										echo "<div class='tencauhoi'>";
											echo $cdata['tencauhoi'];
											if (!empty($cdata['imgviauTencauhoi'])) reg($cdata['imgviauTencauhoi'],"imgcauhoi");
										echo "</div>";
										echo "<div class='dapan'>";
												if (!empty($cdata['paA'])) echo "<div  style='margin-bottom:0.6em;'><span class='choose1' onClick='writechoose(\"choose1\");' onClick=\"fillBackground('s".$socau."');\"><input type='radio' name='".$socau."' value='A'>&nbsp;A. ".$cdata['paA']."</span><br>";
												if (!empty($cdata['imgviaupaA'])) reg($cdata['imgviaupaA'],"imgdapan");
												echo "</div>";
												
											if (!empty($cdata['paB'])) echo "<div style='margin-bottom:0.6em;'><span class='choose2' onClick='writechoose(\"choose2\");' onClick=\"fillBackground('s".$socau."');\"><input type='radio' name='".$socau."' value='B' checked>&nbsp;B. ".$cdata['paB']."</span><br>";
											if (!empty($cdata['imgviaupaB'])) reg($cdata['imgviaupaB'],"imgdapan");
											echo "</div>";
											if (!empty($cdata['paC'])) echo "<div style='margin-bottom:0.6em;'><span class='choose3' onClick='writechoose(\"choose3\");' onClick=\"fillBackground('s".$socau."');\"><input type='radio' name='".$socau."' value='C'>&nbsp;C. ".$cdata['paC']."</span><br>";
											if (!empty($cdata['imgviaupaC'])) reg($cdata['imgviaupaC'],"imgdapan");
											echo "</div>";
											if (!empty($cdata['paD'])) echo "<div style='margin-bottom:0.6em;'><span class='choose4' onClick='writechoose(\"choose4\");' onClick=\"fillBackground('s".$socau."');\"><input type='radio' name='".$socau."' value='D'>&nbsp;D. ".$cdata['paD']."</span>";
											if (!empty($cdata['imgviaupaD'])) reg($cdata['imgviaupaD'],"imgdapan");
											echo "</div>";
											if (!empty($cdata['paE'])) echo "<div style='margin-bottom:0.6em;'><span class='choose5' onClick='writechoose(\"choose5\");' onClick=\"fillBackground('s".$socau."');\"><input type='radio' name='".$socau."' value='E'>&nbsp;E. ".$cdata['paE']."</span>";
											if (!empty($cdata['imgviaupaE'])) reg($cdata['imgviaupaE'],"imgdapan");
											echo "</div>";
											if (!empty($cdata['paF'])) echo "<div style='margin-bottom:0.6em;'><span  class='choose6' onClick='writechoose(\"choose6\");' onClick=\"fillBackground('s".$socau."');\"><input type='radio' name='".$socau."' value='F'>&nbsp;F. ".$cdata['paF']."</span>";
											if (!empty($cdata['imgviaupaF'])) reg($cdata['imgviaupaF'],"imgdapan");
											echo "</div>
												</div>
											</div>";
									} else if ($cdata['temp']=="C"){
										echo "<div class='tencauhoi'>";
											echo $cdata['tencauhoi'];
											if (!empty($cdata['imgviauTencauhoi'])) reg($cdata['imgviauTencauhoi'],"imgcauhoi");
										echo "</div>";
										echo "<div class='dapan'>";
												if (!empty($cdata['paA'])) echo "<div  style='margin-bottom:0.6em;'><span class='choose1' onClick='writechoose(\"choose1\");' onClick=\"fillBackground('s".$socau."');\"><input type='radio' name='".$socau."' value='A'>&nbsp;A. ".$cdata['paA']."</span><br>";
												if (!empty($cdata['imgviaupaA'])) reg($cdata['imgviaupaA'],"imgdapan");
												echo "</div>";
												
											if (!empty($cdata['paB'])) echo "<div style='margin-bottom:0.6em;'><span  class='choose2' onClick='writechoose(\"choose2\");' onClick=\"fillBackground('s".$socau."');\"><input type='radio' name='".$socau."' value='B'>&nbsp;B. ".$cdata['paB']."</span><br>";
											if (!empty($cdata['imgviaupaB'])) reg($cdata['imgviaupaB'],"imgdapan");
											echo "</div>";
											if (!empty($cdata['paC'])) echo "<div style='margin-bottom:0.6em;'><span  class='choose3' onClick='writechoose(\"choose3\");' onClick=\"fillBackground('s".$socau."');\"><input type='radio' name='".$socau."' value='C' checked>&nbsp;C. ".$cdata['paC']."</span><br>";
											if (!empty($cdata['imgviaupaC'])) reg($cdata['imgviaupaC'],"imgdapan");
											echo "</div>";
											if (!empty($cdata['paD'])) echo "<div style='margin-bottom:0.6em;'><span  class='choose4' onClick='writechoose(\"choose4\");' onClick=\"fillBackground('s".$socau."');\"><input type='radio' name='".$socau."' value='D'>&nbsp;D. ".$cdata['paD']."</span>";
											if (!empty($cdata['imgviaupaD'])) reg($cdata['imgviaupaD'],"imgdapan");
											echo "</div>";
											if (!empty($cdata['paE'])) echo "<div style='margin-bottom:0.6em;'><span  class='choose5' onClick='writechoose(\"choose5\");' onClick=\"fillBackground('s".$socau."');\"><input type='radio' name='".$socau."' value='E'>&nbsp;E. ".$cdata['paE']."</span>";
											if (!empty($cdata['imgviaupaE'])) reg($cdata['imgviaupaE'],"imgdapan");
											echo "</div>";
											if (!empty($cdata['paF'])) echo "<div style='margin-bottom:0.6em;'><span  class='choose6' onClick='writechoose(\"choose6\");' onClick=\"fillBackground('s".$socau."');\"><input type='radio' name='".$socau."' value='F'>&nbsp;F. ".$cdata['paF']."</span>";
											if (!empty($cdata['imgviaupaF'])) reg($cdata['imgviaupaF'],"imgdapan");
											echo "</div>
												</div>
											</div>";
									} else if ($cdata['temp']=="D"){
										echo "<div class='tencauhoi'>";
											echo $cdata['tencauhoi'];
											if (!empty($cdata['imgviauTencauhoi'])) reg($cdata['imgviauTencauhoi'],"imgcauhoi");
										echo "</div>";
										echo "<div class='dapan'>";
												if (!empty($cdata['paA'])) echo "<div style='margin-bottom:0.6em;'><span class='choose1' onClick='writechoose(\"choose1\");' onClick=\"fillBackground('s".$socau."');\"><input type='radio' name='".$socau."' value='A'>&nbsp;A. ".$cdata['paA']."</span><br>";
												if (!empty($cdata['imgviaupaA'])) reg($cdata['imgviaupaA'],"imgdapan");
												echo "</div>";
												
											if (!empty($cdata['paB'])) echo "<div style='margin-bottom:0.6em;'><span class='choose2' onClick='writechoose(\"choose2\");' onClick=\"fillBackground('s".$socau."');\"><input type='radio' name='".$socau."' value='B'>&nbsp;B. ".$cdata['paB']."</span><br>";
											if (!empty($cdata['imgviaupaB'])) reg($cdata['imgviaupaB'],"imgdapan");
											echo "</div>";
											if (!empty($cdata['paC'])) echo "<div style='margin-bottom:0.6em;'><span class='choose3' onClick='writechoose(\"choose3\");' onClick=\"fillBackground('s".$socau."');\"><input type='radio' name='".$socau."' value='C'>&nbsp;C. ".$cdata['paC']."</span><br>";
											if (!empty($cdata['imgviaupaC'])) reg($cdata['imgviaupaC'],"imgdapan");
											echo "</div>";
											if (!empty($cdata['paD'])) echo "<div style='margin-bottom:0.6em;'><span class='choose4' onClick='writechoose(\"choose4\");' onClick=\"fillBackground('s".$socau."');\"><input type='radio' name='".$socau."' value='D' checked>&nbsp;D. ".$cdata['paD']."</span>";
											if (!empty($cdata['imgviaupaD'])) reg($cdata['imgviaupaD'],"imgdapan");
											echo "</div>";
											if (!empty($cdata['paE'])) echo "<div style='margin-bottom:0.6em;'><span class='choose5' onClick='writechoose(\"choose5\");' onClick=\"fillBackground('s".$socau."');\"><input type='radio' name='".$socau."' value='E'>&nbsp;E. ".$cdata['paE']."</span>";
											if (!empty($cdata['imgviaupaE'])) reg($cdata['imgviaupaE'],"imgdapan");
											echo "</div>";
											if (!empty($cdata['paF'])) echo "<div style='margin-bottom:0.6em;'><span class='choose6' onClick='writechoose(\"choose6\");' onClick=\"fillBackground('s".$socau."');\"><input type='radio' name='".$socau."' value='F'>&nbsp;F. ".$cdata['paF']."</span>";
											if (!empty($cdata['imgviaupaF'])) reg($cdata['imgviaupaF'],"imgdapan");
											echo "</div>
												</div>
											</div>";
									} else if ($cdata['temp']=="E"){
										echo "<div class='tencauhoi'>";
											echo $cdata['tencauhoi'];
											if (!empty($cdata['imgviauTencauhoi'])) reg($cdata['imgviauTencauhoi'],"imgcauhoi");
										echo "</div>";
										echo "<div class='dapan'>";
												if (!empty($cdata['paA'])) echo "<div style='margin-bottom:0.6em;'><span class='choose1' onClick='writechoose(\"choose1\");' onClick=\"fillBackground('s".$socau."');\"><input type='radio' name='".$socau."' value='A'>&nbsp;A. ".$cdata['paA']."</span><br>";
												if (!empty($cdata['imgviaupaA'])) reg($cdata['imgviaupaA'],"imgdapan");
												echo "</div>";
												
											if (!empty($cdata['paB'])) echo "<div style='margin-bottom:0.6em;'><span class='choose2' onClick='writechoose(\"choose2\");' onClick=\"fillBackground('s".$socau."');\"><input type='radio' name='".$socau."' value='B'>&nbsp;B. ".$cdata['paB']."</span><br>";
											if (!empty($cdata['imgviaupaB'])) reg($cdata['imgviaupaB'],"imgdapan");
											echo "</div>";
											if (!empty($cdata['paC'])) echo "<div style='margin-bottom:0.6em;'><span class='choose3' onClick='writechoose(\"choose3\");' onClick=\"fillBackground('s".$socau."');\"><input type='radio' name='".$socau."' value='C'>&nbsp;C. ".$cdata['paC']."</span><br>";
											if (!empty($cdata['imgviaupaC'])) reg($cdata['imgviaupaC'],"imgdapan");
											echo "</div>";
											if (!empty($cdata['paD'])) echo "<div style='margin-bottom:0.6em;'><span class='choose4' onClick='writechoose(\"choose4\");' onClick=\"fillBackground('s".$socau."');\"><input type='radio' name='".$socau."' value='D'>&nbsp;D. ".$cdata['paD']."</span>";
											if (!empty($cdata['imgviaupaD'])) reg($cdata['imgviaupaD'],"imgdapan");
											echo "</div>";
											if (!empty($cdata['paE'])) echo "<div style='margin-bottom:0.6em;'><span class='choose5' onClick='writechoose(\"choose5\");' onClick=\"fillBackground('s".$socau."');\"><input type='radio' name='".$socau."' value='E' checked>&nbsp;E. ".$cdata['paE']."</span>";
											if (!empty($cdata['imgviaupaE'])) reg($cdata['imgviaupaE'],"imgdapan");
											echo "</div>";
											if (!empty($cdata['paF'])) echo "<div style='margin-bottom:0.6em;'><span class='choose6' onClick='writechoose(\"choose6\");' onClick=\"fillBackground('s".$socau."');\"><input type='radio' name='".$socau."' value='F'>&nbsp;F. ".$cdata['paF']."</span>";
											if (!empty($cdata['imgviaupaF'])) reg($cdata['imgviaupaF'],"imgdapan");
											echo "</div>
												</div>
											</div>";
									} else if ($cdata['temp']=="F"){
										echo "<div class='tencauhoi'>";
											echo $cdata['tencauhoi'];
											if (!empty($cdata['imgviauTencauhoi'])) reg($cdata['imgviauTencauhoi'],"imgcauhoi");
										echo "</div>";
										echo "<div class='dapan'>";
												if (!empty($cdata['paA'])) echo "<div style='margin-bottom:0.6em;'><span class='choose1' onClick='writechoose(\"choose1\");' onClick=\"fillBackground('s".$socau."');\"><input type='radio' name='".$socau."' value='A'>&nbsp;A. ".$cdata['paA']."</span><br>";
												if (!empty($cdata['imgviaupaA'])) reg($cdata['imgviaupaA'],"imgdapan");
												echo "</div>";
												
											if (!empty($cdata['paB'])) echo "<div style='margin-bottom:0.6em;'><span class='choose2' onClick='writechoose(\"choose2\");' onClick=\"fillBackground('s".$socau."');\"><input type='radio' name='".$socau."' value='B'>&nbsp;B. ".$cdata['paB']."</span><br>";
											if (!empty($cdata['imgviaupaB'])) reg($cdata['imgviaupaB'],"imgdapan");
											echo "</div>";
											if (!empty($cdata['paC'])) echo "<div style='margin-bottom:0.6em;'><span class='choose3' onClick='writechoose(\"choose3\");' onClick=\"fillBackground('s".$socau."');\"><input type='radio' name='".$socau."' value='C'>&nbsp;C. ".$cdata['paC']."</span><br>";
											if (!empty($cdata['imgviaupaC'])) reg($cdata['imgviaupaC'],"imgdapan");
											echo "</div>";
											if (!empty($cdata['paD'])) echo "<div style='margin-bottom:0.6em;'><span class='choose4' onClick='writechoose(\"choose4\");' onClick=\"fillBackground('s".$socau."');\"><input type='radio' name='".$socau."' value='D'>&nbsp;D. ".$cdata['paD']."</span>";
											if (!empty($cdata['imgviaupaD'])) reg($cdata['imgviaupaD'],"imgdapan");
											echo "</div>";
											if (!empty($cdata['paE'])) echo "<div style='margin-bottom:0.6em;'><span class='choose5' onClick='writechoose(\"choose5\");' onClick=\"fillBackground('s".$socau."');\"><input type='radio' name='".$socau."' value='E'>&nbsp;E. ".$cdata['paE']."</span>";
											if (!empty($cdata['imgviaupaE'])) reg($cdata['imgviaupaE'],"imgdapan");
											echo "</div>";
											if (!empty($cdata['paF'])) echo "<div style='margin-bottom:0.6em;'><span class='choose6' onClick='writechoose(\"choose6\");' onClick=\"fillBackground('s".$socau."');\"><input type='radio' name='".$socau."' value='F' checked>&nbsp;F. ".$cdata['paF']."</span>";
											if (!empty($cdata['imgviaupaF'])) reg($cdata['imgviaupaF'],"imgdapan");
											echo "</div>
												</div>
											</div>";
									} else {
										echo "<div class='tencauhoi'>";
											echo $cdata['tencauhoi'];
											if (!empty($cdata['imgviauTencauhoi'])) reg($cdata['imgviauTencauhoi'],"imgcauhoi");
										echo "</div>";
										echo "<div class='dapan'>";
												if (!empty($cdata['paA'])) echo "<div  style='margin-bottom:0.6em;'><span class='choose1' onClick='writechoose(\"choose1\");' onClick=\"fillBackground('s".$socau."');\"><input type='radio' name='".$socau."' value='A'>&nbsp;A. ".$cdata['paA']."</span><br>";
												if (!empty($cdata['imgviaupaA'])) reg($cdata['imgviaupaA'],"imgdapan");
												echo "</div>";
												
											if (!empty($cdata['paB'])) echo "<div style='margin-bottom:0.6em;'><span  class='choose2' onClick='writechoose(\"choose2\");' onClick=\"fillBackground('s".$socau."');\"><input type='radio' name='".$socau."' value='B'>&nbsp;B. ".$cdata['paB']."</span><br>";
											if (!empty($cdata['imgviaupaB'])) reg($cdata['imgviaupaB'],"imgdapan");
											echo "</div>";
											if (!empty($cdata['paC'])) echo "<div style='margin-bottom:0.6em;'><span class='choose3' onClick='writechoose(\"choose3\");' onClick=\"fillBackground('s".$socau."');\"><input type='radio' name='".$socau."' value='C'>&nbsp;C. ".$cdata['paC']."</span><br>";
											if (!empty($cdata['imgviaupaC'])) reg($cdata['imgviaupaC'],"imgdapan");
											echo "</div>";
											if (!empty($cdata['paD'])) echo "<div style='margin-bottom:0.6em;'><span class='choose4' onClick='writechoose(\"choose4\");' onClick=\"fillBackground('s".$socau."');\"><input type='radio' name='".$socau."' value='D'>&nbsp;D. ".$cdata['paD']."</span>";
											if (!empty($cdata['imgviaupaD'])) reg($cdata['imgviaupaD'],"imgdapan");
											echo "</div>";
											if (!empty($cdata['paE'])) echo "<div style='margin-bottom:0.6em;'><span class='choose5' onClick='writechoose(\"choose5\");' onClick=\"fillBackground('s".$socau."');\"><input type='radio' name='".$socau."' value='E'>&nbsp;E. ".$cdata['paE']."</span>";
											if (!empty($cdata['imgviaupaE'])) reg($cdata['imgviaupaE'],"imgdapan");
											echo "</div>";
											if (!empty($cdata['paF'])) echo "<div style='margin-bottom:0.6em;'><span class='choose6' onClick='writechoose(\"choose6\");' onClick=\"fillBackground('s".$socau."');\"><input type='radio' name='".$socau."' value='F'>&nbsp;F. ".$cdata['paF']."</span>";
											if (!empty($cdata['imgviaupaF'])) reg($cdata['imgviaupaF'],"imgdapan");
											echo "</div>
												</div>
											</div>";
										}
			            			?>
			            		
			            	</form>
			            </div>
					</div>
				</div>
			</div>
			<!-- end 12 -->
			<div class="col-md-12" style="margin-top: 0.5em; padding-bottom: 0.4em; border-top: 1px dashed #dfdfdf; padding-top: 0.5em; position: fixed; bottom: 0; background-color: #2a2b2d;">
				<div class="col-md-2">
				</div>
				<div class="col-md-4" style="text-align: left;">
					<button type="button" class="btn btn-xs" id="up1" onclick="javascript:up1();" title="Ghi nhớ câu hỏi này"><span style='font-size:14px;'>&#43;</span> Ghi nhớ</button>
					<button type="button" class="btn btn-xs" id="down1" title="Bỏ ghi nhớ câu hỏi này" onclick="javascript:down1();"><span style='font-size:14px;'>&#45;</span> Bỏ ghi nhớ</button>
				</div>
				<div class="col-md-6" style="text-align: right;">
					<button type="button" id="back" name="back" class="btn btn-xs btn-primary"><span style='font-size:14px;'>&laquo;</span> Câu trước</button>
					<button type="button" id="next" name="next" class="btn btn-xs btn-primary">Câu sau <span style='font-size:14px;'>&raquo;</span></button>
				</div>
        	</div>
		</div>
		<!-- end md-10 -->
	</div>
</body>
</html>