jQuery(document).ready(function($) {
	$("#contact_form").submit(function() {
		var str = $(".contact_mm").serialize();
		$.ajax({
			type: "POST",
			url: "../wp-admin/admin-ajax.php",
			data: 'action=contact_form&'+str,
			success: function(msg) {
				$("#node").ajaxComplete(function(event, request, settings){
					if(msg == 'sent') {
						jQuery(".contact #node").hide();
						jQuery(".contact #success").fadeIn("slow");
						$('#contact_form').html('');
					} else {
						result = msg;
		                jQuery(".contact #node").html(result);
		            	jQuery(".contact #node").fadeIn("slow");
		        	}
	        	});
	        }
	    });
    return false;
    });
    		
});