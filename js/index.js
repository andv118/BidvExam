// JavaScript Document
$(document).ready(function(e)
{
	$('[data-toggle="tooltip"]').tooltip();

	$('input[name="sbd"]').focus();

	$("input[name='sbd'], input[name='matkhau']").keypress(function(e){
		if (e.keyCode == 13){
			$("#xacnhan").click();
		}
	});

	$("#xacnhan").click(function(e) {
		$(".back_out").css("display","block");
		$(".back_over").css("display","block");
		$("body").css("overflow","hidden");

    	var sbd = $("input[name='sbd']").val();
    	var pass = $("input[name='matkhau']").val();
		if (sbd === "" || pass === "") {
			alert("Số báo danh, mật khẩu không được để trống!");
			$(".back_out").css("display", "none");
			$(".back_over").css("display", "none");
			$('input[name="sbd"]').focus();
			return false;
		}
		$.ajax({
			type:'POST',
			url:'test/testLogin.php',
			data:{sbd: sbd, pass: pass},
			success: function(data){
				if (data == 'false') {
					alert("Lỗi truyền dữ liệu lên máy chủ, vui lòng thử lại!");
					$(".back_out").css("display", "none");
					$(".back_over").css("display", "none");
				} else if (data == 'f') {
					alert("Thông tin tài khoản nhập không chính xác, vui lòng thử lại!");
					$(".back_out").css("display", "none");
					$(".back_over").css("display", "none");
				} else if (data == '') window.location = "monthi.php";
			},
			errors: function(data){
				console.log(data);
			}
		});
	});
});