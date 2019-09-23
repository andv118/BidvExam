<?php
    session_start();
    if (!isset($_SESSION['admin'])) echo "<script>window.location='../admin/index.php'</script>";
    if (isset($_SESSION['makythi'])){

        function str($st){ //Lấy tên đuôi file
            $j = strlen($st)-1;
            $stemp = "";
            while ($st[$j] != "."){
                $stemp = $st[$j].$stemp; $j--;
            }
            return $st[$j].$stemp;
        }

        function reg($st1, $st2, $st3){ //Load media
            if ($st1!=""){ //Load media phuog án sai 1
                $str=$st1;
                $extend=str($str);
                //.bmp.exr.gif.ico.jp2.jpeg.pbm.pcx.pgm.png.ppm.psd. tiff.tga : Các định dạng file ảnh
                if ($extend=='.bmp'||$extend=='.exr'||$extend=='.gif'||$extend=='.ico'||$extend=='.jp2'||$extend=='.jpeg'||$extend=='.jpg'||$extend=='.pbm'||$extend=='.pcx'||$extend=='.pgm'||$extend=='.png'||$extend=='.ppm'||$extend=='.psd'||$extend=='.tiff'||$extend=='.tga')
                {
                    echo "<td>".$st2."<br> <img src='../upload/".$st3."/".$st1."' width='320' height='240' style='margin-top:0.6em;'></td>";
                }
                //.3gp.avi.flv.m4v.mkv.mov.mp4.mpeg.ogv.wmv.webm : các định dạng file video
                else
                    if ($extend=='.3gp'||$extend=='.avi'||$extend=='.flv'||$extend=='.m4v'||$extend=='.mkv'||$extend=='.mov'||$extend=='.mp4'||$extend=='.mpeg'||$extend=='.ogv'||$extend=='.wmv'||$extend=='.webm'){
                        $sstemp=substr($extend,1);
                        echo "
                            <td>".$st2."<br>
                            <video width='320' height='240' controls>
                            <source src='../upload/".$st3."/".$st1."' type='video/".$sstemp."'>
                            </video>
                            </td>
                        ";
                }
                //.aac.ac3.aiff.amr.ape.au.flac.m4a.mka.mp3.mpc.ogg. ra.wav.wma các định dạng audio
                else
                    if ($extend=='.aac'||$extend=='.ac3'||$extend=='.aiff'||$extend=='.amr'||$extend=='.ape'||$extend=='.au'||$extend=='.flac'||$extend=='.m4a'||$extend=='.mka'||$extend=='.mp3'||$extend=='.mpc'||$extend=='.ogg'||$extend=='.ra'||$extend=='.wav'||$extend=='.wma'){
                        $sstemp=substr($extend,1);
                        echo "
                            <td>".$st2."<br>
                            <audio controls>
                                <source src='../upload/".$st3."/".$st1."' type='audio/".$sstemp."'>
                            </audio>
                            </td>
                        ";
                    }
                    else echo "<td>".$st2."</td>";
            }
            else echo "<td>".$st2."</td>";
        }
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
        .table tr td{ color: black; font-family: Aria; }
    </style>
</head>

<body>
    <?php
        /*
          Bao gồm menu và header
        */
        include("sitebar.php");
    ?>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row bg-title" style="margin-bottom: 0.5em; padding: 0.5em;">
                <div class="col-md-12">
                    <h4>DANH SÁCH CÂU HỎI, SOẠN CÂU HỎI - Nội dung thi: <span style="color: red;"><?php echo $_GET['tenmodun']." : ". $_GET['id_bode']." - ".$_GET['id_tenbode']; ?></span></h4>
                </div>
            </div>
            <?php
            	include("../config.php");
            	$d=mysqli_query($connect, "select * from cauhoi, bode where bode.mabode=cauhoi.mabode and cauhoi.mabode='".$_GET['id_bode']."'");
                $s=mysqli_num_rows($d);
            ?>

           <div class="row white-box" style="margin-top: 0;">
                <?php
                    $errors=mysqli_query($connect, "select content from errors");
                    $rerrors=mysqli_fetch_array($errors, MYSQLI_ASSOC);
                    if ($rerrors['content']!="") {
                ?>
                <div class="row" style="color: red; padding-left: 1em; background: beige; padding: 0.5em; font-weight: bold; width: 100%;">
                    <?php
                        echo "*) Thông báo lỗi nhập dữ liệu:<br>".$rerrors['content'];
                    ?>
                </div>
                <?php } ?>
	            <div class="col-md-12" style="margin-top: 1em; overflow: auto; margin-bottom: 0.8em;">
	            	<table class="table table-striped" style="font-size: 13px; width:180em;">
	            		<thead>
	            			<tr>
                                <th style="width: 50px; text-align: center;"><i class='fa fa-ellipsis-h'></i></th>
                                <th style='width:130px; text-align: center;'>Mã</th>
                                <th style='width:500px; text-align: center;'>Tên câu hỏi</th>
                                <th style='width:50px; text-align: center;'>Đáp án</th>
                                <th style='width:500px; text-align: center;'>Phương án A</th>
                                <th style='width:500px; text-align: center;'>Phương án B</th>
                                <th style='width:500px; text-align: center;'>Phương án C</th>
                                <th style='width:500px; text-align: center;'>Phương án D</th>
                                <th style='width:500px; text-align: center;'>Phương án E</th>
                                <th style='width:500px; text-align: center;'>Phương án F</th>
                                <th style='width:50px; text-align: center;'>Trộn</th>
                                <th style='width:50px; text-align: center;'>Độ khó</th>
                                <th style='width:50px; text-align: center;'>Điểm</th>
	            			</tr>
	            		</thead>
	            		<tbody>
	            			<?php
                                while ($r=mysqli_fetch_array($d)){
                                    $macauhoi=$r['macauhoi'];
                                    $tencauhoi=$r['tencauhoi'];
                                    $dapan=$r['dapan'];
                                    $paA=$r['paA'];
                                    $paB=$r['paB'];
                                    $paC=$r['paC'];
                                    $paD=$r['paD'];
                                    $paE=$r['paE'];
                                    $paF=$r['paF'];
                                    $tron=$r['tron'];
                                    $mucdo=$r['mucdo'];
                                    $diem=$r['sodiem'];
                                    // $macauhoi=str_replace("<","&lt;",$macauhoi);
                                    // $tencauhoi=str_replace("<","&lt;",$tencauhoi);
                                    // $dapan=str_replace("<","&lt;",$dapan);
                                    // $paA=str_replace("<","&lt;",$paA);
                                    // $paB=str_replace("<","&lt;",$paB);
                                    // $paC=str_replace("<","&lt;",$paC);
                                    // $paD=str_replace("<","&lt;",$paD);
                                    // $paE=str_replace("<","&lt;",$paE);
                                    // $paF=str_replace("<","&lt;",$paF);
                                    // $tron=str_replace("<","&lt;",$tron);
                                    // $mucdo=str_replace("<","&lt;",$mucdo);
                                    // $diem=str_replace("<","&lt;",$diem);
                                    echo "<tr>";
                                    echo "<td class='text-nowrap'><a href='sub-subject-question-edit.php?id_question=".$r['macauhoi']."&id_bode=".$_GET['id_bode']."' data-toggle='tooltip' data-original-title='Sửa câu hỏi'><i class='fa fa-edit text-inverse m-r-10'></i></a><a data-toggle='tooltip' data-original-title='Xóa câu hỏi' onClick='deleteRow(\"".$r['macauhoi']."\");'><i class='fa fa-close text-danger' style='cursor:pointer;'></i> </a> </td>";
                                    echo "
                                        <td>".$macauhoi."</td>";
                                        reg($r['imgviauTencauhoi'],$tencauhoi,"imgcauhoi");
                                        echo "<td>".$dapan."</td>";
                                        reg($r['imgviaupaA'],$paA,"imgdapan");
                                        reg($r['imgviaupaB'],$paB,"imgdapan");
                                        reg($r['imgviaupaC'],$paC,"imgdapan");
                                        reg($r['imgviaupaD'],$paD,"imgdapan");
                                        reg($r['imgviaupaE'],$paE,"imgdapan");
                                        reg($r['imgviaupaF'],$paF,"imgdapan");
                                        echo "<td>".$tron."</td>";
                                        echo "<td>".$mucdo."</td>";
                                        echo "<td>".$diem."</td>";
                                    echo "</tr>";
                                }
                            ?>
	            		</tbody>
	            	</table>
	            </div>
                <span style="font-weight: bold;">Tổng số: <span style="color: red;"><?php echo $s; ?></span> câu hỏi tồn tại.</span>
                <div class="col-md-12">
                    <hr>
                    <p style="font-size: 15px; font-weight: bold;">Thêm câu hỏi từ file excel</p>
                    <input type="file" name="upl_list" accept=".xlsx,.xls">
                    <button type="button" class="btn btn-success" id="upload-btn" style="margin-top: 0.5em;">Tải lên</button>
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
            if (confirm("Bạn chắc chắn xóa câu hỏi này? Sau khi xác nhận xóa, tất cả dữ liệu liên quan đến câu hỏi sẽ bị xóa và không thể phục hồi!")){
                $(".preloader").show();
                $.ajax({
                    type: 'post',
                    url: 'sql/sub-subject-question-del.php',
                    data: {d1:idM},
                    success:function(e){
                        if (e=="true"){
                            alert("Xóa câu hỏi thành công!");
                            location.reload();
                        } else alert("Đã xảy ra lỗi: "+e);
                        $(".preloader").hide();
                    }
                });
            }
        }

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
                    if (temp!="xslx"&&temp!="slx")
                        alert("Bạn chỉ được tải lên file excel!");
                        else if (confirm("Tải file này lên?")){
                            $(".preloader").show();
                            var ajax=new XMLHttpRequest();
                            var upload=new FormData();
                            upload.append("file", document.querySelector("input[name='upl_list']").files[0]);
                            ajax.open("post", "sql/subject-upload-fexcel.php?id=<?php if (isset($_GET['id_bode'])) echo $_GET['id_bode']; else echo ""; ?>");
                            ajax.send(upload);
                            ajax.onreadystatechange=function(e){
                                if (ajax.status==200&&ajax.readyState==4){
                                    if (ajax.responseText==""){
                                        alert("Thêm câu hỏi thành công!");
                                        location.reload();
                                    }
                                    else {
                                        alert("Đã xảy ra lỗi, bạn cần đặt mã câu hỏi sao cho không trùng với mã các câu hỏi khác!");
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