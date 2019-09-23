<?php
	date_default_timezone_set('Asia/Ho_Chi_Minh');
?>
<!doctype html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="shortcut icon" href="image/icon.jpg" type="image/x-icon">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="style/index.css" type="text/css">
    <link rel="stylesheet" href="style/monthi.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="style/bootstrap.min.css">
    <script src="js/jquery-3.1.1.js"></script>
    <script src="js/index.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>
<body>
	<div class="back_out"><!--show background black--></div>
	<div class="back_over"><!--show background status image gif--></div>
    <div class="row" style="margin-right: 0; margin-left: 0;">
        <div class="col-md-10 col-md-offset-1">
            <div class="row">
                <div class="col-md-12 banner"></div>
                <div id="loadajax" class="col-md-12" style="margin-top: 0.2em; margin-bottom: 0.4em;">
                    <div class="col-md-7">
                        <!-- Nội quy phòng thi -->
                        <div class="col-md-12" style="text-align: center;">
                            <p style="font-weight: bold; margin-bottom: 0.2em; font-size: 15px; color: red;">NỘI QUY PHÒNG THI</p>
                        </div>
                        <video id="load-video" width="100%" height="360" controls loop style="border: 1px solid #dfdfdf;">
                            <source src="image/video/tom.mp4" type="video/mp4">
                        </video>
                    </div>
                    <div class="col-md-5 box-login">
                        <h4 class="h4-sp">ĐĂNG NHẬP HỆ THỐNG</h4>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input id="sbd" type="text" class="form-control" name="sbd" placeholder="Số báo danh" data-toggle="tooltip" data-placement="top">
                        </div>
                        <div class="input-group" style="margin-top: .5em;">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input id="matkhau" type="password" class="form-control" name="matkhau" placeholder="Mật khẩu" data-toggle="tooltip" data-placement="top">
                        </div>
                        <div class="row" style="margin-top: 1em;">
                            <div class="col-md-12">
                                <button type='submit' class='btn btn-sm btn-primary' style="width: 100%;" name='submit1' id='xacnhan'>Đăng nhập</button>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-md-3"></div> -->
                </div>
                <div class="col-md-12 footer"><i class="glyphicon glyphicon-bookmark"></i> &nbsp;Trường đào tạo cán bộ BIDV | Kỳ thi kiểm tra năng lực quản lý năm <?php echo date('Y'); ?></div>
            </div>
        </div>
    </div>
</body>
</html>