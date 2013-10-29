<?php
class pageContainer {
	
	var $pageName			= "";
	var $pageSplashType		= "";
	var $pageNavigation		= "";
	var $pageClass			= "";
	var $pageData			= "";
	
	public function pageContainer() {
		
	}
	
	public function update_this_page($data_array) {
		$this->pageData = $data_array;
		return $data_array;
	}
	
	public function section_navigation() {
		global $categoryPages;
		global $is_2nd_level;

		$currentCategory	= $_SESSION['category'];
		$currentPage		= $_SESSION['page'];
		$this_cat			= $_GET['!'];
		
		$output = "<img src='images/". $this_cat . "_images/" .$this_cat. "_nav_header.jpg' alt='".$this_cat."' /> \n";
		$output .= "<ul class='heavyFont'> \n";
		foreach($categoryPages as $category => $pagelist) {
			if ($category == $currentCategory) {
				foreach ($pagelist as $page) {
					$foramttedPageName = simple_string_cleaning($page);
					
					if ( strtolower(simple_string_cleaning($page)) == 
						strtolower(simple_string_cleaning($currentPage))
						) {
						$this->pageName = $page;
						$active = " class='active'";						
					} else {
						$active = "";
					}
					
					if (!isset($_GET['x']) && (strtolower(simple_string_cleaning($page)) == 'overview') ||
							!isset($_GET['x']) && (strtolower(simple_string_cleaning($page)) == 'calendar')) {
						$output .= "\t \t <li class='active'><a href=\"?!=".strtolower( simple_string_cleaning($category) . "&amp;x=" .
								strtolower(simple_string_cleaning($page)) )."\">". $page ."</a></li> \r \n ";						
					} else {
						$output .= "\t \t <li".$active."><a href=\"?!=".strtolower( simple_string_cleaning($category) . "&amp;x=" .
								strtolower(simple_string_cleaning($page)) )."\">". $page ."</a></li> \r \n ";						
					}
					
				}
			}
		}
		$output .= "</ul> \n";
		return $output;
	}
	
	public function section_right_column() {
		global $pageLevel;
		
		switch ($pageLevel) {
			case "secondLevel":
				$right_col = "<img id=\"rc_connect\" src=\"images/sc_connect.gif\" alt=\"Connect!\" />";				
				break;
			case "thirdLevel":
				$right_col = "<img id=\"rc_connect\" src=\"images/right_col/default.jpg\" alt=\"Image title\" />";
				$right_col .= "<p>Vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zril delenit augue.</p>";
				break;				
		}	

		echo $right_col;
	}

}