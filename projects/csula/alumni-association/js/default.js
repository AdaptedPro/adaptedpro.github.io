/*********************************************
---------------------------------------------- 
Filename: default.js
Purpose: CSULA ALumni Association Hompage layout.
Created by: Adam James
Created: February 16, 2013
Last Modified: February 17, 2013
---------------------------------------------- 
*********************************************/

$(function() {

	cur_image		= "";
	cur_trans_image	= "";
	i	= 0;
	k	= 0;
	
	//This is how we know which color bar splash content images to show.
	section				= $('#container').attr('class');
	console.log(section);
	
	img_prefix			= "images/" + section + "_images/splash_image_000";	 
	trans_img_prefix	= "images/" + section + "_images/tran_000";	
	location_array		= [0,1,2,3,4];
    sp_array			= [0,1,2,3,4];
    word_array			= [0,1,2,3,4];
	word_x_array 		= [10,200,400,580,770];

    display_images();
    display_words();
    
	function display_images() {
		
		if (location_array.length == "") {
			location_array = [0,1,2,3,4];
		}		
		
		img_indx = sp_array.length - 1;
		if (i > img_indx) {
			i = 0;
			
			$( ".sp_table tr td" ).each(function(){
				$(this).html('');
			});
									
			sp_array = fisherYates(sp_array);
			display_images();
		}
		//Choose a random location of those 
		//remaining to place image within.
		random_x	= Math.floor(Math.random() * location_array.length);	
		switch(location_array[random_x]) { 
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

		obj			= "<div id='sp_image" + i + "' class='sp_image' style='" + 
						b_style +"'><img src='" + img_prefix + sp_array[i] + ".jpg' alt='' /></div>";
		
		$("#sp_td" + location_array[random_x]).append(obj).animate({ width: 190 }, 500 );							
		$('#sp_image' + i).animate({
		    width: '192'					    	
		  },{ duration: 500,
			    specialEasing: {
				    width: 'swing'
			    },
			    complete: function() {
			    	$(this).delay(3000).animate({
					    width: '0'
					  }, { duration:500, 
						  	specialEasing: {
						  		width:'swing'
						  	}, complete:function() {
						  		$("#sp_td" + location_array[random_x]).html('');
						  	} 
					  	});
			    }
		  });	  

		location_array.splice(random_x,1);
		i++;	
	}
	
	function display_words() {		

		if (word_x_array.length == "") {
			word_x_array = [10,200,400,580,770];	
		}		
		
		word_indx = word_array.length - 1;
		if (k > word_indx) {
			k = 0;
			$("#trans").html('');
			display_words();
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
					  $(this).delay(1500).fadeOut();
				  });
				
				word_x_array.splice(random_x,1);
				k++;
			}				
		}
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
	
	setInterval(function() { display_images(); }, 2700);
	setInterval(function() { display_words(); }, 1800);
    
});