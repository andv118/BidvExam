<?php
    session_start();
    if (isset($_FILES['file'])) {
        if (isset($_GET['id'])) {
            $fname = $_FILES['file']['tmp_name'];
            include("../PHPExcel/IOFactory.php");
            include("../../config.php");
            $errors = "";
            mysqli_query($connect, "truncate table errors");

            $objectPHPExcel = PHPExcel_IOFactory::load($fname);

            foreach ($objectPHPExcel->getWorksheetIterator() as $worksheet) {
                $highestrow = $worksheet->getHighestRow();
                // Thông báo lỗi
                $stt=1;
                for ($row = 2; $row <= $highestrow; $row++) {
                    $x1=mysqli_real_escape_string($connect,$worksheet->getCellByColumnAndRow(0,$row)->getValue());
                    $x2=mysqli_real_escape_string($connect,$worksheet->getCellByColumnAndRow(1,$row)->getValue());
                    $x3=mysqli_real_escape_string($connect,$worksheet->getCellByColumnAndRow(2,$row)->getValue());
                    $x4=mysqli_real_escape_string($connect,$worksheet->getCellByColumnAndRow(3,$row)->getValue());
                    $x5=mysqli_real_escape_string($connect,$worksheet->getCellByColumnAndRow(4,$row)->getValue());
                    $x6=mysqli_real_escape_string($connect,$worksheet->getCellByColumnAndRow(5,$row)->getValue());
                    $x7=mysqli_real_escape_string($connect,$worksheet->getCellByColumnAndRow(6,$row)->getValue());
                    $x8=mysqli_real_escape_string($connect,$worksheet->getCellByColumnAndRow(7,$row)->getValue());
                    $x9=mysqli_real_escape_string($connect,$worksheet->getCellByColumnAndRow(8,$row)->getValue());
                    $x10=mysqli_real_escape_string($connect,$worksheet->getCellByColumnAndRow(9,$row)->getValue());
                    $x11=mysqli_real_escape_string($connect,$worksheet->getCellByColumnAndRow(10,$row)->getValue());
                    $x12=mysqli_real_escape_string($connect,$worksheet->getCellByColumnAndRow(11,$row)->getValue());
                    if ($x1=="") break;

                    $x1=str_replace("\"", "&quot;", $x1);
                    $x2=str_replace("\"", "&quot;", $x2);
                    $x3=str_replace("\"", "&quot;", $x3);
                    $x4=str_replace("\"", "&quot;", $x4);
                    $x5=str_replace("\"", "&quot;", $x5);
                    $x6=str_replace("\"", "&quot;", $x6);
                    $x7=str_replace("\"", "&quot;", $x7);
                    $x8=str_replace("\"", "&quot;", $x8);
                    $x9=str_replace("\"", "&quot;", $x9);
                    $x10=str_replace("\"", "&quot;", $x10);
                    $x11=str_replace("\"", "&quot;", $x11);
                    $x12=str_replace("\"", "&quot;", $x12);
                    $x1=str_replace("'", "&prime;", $x1);
                    $x2=str_replace("'", "&prime;", $x2);
                    $x3=str_replace("'", "&prime;", $x3);
                    $x4=str_replace("'", "&prime;", $x4);
                    $x5=str_replace("'", "&prime;", $x5);
                    $x6=str_replace("'", "&prime;", $x6);
                    $x7=str_replace("'", "&prime;", $x7);
                    $x8=str_replace("'", "&prime;", $x8);
                    $x9=str_replace("'", "&prime;", $x9);
                    $x10=str_replace("'", "&prime;", $x10);
                    $x11=str_replace("'", "&prime;", $x11);
                    $x12=str_replace("'", "&prime;", $x12);
                    // $x1=str_replace("<", "&lt;", $x1);
                    // $x2=str_replace("<", "&lt;", $x2);
                    // $x3=str_replace("<", "&lt;", $x3);
                    // $x4=str_replace("<", "&lt;", $x4);
                    // $x5=str_replace("<", "&lt;", $x5);
                    // $x6=str_replace("<", "&lt;", $x6);
                    // $x7=str_replace("<", "&lt;", $x7);
                    // $x8=str_replace("<", "&lt;", $x8);
                    // $x9=str_replace("<", "&lt;", $x9);
                    // $x10=str_replace("<", "&lt;", $x10);
                    // $x11=str_replace("<", "&lt;", $x11);
                    // $x12=str_replace("<", "&lt;", $x12);
                    if ($x3=="") {
                        $errors.="<br>".$stt.". ".$x1.": thiếu đáp án.";
                        $stt++;
                    }
                    if ($x12=="") {
                        $errors.="<br>".$stt.". ".$x1.": thiếu số điểm (Mặc định đặt là 0 điểm).";
                        $stt++;
                    }
                    if ($x10=="") $x10=0;
                    if ($x11=="") $x11="Dễ";
                    mysqli_query($connect, "insert into cauhoi (macauhoi, tencauhoi, dapan, paA, paB, paC, paD, paE, paF, tron, mucdo, sodiem, mabode) values ('$x1', '$x2', '$x3', '$x4', '$x5', '$x6', '$x7', '$x8', '$x9', '$x10', '$x11', '$x12', '".$_GET['id']."')");
                    if (mysqli_error($connect)) echo mysql_error($connect);
                    // mysqli_query($connect, "insert into dethisinhthu (
                    // sbd, macauhoi, tencauhoi, dapan, dapanA, dapanB, dapanC, dapanD, dapanE, dapanF) values ('QLthithu', '$x1', '$x2', '$x3', '$x4', '$x5', '$x6', '$x7', '$x8', '$x9')");
                    
                }
            }
            mysqli_query($connect, "insert into errors (content) values('".$errors."') ");
        }
    } else echo "false";

?>