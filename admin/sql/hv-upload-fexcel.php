<?php
    session_start();
    if (isset($_FILES['file']))
    {
        // echo $_FILES['file']['name'];
        $fname=$_FILES['file']['tmp_name'];
        include("../PHPExcel/IOFactory.php");
        include("../../config.php");
        $objectPHPExcel=PHPExcel_IOFactory::load($fname);
        foreach ($objectPHPExcel->getWorksheetIterator() as $worksheet)
        {
            $highestrow=$worksheet->getHighestRow();
            for ($row=2;$row<=$highestrow;$row++)
            {
                $sbd=mysqli_real_escape_string($connect,$worksheet->getCellByColumnAndRow(0,$row)->getValue());
                $hoten=mysqli_real_escape_string($connect,$worksheet->getCellByColumnAndRow(1,$row)->getValue());
                $ngaysinh=mysqli_real_escape_string($connect,$worksheet->getCellByColumnAndRow(2,$row)->getValue());
                $noisinh=mysqli_real_escape_string($connect,$worksheet->getCellByColumnAndRow(3,$row)->getValue());
                $donvi=mysqli_real_escape_string($connect,$worksheet->getCellByColumnAndRow(4,$row)->getValue());

                if ($sbd=="") break; 
                $sbd=addslashes($sbd);
                $hoten=addslashes($hoten);
                $ngaysinh=addslashes($ngaysinh);
                $noisinh=addslashes($noisinh);
                $donvi=addslashes($donvi);

                // Sinh mật khẩu

                $matkhau=rand(1,9);
                $i=1;
                while ($i<=5) {$matkhau.=rand(0,9); $i++; }
                $tempmk=$matkhau;
                $matkhau=md5($matkhau);
                // echo $_GET['id'];
                mysqli_query($connect, "insert into hocvien (sbd, hoten, ngaysinh, noisinh, tendv, matkhau, mapt)
                        values ('".$sbd."','".$hoten."','".$ngaysinh."','".$noisinh."','".$donvi."','".$matkhau."', '".$_GET['id']."')");

                if (!mysqli_error($connect)){
                    mysqli_query($connect,"insert into matkhau(sbd,matkhau) values ('$sbd','$tempmk')");

                    $monthi=mysqli_query($connect,"select mamodun from modun where makythi='".$_SESSION['makythi']."'");
                    while ($r=mysqli_fetch_array($monthi)){
                        mysqli_query($connect,"insert into cpthi(sbd, mamodun, cp) values ('$sbd','".$r['mamodun']."','C')");
                    }
                } else echo mysqli_error($connect);

            }
        }
    } else echo "false";

?>