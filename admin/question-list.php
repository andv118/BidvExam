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
            <div class="row bg-title" style="margin-bottom: 0.5em; padding: 0.5em;">
                <div class="col-md-12">
                    <h4>QUẢN LÝ CÂU HỎI</h4>
                </div>
            </div>
            <?php
            	include("../config.php");
            	$d=mysqli_query($connect, "select * from hocvien where hocvien.mapt='".$_GET['idPt']."'");
                $s=mysqli_num_rows($d);
            ?>

           <div class="row white-box" style="margin-top: 0;">
                <div class="col-md-12">
                    <div class="col-md-6">
                        <div class="col-md-4">
                            <span>Môn thi</span>
                        </div>
                        <div class="col-md-8">
                            <select id="select_mt">
                                <option value="">--Chọn môn thi--</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="col-md-4">
                            <span>Nội dung thi</span>
                        </div>
                        <div class="col-md-8">
                            
                        </div>
                    </div>
                </div>
	            <div class="col-md-12" style="margin-top: 1em;">
	            	<table class="table table-striped" style="font-size: 13px;">
	            		<thead>
	            			<tr>
                                <th width="100px">Profile</th>
	            				<th>SBD</th>
	            				<th>Tên học viên</th>
	            				<th>Ngày sinh</th>
	            				<th>Nơi sinh</th>
	            				<th>Đơn vị</th>
	            				<th style="width: 100px;"><i class='fa fa-ellipsis-h'></i></th>
	            			</tr>
	            		</thead>
	            		<tbody>
	            			<?php
	            				while ($r=mysqli_fetch_array($d, MYSQLI_ASSOC)){
	            					echo "<tr>";
                                        if ($r['profile']!="") $link="../upload/imgthisinh/".$r['profile'].""; else $link="../upload/imgthisinh/male.jpg";
                                        echo "<td><img src='$link' width='40px' height='35px'></td>";
	            						echo "<td>".$r['sbd']."</td>";
	            						echo "<td>".$r['hoten']."</td>";
	            						echo "<td>".$r['ngaysinh']."</td>";
	            						echo "<td>".$r['noisinh']."</td>";
	            						echo "<td>".$r['tendv']."</td>";
	            						echo "<td class='text-nowrap'><a href='room-list-addts-edit.php?id_edit=".$r['sbd']."' data-toggle='tooltip' data-original-title='Sửa thông tin'><i class='fa fa-edit text-inverse m-r-10'></i></a><a data-toggle='tooltip' data-original-title='Xóa' onClick='deleteRow(\"".$r['mapt']."\");'><i class='fa fa-close text-danger' style='cursor:pointer;'></i> </a> </td>";
	            					echo "</tr>";
	            				}
	            			?>
	            		</tbody>
	            	</table>
                    <span style="font-weight: bold;">Tổng số: <span style="color: red;"><?php echo $s; ?></span></span>
                    <span>| <a href="listps.php?id=<?php echo $_GET['idPt']; ?>">Tải mật khẩu</a></span>
	            </div>
                <div class="col-md-12">
                    <!-- <hr>
                    <p style="font-size: 15px; font-weight: bold;">Thêm học viên</p>
                    Danh sách các trường
                    <button type="button" class="btn btn-default">Thêm học viên</button> -->
                    <hr>
                    <p style="font-size: 15px; font-weight: bold;">Thêm học viên từ file excel</p>
                    <input type="file" name="upl_list">
                    <button type="button" class="btn btn-default" id="upload-btn">Tải danh sách</button>
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
            $("#upload-btn").click(function(e){
                var v=$("input[name='upl_list']").val();
                if (v=="") alert("Bạn chưa chọn file");
                else {
                    var temp="", n=v.length-1;
                    while (v[n]!="."){
                        temp+=v[n];
                        n--;
                    }
                    if (temp!="xslx"&&temp!="slx") alert("Bạn chỉ được tải lên file excel!");
                    else if (confirm("Tải file này lên?")){
                        $(".preloader").show();
                        var ajax=new XMLHttpRequest();
                        var upload=new FormData();
                        upload.append("file", document.querySelector("input[name='upl_list']").files[0]);
                        ajax.open("post","hv-upload-fexcel.php?id=<?php if (isset($_GET['idPt'])) echo $_GET['idPt']; else echo ""; ?>");
                        ajax.send(upload);
                        ajax.onreadystatechange=function(e){
                            if (ajax.status==200&&ajax.readyState==4){
                                if (ajax.responseText==""){
                                    alert("Thêm hoc viên mới thành công!");
                                    location.reload();
                                }
                                else{
                                    alert("Đã xảy ra lỗi, bạn cần đặt mã học viên sao cho không trùng với học viên ở các phòng khác!");
                                }
                                $(".preloader").hide();
                            }
                        }
                    }
                }
            });
        });
    </script>
</body>

</html>

<?php
    }
?>