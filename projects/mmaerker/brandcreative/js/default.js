$(function() {
	$(".page_item a, #sub_nav ul li a").each(function (i) {
		if ($(this).text() == "Projects") {
			if( $("#is_proj").attr('data-state') == "Y") {
				$(this).addClass('selected');
			}
		}
		$(this).append('&nbsp;/&nbsp;&nbsp;');
	});	
	
	$("#sub_nav ul li a").each(function (i) {
		$(this).attr('data-source-id', i+1);	
	});		

});