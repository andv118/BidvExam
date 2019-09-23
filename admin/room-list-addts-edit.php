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
                    <h4>SỬA THÔNG TIN HỌC VIÊN</h4>
                </div>
            </div>
            <?php
                if (isset($_GET['id_edit'])) {
                include("../config.php");
                $d=mysqli_query($connect,"select * from hocvien where sbd='".$_GET['id_edit']."'");
                $dr=mysqli_fetch_array($d, MYSQLI_ASSOC);
            ?>
           <div class="row white-box">
                <form class='form-material form-horizontal' style="width: 100%;">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-12" for="example-text">Số báo danh</label>
                            <div class="col-md-12">
                                <input type="text" id="sbd" class="form-control" value="<?php echo $dr['sbd']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12" for="example-text">Họ và tên</label>
                            <div class="col-md-12">
                                <input type="text" id="hoten" class="form-control" value="<?php echo $dr['hoten']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12" for="example-text">Ngày sinh</label>
                            <div class="col-md-12">
                                <input type="text" id="ngaysinh" class="form-control" value="<?php echo $dr['ngaysinh']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12" for="example-text">Nơi sinh</label>
                            <div class="col-md-12">
                                <input type="text" id="noisinh" class="form-control" value="<?php echo $dr['noisinh']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12" for="example-text">Đơn vị</label>
                            <div class="col-md-12">
                                <input type="text" id="tendv" class="form-control" value="<?php echo $dr['tendv']; ?>">
                            </div>
                        </div>
                        <?php
                            $pt=mysqli_query($connect,"select mapt, tenpt from phongthi,cathi,kythi where phongthi.macathi=cathi.macathi and cathi.makythi=kythi.makythi and kythi.makythi='".$_SESSION['makythi']."'");
                        ?>
                        <div class="form-group">
                            <label class="col-md-12" for="example-text">Phòng thi</label>
                            <div class="col-md-12">
                                <select id="pt" class="form-control">
                                    <option value="<?php echo $dr['mapt'];?>"><?php echo $dr['mapt'];?></option>
                                    <?php
                                        while ($r=mysqli_fetch_array($pt,MYSQLI_ASSOC)){
                                            echo "<option value='".$r['mapt']."'>".$r['mapt']." : ".$r['tenpt']."</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
                <button type="button" class="btn btn-primary" id="sb">Lưu</button>
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
                if (confirm("Sửa thông tin học viên?")){
                    $(".preloader").show();

                    var sbd=$("#sbd").val();
                    var hoten=$("#hoten").val();
                    var ngaysinh=$("#ngaysinh").val();
                    var noisinh=$("#noisinh").val();
                    var donvi=$("#tendv").val();
                    var pt=$("#pt").val();

                    $.ajax({
                        type:'post',
                        url:'sql/edit-room-user.php?id=<?php if (isset($_GET['id_edit'])) echo $_GET['id_edit']; else echo ""; ?>',
                        data:{d1:sbd, d2:hoten, d3:ngaysinh, d4:noisinh, d5:donvi, d6:pt},
                        success:function(e){
                            if (e==""){
                                alert("Sửa thông tin học viên thành công!");
                                window.history.back();
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