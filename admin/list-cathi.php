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
                    <h4>DANH SÁCH CA THI</h4>
                </div>
            </div>
           <div class="row white-box">
                <table class="table table-bordered table-hover" style="font-size: 13px;">
                    <thead>
                        <tr>
                            <th style="text-align: center; background-color: darkcyan; color: white;">Mã ca thi</th>
                            <th style="text-align: center; background-color: darkcyan; color: white;">Tên ca thi</th>
                            <th style="text-align: center; background-color: darkcyan; color: white;">Bắt đầu</th>
                            <th style="text-align: center; background-color: darkcyan; color: white;">Kết thúc</th>
                            <th style="text-align: center; background-color: darkcyan; color: white;">Ghi chú</th>
                            <th style="text-align: center; background-color: darkcyan; color: white;">Số phòng</th>
                            <th style="text-align: center; background-color: darkcyan; color: white;">Tổng thí sinh</th>
                            <th style="text-align: center; background-color: darkcyan; color: white;">TS đã thi</th>
                            <th style="text-align: center; background-color: darkcyan; color: white;">TS chưa thi</th>
                            <th style="text-align: center; background-color: darkcyan; color: white;">TS đang thi</th>
                            <th style='width:50px; text-align: center; background-color: darkcyan; color: white;'><i class='fa fa-ellipsis-h'></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include("../config.php");
                            $cathi=mysqli_query($connect,"select * from cathi where makythi='".$_SESSION['makythi']."'");

                            while ($r=mysqli_fetch_array($cathi,MYSQLI_ASSOC)){
                                $sp=mysqli_query($connect, "select count(mapt) as sp from phongthi where macathi='".$r['macathi']."'");
                                $rsp=mysqli_fetch_array($sp, MYSQLI_ASSOC);
                                $ts=mysqli_query($connect, "select count(sbd) as sl from hocvien, phongthi where hocvien.mapt=phongthi.mapt and phongthi.macathi='".$r['macathi']."'");
                                $rts=mysqli_fetch_array($ts, MYSQLI_ASSOC);

                                // Số thí sinh đã có điểm -> đã thi
                                $rcc=mysqli_query($connect, "select count(diem.sbd) as sl from cathi, phongthi, hocvien, diem where cathi.macathi=phongthi.macathi and phongthi.mapt=hocvien.mapt and hocvien.sbd=diem.sbd and cathi.macathi='".$r['macathi']."' and diem.diem>=0");
                                $rc=mysqli_fetch_array($rcc, MYSQLI_ASSOC);

                                // Số thí sinh đang thi
                                $rcc1=mysqli_query($connect, "select count(diem.sbd) as sl from cathi, phongthi, hocvien, diem where cathi.macathi=phongthi.macathi and phongthi.mapt=hocvien.mapt and hocvien.sbd=diem.sbd and cathi.macathi='".$r['macathi']."' and diem.timeconlai>0");
                                $rc1=mysqli_fetch_array($rcc1, MYSQLI_ASSOC);

                                echo "<tr>";
                                    echo "<td>".$r['macathi']."</td>";
                                    echo "<td>".$r['tencathi']."</td>";
                                    echo "<td>".date("H:i:s \\n\g\à\y d-m-Y",strtotime($r['bd']))."</td>";
                                    echo "<td>".date("H:i:s \\n\g\à\y d-m-Y",strtotime($r['kt']))."</td>";
                                    echo "<td>".$r['ghichu']."</td>";
                                    echo "<td style='text-align:center;'>".$rsp['sp']."</td>";
                                    echo "<td style='text-align:center;'>".$rts['sl']."</td>";
                                    echo "<td style='text-align:center;'>".$rc['sl']."</td>";
                                    echo "<td style='text-align:center;'>".($rts['sl']-$rc['sl']-$rc1['sl'])."</td>";
                                    echo "<td style='text-align:center;'>".$rc1['sl']."</td>";
                                    echo "<td class='text-nowrap'><a href='list-cathi-edit.php?post=edit&id_edit=".$r['macathi']."' data-toggle='tooltip' data-original-title='Sửa thông tin'><i class='fa fa-edit text-inverse m-r-10'></i></a><a data-toggle='tooltip' data-original-title='Xóa ca thi' onClick='deleteRow(\"".$r['macathi']."\");'><i class='fa fa-close text-danger' style='cursor:pointer;'></i> </a> </td>";
                                echo "</tr>";
                            }
                        ?>
                    </tbody>
                </table>
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
            if (confirm("Bạn chắc chắn xóa ca thi này? Sau khi xác nhận xóa, tất cả dữ liệu liên quan đến ca thi sẽ bị xóa và không thể phục hồi!")){
                $(".preloader").show();
                $.ajax({
                    type: 'post',
                    url: 'sql/list-cathi-del.php',
                    data: {d1:idM},
                    success:function(e){
                        if (e=="true"){
                            alert("Xóa ca thi thành công!");
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