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
                    <h4>SỬA THÔNG TIN CA THI</h4>
                </div>
            </div>
            <?php
                if (isset($_GET['id_edit'])) {
                include("../config.php");
                $d=mysqli_query($connect,"select * from cathi where macathi='".$_GET['id_edit']."'");
                $dr=mysqli_fetch_array($d, MYSQLI_ASSOC);
            ?>
           <div class="row white-box">
                <form class='form-material form-horizontal' style="width: 100%;">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-12" for="example-text">Mã ca thi</label>
                            <div class="col-md-12">
                                <input type="text" id="mact" class="form-control" value="<?php echo $dr['macathi']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12" for="example-text">Tên ca thi</label>
                            <div class="col-md-12">
                                <input type="text" id="tenct" class="form-control" value="<?php echo $dr['tencathi']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12" for="bdate">Bắt đầu</label>
                            <div class="col-md-12">
                                <input type="text" id="bd" class="form-control mydatepicker" value="<?php echo $dr['bd']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12" for="bdate">Kết thúc</label>
                            <div class="col-md-12">
                                <input type="text" id="kt" class="form-control mydatepicker" value="<?php echo $dr['kt']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12" for="bdate">Ghi chú</label>
                            <div class="col-md-12">
                                <input type="text" id="gc" class="form-control mydatepicker" value="<?php echo $dr['ghichu']; ?>">
                            </div>
                        </div>
                    </div>
                </form>
                <button type="button" class="btn btn-primary" id="sb">Lưu thông tin ca thi</button>
           </div>
           <?php } ?>
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
                if (confirm("Sửa thông tin ca thi?")){
                    $(".preloader").show();
                    var mact=$("#mact").val();
                    var tenct=$("#tenct").val();
                    var bd=$("#bd").val();
                    var kt=$("#kt").val();
                    var gc=$("#gc").val();

                    $.ajax({
                        type:'post',
                        url:'sql/edit-ct.php?id=<?php if (isset($_GET['id_edit'])) echo $_GET['id_edit']; else echo ""; ?>',
                        data:{d1:mact,d2:tenct,d3:bd,d4:kt,d5:gc},
                        success:function(e){
                            // alert(e);
                            if (e==""){
                                alert("Đã sửa thông tin ca thi");
                                window.location="list-cathi.php";
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