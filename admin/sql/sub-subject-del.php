<?php
	session_start();
	if (!isset($_SESSION['admin'])) echo "<script>window.location='../index.php'</script>";
	if (isset($_POST['d1'])){
		require("../../config.php");
		$_POST['d1']=trim($_POST['d1']);
		$_POST['d1']=addslashes($_POST['d1']);

		$h3="DELETE dethisinh FROM dethisinh, cauhoi, bode where bode.mabode=cauhoi.mabode and bode.mabode='".$_POST['d1']."' and cauhoi.macauhoi=dethisinh.macauhoi";

		$hdts="DELETE cauhoi FROM cauhoi, bode where bode.mabode=cauhoi.mabode and bode.mabode='".$_POST['d1']."'";
		$h7="DELETE FROM bode where bode.mabode='".$_POST['d1']."'";

		// delete via modun
		mysqli_query($connect,$h3);
		mysqli_query($connect,$hdts);
		mysqli_query($connect,$h7);
		
		if (mysqli_error($connect)) echo mysqli_error($connect); else echo "true";
	}
?>