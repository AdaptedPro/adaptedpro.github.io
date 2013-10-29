<?php 
	/* Template Name: Bio */
	get_header();
?>	
		<div id="main">			
			<?php the_post(); ?>
			<div id="primary">
				<img src="<?php bloginfo('template_directory'); ?>/images/mm_headshot.jpg" alt="Headshot of Melinda Maerker." />
				<br class="clr" />
			</div>				
			<div id="secondary" class="post_content">
				<div class="narrow">
				<?php the_content(); ?>
				<?php wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'your-theme' ) . '&after=</div>') ?>					
				<?php edit_post_link( __( 'Edit', 'your-theme' ), '<span class="edit-link">', '</span>' ) ?>
				</div>
			</div>			
		</div>
<?php get_footer(); ?>