<div class="preloader">
    <div class="cssload-speeding-wheel"></div>
</div>

<div id="wrapper">
    <nav class="navbar navbar-default navbar-static-top m-b-0">
        <div class="navbar-header"> <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="ti-menu"></i></a>
            <div class="top-left-part" style="padding-bottom: 1.5em; text-align: center; padding-top: 1em;">
                <a class="logo" href="list-exams.php"><span style="padding-bottom: 1em;"><i class='fa fa-home'></i>&nbsp;&nbsp;&nbsp; Danh sách kỳ thi</span></a>
            </div>
                <ul class="nav navbar-top-links navbar-left hidden-xs">
                    <li><a href="javascript:void(0)" class="open-close hidden-xs waves-effect waves-light"><i class="icon-arrow-left-circle ti-menu"></i></a></li>
                    <li style="margin-left: 1em; font-size: 15px; padding-left: 1em; padding-right: 1em;"><a href="javascript:void(0)" class="waves-effect waves-light"><span style="color: cyan; font-weight: bold;"><?php echo "Kỳ thi ".$_SESSION['tenkythi'];?> | Thời gian: <?php echo date("H:i:s - d/m-Y", strtotime($_SESSION['tgbd'])); ?> ~ <?php echo date("H:i:s - d/m-Y", strtotime($_SESSION['tgkt'])); ?></span></a></li>
                </ul>
                <ul class="nav navbar-top-links navbar-right pull-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"> <img src="../upload/imgthisinh/male.jpg" alt="user-img" width="36" class="img-circle"><b class="hidden-xs"></b> </a>
                        <ul class="dropdown-menu dropdown-user animated flipInY">
                            <li><a href="javascript:void(0)"><i class="ti-user"></i> Tài khoản</a></li>
                            <li><a href="index.php"><i class="fa fa-power-off"></i> Đăng xuất</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- Left navbar-header -->
			 <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse slimscrollsidebar">
                <ul class="nav" id="side-menu">
                    <li class="sidebar-search hidden-sm hidden-md hidden-lg">
                    </li>
                    <li> <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-cubes p-r-10"></i><span class="hide-menu">Ca thi<span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="add-ct.php">Thêm ca thi</a></li>
                            <li><a href="list-cathi.php">Danh sách ca thi</a></li>
                        </ul>
                    </li>

                    <li> <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-cube p-r-10"></i> <span class="hide-menu"> Phòng thi<span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="room-add.php">Thêm phòng thi</a></li>
                            <li><a href="room-list.php">Danh sách phòng thi</a></li>
                        </ul>
                    </li>

                    <li><a href="javascript:void(0);" class="waves-effect"><i class="fa fa-folder p-r-10"></i> <span class="hide-menu"> Môn thi - Nội dung thi<span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="subject-add.php">Thêm môn thi</a></li>
                            <li><a href="subject-list.php">Danh sách môn thi</a></li>
                            <li><a href="sub-subject-add.php">Thêm nội dung thi</a></li>
                            <li><a href="sub-subject-list.php">Danh sách nội dung thi</a></li>
                        </ul>
                    </li>

                    <li><a href="decentralization.php" class="waves-effect"> <i class="fa fa-share-alt"></i> <span class="hide-menu">&nbsp;&nbsp;&nbsp;&nbsp;Cấp quyền thi</span></a></li>
                    <li><a href="structure.php" class="waves-effect"> <i class="fa fa-pie-chart"></i> <span class="hide-menu">&nbsp;&nbsp;&nbsp;&nbsp;Soạn cấu trúc đề thi</span></a></li>
                    <li><a href="javascript:void(0);" class="waves-effect"><i class="fa fa-laptop p-r-10"></i> <span class="hide-menu"> Bài thi<span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="test-detailt.php">Xem chi tiết bài thi</a></li>
                            <li><a href="test-dur-exam.php">Trong quá trình thi</a></li>
                        </ul>
                    </li>
                    <li><a href="test-score.php" class="waves-effect"> <i class="fa fa-mortar-board"></i> <span class="hide-menu">&nbsp;&nbsp;&nbsp;&nbsp;Điểm thi</span></a></li>
                    <li><a href="status-exam.php" class="waves-effect"> <i class="fa fa-hourglass-2"></i> <span class="hide-menu">&nbsp;&nbsp;&nbsp;&nbsp;Tình trạng bài thi</span></a></li>
                    <li><a href="javascript:void(0);" class="waves-effect"><i class="fa fa-file-excel-o"></i> <span class="hide-menu"> Thống kê<span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level">
                            <!-- <li><a href="statistic.php">Thống kê cũ</a></li> -->
                            <li><a href="statistic-quick.php">Thống kê nhanh</a></li>
                        </ul>
                    </li>
                    <!-- <li><a href="statistic.php" class="waves-effect"> <i class="fa fa-file-excel-o"></i> <span class="hide-menu">&nbsp;&nbsp;&nbsp;&nbsp;Thống kê</span></a></li> -->
                    <li><a href="javascript:void(0);" class="waves-effect"><i class="fa fa-file-excel-o"></i> <span class="hide-menu"> Cài đặt<span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="settime.php">Hiển thị nội quy</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>