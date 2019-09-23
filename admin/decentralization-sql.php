<?php
	session_start();
	if (!isset($_SESSION['admin'])){
		echo "<script>alert('Bạn không được phép truy cập trang này!');</script>";
        echo "<script>window.location='index.php'</script>";
	}

	if (isset($_POST['cathi'])&&isset($_POST['phongthi'])&&isset($_POST['monthi'])){
		require_once('../config.php');
		$dshvthi=mysqli_query($connect,"select hocvien.sbd, hoten, hocvien.ngaysinh, noisinh, tendv, cp from hocvien, cpthi, phongthi where hocvien.sbd=cpthi.sbd and hocvien.mapt=phongthi.mapt and phongthi.mapt='".$_POST['phongthi']."' and cpthi.mamodun='".$_POST['monthi']."' order by hocvien.sbd");
	}
?>

<style>
	.cltble{
		border:1px solid rgba(136,136,136,0.8);
	}
</style>

<script>
$(document).ready(function(e) {
	$("#sb").click(function(e) {
    if (window.confirm("Cập nhật lại quyền thi?")){
    	$(".preloader").show();
		var id=[],ud=[],i=j=0;

		$(":checkbox").each(function() {
            if ($(this).is(":checked")){id[i]=$(this).val();i++;}
            else {ud[j]=$(this).val();j++;}
        });

		if (id.length!==0||ud.length!==0){ 
			$.ajax({
				url:'sql/phanquyen-xulycheck.php',
				method:'post',
				data:{id:id, ud:ud},
				success: function(data){
					// alert(data);
					alert("Đã cập nhật");
					$(".preloader").hide();
				}
			});
		}
	}
	else return false;
	});
});

function selectAll(){
	var totalelement=document.f.elements.length;
	var elementName;
	for (var i=0;i<totalelement;i++){
		elementName=document.f.elements[i].name;
		if(elementName!=undefined && elementName.indexOf("ct")!=-1){
			document.f.elements[i].checked= document.f.slAll.checked;
		}
	}
}

</script>

<form method="post" name='f'>
	<table class="table table-hover table-striped">
    	<tr style="color:rgba(255,153,51,1); margin-bottom:2em;">
        	<th style='width:15%;'>Số báo danh</th>
            <th style='width:20%;'>Họ và tên</th>
            <th style='width:11%;'>Ngày sinh</th>
            <th style='width:20%;'>Nơi sinh</th>
            <th style='width:20%;'>Đơn vị</th>
            <th style='width:10%; text-align: center;'>Quyền thi<br><input type="checkbox" onChange="selectAll();" name="slAll" checked></th>
        </tr>
       
                
            <?php
				function _true($chothi, $sbd, $mt){
					if ($chothi==='C') $html="<input type='checkbox' checked name='ct[]' value='".$sbd."+=+".$mt."'";
					else $html= "<input type='checkbox' name='ct[]' value='".$sbd."+=+".$mt."'>";
					return $html;
				}
					
				while ($r=mysqli_fetch_array($dshvthi)){
					echo "<tr>";
					echo "
						<td style='text-align:left;'>".$r['sbd']."</td>
						<td style='text-align:left;'>".$r['hoten']."</td>
						<td style='text-align:left;'>".$r['ngaysinh']."</td>
						<td style='text-align:left;'>".$r['noisinh']."</td>
						<td style='text-align:left;'>".$r['tendv']."</td>
						<td style='text-align:center;'>"._true($r['cp'], $r['sbd'], $_POST['monthi'])."</td>
					";
					echo "</tr>";
				}
				
    		?>
	</table>
    <table>
    	<tr>
		<td style='color:red; width:80%; padding:1em; font-size:18px;'><?php echo "Tổng thí sinh: ".mysqli_num_rows($dshvthi);?></td>
		</tr>
   	</table>
	<button type="button" id= 'sb' name="sb" class="btn btn-sm btn-primary" style="margin-left: 1.5em; margin-bottom: 1em;">Cập nhật quyền thi</button>
</form>