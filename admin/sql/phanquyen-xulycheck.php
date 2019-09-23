<?php
	session_start();
	require_once("../../config.php");
	if (!isset($_SESSION['admin'])) echo "<script>window.location='../index.php'</script>";
	if (isset($_POST['id'])){
		//Đánh dấu những thí sinh được thi những môn đã chọn
		$tempId=array();
		// print_r($_POST['id']);
		
		foreach ($_POST['id'] as $id){
			$tempId=explode("+=+", $id);
			$sbd=$tempId[0]; $mamon=$tempId[1];
			$sql="update cpthi set cp='C' where sbd='$sbd' and mamodun='$mamon'";
			mysqli_query($connect, $sql);
		}
		
	}
	if (isset($_POST['ud'])){print_r($_POST['ud']);
		//Đánh dấu những thí sinh không được thi môn đã chọn
		$tempUd=array();
		foreach ($_POST['ud'] as $ud){
			$tempUd=explode("+=+", $ud);
			$sbd=$tempUd[0]; $mamon=$tempUd[1];
			$sql="update cpthi set cp='K' where sbd='$sbd' and mamodun='$mamon'";
			mysqli_query($connect, $sql);
		}
	}