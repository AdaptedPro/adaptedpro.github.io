		<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/ifinitecarousel.js"></script>
		<?php $post_num = 0; $x = 0; ?>
		<div id="primary">
		    <ul id="home_projs">
		    	<?php query_posts($query_string . "&order=ASC&cat=2") ?>
		        <?php while ( have_posts() ) : the_post() ?>
		        <?php $post_num++; $x++; ?>
		        <?php if (get_post_custom_values("group_name")) { ?> 
		        <?php $values = get_post_custom_values("group_name"); ?>
		        <?php $proj_name = strtolower(str_replace(' ', '-', trim( $values[0])) ); ?>
		        <?php $proj_name = rtrim($proj_name, '.'); ?>
		        <?php $proj_name = strtolower(str_replace('.', '-', $proj_name) ); ?>
		        <?php $proj_name = strtolower(str_replace('/', '', $proj_name) ); ?>               
		        <li class="proj_group" data-id="<?php echo $post_num; ?>"><a <?php if ($x == 1) { echo "class='selected' "; } ?>href="projects/<?php echo $proj_name; ?>"><?php echo $values[0]; ?></a></li>
		        <?php } ?> 
				<?php endwhile; ?>	
		    </ul>
		</div>   
		
		<div id="secondary" class="home">			
			<div class="infiniteCarousel">
			<div class="wrapper">
			<ul id="mycarousel" class="jcarousel-skin-tango">  	
				<?php rewind_posts(); ?>
			  	<?php while (have_posts()) : the_post(); ?>
				<?php if (get_post_custom_values("splash_img")) { ?>
		        <?php $values = get_post_custom_values("group_name"); ?>
		        <?php $proj_name = strtolower(str_replace(' ', '-', trim( $values[0])) ); ?>
		        <?php $proj_name = rtrim($proj_name, '.'); ?>
		        <?php $proj_name = strtolower(str_replace('.', '-', $proj_name) ); ?>
		        <?php $proj_name = strtolower(str_replace('/', '', $proj_name) ); ?>  				
				<li>
					<a class="proj_group" href="projects/<?php echo $proj_name; ?>">
					<img src="<?php $values = get_post_custom_values("splash_img"); echo $values[0]; ?>"
					alt="<?php the_title(); ?>" width="520" height="520" />
					</a>
				</li>
				<?php } ?>  
		  		<?php endwhile; ?>
		    </ul>
		    </div>
		    </div>
		    <div class="clr"></div>
		</div>	