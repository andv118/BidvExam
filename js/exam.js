$(document).ready(function(e){
	if (document.cookie.search('remember')!=-1) {
		var arrayCookie=document.cookie.split(';');
		var lc1, temp;
		for (var k=0; k<arrayCookie.length; k++){
			lc1=arrayCookie[k].split("=");
			if (lc1[0].trim()=="remember"){
				var atmp=lc1[1].split(',');
				for (var i=0; i<atmp.length-1; i++){
					$('#temp').append('<div class="socau" style="background-color: yellow; color: green;" id="ts'+atmp[i]+'" onClick="scrollToAnchor(\'ts'+atmp[i]+'\')">'+atmp[i]+'</div>');
				}
				break;
			}
		}
	}
});

var writechoose = function(str){
	var data = $(".loadch1 .areaexam .dapan ."+str+" input:radio").val();
	var name = $(".loadch1 .areaexam .dapan ."+str+" input:radio").attr("name");
	$(".loadch1 .areaexam .dapan ."+str+" input:radio").prop("checked", true);
	document.getElementById($.trim("s"+name)).style.backgroundColor="blue";
	$.ajax({
		type: 'POST',
		url: 'savechoose.php',
		data: {id:data, name:name},
		success: function(data){}
	});
}

var up = function(){
	var nel=$('#val').text();
	// alert(nel);
	var cookie=document.cookie;
	if (cookie.search('remember')==-1) {
		document.cookie='remember='+nel+',; expires=Fri 20 Aug 2030 10:00:00 UTC';
		$('#temp').append('<div class="socau" style="background-color: yellow; color: green;" id="ts'+nel+'" onClick="scrollToAnchor(\'ts'+nel+'\')">'+nel+'</div>');
	} else {
		var arrayCookie=cookie.split(';');
		var lc1, temp;
		for (var k=0; k<arrayCookie.length; k++){
        	lc1=arrayCookie[k].split("=");
        	if (lc1[0].trim()=="remember"){
        		var atmp=lc1[1].split(',');
        		if (atmp.indexOf(nel)==-1){
    				temp=lc1[1]+nel+',';
	        		document.cookie='remember='+temp+'; expires=Fri 20 Aug 2030 10:00:00 UTC';
	        		$('#temp').append('<div class="socau" style="background-color: yellow; color: green;" id="ts'+nel+'" onClick="scrollToAnchor(\'ts'+nel+'\')">'+nel+'</div>');
        		} else {
        			alert('Câu hỏi đã trong danh sách ghi nhớ!');
        		}   		
        		break;
        	}
        }
	}
}

var down=function(){
	var nel=$('#val').text();
	document.getElementById('ts'+nel).remove();
	if (document.cookie.search('remember')!=-1) {
		var arrayCookie=document.cookie.split(';');
		var lc1, temp;
		for (var k=0; k<arrayCookie.length; k++){
			lc1=arrayCookie[k].split("=");
			if (lc1[0].trim()=="remember"){
				var atmp=lc1[1].split(',');
				var index=atmp.indexOf(nel);
				atmp.splice(index, 1);
				document.cookie='remember='+atmp.join()+'; expires=Fri 20 Aug 2030 10:00:00 UTC';
				break;
			}
		}
	}
}