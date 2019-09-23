$(document).ready(function(e){
	$("button[name='submit']").click(function(e){
		var name=$("input[name='name']").val();
		var email=$("input[name='email']").val();
		var phone=$("input[name='phone']").val();
		var content=$("textarea[name='content']").val();

		// send
		$.ajax({
			type:'post',
			url:''
		});
	});
});