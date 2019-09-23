<?php
	session_start();
	if (isset($_SESSION['sbd'])) $sbd=$_SESSION['sbd'];
	else echo "<script>window.location='index.php';</script>";
	require("config.php");
	if (isset($_POST['tag'])) $socau=trim($_POST['tag']);
?>

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
						
					$cauhoi=mysqli_query($connect,"select cauhoi.tencauhoi, dethisinh.dapanA as paA, dethisinh.dapanB as paB, dethisinh.dapanC as paC, dethisinh.dapanD as paD, dethisinh.dapanE as paE, dethisinh.dapanF as paF, cauhoi.imgviauTencauhoi, dethisinh.imgviaupaA, dethisinh.imgviaupaB, dethisinh.imgviaupaC, dethisinh.imgviaupaD, dethisinh.imgviaupaE, dethisinh.imgviaupaF, dethisinh.temp from cauhoi, dethisinh where dethisinh.macauhoi=cauhoi.macauhoi and dethisinh.mamodun='".$_SESSION['modunid']."' and dethisinh.sbd='$sbd' ORDER by dethisinh.socau LIMIT ".($socau-1).",1");
						$cdata=mysqli_fetch_array($cauhoi,MYSQLI_ASSOC);
						mysqli_free_result($cauhoi);
						mysqli_close($connect);
						// $cdata['tencauhoi']=str_replace("<","&lt;",$cdata['tencauhoi']);
						// // echo $cdata['tencauhoi'];
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
						
						if ($cdata['temp']!=NULL) echo "<script>document.getElementById('s'+".$socau.").style.backgroundColor='blue';</script>";
						
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
								if (!empty($cdata['paF'])) echo "<div style='margin-bottom:0.6em;'><span class='choose6' onClick='writechoose(\"choose6\");' onClick=\"fillBackground('s".$socau."');\"><input type='radio' name='".$socau."' value='F'>&nbsp;F. ".$cdata['paF']."</span>";
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
						}
						else if ($cdata['temp']=="C"){
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
								if (!empty($cdata['paC'])) echo "<div style='margin-bottom:0.6em;'><span class='choose3' onClick='writechoose(\"choose3\");' onClick=\"fillBackground('s".$socau."');\"><input type='radio' name='".$socau."' value='C' checked>&nbsp;C. ".$cdata['paC']."</span><br>";
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
						else if ($cdata['temp']=="D"){
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
						}
						else if ($cdata['temp']=="E"){
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
						}
						else {
							echo "<div class='tencauhoi'>";
								echo $cdata['tencauhoi'];
								if (!empty($cdata['imgviauTencauhoi'])) reg($cdata['imgviauTencauhoi'],"imgcauhoi");
							echo "</div>";
							echo "<div class='dapan'>";
									if (!empty($cdata['paA'])) echo "<div  style='margin-bottom:0.6em;'><span class='choose1' onClick='writechoose(\"choose1\");' onClick=\"fillBackground('s".$socau."');\"><input type='radio' name='".$socau."' value='A'>&nbsp;A. ".$cdata['paA']."</span><br>";
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