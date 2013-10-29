<?php
function check_get_request($DATA,$pages_array) {
	$diplay_arr = "";

	//If a category is requested...	
	if ($DATA['!']) {
		$category = ucwords( str_replace('-', ' ', $DATA['!']) );
		
		//Check if category exist.
		if( array_key_exists($category,$pages_array) ) {
			$diplay_arr['category'] = $DATA['!'];

			$_SESSION['category'] = $category;
			
			//If a page is requested...
			if (isset($DATA['x'])) {
				$page = ucwords( str_replace('-', ' ', $DATA['x']) );
				
				//Check if category exist.
				if (in_array($page, $pages_array[$category])) {
					$diplay_arr['page'] = $DATA['x'];
					
					$_SESSION['page'] = $page;
					
				} elseif ( in_array(check_special_name($DATA['x'])
						, $pages_array[$category]) ) {
					$diplay_arr['page'] = $DATA['x'];
					
					$_SESSION['page'] = $page;
				}

			} else {
				$_SESSION['page'] = 'overview';
			}
				
		}

	}

	return $diplay_arr;
}

function build_top_nav($categoryPages) {
	$numItems = count($categoryPages);
	$i = 0;
	$is_last = "";
	$output = "";
	$this_cat = "";
	
	if (isset($_GET['!'])) {
		$this_cat = $_GET['!'];
	}
	
	foreach ($categoryPages as $category => $page) {
		if ($category != "" && $category != NULL) {
			if(++$i === $numItems) {
				$is_last = " class=\"last\"";
			}
			
			if ( strtolower( simple_string_cleaning($category) )  == $this_cat ) {
				$output .= "<li". $is_last. "><a class='active' href=\"?!=".strtolower( simple_string_cleaning($category) )."\">". $category .
				" <img src=\"images/goldTriangle.gif\" alt=\"\" class=\"noborder\" /></a></li> \r \n";
			} else {
				$output .= "<li". $is_last. "><a href=\"?!=".strtolower( simple_string_cleaning($category) )."\">". $category .
				" <img src=\"images/goldTriangle.gif\" alt=\"\" class=\"noborder\" /></a></li> \r \n";				
			}

		}

	}

	return $output;
}

function build_sub_nav($categoryPages, $get_header, $get_nav_options) {
	$output = "";	
	foreach ($categoryPages as $category => $page) {
		if ($get_header == true && $get_nav_options == false) {
			$output .= "<th class=\"f_nav_header\"><a href=\"?!=".strtolower( simple_string_cleaning($category) )."\"><strong>". $category .
			"</strong></a></th> \r \n";
		} else if ($get_header == false && $get_nav_options == true) {

			$output .= "<td> \r \n ";
			$output .= "\t <ul> \r \n ";

			foreach ($page as $page_name) {
				$output .= "\t \t <li><a href=\"?!=".strtolower( simple_string_cleaning($category) . "&amp;x=" .
						simple_string_cleaning($page_name) )."\">". $page_name ."</a></li> \r \n ";
			}

			$output .= "\t </ul> \r \n ";
			$output .= "\t </td> \r \n";
		}
	}

	return $output;
}

function check_special_name($name) {
	switch($name) {
		case "join-renew":
			$name = "Join/Renew";
			break;
		case "e-advocacy-action-center":
			$name = "E-Advocacy Action Center";
			break;
		case "cal-state-la-today":
			$name = "Cal State L.A. TODAY";
			break;
		case "board-of-directors":
			$name = "Board of Directors";
			break;					
	}
	return $name;
}

function simple_string_cleaning($str) {
	$str = str_replace(' ', '-', $str);
	$str = str_replace('/', '-', $str);
	$str = str_replace('.', '', $str);
	return htmlentities($str);
}

function get_current_url() {

}