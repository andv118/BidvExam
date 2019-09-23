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
    <?php include("sitebar.php"); ?>
        <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row bg-title">
                <div class="col-md-7">
                    <h4>THÊM NỘI DUNG THI</h4>
                </div>
            </div>
            <?php
            	include("../config.php");
                $ct=mysqli_query($connect, "select mamodun, tenmodun from modun, kythi where kythi.makythi=modun.makythi and kythi.makythi='".$_SESSION['makythi']."'");
                if (mysqli_num_rows($ct)>0){
            ?>
           <div class="row white-box">
                <form class='form-material form-horizontal' style="width: 100%;">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-12" for="example-text">Chọn môn thi</label>
                            <div class="col-md-12">
                                <select id='modun' class="form-control">
                                <?php
                                    while ($r=mysqli_fetch_array($ct,MYSQLI_ASSOC)){
                                        echo "<option value='".$r['mamodun']."'>".$r['mamodun']." : ".$r['tenmodun']."</option>";
                                    }
                                ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12" for="example-text">Mã nội dung</label>
                            <div class="col-md-12">
                                <input type="text" id="mabode" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12" for="example-text">Tên nội dung</label>
                            <div class="col-md-12">
                                <input type="text" id="tenbode" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12" for="example-text">Điểm tối đa</label>
                            <div class="col-md-12">
                                <input type="number" id="diemmax" class="form-control" min="0">
                            </div>
                        </div>
                    </div>
                </form>
                <button type="button" class="btn btn-primary" id="sb">Lưu</button>
           </div>
           <?php
            } else echo "Bạn cần tạo môn thi trước khi tạo nội dung thi";
           ?>
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
            $("#sb").click(function(e){
                if (confirm("Thêm nội dung thi?")){
                    $(".preloader").show();
                    var mabode=$("#mabode").val();
                    var tenbode=$("#tenbode").val();
                    var diemmax=$("#diemmax").val();
                    var modun=$("#modun").val();

                    $.ajax({
                        type:'post',
                        url:'sql/add-sub-subject.php',
                        data:{d1:mabode, d2:tenbode, d3:diemmax, d4:modun},
                        success:function(e){
                            if (e==""){
                                alert("Thêm nội dung thi thành công!");
                                window.location="sub-subject-list.php";
                            } else alert("Xảy ra lỗi : "+e);
                            $(".preloader").hide();
                        }
                    });
                }
            });
        });
    </script>
</body>

</html>

<?php
    }
?>