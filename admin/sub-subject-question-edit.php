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
            <div class="row bg-title" style="margin-bottom: 0.3em; padding-top: 0.2em; padding-bottom: 0.1em;">
                <div class="col-md-7">
                    <h4>SỬA CÂU HỎI</h4>
                </div>
            </div>
            <?php
                if (isset($_GET['id_question'])) {
                include("../config.php");
                $d=mysqli_query($connect,"select * from cauhoi where cauhoi.macauhoi='".$_GET['id_question']."'");
                $dr=mysqli_fetch_array($d, MYSQLI_ASSOC);
            ?>
           <div class="row white-box">
                <form class='form-material form-horizontal' style="width: 100%;">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-12" for="example-text">Mã câu hỏi</label>
                            <div class="col-md-12">
                                <input type="text" id="macauhoi" class="form-control" value="<?php echo $dr['macauhoi']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12" for="example-text">Tên câu hỏi</label>
                            <div class="col-md-12">
                                <input type="text" id="tencauhoi" class="form-control" value="<?php echo $dr['tencauhoi']; ?>">
                            </div>
                            <div class='col-md-12'>
                            <?php
                                if ($dr['imgviauTencauhoi']!="")
                                    echo "
                                        <a href='../upload/imgcauhoi/".$dr['imgviauTencauhoi']."' target='_blank'>Xem file đính kèm</a>";
                            ?>
                                <input type='file' id='up1'>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12" for="example-text">Đáp án</label>
                            <div class="col-md-12">
                                <input type="text" id="dapan" class="form-control" value="<?php echo $dr['dapan']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12" for="example-text">Phương án A</label>
                            <div class="col-md-12">
                                <input type="text" id="paA" class="form-control" value="<?php echo $dr['paA']; ?>">
                            </div>
                            <div class='col-md-12'>
                            <?php
                                if ($dr['imgviaupaA']!="")
                                    echo "
                                        <a href='../upload/imgdapan/".$dr['imgviaupaA']."' target='_blank'>Xem file đính kèm</a>";
                            ?>
                                <input type='file' id='up2'>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12" for="example-text">Phương án B</label>
                            <div class="col-md-12">
                                <input type="text" id="paB" class="form-control" value="<?php echo $dr['paB']; ?>">
                            </div>
                            <div class='col-md-12'>
                            <?php
                                if ($dr['imgviaupaB']!="")
                                    echo "
                                        <a href='../upload/imgdapan/".$dr['imgviaupaB']."' target='_blank'>Xem file đính kèm</a>";
                            ?>
                                <input type='file' id='up3'>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12" for="example-text">Phương án C</label>
                            <div class="col-md-12">
                                <input type="text" id="paC" class="form-control" value="<?php echo $dr['paC']; ?>">
                            </div>
                            <div class='col-md-12'>
                            <?php
                                if ($dr['imgviaupaC']!="")
                                    echo "
                                        <a href='../upload/imgdapan/".$dr['imgviaupaC']."' target='_blank'>Xem file đính kèm</a>";
                            ?>
                                <input type='file' id='up4'>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12" for="example-text">Phương án D</label>
                            <div class="col-md-12">
                                <input type="text" id="paD" class="form-control" value="<?php echo $dr['paD']; ?>">
                            </div>
                            <div class='col-md-12'>
                            <?php
                                if ($dr['imgviaupaD']!="")
                                    echo "
                                        <a href='../upload/imgdapan/".$dr['imgviaupaD']."' target='_blank'>Xem file đính kèm</a>";
                            ?>
                                <input type='file' id='up5'>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12" for="example-text">Phương án E</label>
                            <div class="col-md-12">
                                <input type="text" id="paE" class="form-control" value="<?php echo $dr['paE']; ?>">
                            </div>
                            <div class='col-md-12'>
                            <?php
                                if ($dr['imgviaupaE']!="")
                                    echo "
                                        <a href='../upload/imgdapan/".$dr['imgviaupaE']."' target='_blank'>Xem file đính kèm</a>";
                            ?>
                                <input type='file' id='up6'>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12" for="example-text">Phương án F</label>
                            <div class="col-md-12">
                                <input type="text" id="paF" class="form-control" value="<?php echo $dr['paF']; ?>">
                            </div>
                            <div class='col-md-12'>
                            <?php
                                if ($dr['imgviaupaF']!="")
                                    echo "
                                        <a href='../upload/imgdapan/".$dr['imgviaupaF']."' target='_blank'>Xem file đính kèm</a>";
                            ?>
                                <input type='file' id='up7'>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12" for="example-text">Trộn</label>
                            <div class="col-md-12">
                                <select id="tron" class="form-control">
                                    <?php
                                        switch ($dr['tron']) {
                                            case 0:
                                                echo "<option value='0'>Không</option>";
                                                echo "<option value='1'>Có</option>";
                                                break;
                                            
                                            default:
                                                echo "<option value='1'>Có</option>";
                                                echo "<option value='0'>Không</option>";
                                                break;
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12" for="example-text">Độ khó</label>
                            <div class="col-md-12">
                                <input type="text" id="mucdo" class="form-control" value="<?php echo $dr['mucdo']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12" for="example-text">Điểm</label>
                            <div class="col-md-12">
                                <input type="text" id="sodiem" class="form-control" value="<?php echo $dr['sodiem']; ?>">
                            </div>
                        </div>
                    </div>
                </form>
                <span id="s"></span>
                <button type="button" class="btn btn-primary" id="sb">Lưu</button>
           </div>
           <?php } ?>
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
            $("#sb").click(function(e){
                var a=[];
                a[0]=$("#macauhoi").val();
                if (a[0]==""){
                    alert("Mã câu hỏi không được để trống");
                    return;
                }

                if (confirm("Sửa câu hỏi này?")){
                    
                    a[1]=$("#tencauhoi").val();
                    a[2]=$("#dapan").val();
                    a[3]=$("#paA").val();
                    a[4]=$("#paB").val();
                    a[5]=$("#paC").val();
                    a[6]=$("#paD").val();
                    a[7]=$("#paE").val();
                    a[8]=$("#paF").val();
                    a[9]=$("#tron").val();
                    a[10]=$("#mucdo").val();
                    a[11]=$("#sodiem").val();
                    // alert(a);

                    var k, str, ok=true;
                    var fname1=$("#up1").val();
                    k=fname1.length-1;
                    str="";
                    while (k>=0){
                        str+=fname1[k];
                        k--;
                        if (fname1[k]==".") break;
                    }
                    if (str=="gpj"||str=="gnp"||str=="4pm"||str=="3pm"||str=="gepj"||str=="fig"||str=="iva"||str=="vlf"||str=="v4m"||str=="vom"||str=="vaw"||fname1==""){

                    } else {
                        alert("Bạn chỉ được tải lên các file định dạng media!");
                        return;
                    }
                    var fname2=$("#up2").val();
                    k=fname2.length-1;
                    str="";
                    while (k>=0){
                        str+=fname2[k];
                        k--;
                        if (fname2[k]==".") break;
                    }
                    if (str=="gpj"||str=="gnp"||str=="4pm"||str=="3pm"||str=="gepj"||str=="fig"||str=="iva"||str=="vlf"||str=="v4m"||str=="vom"||str=="vaw"||fname2==""){

                    } else {
                        alert("Bạn chỉ được tải lên các file định dạng media!");
                        return;
                    }
                    var fname3=$("#up3").val();
                    k=fname3.length-1;
                    str="";
                    while (k>=0){
                        str+=fname3[k];
                        k--;
                        if (fname3[k]==".") break;
                    }
                    if (str=="gpj"||str=="gnp"||str=="4pm"||str=="3pm"||str=="gepj"||str=="fig"||str=="iva"||str=="vlf"||str=="v4m"||str=="vom"||str=="vaw"||fname3==""){

                    } else {
                        alert("Bạn chỉ được tải lên các file định dạng media!");
                        return;
                    }
                    var fname4=$("#up4").val();
                    k=fname4.length-1;
                    str="";
                    while (k>=0){
                        str+=fname4[k];
                        k--;
                        if (fname4[k]==".") break;
                    }
                    if (str=="gpj"||str=="gnp"||str=="4pm"||str=="3pm"||str=="gepj"||str=="fig"||str=="iva"||str=="vlf"||str=="v4m"||str=="vom"||str=="vaw"||fname4==""){

                    } else {
                        alert("Bạn chỉ được tải lên các file định dạng media!");
                        return;
                    }
                    var fname5=$("#up5").val();
                    k=fname5.length-1;
                    str="";
                    while (k>=0){
                        str+=fname5[k];
                        k--;
                        if (fname5[k]==".") break;
                    }
                    if (str=="gpj"||str=="gnp"||str=="4pm"||str=="3pm"||str=="gepj"||str=="fig"||str=="iva"||str=="vlf"||str=="v4m"||str=="vom"||str=="vaw"||fname5==""){

                    } else {
                        alert("Bạn chỉ được tải lên các file định dạng media!");
                        return;
                    }
                    var fname6=$("#up6").val();
                    k=fname6.length-1;
                    str="";
                    while (k>=0){
                        str+=fname6[k];
                        k--;
                        if (fname6[k]==".") break;
                    }
                    if (str=="gpj"||str=="gnp"||str=="4pm"||str=="3pm"||str=="gepj"||str=="fig"||str=="iva"||str=="vlf"||str=="v4m"||str=="vom"||str=="vaw"||fname6==""){

                    } else {
                        alert("Bạn chỉ được tải lên các file định dạng media!");
                        return;
                    }
                    var fname7=$("#up7").val();
                    k=fname7.length-1;
                    str="";
                    while (k>=0){
                        str+=fname7[k];
                        k--;
                        if (fname7[k]==".") break;
                    }
                    if (str=="gpj"||str=="gnp"||str=="4pm"||str=="3pm"||str=="gepj"||str=="fig"||str=="iva"||str=="vlf"||str=="v4m"||str=="vom"||str=="vaw"||fname7==""){

                    } else {
                        alert("Bạn chỉ được tải lên các file định dạng media!");
                        return;
                    }
                    $(".preloader").show();
                    $.ajax({
                        type: 'post',
                        url: "sql/edit-question.php?id=<?php if (isset($_GET['id_question'])) echo $_GET['id_question']; else echo ""; ?>",
                        data: {a:a},
                        success:function(e){
                            // alert(e);
                            if (e==""){
                                var ajax=new XMLHttpRequest();
                                var dat=new FormData();
                                // dat.append("a",a);
                                dat.append("f1",document.querySelector("#up1").files[0]);
                                dat.append("f2",document.querySelector("#up2").files[0]);
                                dat.append("f3",document.querySelector("#up3").files[0]);
                                dat.append("f4",document.querySelector("#up4").files[0]);
                                dat.append("f5",document.querySelector("#up5").files[0]);
                                dat.append("f6",document.querySelector("#up6").files[0]);
                                dat.append("f7",document.querySelector("#up7").files[0]);
                                           
                                ajax.onreadystatechange=function(e){
                                    if (ajax.status==200 && ajax.readyState==4){
                                        $("#s").html(ajax.responseText);
                                        // alert(ajax.responseText);
                                        if (ajax.responseText==""){
                                            alert("Đã sửa!");
                                            window.history.back();
                                        } else alert("Đã xảy ra lỗi: "+ajax.responseText);
                                        $(".preloader").hide();
                                    }
                                }
                                ajax.open("POST","sql/edit-question.php?id=<?php if (isset($_GET['id_question'])) echo $_GET['id_question']; else echo ""; ?>&a="+JSON.stringify(a));
                                ajax.send(dat);
                            }
                        }
                    });
                }
            });
        });
    </script>
</body>

</html>

<?php
    }
?>