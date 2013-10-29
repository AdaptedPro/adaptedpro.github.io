<?php		
global $post;
$template = str_replace('template-', '', get_post_meta($post->ID,'_wp_page_template',true));
$template = str_replace('.php', '', $template);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <link rel="apple-touch-icon" href="<?php bloginfo('template_directory'); ?>/images/apple-touch-icon.png"/>
        <link rel="shortcut icon" href="favicon.ico" />
        <meta name="author" content="Adam James, AdaptedPro" />
        <meta name="description" content="The official website for Melinda Maerker." />
        <meta name="keywords" content="Melinda Maerker, brand creative" />
		<title><?php
		    if ( is_single() ) { single_post_title(); }       
		    elseif ( is_home() || is_front_page() ) { bloginfo('name'); print ' | '; bloginfo('description'); get_page_number(); }
		    elseif ( is_page() ) { single_post_title(''); }
		    elseif ( is_search() ) { bloginfo('name'); print ' | Search results for ' . wp_specialchars($s); get_page_number(); }
		    elseif ( is_404() ) { bloginfo('name'); print ' | Not Found'; }
		    else { bloginfo('name'); wp_title('|'); get_page_number(); }
		?></title>
		<meta http-equiv="content-type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />
		<?php wp_head(); ?>
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
		<link href='http://fonts.googleapis.com/css?family=Raleway:200' rel='stylesheet' type='text/css' />      
        <link href="<?php bloginfo('template_directory'); ?>/styles/jquery-ui.css" rel="stylesheet" />
        <script src="<?php bloginfo('template_directory'); ?>/js/jquery-1.8.3.js" type="text/javascript"></script>
        <script src="<?php bloginfo('template_directory'); ?>/js/default.js" type="text/javascript"></script>
        <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery-1.4.2.min.js"></script>
        <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.jcarousel.min.js"></script>
		<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.cycle.all.js"></script>
	</head>
	<body <?php body_class(); ?>>
		<div id="wrapper">
			<div id="masthead">
				<div id="masthead_logo">
					<a href="<?php bloginfo( 'url' ) ?>/" title="<?php bloginfo( 'name' ) ?>" rel="home">
					<img src="<?php bloginfo('template_directory'); ?>/images/mm_logo.jpg" alt="Melinda Maerker | Brand Creative" class="noborder" width="181" height="37" /></a>
				</div>
				<div id="masthead_options">
					<div id="tags">
						<div id="tag_1" class="gFont">Brand Positioning</div>
						<div id="tag_2" class="gFont">Content Development</div>
						<div id="tag_3" class="gFont">Creative Application</div>
					</div>
					<div id="top_nav">
						<ul>
						<?php wp_list_pages('title_li=&depth=1'); ?>
						</ul>
						<br class="clr" />
					</div>

					<?php if ($template == "projects") { ?>
					<?php if (!has_parent() ) {?>
					<script>
					window.location = "cal-state-l-a";
					</script>
					<?php } ?>					
					
					<a id="is_proj" data-state="Y"></a>
					<div id="sub_nav">	  
						<?php
						  if($post->post_parent)
						  $children = wp_list_pages("title_li=&child_of=".$post->post_parent."&echo=0");
						  else
						  $children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0");
						  if ($children) { ?>
						  <ul id="s_nav">
						  <?php echo $children; ?>
						  </ul>
						  <?php } ?>						  						
					</div>
					<?php } else { ?>
					<a id="is_proj" data-state="N"></a>
					<?php } ?>
					<br class="clr" />
				</div>
				<br class="clr" />
			</div>