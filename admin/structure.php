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
                    <h4>CẤU TRÚC ĐỀ THI CÁC MÔN</h4>
                </div>
            </div>
            <?php
                include("../config.php");
                $d=mysqli_query($connect, "select macathi, tencathi from cathi where makythi='".$_SESSION['makythi']."'");
            ?>

           <div class="row white-box" style="margin-top: 0;">
                <div class="col-md-12" style="margin-top: 1em;">
                	<div class="col-md-2">
                		<h4>Chọn môn thi</h4>
                	</div>
                    <div class="col-md-6">
                        <select name="mt" id="monthi" class="form-control">
				    		<option value="">-Chọn môn thi-</option>
				    		<?php
				        		require_once("../config.php");
								mysqli_set_charset($connect,"utf8");
				        		$d=mysqli_query($connect,"select mamodun, tenmodun from modun where makythi='".$_SESSION['makythi']."'");
								while ($r=mysqli_fetch_array($d)){
									echo "<option value=".$r['mamodun'].">".$r['tenmodun']."</option>";
								}
				    		?>
				  		</select>
                    </div>

                <div id="load" class="col-md-12" style="margin-top: 1em;">
                    
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
            $("#monthi").change(function(e) {
				var d=$("#monthi").val();
				$(".preloader").show();
	            $.ajax({
					type: 'post',
					url: 'sql/test-structure.php',
					data: {id:d},
					success: function(data){
                        // alert(data);
						$("#load").html(data);
						$(".preloader").hide();
					}
				});
	        });
        });
    </script>
</body>

</html>

<?php
    }
?>