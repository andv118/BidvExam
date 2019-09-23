<?php
    session_start();
    if (!isset($_SESSION['admin'])) echo "<script>window.location='../admin/index.php'</script>";
    $_SESSION['makythi']=$_GET['id_exam']; $_SESSION['tenkythi']=$_GET['name_exam']; $_SESSION['tgbd']=$_GET['tgbd']; $_SESSION['tgkt']=$_GET['tgkt'];
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
    <style type="text/css">
        #id-new-show{
            display: none;
            position: relative;
            padding-right: 1em;
        }
        #id-new-show li{
            color: white;
            list-style-type: none;
            cursor: pointer;
            margin-bottom: 1em;
        }
        #id-new-show li:hover{
            color:blue;
        }
        #li-new:hover #id-new-show{
            display: block;
        }
    </style>
</head>

<body>
    <!-- Preloader -->
    <?php include("sitebar.php"); ?>
        <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row bg-title">
                <div class="col-md-7">
                	<h4>KỲ THI: <?php echo $_GET['name_exam']; ?></h4>
                </div>
                <div class="col-md-5">
                    <ol class="breadcrumb">
                        <li><a href="index.php">Quản trị hệ thống</a></li>
                        <li class="active">Trang chủ</li>
                    </ol>
                </div>
            </div>
           <div class="row">
           		
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

        });
    </script>
</body>

</html>