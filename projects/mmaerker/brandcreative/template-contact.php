<?php 
	/* Template Name: Contact */
	get_header();
?>	
		<div id="main">
			
			<?php the_post(); ?>
			<div id="primary">
				<div id="m_side"></div>
			</div>				
			<div id="secondary">
				<div class="narrow">
				<?php the_content(); ?>
				<?php wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'your-theme' ) . '&after=</div>') ?>					
				<?php edit_post_link( __( 'Edit', 'your-theme' ), '<span class="edit-link">', '</span>' ) ?>
				<?php include_once 'snippets/contact.php';?>
				</div>
			</div>	
			
		</div>
<?php get_footer(); ?>