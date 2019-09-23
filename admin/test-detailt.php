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

<body>
    <!-- Preloader -->
    <?php
        
        include("sitebar.php"); ?>
        <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row bg-title" style="margin-bottom: 0.5em; padding: 0.5em;">
                <div class="col-md-12">
                    <h4>XEM CHI TIẾT BÀI THI</h4>
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

                <div id="load" class="col-md-12" style="margin-top: 1em;">
                    
                </div>
                <div class="col-md-12" style="text-align: center;">
                    <button type="button" class='btn btn-md btn-primary pr' onclick="printContent();" style="display: none; background: #4267b2;">In bài thi</button>
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
                window.location="test-detailt.php?select_r_c_exam_chosse="+$(this).val()+"&select_r_c_exam_chosse_name="+$(this).find("option:selected").text();
            });

            $("#phongthi").change(function(e){
                window.location="test-detailt.php?select_r_c_exam_chosse="+$("#cathi").val()+"&select_r_c_exam_chosse_name="+$("#cathi").find("option:selected").text()+"&pt="+$(this).val()+"&n_pt="+$(this).find("option:selected").text();
            });

            $("#monthi, #hv").change(function(e){
                $(".preloader").show();
                // var ct=$("#cathi").val();
                // var pt=$("#phongthi").val();
                var mt=$("#monthi").val();
                var hv=$("#hv").val();
                var name_mt=$("#monthi").find("option:selected").text();
                var name_hv=$("#hv").find("option:selected").text();
                // alert(mt+"-"+name_mt+"   "+hv+"-"+name_hv);
                $.ajax({
                    type:'POST',
                    url:'test-detailt-list.php?name_mt='+name_mt+'&name_hv='+name_hv,
                    data:{mt:mt, hv:hv},
                    success: function(e){
                        $("#load").html(e);
                        if (e!="") $(".pr").show();
                        $(".preloader").hide();
                    }
                });
                return false;
            });
        });
    </script>
</body>

</html>

<?php
    }
?>