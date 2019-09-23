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
                    <h4>DANH SÁCH NỘI DUNG THI</h4>
                </div>
            </div>
            <?php
            	include("../config.php");
            	$ct=mysqli_query($connect, "select mabode, tenbode, diemmax, modun.mamodun, modun.tenmodun from bode, modun, kythi where bode.mamodun=modun.mamodun and kythi.makythi=modun.makythi and kythi.makythi='".$_SESSION['makythi']."' order by modun.mamodun, bode.mabode");
            ?>

           <div class="row white-box">
	            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-top: 1em;">
	            	<table class="table table-bordered table-hover" style="font-size: 13px;">
	            		<thead>
	            			<tr>
                                <th style="text-align: center; width: 260px; background-color: darkcyan; color: white;">Môn thi</th>
                                <th style="text-align: center; width: 150px; background-color: darkcyan; color: white;">Mã nội dung thi</th>
                                <th style="text-align: center; background-color: darkcyan; color: white;">Tên nội dung thi</th>
                                <th style="text-align: center; width: 100px; background-color: darkcyan; color: white;">Điểm tối đa</th>
                                <th style="text-align: center; width: 100px; background-color: darkcyan; color: white;">SL câu hỏi đã tồn tại</th>
                                <th style="text-align: center; width: 100px; background-color: darkcyan; color: white;">Tổng điểm các câu hỏi đang tồn tại</th>
                                <th style="text-align: center; width: 60px; background-color: darkcyan; color: white;"><i class='fa fa-ellipsis-h'></i></th>
	            			</tr>
	            		</thead>
	            		<tbody>
	            			<?php
	            				// while ($r=mysqli_fetch_array($ct, MYSQLI_ASSOC)){
                 //                    $num=mysqli_query($connect, "select count(macauhoi) as slg, sum(sodiem) as td from cauhoi where mabode='".$r['mabode']."'");
                 //                    $rn=mysqli_fetch_array($num, MYSQLI_ASSOC);
	            				// 	echo "<tr>";
                 //                        echo "<td>".$r['tenmodun']."</td>";
	            				// 		echo "<td>".$r['mabode']."</td>";
	            				// 		echo "<td>".$r['tenbode']."</td>";
                 //                        echo "<td style='text-align: center; width: 100px;'>".$r['diemmax']."</td>";
                 //                        echo "<td style='text-align: center; width: 100px;'>".$rn['slg']."</td>";
                 //                        echo "<td style='text-align: center; width: 100px;'>".$rn['td']."</td>";
	            				// 		echo "<td class='text-nowrap'><a href='sub-subject-question.php?id_bode=".$r['mabode']."&id_tenbode=".$r['tenbode']."&id_diemmax=".$r['diemmax']."&id_mamodun=".$r['mamodun']."&&tenmodun=".$r['tenmodun']."' data-toggle='tooltip' data-original-title='Quản trị bộ đề - soạn câu hỏi của nội dung thi này'><i class='fa fa-mortar-board text-inverse m-r-10'></i></a> <a href='sub-subject-edit.php?id_bode=".$r['mabode']."&id_tenbode=".$r['tenbode']."&id_diemmax=".$r['diemmax']."&id_mamodun=".$r['mamodun']."' data-toggle='tooltip' data-original-title='Sửa thông tin'><i class='fa fa-edit text-inverse m-r-10'></i></a><a data-toggle='tooltip' data-original-title='Xóa' onClick='deleteRow(\"".$r['mabode']."\");'><i class='fa fa-close text-danger' style='cursor:pointer;'></i> </a> </td>";
	            				// 	echo "</tr>";
	            				// }
                                while ($r=mysqli_fetch_array($ct, MYSQLI_ASSOC)){
                                    $num=mysqli_query($connect, "select count(macauhoi) as slg, sum(sodiem) as td from cauhoi where mabode='".$r['mabode']."'");
                                    $rn=mysqli_fetch_array($num, MYSQLI_ASSOC);
                                    echo "<tr>";
                                        echo "<td>".$r['tenmodun']."</td>";
                                        echo "<td>".$r['mabode']."</td>";
                                        echo "<td>".$r['tenbode']."</td>";
                                        echo "<td style='text-align: center; width: 100px;'>".$r['diemmax']."</td>";
                                        echo "<td style='text-align: center; width: 100px;'>".$rn['slg']."</td>";
                                        echo "<td style='text-align: center; width: 100px;'>".$rn['td']."</td>";
                                        echo "<td class='text-nowrap'><a href='sub-subject-question.php?id_bode=".$r['mabode']."&id_tenbode=".$r['tenbode']."&id_diemmax=".$r['diemmax']."&id_mamodun=".$r['mamodun']."&&tenmodun=".$r['tenmodun']."' data-toggle='tooltip' data-original-title='Quản trị bộ đề - soạn câu hỏi của nội dung thi này'><i class='fa fa-mortar-board text-inverse m-r-10'></i></a> <a href='sub-subject-edit.php?id_bode=".$r['mabode']."&id_tenbode=".$r['tenbode']."&id_diemmax=".$r['diemmax']."&id_mamodun=".$r['mamodun']."' data-toggle='tooltip' data-original-title='Sửa thông tin'><i class='fa fa-edit text-inverse m-r-10'></i></a><a data-toggle='tooltip' data-original-title='Xóa' onClick='deleteRow(\"".$r['mabode']."\");'><i class='fa fa-close text-danger' style='cursor:pointer;'></i> </a> </td>";
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
            if (confirm("Bạn chắc chắn xóa nội dung này? Sau khi xác nhận xóa, tất cả dữ liệu liên quan đến nội dung sẽ bị xóa và không thể phục hồi!")){
                $(".preloader").show();
                $.ajax({
                    type: 'post',
                    url: 'sql/sub-subject-del.php',
                    data: {d1:idM},
                    success:function(e){
                        if (e=="true"){
                            alert("Xóa nội dung thi thành công!");
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