<?php
    session_start();
    if (!isset($_SESSION['admin'])) echo "<script>window.location='index.php'</script>";
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
                    <h4>THỐNG KÊ DANH SÁCH CÁN BỘ</h4>
                    <p style="font-weight: bold; color: #c36565;"><?php echo $_SESSION['tenkythi']; ?></p>
                </div>
            </div>
            <?php
                include("../config.php");
                $d=mysqli_query($connect, "select macathi, tencathi from cathi where makythi='".$_SESSION['makythi']."'");
            ?>

           <div class="row white-box" style="margin-top: 0;">
           		<p>Tải file Excel để xem kết quả thống kê</p>&nbsp;&nbsp;&nbsp;
                <a href='statistic-export.php?kythi=<?php echo $_SESSION['makythi']; ?>'><button id="downloadResults" class="btn btn-md btn-primary">Tải xuống</button></a>
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
            // $('#downloadResults').on('click', function(e){
            // 	var kythi='<?php echo $_SESSION['makythi']; ?>';
            // 	alert(kythi);
            // 	$.ajax({
            // 		type: 'post',
            // 		url: 'statistic-export.php',
            // 		data: {kythi: kythi},
            // 		success: function(e){
            // 			console.log(e);
            // 		}
            // 	});
            // });
        });
    </script>
</body>

</html>

<?php
    }
?>