<?php
    session_start();
    if (!isset($_SESSION['admin'])) echo "<script>window.location='../admin/index.php'</script>";
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

<body id="body">
    <!-- Preloader -->
    <?php
        
        include("sitebar.php"); ?>
        <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row bg-title" style="margin-bottom: 0.5em; padding: 0.5em;">
                <div class="col-md-12">
                    <h4>TÙY CHỌN TRONG KHI THI</h4>
                </div>
            </div>
            <?php
                include("../config.php");
                $d=mysqli_query($connect, "select macathi, tencathi from cathi where makythi='".$_SESSION['makythi']."'");
            ?>

           <div class="row white-box" style="margin-top: 0;">
                <div class="col-md-12" style="margin-top: 1em;">

                    <div class="col-md-3">
                        <select id="cathi" class="form-control">
                            <?php
                                if (isset($_GET['select_r_c_exam_chosse']))
                                    echo "<option value='".$_GET['select_r_c_exam_chosse']."'>".$_GET['select_r_c_exam_chosse_name']."</option>";
                                else echo "<option value=''>--Chọn ca thi--</option>";
                                while ($s=mysqli_fetch_array($d)) {
                                    echo "<option value='".$s['macathi']."'>".$s['tencathi']."</option>";
                                }
                            ?>
                            
                        </select>
                    </div>

                    <div class="col-md-3">
                        <select id="phongthi" class="form-control">
                            <?php
                                if (isset($_GET['select_r_c_exam_chosse'])){
                                    if (isset($_GET['pt']))
                                        echo "<option value='".$_GET['pt']."'>".$_GET['n_pt']."</option>";
                                    else echo "<option value=''>--Chọn phòng thi--</option>";
                                    $p=mysqli_query($connect, "select mapt, tenpt from phongthi where macathi='".$_GET['select_r_c_exam_chosse']."'");
                                    while ($r=mysqli_fetch_array($p)) {
                                        echo "<option value='".$r['mapt']."'>".$r['tenpt']."</option>";
                                    }
                                } else echo "<option value=''>--Chọn phòng thi--</option>";
                            ?>
                            
                        </select>
                    </div>

                    <div class="col-md-3">
                        <select id="hv" class="form-control">
                            <option value=''>--Chọn học viên--</option>
                            <?php
                                if (isset($_GET['pt'])){
                                    $ml=mysqli_query($connect, "select sbd, hoten from hocvien where mapt='".$_GET['pt']."'");
                                    while ($r=mysqli_fetch_array($ml)) {
                                        echo "<option value='".$r['sbd']."'>".($r['sbd']." - ".$r['hoten'])."</option>";
                                    }
                                }
                            ?>
                            
                        </select>
                    </div>

                    <div class="col-md-3">
                        <select id="monthi" class="form-control">
                            <option value=''>--Chọn môn thi--</option>
                            <?php
                            	if (isset($_GET['select_r_c_exam_chosse'])){
                            		$ml=mysqli_query($connect, "select mamodun, tenmodun from modun where makythi='".$_SESSION['makythi']."'");
	                                while ($r=mysqli_fetch_array($ml)) {
	                                    echo "<option value='".$r['mamodun']."'>".$r['tenmodun']."</option>";
	                                }
                            	}
                            ?>
                            
                        </select>
                    </div>
                </div>

                <div class="col-md-12" style="border-top: 1px solid #dfdfdf; margin-top: 1em; padding-top: 2em;">
                    <div class="col-md-4 col-lg-3" style="border-right: 1px solid #dfdfdf;">
                    	<button class="btn btn-md btn-primary" id="reset_1">Đặt lại đề thi<br>(Đặt lại đề bài và bài làm)</button>
                    </div>
                    <div class="col-md-4 col-lg-3" style="border-right: 1px solid #dfdfdf;">
                    	<button class="btn btn-md btn-primary" id="reset_2">Đặt lại bài làm <br>(Giữ lại đề bài, đặt lại bài làm)</button>
                    </div>
                    <div class="col-md-4 col-lg-6">
                    	<input type="number" id="time_add" min="0" value="0" style="width: 200px; padding-left: 0.5em; padding-right: 0.5em; margin-right: 1em;">
                    	<button class="btn btn-md btn-primary" id="reset_3">Thêm thời gian</button>
                    </div>
                </div>
           </div>
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

    <script type="text/javascript">

        $(document).ready(function(e){

            $("#cathi").change(function(e){
                // alert($("#cathi").text());
                window.location="test-dur-exam.php?select_r_c_exam_chosse="+$(this).val()+"&select_r_c_exam_chosse_name="+$(this).find("option:selected").text();
            });

            $("#phongthi").change(function(e){
                window.location="test-dur-exam.php?select_r_c_exam_chosse="+$("#cathi").val()+"&select_r_c_exam_chosse_name="+$("#cathi").find("option:selected").text()+"&pt="+$(this).val()+"&n_pt="+$(this).find("option:selected").text();
            });

            $("#reset_1").click(function(e){
            	var ct=$("#cathi").val();
            	var pt=$("#phongthi").val();
            	var hv=$("#hv").val();
            	var mt=$("#monthi").val();
            	// alert(pt+" "+hv+" "+mt);

            	if (mt!=""){
            		if (pt!=""||hv!=""){
            			if (confirm("Bạn chắc chắn đặt (reset) lại đề thi của thí sinh? Sau khi xác nhận, đề bài hiện tại sẽ không khôi phục được?")){
            				$(".preloader").show();
            				$.ajax({
			                    type: 'post',
			                    url: 'sql/test-dur-exam-setting.php',
			                    data: {mt:mt, pt:pt, hv:hv, ct:ct},
			                    success: function(e){
			                        if (e=="") alert("Đã đặt (reset) lại đề bài của thí sinh!");
			                        $(".preloader").hide();
			                    }
			                });
            			}
            		} else alert("Bạn chưa chọn phòng thi hoặc học viên cần đặt lại đề");
            	} else alert("Bạn chưa chọn môn thi cần đặt lại đề!");

            });

            $("#reset_2").click(function(e){
            	var ct=$("#cathi").val();
            	var pt=$("#phongthi").val();
            	var hv=$("#hv").val();
            	var mt=$("#monthi").val();

            	if (mt!=""){
            		if (pt!=""||hv!=""){
            			if (confirm("Bạn chắc chắn đặt (reset) lại bài làm của thí sinh? Sau khi xác nhận, bài làm hiện tại sẽ không khôi phục được?")){
            				$(".preloader").show();
            				$.ajax({
			                    type: 'post',
			                    url: 'sql/test-dur-exam-setting-bl.php',
			                    data: {mt:mt, pt:pt, hv:hv, ct:ct},
			                    success: function(e){
			                    	// alert(e);
			                        if (e=="") alert("Đã đặt (reset) lại bài làm của thí sinh!");
			                        $(".preloader").hide();
			                    }
			                });
            			}
            		} else alert("Bạn chưa chọn phòng thi hoặc học viên cần đặt lại bài làm");
            	} else alert("Bạn chưa chọn môn thi cần đặt lại bài làm!");

            });

            $("#reset_3").click(function(e){
                var ct=$("#cathi").val();
                var pt=$("#phongthi").val();
                var hv=$("#hv").val();
                var mt=$("#monthi").val();
                var time=$("#time_add").val();
                alert(mt+" "+time+" "+pt);
                if (mt!=""&&time>0){
                    if (pt!=""||hv!=""){
                        if (confirm("Bạn chắc chắn thêm thời gian thực hiện bài thi cho thí sinh?")){
                            $(".preloader").show();
                            $.ajax({
                                type: 'post',
                                url: 'sql/test-dur-exam-setting-time.php',
                                data: {mt:mt, pt:pt, hv:hv, ct:ct, time:time},
                                success: function(e){
                                    // alert(e);
                                    if (e=="") alert("Đã thực hiện!");
                                    $(".preloader").hide();
                                }
                            });
                        }
                    } else alert("Bạn chưa chọn phòng thi hoặc học viên");
                } else alert("Bạn chưa chọn môn thi hoặc chưa cài đặt số phút cộng thêm!");

            });
        });
    </script>
</body>

</html>

<?php
    }
?>