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
                    <h4>DANH SÁCH MÔN THI</h4>
                </div>
            </div>
            <?php
            	include("../config.php");
            	$ct=mysqli_query($connect, "select mamodun, tenmodun from modun, kythi where kythi.makythi=modun.makythi and kythi.makythi='".$_SESSION['makythi']."'");
            ?>

           <div class="row white-box">
	            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-top: 1em;">
	            	<table class="table table-bordered table-hover" style="font-size: 13px;">
	            		<thead>
	            			<tr>
	            				<th style="text-align: center; width: 150px; background-color: darkcyan; color: white;">Mã môn thi</th>
                                <th style="text-align: center; background-color: darkcyan; color: white;">Tên môn thi</th>
                                <th style="text-align: center; width: 200px; background-color: darkcyan; color: white;">Số nội dung<br>(Kỹ năng) đã thêm</th>
                                <th style="text-align: center; width: 50px; background-color: darkcyan; color: white;"><i class='fa fa-ellipsis-h'></i></th>
	            			</tr>
	            		</thead>
	            		<tbody>
	            			<?php
	            				// while ($r=mysqli_fetch_array($ct, MYSQLI_ASSOC)){
	            				// 	echo "<tr>";
	            				// 		echo "<td>".$r['mamodun']."</td>";
	            				// 		echo "<td>".$r['tenmodun']."</td>";
	            				// 		echo "<td class='text-nowrap'><a href='subject-edit.php?id_modun=".$r['mamodun']."&id_tenmodun=".$r['tenmodun']."' data-toggle='tooltip' data-original-title='Sửa thông tin'><i class='fa fa-edit text-inverse m-r-10'></i></a><a data-toggle='tooltip' data-original-title='Xóa' onClick='deleteRow(\"".$r['mamodun']."\");'><i class='fa fa-close text-danger' style='cursor:pointer;'></i> </a> </td>";
	            				// 	echo "</tr>";
	            				// }
                                while ($r=mysqli_fetch_array($ct, MYSQLI_ASSOC)){
                                    $res=mysqli_query($connect, "select count(mabode) as sl from bode, modun where modun.mamodun=bode.mamodun and bode.mamodun='".$r['mamodun']."'");
                                    $rec=mysqli_fetch_array($res, MYSQLI_ASSOC);

                                    echo "<tr>";
                                        echo "<td>".$r['mamodun']."</td>";
                                        echo "<td>".$r['tenmodun']."</td>";
                                        echo "<td style='text-align: center;'>".$rec['sl']."</td>";
                                        echo "<td class='text-nowrap'><a href='subject-edit.php?id_modun=".$r['mamodun']."&id_tenmodun=".$r['tenmodun']."' data-toggle='tooltip' data-original-title='Sửa thông tin'><i class='fa fa-edit text-inverse m-r-10'></i></a><a data-toggle='tooltip' data-original-title='Xóa' onClick='deleteRow(\"".$r['mamodun']."\");'><i class='fa fa-close text-danger' style='cursor:pointer;'></i> </a> </td>";
                                    echo "</tr>";
                                }
	            			?>
	            		</tbody>
	            	</table>
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
        function deleteRow(idM){
            if (confirm("Bạn chắc chắn xóa môn thi này? Sau khi xác nhận xóa, tất cả dữ liệu liên quan đến môn thi sẽ bị xóa và không thể phục hồi!")){
                // alert(idM);
                $(".preloader").show();
                $.ajax({
                    type: 'post',
                    url: 'sql/subject-del.php',
                    data: {d1:idM},
                    success:function(e){
                        if (e=="true"){
                            alert("Xóa môn thi thành công!");
                            location.reload();
                        } else alert("Đã xảy ra lỗi: "+e);
                        $(".preloader").hide();
                    }
                });
            }
        }
    </script>
</body>

</html>

<?php
    }
?>