<?php
class ajaxData {
	
	public function ajaxData() {

		if (isset($_GET)) {
						
			if ($_GET['x']!=NULL || $_GET['x'] != "") {
				$section = strtolower($_GET['x']);
				echo $this->get_section($section);
			} 
			
			if ($_GET['p']) {
				if ($_GET['p']!=NULL || $_GET['p'] != "") {
					$primary = strtolower($_GET['p']);
					echo $this->get_primary($primary);
				}				
			}
			
			if ($_GET['i']) {
				if ($_GET['i']!=NULL || $_GET['i'] != "") {
					$image = "<img src=\"images/h_prj_" . $_GET['i'] . ".jpg\" alt=\"\" />";			
					echo $image;
				}				
			}
			
		}
	}
	
	private function get_section($section) {
		include 'snippets/' . $section . '.php';		
	}
	
	private function get_primary($primary) {
		include 'snippets/' . $primary . '_primary.php';
	}	
}

$ajx = new ajaxData();