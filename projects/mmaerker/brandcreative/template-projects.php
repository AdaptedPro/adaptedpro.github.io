<?php 
	/* Template Name: Projects */
	get_header();
?>	
<script type="text/javascript">
var state = "show";
function mycarousel_initCallback(carousel) {
    $('#mycarousel-next').bind('click', function() {
        carousel.next();
        return false;
    });

    $('#mycarousel-prev').bind('click', function() {
        carousel.prev();
        return false;
    });
};

function mycarousel_itemFirstInCallback(carousel, item, idx, state) {	
	_i = idx - 1;	
    $('#multi_desc_list li').each(function() {
    	$(this).removeClass('hidden');
    	if ($(this).index() != _i ) {
       		$(this).hide();
    	} else {
			$(this).show();
    	}
    });	
	
	if (idx <= 1) {
		$('#mycarousel-prev').hide();
	} else {
		$('#mycarousel-prev').html('<img src="<?php bloginfo('template_directory'); ?>/images/btn_prev.jpg" alt="Previous" />');
		$('#mycarousel-prev').show();
	}

	if (idx == jQuery("#mycarousel ul li").length) {
		$('#mycarousel-next').hide();
	} else {
		$('#mycarousel-next').show();
	}    
};

$(document).ready(function() {
    $("#mycarousel").jcarousel({
        scroll: 1,
        initCallback: mycarousel_initCallback,
        itemFirstInCallback:  mycarousel_itemFirstInCallback,
        buttonNextHTML: null,
        buttonPrevHTML: null
    }).fadeIn;
   
});
</script>

		<div id="main">
			<div id="primary">
				<div id="project_description">
					<?php 
					if (get_post_custom_values("single_post_image_list")) {
					?>
					<?php the_post(); ?>
					<?php the_content(); ?>
					<?php } else { ?>			
			  		<ul id="multi_desc_list">
						<?php 
							$tag = strtolower(str_replace(' ', '-', trim( wp_title('', false) )));
							rewind_posts();
						?>
						<?php $wp_query->query('&cat=3&order=ASC') ?>
						<?php while ( have_posts() ) : the_post() ?>
						<?php
									$posttags = get_the_tags();								
									foreach ($posttags as $ptag) {
										if ($ptag->name == $tag) {					
											if (get_post_custom_values("multi_post_image_list")) {
												$desc = $post->post_content;
												if ($desc!=NULL) {
													echo "<li class='hidden'>".wpautop($desc)."</li> \n";
												}
											} 
									}
								}							
						?>
						<?php endwhile; ?>	
					</ul>					
					
					<?php } ?>		
				</div>			
			</div>				
			<div id="secondary">			
				<div id="project_layout">				
				    <div id="arrow_nav" style="position:absolute;" class="jcarousel-scroll">
				        <a href="#" id="mycarousel-prev"></a>
				        <a href="#" id="mycarousel-next"><img src="<?php bloginfo('template_directory'); ?>/images/btn_next.jpg" alt="Next" /></a>
				    </div>
				<?php 
				if (get_post_custom_values("single_post_image_list")) {
					$images = get_post_custom_values("single_post_image_list"); ?>
					<div id="mycarousel" class="jcarousel-skin-tango">  
					<?php echo $images[0]; ?>	
					</div>
					<?php 
				} else { ?>
				    <div id="mycarousel" class="jcarousel-skin-tango">  
				    	<ul> 	
					<?php rewind_posts(); ?>
					<?php $wp_query->query('&cat=3&order=ASC') ?>				
					<?php while ( have_posts() ) : the_post() ?>	
							<?php
							$posttags = get_the_tags();
							foreach ($posttags as $ptag) {
								if ($ptag->name == $tag) {
									if (get_post_custom_values("multi_post_image_list")) { 
										$m_images = get_post_custom_values("multi_post_image_list");
										echo "<li><img src='" . $m_images[0] . "' alt='' width='580px' height='580px' class='proj_image' /></li> \n";
									}
								}
							}
							?>						
				    <?php endwhile; ?>
				    	</ul>
					</div>
				<?php } ?>	
				</div>
				<br class="clr" />						
			</div>			
		</div>  		
<?php get_footer(); ?>