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
                    <h4>SỬA THÔNG TIN PHÒNG THI</h4>
                </div>
            </div>
            <?php
                if (isset($_GET['id_edit'])) {
                include("../config.php");
                $d=mysqli_query($connect,"select * from phongthi where mapt='".$_GET['id_edit']."'");
                $dr=mysqli_fetch_array($d, MYSQLI_ASSOC);
                $ct=mysqli_query($connect, "select macathi, tencathi from cathi, kythi where kythi.makythi=cathi.makythi and kythi.makythi='".$_SESSION['makythi']."'");
            ?>
           <div class="row white-box">
                <form class='form-material form-horizontal' style="width: 100%;">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-12" for="example-text">Mã phòng thi</label>
                            <div class="col-md-12">
                                <input type="text" id="mapt" class="form-control" value="<?php echo $dr['mapt']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12" for="example-text">Tên phòng thi</label>
                            <div class="col-md-12">
                                <input type="text" id="tenpt" class="form-control" value="<?php echo $dr['tenpt']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12" for="bdate">Số lượng</label>
                            <div class="col-md-12">
                                <input type="number" min="0" id="sl" class="form-control" value="<?php echo $dr['soluongts']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12" for="bdate">Ghi chú</label>
                            <div class="col-md-12">
                                <input type="text" id="ghichu" class="form-control" value="<?php echo $dr['ghichu']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12" for="bdate">Ca thi</label>
                            <div class="col-md-12">
                                <select id='cathi' class="form-control">
                                    <option value="<?php echo $dr['macathi']; ?>"><?php echo $dr['macathi']; ?></option>
                                <?php
                                    while ($r=mysqli_fetch_array($ct,MYSQLI_ASSOC)){
                                        echo "<option value='".$r['macathi']."'>".$r['macathi']." : ".$r['tencathi']."</option>";
                                    }
                                ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
                <button type="button" class="btn btn-primary" id="sb">Lưu thay đổi</button>
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
                if (confirm("Sửa thông tin phòng thi?")){
                    $(".preloader").show();
                    var mapt=$("#mapt").val();
                    var tenpt=$("#tenpt").val();
                    var sl=$("#sl").val();
                    var ghichu=$("#ghichu").val();
                    var cathi=$("#cathi").val();

                    $.ajax({
                        type:'post',
                        url:'sql/edit-room.php?id=<?php if (isset($_GET['id_edit'])) echo $_GET['id_edit']; else echo ""; ?>',
                        data:{d1:mapt, d2:tenpt, d3:sl, d4:ghichu, d5:cathi},
                        success:function(e){
                            if (e==""){
                                alert("Đã sửa thông tin phòng thi");
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