<?php if( have_rows('flexible_page_content') ): ?>
	<?php while( have_rows('flexible_page_content') ): the_row(); ?>
		<?php if( get_row_layout() == 'book_block' ): ?>
			<?php get_template_part( 'template-parts/flexi-blocks/books' ); ?>
		<?php elseif( get_row_layout() == 'recipe_block' ): ?>
			<?php get_template_part( 'template-parts/flexi-blocks/recipes' ); ?>
		<?php elseif( get_row_layout() == 'image_and_text_block' ): ?>
			<?php get_template_part( 'template-parts/flexi-blocks/image-text' ); ?>
		<?php elseif( get_row_layout() == 'intro_text_block' ): ?>
			<?php get_template_part( 'template-parts/flexi-blocks/intro-text' ); ?>
		<?php elseif( get_row_layout() == 'call_to_action_block' ): ?>
			<?php get_template_part( 'template-parts/flexi-blocks/call-to-action' ); ?>
		<?php elseif( get_row_layout() == 'call_to_action_block_download' ): ?>
			<?php get_template_part( 'template-parts/flexi-blocks/call-to-action-download' ); ?>
		<?php elseif( get_row_layout() == 'show_recipe_list' ): ?>
			<?php get_template_part( 'template-parts/flexi-blocks/all-recipes' ); ?>
		<?php elseif( get_row_layout() == 'product_list' ): ?>
			<?php get_template_part( 'template-parts/flexi-blocks/all-products' ); ?>
		<?php endif; ?>
	<?php endwhile; ?>
<?php endif; ?>