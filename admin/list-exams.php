<?php
    session_start();
    if (!isset($_SESSION['admin'])) echo "<script>window.location='../admin/index.php'</script>";
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Danh sách kỳ thi</title>
    <link href="../style/bootstrap.css" rel="stylesheet">
    <link href="../style/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
    
    <link type="text/css" rel="stylesheet" href="../style/jsgrid/dist/jsgrid.min.css"/>
    
    <link type="text/css" rel="stylesheet" href="../style/jsgrid/dist/jsgrid-theme.min.css" />
    <link href="../style/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <lik href="../style/css/animate.css" rel="stylesheet">
    <link href="../style/css/style.min.css" rel="stylesheet">
    <link href="../style/css/colors/megna.css" id="theme" rel="stylesheet">
    <style type="text/css">
        .tbl-custom tr th{font-weight: bold; text-align: center; font-family: Aria;}
        .tbl-custom tr td{text-align: justify; font-family: Aria;}
    </style>
</head>

<body>
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>

    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row bg-title">
                <div class="col-md-4">
                    <h4 class="page-title" style="color: black;">DANH SÁCH KỲ THI</h4> &nbsp;
                </div>
            </div>
           
            <div class="row white-box">
                <a href="list-exams-edit.php?post=add"><button type="button" class="btn btn-primary btn-md" style="background: blue; color: white;">Thêm kỳ thi mới</button></a>
                <table class="table table-striped table-hover table-bordered tbl-custom">
                   <thead>
                       <tr>
                           <th width="150px">Mã kỳ thi</th>
                           <th>Tên kỳ thi</th>
                           <th width="150px">Bắt đầu</th>
                           <th width="150px">Kết thúc</th>
                           <th style='width:50px;'><i class='fa fa-ellipsis-h'></i></th>
                       </tr>
                   </thead>
                   <tbody>
                        <?php
                            require("../config.php");
                            $kythi=mysqli_query($connect,"select * from kythi");
                            $i=0;
                            while ($t=mysqli_fetch_array($kythi)){
                                echo "<tr>";
                                    echo "<td>".$t['makythi']."</td>";
                                    echo "<td>".$t['tenkythi']."</td>";
                                    echo "<td>".date("H:i:s d-m-Y",strtotime($t['tgbatdau']))."</td>";
                                    echo "<td>".date("H:i:s d-m-Y",strtotime($t['tgketthuc']))."</td>";
                                    echo "<td class='text-nowrap'><a href='default.php?id_exam=".$t['makythi']."&name_exam=".$t['tenkythi']."&tgbd=".$t['tgbatdau']."&tgkt=".$t['tgketthuc']."' data-toggle='tooltip' data-original-title='Quản trị kỳ thi'><i class='fa fa-folder-open text-inverse m-r-10'></i></a><a href='list-exams-edit.php?post=edit&id_edit=".$t['makythi']."' data-toggle='tooltip' data-original-title='Sửa thông tin'><i class='fa fa-edit text-inverse m-r-10'></i></a><a data-toggle='tooltip' data-original-title='Xóa kỳ thi' onClick='deleteRow(\"".$t['makythi']."\");'><i class='fa fa-close text-danger' style='cursor:pointer;'></i> </a> </td>";
                                echo "</tr>";
                                $i++;
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
            if (confirm("Bạn chắc chắn xóa kỳ thi này? Sau khi xác nhận xóa, tất cả dữ liệu liên quan đến kỳ thi sẽ bị xóa và không thể phục hồi!")){
                $(".preloader").show();
                $.ajax({
                    type: 'post',
                    url: 'sql/list-exams-del.php',
                    data: {d1:idM},
                    success:function(e){
                        if (e=="true"){
                            alert("Xóa kỳ thi thành công!");
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