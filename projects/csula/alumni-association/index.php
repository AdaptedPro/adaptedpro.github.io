<?php require_once 'functions/functions.php';?>
<?php require_once 'classes/pageContainer.php';?>
<?php require_once 'includes/page_index.php';?>
<?php 
	$page_display_array = "";
	$is_home			= "";
	$pageLevel			= "";

	if (isset($_GET['!'])) { //LET THE MAGIC BEGIN!!!!
		session_start();		
		
		$page_display_array = check_get_request($_GET,$categoryPages);		
		if ($page_display_array['category'] && array_key_exists('page', $page_display_array)) {
			$page_content = "for_updating/" . $page_display_array['category'] . "/" . $page_display_array['page'] . ".php";
			if ($page_display_array['page'] == "overview") {
				$is_2nd_level = true;
				$pageLevel = "secondLevel";
			} else {
				$pageLevel = "thirdLevel";
			}
		} else if (array_key_exists('category', $page_display_array) && !array_key_exists('page', $page_display_array)) {		
			$is_2nd_level = true;
			$pageLevel = "secondLevel";
			
			if ($page_display_array['category'] == "events") {
				$page_content = "for_updating/" . $page_display_array['category'] . "/calendar.php";
			} else {
				$page_content = "for_updating/" . $page_display_array['category'] . "/overview.php";				
			}
			
			$_SESSION['page'] = "";
		}
		$data_id	=	simple_string_cleaning($page_display_array['category']);
	} else { 
		$is_home = true; 
		session_unset();
		$pageLevel	= "homePage";
		$data_id	= "index";
	}

	$page = new pageContainer();
	$page_data = $page->update_this_page($page_display_array);
	$page->pageClass = $pageLevel;
?>
<?php require_once 'includes/header.php' ?>

	<script type="text/javascript" src="js/fluidsplash-pro.js"></script>
	<div id="splash" class="<?php echo $pageLevel; ?>">	
		<div id="splash_content">
			<div id="color_div_0" class="color_div"></div>
			<div id="color_div_1" class="color_div"></div>
			<div id="color_div_2" class="color_div"></div>
			<div id="color_div_3" class="color_div"></div>
			<div id="color_div_4" class="color_div"></div>
			<?php if ($is_home == true || $pageLevel == "secondLevel") { ?>
			<div id="img_holder"></div>			
			<div id="trans"></div>
			<?php } ?>
		</div>
	</div>
	
<?php if (!$is_home)  {?>
		
	<div id="section_right_column" class="<?php echo $pageLevel; ?>">
	<?php $page->section_right_column(); ?>
	</div>	
	
	<div id="section_navigation">
		<?php echo $page->section_navigation(); ?>
	</div>
	
	<div id="section_content">
	<?php if ($pageLevel == "secondLevel") { echo '<br /><br />'; } ?>
		<?php if ($pageLevel == 'thirdLevel' && $page->pageName != "Calendar") {
			echo '<h2>' .$page->pageName . '</h2>';	
		} ?>
		<?php include $page_content; ?>
	</div>
	<br class="clearfloat" />	

<?php } ?>

<?php require_once 'includes/footer.php';?>