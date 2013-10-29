/*********************************************
---------------------------------------------- 
Filename: homepage_java.js
Purpose: CSULA Hompage layout.
Created by: Adam James
Created: September 6, 2012
Last Modified: December 19, 2012
---------------------------------------------- 
*********************************************/
$(document).ready(function() {
	
	var corresponding_column;
	var	p_column = "";

	$("#masthead_nav_subopts, #main_nav_subopts, #college_list").hide();
	$("#t_logo").fadeIn("slow");
	
	$('.jq_select').customSelect();
	
	//Handle selection made wth select tag.
	$('select').change(function() {
        if(this.options[this.selectedIndex].value != '') {
            location.href=this.options[this.selectedIndex].value;
        }
	});
	
	$("#s_table tr td").each(function(){
		var _x =  $(".sp_img", this).height();		
		if ($(".sp_img", this) != null) {
			$("table",this).height( $("#splash").height() - _x );
		}
	});
	
	//Cycle through each news and event.
    $(".rotate").cycle({ 
        fx: 'fade' 
    });
    
    $('._tier1').click(function() {
    	window.location.href = $(".update_data .special_link").attr('href');
    });
    
    $('#show_colleges').click(function() {
    	$('#college_list').fadeIn();
    });
    
    $(document).mouseup(function (e) {
	    var container = $('#college_list');

	    if (container.has(e.target).length === 0) {
	        container.fadeOut();
	    }
    });    
    
    //Allow nav headers to reveal hidden sub menu when clicked.
	var top_nav = $("#masthead_nav_opts th a");
	var main_nav = $("#main_nav_opts th a");
	$("#masthead_nav_opts th a, #main_nav_opts th a").click(function() {
		
		var currentId = $(this).attr('id').replace("_", "");
		var obj = "";
		
		if (currentId > 0 && currentId <= 5) { obj = "#masthead_nav_subopts"; }
		if (currentId > 5 && currentId <= 9) { obj = "#main_nav_subopts"; }		
		
		corresponding_column = "#cor_col_" + currentId;
						
		if ($(obj).is(":hidden")) {
			if (obj == "#masthead_nav_subopts") {
				$("#mh_nav").addClass("noBorderBottom");
			} else {
				$("#main_nav_opts").addClass("noBorderBottom");
			}
						
			$(obj).slideDown("slow", function () {
				if(obj == "#main_nav_subopts") {
					$('html,body').animate({scrollTop:$("#main_nav_subopts").offset().top}, 500);
				} 
			});
			
			if ( $(corresponding_column).html() != "" ) {
				$(corresponding_column).addClass("selected_col");
				p_column = corresponding_column;
			}
					
		} else {
			//Close sub menu when done.
			$(obj).slideUp('slow', function() {
				$(obj).hide();
								
				if (obj == "#masthead_nav_subopts") {
					$("#mh_nav").removeClass("noBorderBottom");
				} else {
					$("#main_nav_opts").removeClass("noBorderBottom");
				}
				
				if (corresponding_column != p_column) {
					$(p_column).removeClass("selected_col");
				} else {
					$(corresponding_column).removeClass("selected_col");
				}				
				
			  });
		}
		
	});	
	
});