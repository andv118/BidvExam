<?php
	session_start();
	date_default_timezone_set("Asia/Ho_Chi_Minh");
	echo strtotime("2017-09-13 23:52:00");
	echo "<br>";
	echo time();
	echo "<br>";
	echo "<br>";
	echo "Hệ thống tự làm bài lúc 10:00:00";
	if (strtotime("2017-09-13 23:52:00")<=time()){
		// include("config.php");
		// while (true){
		// 	$sbd=mysqli_query($connect,"select hocvien.sbd, hocvien.hoten, hocvien.ngaysinh, hocvien.noisinh, hocvien.tendv from hocvien, phongthi, cathi, kythi where kythi.makythi=cathi.makythi and cathi.macathi=phongthi.macathi and phongthi.mapt=hocvien.mapt and kythi.makythi='THCB' order by rand() limit 1");
		// 	$rsbd=mysqli_fetch_array($sbd, MYSQLI_ASSOC);

		// 	$sbdt=mysqli_query($connect, "select name from test where name='".$rsbd['sbd']."'");

		// 	// echo $rsbd['sbd']."<br>";
		// 	// echo mysqli_num_rows($sbdt);
		// 	$ok=false;
		// 	if (mysqli_num_rows($sbdt)<=0){

		// 		mysqli_query($connect, "insert into test(name) values('".$rsbd['sbd']."')");

				$_SESSION['sbd']="P002";
				$_SESSION['sbd']=addslashes($_SESSION['sbd']);
				$_SESSION['hoten']="Lương Lâm";
				$_SESSION['ngaysinh']="02/02/1994";
				$_SESSION['noisinh']="Lạng Sơn";
				$_SESSION['donvi']="";
				$_SESSION['kt']='THCB';
				// $ok=true;
			// }
			// if ($ok){
				header('Location: xnthi.php?id=CB01&abcdef=TIN HỌC CƠ BẢN');
			// 	break;
			// }
		// }
	}
	
?>

<script type="text/javascript">
	setInterval(function(){run()},20000);
        function run(){
        	location.reload();
        }
</script>