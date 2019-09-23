<?php
	session_start();
	if (!isset($_SESSION['admin'])) echo "<script>window.location='../../admin/index.php'</script>";
	require_once("../../config.php");
	if (isset($_POST['a'])){
		// print_r($_POST['a']);
		$a=$_POST['a'];
		$l=count($a);
		for ($i=0;$i<$l;$i++) $a[$i]=addslashes($a[$i]);
		mysqli_query($connect, "update cauhoi set macauhoi='".$a[0]."', tencauhoi='".$a[1]."', dapan='".$a[2]."', paA='".$a[3]."', paB='".$a[4]."', paC='".$a[5]."', paD='".$a[6]."', paE='".$a[7]."', paF='".$a[8]."', tron='".$a[9]."', mucdo='".$a[10]."', sodiem='".$a[11]."' where macauhoi='".$_GET['id']."'");
		if (mysqli_error($connect)) echo mysqli_error($connect);
	}

	if (isset($_FILES)){
		$media=mysqli_query($connect, "select imgviauTencauhoi, imgviaupaA, imgviaupaB, imgviaupaC, imgviaupaD, imgviaupaE, imgviaupaF from cauhoi where macauhoi='".$_GET['id']."'");
		$r=mysqli_fetch_array($media, MYSQLI_ASSOC);
		
		if (isset($_FILES['f1']['name'])&&$_FILES['f1']['name']!=""){
			$n=""; $i=0;
			while ($i<12){
				$n.=rand(0,9);
				$i++;
			}
			if ($r['imgviauTencauhoi']!="") unlink("../../upload/imgcauhoi/".$r['imgviauTencauhoi']);
			$_FILES['f1']['name']=$n.$_FILES['f1']['name'];
			mysqli_query($connect,"update cauhoi set imgviauTencauhoi='".$_FILES['f1']['name']."' where macauhoi='".$_GET['id']."'");
			move_uploaded_file($_FILES['f1']['tmp_name'],"../../upload/imgcauhoi/".basename($_FILES['f1']['name']));
		}

		if (isset($_FILES['f2']['name'])&&$_FILES['f2']['name']!=""){
			$n=""; $i=0;
			while ($i<12){
				$n.=rand(0,9);
				$i++;
			}
			if ($r['imgviaupaA']!="") unlink("../../upload/imgdapan/".$r['imgviaupaA']);
			$_FILES['f2']['name']=$n.$_FILES['f2']['name'];
			mysqli_query($connect,"update cauhoi set imgviaupaA='".$_FILES['f2']['name']."' where macauhoi='".$_GET['id']."'");
			move_uploaded_file($_FILES['f2']['tmp_name'],"../../upload/imgdapan/".basename($_FILES['f2']['name']));
		}

		if (isset($_FILES['f3']['name'])&&$_FILES['f3']['name']!=""){
			$n=""; $i=0;
			while ($i<12){
				$n.=rand(0,9);
				$i++;
			}
			if ($r['imgviaupaB']!="") unlink("../../upload/imgdapan/".$r['imgviaupaB']);
			$_FILES['f3']['name']=$n.$_FILES['f3']['name'];
			mysqli_query($connect,"update cauhoi set imgviaupaB='".$_FILES['f3']['name']."' where macauhoi='".$_GET['id']."'");
			move_uploaded_file($_FILES['f3']['tmp_name'],"../../upload/imgdapan/".basename($_FILES['f3']['name']));
		}

		if (isset($_FILES['f4']['name'])&&$_FILES['f4']['name']!=""){
			$n=""; $i=0;
			while ($i<12){
				$n.=rand(0,9);
				$i++;
			}
			if ($r['imgviaupaC']!="") unlink("../../upload/imgdapan/".$r['imgviaupaC']);
			$_FILES['f4']['name']=$n.$_FILES['f4']['name'];
			mysqli_query($connect,"update cauhoi set imgviaupaC='".$_FILES['f4']['name']."' where macauhoi='".$_GET['id']."'");
			move_uploaded_file($_FILES['f4']['tmp_name'],"../../upload/imgdapan/".basename($_FILES['f4']['name']));
		}

		if (isset($_FILES['f5']['name'])&&$_FILES['f5']['name']!=""){
			$n=""; $i=0;
			while ($i<12){
				$n.=rand(0,9);
				$i++;
			}
			if ($r['imgviaupaD']!="") unlink("../../upload/imgdapan/".$r['imgviaupaD']);
			$_FILES['f5']['name']=$n.$_FILES['f5']['name'];
			mysqli_query($connect,"update cauhoi set imgviaupaD='".$_FILES['f5']['name']."' where macauhoi='".$_GET['id']."'");
			move_uploaded_file($_FILES['f5']['tmp_name'],"../../upload/imgdapan/".basename($_FILES['f5']['name']));
		}

		if (isset($_FILES['f6']['name'])&&$_FILES['f6']['name']!=""){
			$n=""; $i=0;
			while ($i<12){
				$n.=rand(0,9);
				$i++;
			}
			if ($r['imgviaupaE']!="") unlink("../../upload/imgdapan/".$r['imgviaupaE']);
			$_FILES['f6']['name']=$n.$_FILES['f6']['name'];
			mysqli_query($connect,"update cauhoi set imgviaupaE='".$_FILES['f6']['name']."' where macauhoi='".$_GET['id']."'");
			move_uploaded_file($_FILES['f6']['tmp_name'],"../../upload/imgdapan/".basename($_FILES['f6']['name']));
		}

		if (isset($_FILES['f7']['name'])&&$_FILES['f7']['name']!=""){
			$n=""; $i=0;
			while ($i<12){
				$n.=rand(0,9);
				$i++;
			}
			if ($r['imgviaupaF']!="") unlink("../../upload/imgdapan/".$r['imgviaupaF']);
			$_FILES['f7']['name']=$n.$_FILES['f7']['name'];
			mysqli_query($connect,"update cauhoi set imgviaupaF='".$_FILES['f7']['name']."' where macauhoi='".$_GET['id']."'");
			move_uploaded_file($_FILES['f7']['tmp_name'],"../../upload/imgdapan/".basename($_FILES['f7']['name']));
		}
	}