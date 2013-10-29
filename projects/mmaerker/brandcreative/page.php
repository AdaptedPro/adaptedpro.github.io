<?php get_header(); ?>
	
		<div id="main">
			<div id="primary">
			<?php the_post(); ?>
			</div>				
			<div id="secondary" class="post_content">
			<?php if ( strtolower($pagename) == strtolower("Services") ) { ?><div class="narrow"><?php } ?>
			<?php wpautop( the_content() ); ?>
			<?php wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'your-theme' ) . '&after=</div>') ?>					
			<?php edit_post_link( __( 'Edit', 'your-theme' ), '<span class="edit-link">', '</span>' ) ?>
			<?php if ( strtolower($pagename) == strtolower("Services") ) { ?></div><?php } ?>
			</div>		
		
		</div>
<?php get_footer(); ?>