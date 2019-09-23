<?php
	session_start();
	if (!isset($_SESSION['sbd'])) echo "<script>alert('Bạn chưa đăng nhập!');window.location='index.php';</script>";
	$sbd = $_SESSION['sbd'];
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	require("config.php");
	$socau = $_GET['sc'];
	$mamonthi = $_GET['ID'];
	$t2 = mysqli_query($connect,"select timeconlai from diem where sbd='$sbd' and mamodun='$mamonthi'");
	$time = mysqli_fetch_array($t2);
	if (isset($time['timeconlai'])) $tgconlai = $time['timeconlai']; else $tgconlai=-1;
	if ($time['timeconlai']>0){
		mysqli_query($connect,"update cpthi set cp='K' where sbd='$sbd' and mamodun='$mamonthi'");
	}
	else {
		if (isset($_SESSION['time12'])){
			mysqli_query($connect,"insert into diem(sbd,mamodun) values('$sbd','$mamonthi')");
			mysqli_query($connect,"insert into remote(sbd,mamodun,ipaddress,estatus) values('$sbd','$mamonthi','".$_SERVER['REMOTE_ADDR']."','Đang thi')");
			mysqli_query($connect,"update cpthi set cp='K' where sbd='$sbd' and mamodun='$mamonthi'"); //Chỉ cho thí sinh đăng nhập một lần;
			mysqli_query($connect,"update diem set timeconlai='".($_SESSION['time12']*60)."',
			thoigianthi='".date("Y-m-d H:i:s",time())."' where sbd='$sbd' and mamodun='$mamonthi'");
			$tgconlai = $_SESSION['time12']*60;
		}
	}

	$profile = mysqli_query($connect,"select profile from hocvien where sbd='$sbd'");
	$profilei = mysqli_fetch_array($profile);
	if ($profilei['profile']=="") $target="upload/imgthisinh/male.jpg"; else $target="upload/imgthisinh/".$profilei['profile'];
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Bài thi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="shortcut icon" href="image/icon.jpg" type="image/x-icon">
    <link rel="stylesheet" href="style/exam.css" type="text/css"/>
    <!-- <link rel="stylesheet" href="style/index.css" type="text/css"/> -->
    <link rel="stylesheet" type="text/css" href="style/bootstrap.min.css">
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.1.1.js"></script>
    <script src="js/exam.js"></script>
    <script type="text/javascript">
		var t;
		t=setInterval(function(){run();},1000);
        var hour,minute,second,temp=<?php echo $tgconlai; ?>,temp1;
        var lc1;
        var cookieArr=document.cookie.split(";");
        for (var k=0; k<cookieArr.length; k++){
        	lc1=cookieArr[k].split("=");
        	if (lc1[0].trim()=="time" && lc1[1]>0){
        		temp=lc1[1];
        		break;
        	}
        }

        function run(){
			temp1=temp;
			hour=format(parseInt(temp/3600));
			temp=temp%3600;
			minute=format(parseInt(temp/60));
			temp=temp%60;
			second=format(temp);
			temp=--temp1;
			document.cookie="time="+temp+";expires=Fri 30 Aug 2029 10:00:00 UTC;";
			if (temp%60==0){
				$.ajax({
					type: 'POST',
					url: 'savetime.php',
					data: {time:temp},
					success: function(data){}
				});
			}
            if (temp<=0){
            	clearInterval(t);
				var tg=parseInt(new Date().getTime()/1000);
				$.ajax({
					type: 'post',
					url: "savetimeend.php",
					data:{time:temp,tg:tg},
					success: function(e){
						window.location="report.php?name=<?php if (isset($_GET['abcdef'])) echo $_GET['abcdef']; else echo ""; ?>";
					}
				});
			}
			if (temp<31){
				document.getElementById('clock').style.color = 'red';
				(function blink() { 
				  	$('#clock').fadeOut(500).fadeIn(500, blink); 
				})();
			}
            document.getElementById("clock").innerHTML = hour + ":" + minute + ":" + second;
        }
					
		function chamdiem(){
			if (confirm("Sau khi xác nhận nộp bài, bạn sẽ không thể thay đổi bài làm! Bạn có chắc chắn muốn kết thúc bài thi?")){
				var tg= parseInt((new Date().getTime())/1000);
				$.ajax({
					type: 'post',
					url: "savetimeend.php",
					data:{time:temp,tg:tg},
					success: function(e){
						window.location="report.php?name=<?php if (isset($_GET['abcdef'])) echo $_GET['abcdef']; else echo ""; ?>";
					}
				});
			}
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
				if (nel==<?php echo $_SESSION['tongcauhoi'];?>) {
					$("#back").attr("disabled", false);
					$("#next").attr("disabled", true);
				}
				else {
					$("#back").attr("disabled", false);
					$("#next").attr("disabled", false);
				}
			$.ajax({
				type:"POST",
				url: "loadcauhoi.php",
				data: {tag:tag},
				success: function(e){
					$(".loadch1").html(e);
					$('#showch').text('Câu hỏi hiện tại: ' + nel);
				}
			});
			return false;
		}
			
		$(document).ready(function(e){
			var tongpt=<?php echo $_SESSION['tongcauhoi'];?>;
			if (nel==1) $("#back").attr("disabled", true); else $("#back").attr("disabled", false);
			if (nel==tongpt) $("#next").attr("disabled", true); else $("#next").attr("disabled", false);
			
			$("#back").click(function(e){
				var tongpt=<?php echo $_SESSION['tongcauhoi'];?>;
				if (nel<=2) $("#back").attr("disabled", true); else $("#back").attr("disabled", false);
				$("#next").attr("disabled", false);
				nel--;
				$.ajax({
					type:"POST",
					url: "loadcauhoi.php",
					data:{tag:nel},
					success: function(e){
						$(".loadch1").html(e);
						$('#showch').text('Câu hỏi hiện tại: ' + nel);
					}
				});
            });
			
			$("#next").click(function(e){
				var tongpt=<?php echo $_SESSION['tongcauhoi'];?>;
				nel++;
				if (nel>=tongpt) $("#next").attr("disabled", true);
					else $("#next").attr("disabled", false);
				$("#back").attr("disabled", false);
				// $(this).prop('title', 'Câu tiếp: ' + (nel+1));
				$.ajax({
					type:"POST",
					url: "loadcauhoi.php",
					data:{tag:nel},
					success: function(e){
						$(".loadch1").html(e);
						$('#showch').text('Câu hỏi hiện tại: ' + nel);
					}
				});
            });
			
		});

    	function toggleFullScreen() {
        	if ((document.fullScreenElement && document.fullScreenElement !== null) ||    
           		(!document.mozFullScreen && !document.webkitIsFullScreen)) {
            	if (document.documentElement.requestFullScreen) {  
              		document.documentElement.requestFullScreen();  
            	} else if (document.documentElement.mozRequestFullScreen) {  
              		document.documentElement.mozRequestFullScreen();  
            	} else if (document.documentElement.webkitRequestFullScreen) {  
              		document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
            	}
          	} else {
            	if (document.cancelFullScreen) {
              		document.cancelFullScreen();
            	} else 
            		if (document.mozCancelFullScreen) {  
              			document.mozCancelFullScreen();  
            		} else if (document.webkitCancelFullScreen) {  
              		document.webkitCancelFullScreen();  
            	}
          	}  
        }

	</script>
	<style type="text/css">
		.loadch1 .areaexam .dapan span:hover{cursor: pointer; color: green; font-weight: bold;}
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
				<div id="clock" style="color: blue; margin-top:0.1em; margin-left:2em;font-size:25px;font-weight:bold;"></div><!--Hiển thị thời gian còn lại-->
			</div>
            <div class="col-md-12" style="margin-top: 1em; border-bottom: 1px solid #dfdfdf; text-align: center;">
    			<p style="font-weight: bold;">THÔNG TIN THÍ SINH</p>
            </div>
            <hr>
    		<div class="col-md-12" style="padding: 0.5em 0.3em;">
    			<span>Họ và tên: &nbsp;</span>
				<span><b><?php echo $_SESSION['hoten']; ?></b></span>
    		</div>
    		<div class="col-md-12" style="padding: 0.5em 0.3em;">
    			<span>SBD: &nbsp;</span>
				<span><b><?php echo $_SESSION['sbd'];?></b></span>
    		</div>
    		<div class="col-md-12" style="padding: 0.5em 0.3em;">
    			<span>Ngày sinh: &nbsp;</span>
				<span><b><?php echo $_SESSION['ngaysinh'];?></b></span>
    		</div>
    		<div class="col-md-12" style="padding: 0.5em 0.3em;">
    			<span>Nơi sinh: &nbsp;</span>
				<span><b><?php echo $_SESSION['noisinh'];?></b></span>
    		</div>
    		<div class="col-md-12" style="padding: 0.5em 0.3em; border-bottom: 1px solid #dfdfdf;">
    			<span>Đơn vị: &nbsp;</span>
				<span><b><?php echo $_SESSION['donvi'];?></b></span>
    		</div>

    		<div class="col-md-12" style="padding: 0.5em 0.3em;">
    			<input id="submit" class='btn btn-md btn-primary' style="margin:auto;display:block;padding:10px 45px;cursor:pointer;" type="submit" value="Nộp bài" onClick="chamdiem();">
    		</div>

    		<div class="col-md-12" style="padding: 0.5em 0.3em; border-top: 1px solid green; margin-top: 1em; text-align: center;" title="Ghi nhớ câu hỏi bạn chưa chắc chắn với câu trả lời!">
				<p style="font-weight: 700; text-transform: uppercase;">Ghi nhớ</p>
				<div class="row" id="temp"></div>
    		</div>
		</div>
		<!-- end md-2 -->

		<!-- bg md-10 -->
		<div class="col-md-10">
			<!-- bg 12 -->
			<div class="col-md-12" style="margin-bottom: 1em;">
				<div class="examcontent_p2_1">
	            	<p>KỲ THI KIỂM TRA NĂNG LỰC QUẢN LÝ BIDV NĂM <?php echo date('Y'); ?>:
	            	<span style="text-transform: uppercase;"><?php if (isset($_GET['abcdef'])) echo $_GET['abcdef']; else echo ""; ?></span>
	            	</p>
	            </div>
			</div>
			<!-- end 12 -->

			<!-- bg 12 -->
			<div class="col-md-12" style="padding-top: 0.7em;">
				<?php
					$tongcauhoi=0;
					for ($k=1;$k<=$_SESSION['tongphanthi'];$k++){
						echo "<div class='row'>";
							echo "<div class='col-md-3'>";
								echo "<p style='font-size:13px;color:blue;margin-left:0.8em; margin-bottom:0.3em; margin-top:0.5em;'>Phần ".$k." - <span style='color:#FE2000; font-weight:bold;'>".$_SESSION['phan'.$k]."</span></p>";
							echo "</div>";
							echo "<div class='col-md-9'>";
								for ($i=$_SESSION['rangea'.$k];$i<=$_SESSION['rangeb'.$k];$i++)
								{
									echo "<div class='socau' id='s".$i."' onClick=\"scrollToAnchor('s".$i."');\">".$i."
									</div>";
									$tongcauhoi++;
								}
							echo "</div>";
						echo "</div>";
					}
					$sc1=mysqli_query($connect,"select macauhoi,socau,temp from dethisinh where sbd='$sbd' and mamodun='$mamonthi' order by socau");
					while ($cauhoi123=mysqli_fetch_array($sc1,MYSQLI_ASSOC)){
						if ($cauhoi123['temp']!=NULL){
							echo "<script> $('#s".$cauhoi123['socau']."').css('background','blue');</script>";
						}
					}
					mysqli_free_result($sc1);
				?>
			</div>
			<!-- end 12 -->

			<!-- bg 12 -->
			<div class='col-md-12' style="padding-bottom: 8em;">
				<div class="row">
					<div class="loadch1">
						<div class="examcontent_p2_2">
			                <p class="p1">Câu hỏi: <?php echo "<span style='color:red;' id='val'>".$socau."</span>/".$_SESSION['tongcauhoi'];?></p>
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
									$cauhoi=mysqli_query($connect,"select cauhoi.tencauhoi, dethisinh.dapanA as paA, dethisinh.dapanB as paB, dethisinh.dapanC as paC, dethisinh.dapanD as paD, dethisinh.dapanE as paE, dethisinh.dapanF as paF, cauhoi.imgviauTencauhoi, dethisinh.imgviaupaA, dethisinh.imgviaupaB, dethisinh.imgviaupaC, dethisinh.imgviaupaD, dethisinh.imgviaupaE, dethisinh.imgviaupaF, dethisinh.temp from cauhoi, dethisinh where dethisinh.macauhoi=cauhoi.macauhoi and dethisinh.mamodun='$mamonthi' and dethisinh.sbd='$sbd' ORDER by dethisinh.socau LIMIT ".($socau-1).",1");
									$cdata=mysqli_fetch_array($cauhoi,MYSQLI_ASSOC);
									mysqli_free_result($cauhoi);
									mysqli_close($connect);
									// $cdata['tencauhoi']=str_replace("<","&lt;",$cdata['tencauhoi']);
									// $cdata['paA']=str_replace("<","&lt;",$cdata['paA']);
									// $cdata['paB']=str_replace("<","&lt;",$cdata['paB']);
									// $cdata['paC']=str_replace("<","&lt;",$cdata['paC']);
									// $cdata['paD']=str_replace("<","&lt;",$cdata['paD']);
									// $cdata['paE']=str_replace("<","&lt;",$cdata['paE']);
									// $cdata['paF']=str_replace("<","&lt;",$cdata['paF']);
									// $cdata['tencauhoi']=str_replace(">","&gt;",$cdata['tencauhoi']);
									// $cdata['paA']=str_replace(">","&gt;",$cdata['paA']);
									// $cdata['paB']=str_replace(">","&gt;",$cdata['paB']);
									// $cdata['paC']=str_replace(">","&gt;",$cdata['paC']);
									// $cdata['paD']=str_replace(">","&gt;",$cdata['paD']);
									// $cdata['paE']=str_replace(">","&gt;",$cdata['paE']);
									// $cdata['paF']=str_replace(">","&gt;",$cdata['paF']);
									$j=1;
									if ($cdata['temp']!=NULL) echo "<script>document.getElementById($.trim('s'+".$socau.")).style.backgroundColor='blue';</script>";
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
									} else
										if ($cdata['temp']=="B"){
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
									}
									else if ($cdata['temp']=="F"){
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
					<button type="button" class="btn btn-xs" id="up" onclick="javascript:up();" title="Ghi nhớ câu hỏi này"><span style='font-size:14px;'>&#43;</span> Ghi nhớ</button>
					<button type="button" class="btn btn-xs" id="down" title="Bỏ ghi nhớ câu hỏi này" onclick="javascript:down();"><span style='font-size:14px;'>&#45;</span> Bỏ ghi nhớ</button>
				</div>
				<div class="col-md-6" style="text-align: right;">
					<span style="color: white; font-weight: 700; font-size: 14px;" id="showch">Câu hỏi hiện tại: 1</span>|||
					<button type="button" id="back" name="back" class="btn btn-xs btn-primary"><span style='font-size:14px;'>&laquo;</span> Câu trước</button>
					<button type="button" id="next" name="next" class="btn btn-xs btn-primary">Câu sau <span style='font-size:14px;'>&raquo;</span></button>
				</div>
        	</div>
		</div>
		<!-- end md-10 -->
	</div>
</body>
</html>