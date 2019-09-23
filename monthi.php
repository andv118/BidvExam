<?php
	date_default_timezone_set('Asia/Ho_Chi_Minh');
    $date1 = strtotime(date('Y-m-d H:i:s'));
	session_start();
	if (!isset($_SESSION['sbd'])) echo "<script>alert('Bạn chưa đăng nhập!'); window.location='index.php';</script>";
	require_once("config.php");
	$modun = mysqli_query($connect, "select modun.mamodun, tenmodun from modun, cpthi where modun.mamodun = cpthi.mamodun and cpthi.sbd = '".$_SESSION['sbd']."' and cpthi.cp = 'C'");
	$profile = mysqli_query($connect, "select profile from hocvien where sbd = '".$_SESSION['sbd']."'");
	$profilei = mysqli_fetch_array($profile, MYSQLI_ASSOC);
	if ($profilei['profile'] == "") $target = "upload/imgthisinh/male.jpg"; else $target = "upload/imgthisinh/".$profilei['profile'];

    // Ca thi
    $res = mysqli_query($connect, "select tenpt, tencathi, bd, kt from phongthi, cathi, hocvien where cathi.macathi=phongthi.macathi and phongthi.mapt=hocvien.mapt and hocvien.sbd='".$_SESSION['sbd']."'");
    $r = mysqli_fetch_array($res, MYSQLI_ASSOC);
    $date2 = strtotime(date($r['bd']));

    // Đọc file thời gian hiển thị nội quy
    // $file= fopen('data/time.txt', 'r');
    // $num= strtotime(date(fgets($file)));
    // fclose($file);
?>
<!doctype html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="shortcut icon" href="image/icon.jpg" type="image/x-icon">
    <title>Môn thi</title>
    <link rel="stylesheet" href="style/index.css" type="text/css">
    <link rel="stylesheet" href="style/monthi.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="style/bootstrap.min.css">
    <script src="js/jquery-3.1.1.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script>
        window.addEventListener('load', function(e){ // Load hết trang web mới thực hiện mấy câu script
            var date1 = <?php echo $date1; ?>;
            var date2 = <?php echo $date2; ?>;
            var hour, minute, second, temp, temp1 = date2 - date1;
            // temp = temp1;
            // hour = format(parseInt(temp/3600));
            // temp = temp%3600;
            // minute = format(parseInt(temp/60));
            // temp = temp%60;
            // second = format(temp);
            // document.getElementById("idclock").innerHTML = hour + ":" + minute + ":" + second;
            
            if (temp1 > 0) {
                var timebe = setInterval(function(){
                    run(); // Gọi hàm đếm ngược;
                }, 1000);
            }

            function run(){
                temp = temp1;
                hour = format(parseInt(temp/3600));
                temp = temp%3600;
                minute = format(parseInt(temp/60));
                temp = temp%60;
                second = format(temp);
                document.getElementById("idclock").innerHTML = hour + ":" + minute + ":" + second;
                temp1--;
                if (temp1 < 0) clearInterval(timebe);
            }
            // Đến thời gian hiển thị video nội quy kỳ thi
            // var hour1, minute1, second1, temp3, temp2 = num - date1;

            // if (temp2 > 0) {
            //     var timebe1 = setInterval(function(){
            //         run1();
            //     }, 1000);
            // } else {
            //     document.getElementById('label-video').style.display = 'none';
            //     document.getElementById('load-video').style.display = 'block';
            //     document.getElementById('myvideo').style.display = 'block';
            // }

            // function run1(){
            //     temp3 = temp2;
            //     hour1 = format(parseInt(temp3/3600));
            //     temp3 = temp3%3600;
            //     minute1 = format(parseInt(temp3/60));
            //     temp3 = temp3%60;
            //     second1 = format(temp3);
            //     document.getElementById("label-video-time").innerHTML = hour1 + ":" + minute1 + ":" + second1;
            //     temp2--;
            //     if (temp2 < 0) {
            //         console.log(document.getElementById('load-video'));
            //         document.getElementById("label-video").style.display = 'none';
            //         document.getElementById("load-video").style.display = 'block';
            //         document.getElementById('myvideo').style.display = 'block';
            //         document.getElementById("load-video").play();
            //         clearInterval(timebe1);
            //     }
            // }

            function format(d){
                return (d < 10 ? '0' : '')+d;
            }
        });

        // var elem = document.getElementById("load-video");
        // function openFullscreen() {
        //     if (elem.requestFullscreen) {
        //         elem.requestFullscreen();
        //     } else if (elem.mozRequestFullScreen) { /* Firefox */
        //         elem.mozRequestFullScreen();
        //     } else if (elem.webkitRequestFullscreen) { /* Chrome, Safari & Opera */
        //         elem.webkitRequestFullscreen();
        //     } else if (elem.msRequestFullscreen) { /* IE/Edge */
        //         elem.msRequestFullscreen();
        //     }
        // }

		$(document).ready(function(e) {
	        $("button[name='btn-exit']").click(function(e){
	        	$(".back_out").css("display","block");
				$(".back_over").css("display","block");
	        	if (confirm("Đăng xuất tài khoản của bạn?")){
	        		$.ajax({
	        			url: 'logout.php',
	        			success:function(e){
	        				if (e == ""){
	        					window.location='index.php';
	        				} else {
	        					alert("Có lỗi xảy ra: " + e);
	        					$(".back_out").css("display","none");
								$(".back_over").css("display","none");
	        				}
	        			}
	        		});
	        	}
	        });
	    });

        function bd(st){
            $(".back_out").css("display","block");
            $(".back_over").css("display","block");
            var a = new Array();
            a = st.split(";;;");
            $.ajax({
                type: 'post',
                url: 'test/testTimeStartExam.php',
                success:function(e){
                    if (e=="notstart") {
                        alert("Ca thi chưa được mở!");
                        location.reload();
                    } else if (e=="stop") alert("Ca thi đã kết thúc!");
                        else if (e=="pass") window.location = "xnthi.php?id="+a[0]+"&abcdef="+a[1];
                    $(".back_out").css("display","none");
                    $(".back_over").css("display","none");
                }
            });
        }
	</script>
</head>

<body>
	<div class="back_out"></div>
	<div class="back_over"></div>
    <div class="row" style="margin-right: 0; margin-left: 0;">
        <div class="col-md-10 col-md-offset-1" style="border: 1px solid #dfdfdf;">
            <div class="row panel">
                <div class="col-md-12 banner"></div>
                <div class="col-md-12" style="padding-left: 0.7em;">
                	<div class="col-md-3 panel" style='border:1px solid #dfdfdf; margin-top: 1em; margin-left: 0; padding-left: 0.2em; padding-right: 0.2em; font-size: 13px;'>
                		<div class="col-md-12" style="margin-top: 1em; border-bottom: 1px solid #dfdfdf; text-align: center;">
                			<p style="font-weight: bold; font-size: 15px;">THÍ SINH DỰ THI</p>
                		</div>
                		<hr>
                		<div class="col-md-12" style="border-bottom: 1px solid #dfdfdf;">
                			<img src='<?php echo $target;?>' style='margin:auto; display:block; width:55%; height: 150px;'>
                		</div>
                		<div class="col-md-12" style="border-bottom: 1px dotted #dfdfdf; padding: 0.5em 0.3em;">
                			<span>Họ và tên: </span>
							<span><b><?php echo $_SESSION['hoten'];?></b></span>
                		</div>
                		<div class="col-md-12" style="border-bottom: 1px dotted #dfdfdf; padding: 0.5em 0.3em;">
                			<span>SBD: </span>
							<span><b><?php echo $_SESSION['sbd'];?></b></span>
                		</div>
                		<div class="col-md-12" style="border-bottom: 1px dotted #dfdfdf; padding: 0.5em 0.3em;">
                			<span>Ngày sinh: </span>
							<span><b><?php echo $_SESSION['ngaysinh'];?></b></span>
                		</div>
                		<div class="col-md-12" style="border-bottom: 1px dotted #dfdfdf; padding: 0.5em 0.3em;">
                			<span>Nơi sinh: &nbsp;</span>
							<span><b><?php echo $_SESSION['noisinh'];?></b></span>
                		</div>
                        <div class="col-md-12" style="padding: 0.5em 0.3em;">
                            <span>Đơn vị: </span>
                            <span><b><?php echo $_SESSION['donvi'];?></b></span>
                        </div>
                		<div class="col-md-12" style="padding: 0.5em 0.3em; border-top: 2px solid blue;">
                			<button class="btn btn-md btn-danger" name="btn-exit" style="width: 100%;">Đăng xuất</button>
                		</div>
                	</div>
                	<div class="col-md-9 panel" style='border:1px solid #dfdfdf; margin-top: 1em; padding-left: 0; padding-right: 0;'>
                        <div class="col-md-8" style="border-right: 1px solid #dfdfdf; padding-left: 0; padding-right: 0;">
                            <div class="col-md-12" style="border-bottom: 1px solid #dfdfdf;">
                                <div class="col-md-12"  style="margin-top: 1em; text-align: center; border-bottom: 1px solid #dfdfdf;">
                                    <p style="font-weight: bold; color: red; font-size: 15px;">THÔNG TIN CA THI</p>
                                </div>
                                <div class="col-md-12" style="padding-top: 0.3em; padding-left: 0; padding-right: 0;">
                                    <p><span style="font-weight: 700;">Kỳ thi:</span> <span style="color: blue; font-weight: 600;"><?php echo $_SESSION['tkt']; ?></span></p>
                                    <?php
                                        
                                    ?>
                                    <p><span style="font-weight: 700;">Ca thi:</span> <span style="color: blue; font-weight: 600;"><?php echo $r['tencathi']; ?></span> | <span style="font-weight: 700;">Phòng thi:</span> <span style="color: blue; font-weight: 600;"><?php echo $r['tenpt']; ?></span></p>
                                    <p><span style="font-weight: 700;">Bắt đầu làm bài:</span> <span style="color: blue; font-weight: 600;"><?php echo date('H:i:s \n\g\à\y d/m/Y', strtotime($r['bd'])); ?></span></p>
                                </div>
                            </div>
                    		<div class="col-md-12" style="margin-top: 1em; border-bottom: 1px solid #dfdfdf; text-align: center;">
                    			<p style="font-weight: bold; margin-bottom: 0.2em; font-size: 14px; color: red;">Danh sách môn thi</p>
                    		</div>
                    		<div class="col-md-12" style="margin-top: 0.6em;">
                    			<?php
                    				$i=0;
                    				while ($data = mysqli_fetch_array($modun, MYSQLI_ASSOC)){
    									$i++;
    									echo "
    									<div name='mmodun".$i."' style='border-right: 4px solid blue;'>
    										<img src='image/small-list.png' width='25' height='24' style='float:left;'>
    											<p id='tench' style='font-weight: bold; cursor:pointer; margin-left: 2.1em;' onclick='bd(\"".$data['mamodun'].";;;".$data['tenmodun']."\");'>".$data['tenmodun']."</p>
    									</div>";
    								}
                    			?>
                    		</div>
                    		<div class="col-md-12" style="padding-top:0.6em; margin-top: 0.5em; border-top: 1px solid #dfdfdf;">
                    			<p style="font-weight: bold;">Sau thời gian <span id="idclock">...</span>, thí sinh click tên môn thi để vào bài thi</p>
                    		</div>
                            <div class="col-md-12" style="padding-top:0.6em; border-top: 1px solid #dfdfdf; padding-left: 4em; padding-bottom: 1.5em;">
                                <a href="efx.php" style="font-weight: bold; text-decoration: underline;" title="Làm bài thi thử, làm quen giao diện làm bài thi." target="_blank">Làm bài thi thử (Nội dung câu hỏi có thể không liên quan tới kiến thức chuyên môn)</a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <!-- <div class="col-md-12" style="margin-top: 1em; text-align: center;">
                                <p style="font-weight: bold; margin-bottom: 0.2em; font-size: 15px; color: red;">NỘI QUY PHÒNG THI</p>
                            </div>
                            <p id="label-video">&diams; Nội dung sẽ hiển thị sau thời gian: <span id="label-video-time"></span></p>
                            <video id="load-video" width="100%" height="360" controls loop style="border: 1px solid #dfdfdf;">
                                <source src="image/video/tom.mp4" type="video/mp4">
                            </video>
                            <button onclick="openFullscreen();" id="myvideo">Mở toàn màn hình</button> -->
                        </div>
                	</div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>