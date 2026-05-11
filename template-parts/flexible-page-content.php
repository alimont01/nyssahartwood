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
		<?php endif; ?>
	<?php endwhile; ?>
<?php endif; ?>