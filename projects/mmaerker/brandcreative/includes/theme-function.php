<?php
/* for comment old */		
add_filter( 'comments_template', 'legacy_comments' );
function legacy_comments( $file ) {
	if ( !function_exists('wp_list_comments') )
		$file = TEMPLATEPATH . '/old.comments.php';
	return $file;
}

/* for cut text */
function string_limit_words($excerpt, $substr=0){
	$string = strip_tags(str_replace('[...]', '...', $excerpt));
	if ($substr>0) {
		$string = substr($string, 0, $substr);
	}
	return $string;
}

function has_parent() {
	global $post;
	if ( $post->post_parent ) {
		return true;
	} else {
		return false;
	}
}

function curPageURL() {
 $pageURL = 'http';
 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $pageURL;
}

function redirect_to($location = NULL) {
	if($location != NULL) {
		header("Location: {$location}");
		exit;
	}
}

/* for show navigation */
function show_posts_nav() {
	global $wp_query;
	return ($wp_query->max_num_pages > 1) ? TRUE : FALSE;
}

/** 
* A pagination function 
* @param integer $range: The range of the slider, works best with even numbers 
* Used WP functions: 
* get_pagenum_link($i) - creates the link, e.g. http://site.com/page/4 
* previous_posts_link(' &#171; '); - returns the Previous page link 
* next_posts_link(' &#187; '); - returns the Next page link 
*/  
function get_pagination($range = 4){  
  // $paged - number of the current page  
  global $paged, $wp_query;  
  // How much pages do we have?  
  if ( !$max_page ) {  
    $max_page = $wp_query->max_num_pages;  
  }  
  // We need the pagination only if there are more than 1 page  
  if($max_page > 1){  
    if(!$paged){  
      $paged = 1;  
    }  
    // On the first page, don't put the First page link  
    if($paged != 1){  
      echo '<a href="' . get_pagenum_link(1) . '"> First </a>';  
    }  
    // To the previous page  
    previous_posts_link(' &#171; ');  
    // We need the sliding effect only if there are more pages than is the sliding range  
    if($max_page > $range){  
      // When closer to the beginning  
      if($paged < $range){  
        for($i = 1; $i <= ($range + 1); $i++){  
          echo '<a href="' . get_pagenum_link($i) .' "';  
          if($i==$paged) echo 'class="current"';  
          echo ">$i</a>";  
        }  
      }  
      // When closer to the end  
      elseif($paged >= ($max_page - ceil(($range/2)))){  
        for($i = $max_page - $range; $i <= $max_page; $i++){  
          echo '<a href="' . get_pagenum_link($i) .' "';  
          if($i==$paged) echo 'class="current"';  
          echo ">$i</a>";  
        }  
      }  
      // Somewhere in the middle  
      elseif($paged >= $range && $paged < ($max_page - ceil(($range/2)))){  
        for($i = ($paged - ceil($range/2)); $i <= ($paged + ceil(($range/2))); $i++){  
          echo '<a href="' . get_pagenum_link($i) .' "';  
          if($i==$paged) echo 'class="current"';  
          echo ">$i</a>";  
        }  
      }  
    }  
    // Less pages than the range, no sliding effect needed  
    else{  
      for($i = 1; $i <= $max_page; $i++){  
        echo '<a href="' . get_pagenum_link($i) .' "';  
        if($i==$paged) echo 'class="current"';  
        echo ">$i</a>";  
      }  
    }  
    // Next page  
    next_posts_link(' &#187; ');  
    // On the last page, don't put the Last page link  
    if($paged != $max_page){  
      echo '<a href="' . get_pagenum_link($max_page) . '"> Last </a>';  
    }  
  }  
}
if ( !function_exists('get_cat_related_posts') ) {
	function get_cat_related_posts( $limit = 5, $catName = TRUE, $title = '<h2>Related Post</h2>' ) {
 
		if ( !is_single() )
			return;
 
		$limit = (int) $limit;
		$output  = '';
		$output .= $title;
 
		$category = get_the_category();
		$category = (int) $category[0]->cat_ID;
 
 
		$output .= '<ul>';
 
		$args = array(
			'numberposts' => $limit,
			'category' => $category,
		); 
 
		$recentposts = get_posts( $args );
		foreach($recentposts as $post) {
			setup_postdata($post);
			$output .= '<li><span class="tpost"><a href="' . get_permalink($post->ID) . '">' . get_the_title($post->ID) . '</a></span></li>';
		}
 
		$output .= '</ul>';
 
		return $output;
	}
}
?>