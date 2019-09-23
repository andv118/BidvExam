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
    <?php include("sitebar.php"); ?>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row bg-title">
                <div class="col-md-7">
                    <h4>DANH SÁCH PHÒNG THI</h4>
                </div>
            </div>
            <?php
            	include("../config.php");
            	$ct=mysqli_query($connect, "select macathi, tencathi from cathi, kythi where kythi.makythi=cathi.makythi and kythi.makythi='".$_SESSION['makythi']."'");
            ?>

           <div class="row white-box">
           		<div class="col-md-2">
           			<h4>Chọn ca thi</h4>
           		</div>
           		<div class="col-md-7">
	            	<select id='cathi' class="form-control">
	            		<option value="">--Chọn ca thi--</option>
	                <?php
	                	while ($r=mysqli_fetch_array($ct,MYSQLI_ASSOC)){
	                		echo "<option value='".$r['macathi']."'>".$r['macathi']." : ".$r['tencathi']."</option>";
	                	}
	                ?>
	                </select>
	            </div>

	            <?php
	            	if (isset($_GET['macathi'])){
	            	$d=mysqli_query($connect, "select macathi, mapt, tenpt, soluongts, ghichu from phongthi where macathi='".$_GET['macathi']."'");
	            ?>
	            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-top: 1em;">
	            	<table class="table table-bordered table-hover" style="font-size: 13px;">
	            		<thead>
	            			<tr>
	            				<th style="text-align: center; background-color: darkcyan; color: white;">Mã ca thi</th>
                                <th style="text-align: center; background-color: darkcyan; color: white;">Mã phòng</th>
                                <th style="text-align: center; background-color: darkcyan; color: white;">Tên phòng</th>
                                <th style="text-align: center; width: 100px; background-color: darkcyan; color: white;">Số lượng</th>
                                <th style="text-align: center; width: 100px; background-color: darkcyan; color: white;">Số TS hiện tại</th>
                                <th style="text-align: center; width: 100px; background-color: darkcyan; color: white;">TS đã thi</th>
                                <th style="text-align: center; width: 100px; background-color: darkcyan; color: white;">TS đang thi</th>
                                <th style="text-align: center; background-color: darkcyan; color: white;">Ghi chú</th>
                                <th style="text-align: center; width: 80px; background-color: darkcyan; color: white;"><i class='fa fa-ellipsis-h'></i></th>
	            			</tr>
	            		</thead>
	            		<tbody>
	            			<?php
	            				// while ($r=mysqli_fetch_array($d, MYSQLI_ASSOC)){
                 //                    $num=mysqli_query($connect, "select count(sbd) as slg from hocvien where mapt='".$r['mapt']."'");
                 //                    $rn=mysqli_fetch_array($num, MYSQLI_ASSOC);
	            				// 	echo "<tr>";
	            				// 		echo "<td>".$r['macathi']."</td>";
	            				// 		echo "<td>".$r['mapt']."</td>";
	            				// 		echo "<td>".$r['tenpt']."</td>";
	            				// 		echo "<td style='text-align: center;'>".$r['soluongts']."</td>";
                 //                        echo "<td style='text-align: center;'>".$rn['slg']."</td>";
	            				// 		echo "<td>".$r['ghichu']."</td>";
	            				// 		echo "<td class='text-nowrap'><a href='room-list-addts.php?idPt=".$r['mapt']."&tenpt=".$r['tenpt']."&cathi=".$r['macathi']."' data-toggle='tooltip' data-original-title='Quản trị học viên trong phòng'><i class='fa fa-users text-inverse m-r-10'></i></a><a href='room-edit.php?id_edit=".$r['mapt']."' data-toggle='tooltip' data-original-title='Sửa thông tin'><i class='fa fa-edit text-inverse m-r-10'></i></a><a data-toggle='tooltip' data-original-title='Xóa phòng thi' onClick='deleteRow(\"".($r['mapt'].";;;".$_GET['macathi'])."\");'><i class='fa fa-close text-danger' style='cursor:pointer;'></i> </a> </td>";
	            				// 	echo "</tr>";
	            				// }
                            while ($r=mysqli_fetch_array($d, MYSQLI_ASSOC)){
                                    $num=mysqli_query($connect, "select count(sbd) as slg from hocvien where mapt='".$r['mapt']."'");
                                    $rn=mysqli_fetch_array($num, MYSQLI_ASSOC);

                                    // Thí sinh đã thi
                                    $rcc=mysqli_query($connect, "select count(diem.sbd) as sl from phongthi, hocvien, diem where phongthi.mapt=hocvien.mapt and hocvien.sbd=diem.sbd and phongthi.mapt='".$r['mapt']."' and diem.diem>=0");
                                    $rc=mysqli_fetch_array($rcc, MYSQLI_ASSOC);

                                    // Thí sinh đang thi
                                    $rcc1=mysqli_query($connect, "select count(diem.sbd) as sl from phongthi, hocvien, diem where phongthi.mapt=hocvien.mapt and hocvien.sbd=diem.sbd and phongthi.mapt='".$r['mapt']."' and diem.timeconlai>0");
                                    $rc1=mysqli_fetch_array($rcc1, MYSQLI_ASSOC);

                                    echo "<tr>";
                                        echo "<td>".$r['macathi']."</td>";
                                        echo "<td>".$r['mapt']."</td>";
                                        echo "<td>".$r['tenpt']."</td>";
                                        echo "<td style='text-align: center;'>".$r['soluongts']."</td>";
                                        echo "<td style='text-align: center;'>".$rn['slg']."</td>";
                                        echo "<td style='text-align: center;'>".$rc['sl']."</td>";
                                        echo "<td style='text-align: center;'>".$rc1['sl']."</td>";
                                        echo "<td>".$r['ghichu']."</td>";
                                        echo "<td class='text-nowrap'><a href='room-list-addts.php?idPt=".$r['mapt']."&tenpt=".$r['tenpt']."&cathi=".$r['macathi']."' data-toggle='tooltip' data-original-title='Quản trị học viên trong phòng'><i class='fa fa-users text-inverse m-r-10'></i></a><a href='room-edit.php?id_edit=".$r['mapt']."' data-toggle='tooltip' data-original-title='Sửa thông tin'><i class='fa fa-edit text-inverse m-r-10'></i></a><a data-toggle='tooltip' data-original-title='Xóa phòng thi' onClick='deleteRow(\"".($r['mapt'].";;;".$_GET['macathi'])."\");'><i class='fa fa-close text-danger' style='cursor:pointer;'></i> </a> </td>";
                                    echo "</tr>";
                                }
	            			?>
	            		</tbody>
	            	</table>
	            </div>
	            <?php } ?>
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
            $("#cathi").change(function(e){
            	window.location="room-list.php?macathi="+$(this).val();
            });
        });

        function deleteRow(idM){
            if (confirm("Bạn chắc chắn xóa phòng thi này? Sau khi xác nhận xóa, tất cả dữ liệu liên quan đến phòng thi sẽ bị xóa và không thể phục hồi!")){
                // alert(idM);
                var a = new Array();
                a=idM.split(";;;");
                // alert(a);
                $(".preloader").show();
                $.ajax({
                    type: 'post',
                    url: 'sql/list-room-del.php',
                    data: {d1:a[0], d2:a[1]},
                    success:function(e){
                        if (e=="true"){
                            alert("Xóa phòng thi thành công!");
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