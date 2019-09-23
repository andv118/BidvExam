<?php
    session_start();
    if (!isset($_SESSION['admin'])) echo "<script>window.location='../admin/index.php'</script>";
    if (isset($_GET['post'])){
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quản trị hệ thống</title>
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
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>

    <div id="page-wrapper">
        <div class="container-fluid">
        	<?php if ($_GET['post']=="add"){ ?>
            <div class="row bg-title">
                <div class="col-md-4">
                    <h4 class="page-title" style="color: black;">Thêm kỳ thi mới</h4> &nbsp;
                </div>
            </div>
           
            <div class="row white-box">
                <form class='form-material form-horizontal' style="width: 60%;">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-12" for="example-text">Mã kỳ thi</label>
                            <div class="col-md-12">
                                <input type="text" id="makt" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12" for="example-text">Tên kỳ thi</label>
                            <div class="col-md-12">
                                <input type="text" id="tenkt" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12" for="bdate">Bắt đầu</label>
                            <div class="col-md-12">
                                <input type="text" id="bd" class="form-control mydatepicker" value="2017-09-01 00:00:00">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12" for="bdate">Kết thúc</label>
                            <div class="col-md-12">
                                <input type="text" id="kt" class="form-control mydatepicker" value="2017-09-02 00:00:00">
                            </div>
                        </div>
                    </div>
                </form>
                <button type="button" class="btn btn-primary" id="sb">Lưu kỳ thi</button>
           </div>
           <?php } else if (isset($_GET['id_edit'])) {
           		include("../config.php");
           		$d=mysqli_query($connect,"select * from kythi where makythi='".$_GET['id_edit']."'");
           		$dr=mysqli_fetch_array($d, MYSQLI_ASSOC);
           	?>
           <div class="row bg-title">
                <div class="col-md-4">
                    <h4 class="page-title" style="color: black;">Sửa thông tin kỳ thi</h4> &nbsp;
                </div>
            </div>
           
            <div class="row white-box">
                <form class='form-material form-horizontal' style="width: 60%;">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-12" for="example-text">Tên kỳ thi</label>
                            <div class="col-md-12">
                                <input type="text" id="tenkt" class="form-control" value="<?php echo $dr['tenkythi']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12" for="bdate">Bắt đầu</label>
                            <div class="col-md-12">
                                <input type="text" id="bd" class="form-control mydatepicker" value="<?php echo $dr['tgbatdau']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12" for="bdate">Kết thúc</label>
                            <div class="col-md-12">
                                <input type="text" id="kt" class="form-control mydatepicker" value="<?php echo $dr['tgketthuc']; ?>">
                            </div>
                        </div>
                    </div>
                </form>
                <button type="button" class="btn btn-primary" id="sb_ed">Lưu kỳ thi</button>
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
        		if (confirm("Thêm kỳ thi?")){
        			$(".preloader").show();
        			var mkt=$("#makt").val();
        			var tenkt=$("#tenkt").val();
        			var bd=$("#bd").val();
        			var kt=$("#kt").val();

        			$.ajax({
        				type:'post',
        				url:'sql/add-exam.php',
        				data:{d1:mkt,d2:tenkt,d3:bd,d4:kt},
        				success:function(e){
        					if (e==""){
        						alert("Đã thêm kỳ thi");
        						window.location="list-exams.php";
        					}
        					$(".preloader").hide();
        				}
        			});
        		}
        	});

        	$("#sb_ed").click(function(e){
        		if (confirm("Sửa thông tin kỳ thi?")){
        			$(".preloader").show();
        			var tenkt=$("#tenkt").val();
        			var bd=$("#bd").val();
        			var kt=$("#kt").val();

        			$.ajax({
        				type:'post',
        				url:'sql/edit-exam.php?id=<?php if (isset($_GET['id_edit'])) echo $_GET['id_edit']; else echo ""; ?>',
        				data:{d2:tenkt,d3:bd,d4:kt},
        				success:function(e){
        					if (e==""){
        						alert("Đã sửa thông tin kỳ thi");
        						window.location="list-exams.php";
        					}
        					$(".preloader").hide();
        				}
        			});
        		}
        	});
        })
    </script>
</body>

</html>

<?php
    }
?>