//CUSTOM
/*********************************************
---------------------------------------------- 
Filename: fluidsplash-pro.css
Purpose: CSULA Alumni Association Default layout.
Created by: Adam James
Created: March 03, 2013
Last Modified: March 03, 2013
---------------------------------------------- 
*********************************************/

$(function() {
	cur_image		= "";
	cur_trans_image	= "";
	i	= 0;
	k	= 0;
	
	//No images should be used in animation if on third level page.
	is_level	= $('body').attr('class');
	position_array 	= [0,190,380,570,760];
	
	if (is_level == 'thirdLevel') {
		third_level_animation(position_array,i);
	} else {
		//This is how we know which color bar splash content images to show.
		section				= $('#container').attr('class');
		img_prefix			= "images/" + section + "_images/splash_image_000";	 
		trans_img_prefix	= "images/" + section + "_images/tran_000";	
	    sp_array			= [0,1,2,3,4];
	    word_array			= [0,1,2,3,4];
		word_x_array 		= [10,200,400,580,770];	
		doAnimation(position_array,sp_array,img_prefix,cur_image,i);
	    display_words(word_array,word_x_array,trans_img_prefix,cur_trans_image,k);		
	}
});


function doAnimation(position_array,sp_array,img_prefix,cur_image,i) {
	
	if (position_array.length == "") {
		position_array = [0,190,380,570,760];	
	}	

	img_indx = sp_array.length - 1;
	if (i > img_indx) {
		i = 0;
		//sp_array = fisherYates(sp_array);
		doAnimation(position_array,sp_array,img_prefix,cur_image,i);
	}
	
    var random_x	= Math.floor(Math.random() * position_array.length);
	var b_style = "";
	switch(position_array[random_x]) { 
	case 0:
		b_style = "border-left:60px solid #CCCC00; border-right:60px solid #CCCC00;";
		break;
	case 1:
		b_style = "border-left:30px solid #E6CF00; border-right:30px solid #E6CF00;";
		break;	
	case 2:
		b_style = "border-left:30px solid #D9BB14; border-right:30px solid #D9BB14;";
		break;				
	case 3:
		b_style = "border-left:60px solid #FAAF40; border-right:60px solid #FAAF40;";
		break;
	case 4:
		b_style = "border-left:60px solid #D99014; border-right:30px solid #D99014;";
		break;	
	}    
		  		
	$('#color_div_' + i).animate({
	    left: position_array[random_x]			    	
	  },{ duration: 1000,
		    specialEasing: {
			    width: 'swing'
		    },
		    complete: function() {			    
		  		
		    	position_array.splice(random_x,1);
				if (img_prefix + sp_array[i] + ".jpg" != cur_image) {
					cur_image	= img_prefix + sp_array[i] + ".jpg";
					
					obj			= "<div id='sp_image" + i + "' class='img_holder' style='" + b_style +" left:" + 
									position_array[random_x] + "px;'><img src='" + img_prefix + sp_array[i] + ".jpg' alt='' /></div>";
					
			    	$('#splash_content').append(obj);			    	
			    	$('#splash_content #sp_image' + i).animate({
					    width: '192'
					  }, { duration:800, 
						  	specialEasing: {
						  		width:'swing'
						  	}, complete:function() {
						  		
						  		$(this).delay(500).animate({
						    		width: '0'
								  }, { duration:900, 
									  	specialEasing: {
									  		width:'swing'
									  	}, complete:function() {
									  		$(this).remove();
									  	}									  		
									  	
						  	}); 
					  	}						
					
					 });
					
				}
						    	
		    	$(this).delay(1000).animate({
		    		left: position_array[random_x]
				  }, { duration:1500, 
					  	specialEasing: {
					  		width:'swing'
					  	}, complete:function() {
					  		position_array.splice(random_x,1);					  		
					  		i++;
					  		doAnimation(position_array,sp_array,img_prefix,cur_image,i);
					  	} 
				  	});				
				
		    }
	  });

}

function display_words(word_array,word_x_array,trans_img_prefix,cur_trans_image,k) {		
	
	if (word_x_array.length == "") {
		word_x_array = [10,200,400,580,770];	
	}		
	
	word_indx = word_array.length - 1;
	if (k > word_indx) {
		k = 0;
		$("#trans").html('');
		display_words(word_array,word_x_array,trans_img_prefix,cur_trans_image,k);
	} else {
		if (trans_img_prefix + word_array[k] + ".jpg" != cur_trans_image) {
			cur_trans_image	= trans_img_prefix + word_array[k] + ".jpg";
			
			random_x	= Math.floor(Math.random() * word_x_array.length);
			
			trans_obj 	= "<div id='trans_image" + k + 
							"' class='tran_image' style='left:" + word_x_array[random_x] + 
							"px;'><img src='" + trans_img_prefix + word_array[k] + 
							".png' alt='' /></div>";
			
			$("#trans").append(trans_obj);				
			$('#trans_image' + k).animate({
			    opacity: '100',
			    left: word_x_array[random_x] - 10
			  }, 500, function() {
				  $(this).delay(1500).animate({
					    opacity: '0'
					  }, 500, function() {
							word_x_array.splice(random_x,1);
							k++;						  
						  	display_words(word_array,word_x_array,trans_img_prefix,cur_trans_image,k);
					  });
			  });
			//
		}				
	}
}

function third_level_animation(position_array,i) {
	
	if (position_array.length == "") {
		position_array = [0,190,380,570,760];	
	}		

	if (i > 4) {
		i = 0;
		third_level_animation(position_array,i);
	}	
	
    var random_x	= Math.floor(Math.random() * position_array.length);	
	
	$('#color_div_' + i).animate({
	    left: position_array[random_x]			    	
	  },{ duration: 1000,
		    specialEasing: {
			    width: 'swing'
		    },
		    complete: function() {			    
		    	position_array.splice(random_x,1);						    	
		    	$(this).delay(1000).animate({
		    		left: position_array[random_x]
				  }, { duration:1500, 
					  	specialEasing: {
					  		width:'swing'
					  	}, complete:function() {
					  		position_array.splice(random_x,1);					  		
					  		i++;
					  		third_level_animation(position_array,i);
					  	} 
				  	});				
				
		    }
	  });	
}

function fisherYates(myArray) {
	  var i = myArray.length, j, tempi, tempj;
	  if ( i == 0 ) return false;
	  while ( --i ) {
	     j = Math.floor( Math.random() * ( i + 1 ) );
	     tempi = myArray[i];
	     tempj = myArray[j];
	     myArray[i] = tempj;
	     myArray[j] = tempi;
	   }
	  return myArray;
}