<?php
/**
 * Template part for displaying testimonial list items
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package sarahbrowntherapy
 */

?>

<div class="entry-testimonial">

	<blockquote class="entry-quote">
		<?php the_content(); ?>

		<footer class="entry-quote__footer">
			<?php
			if ( get_field( 'client_name' ) ) :
				?>
				<span class="entry-quote__client">
					<?php the_field( 'client_name' ); ?>
				</span><!-- .entry-quote__client -->
				<?php
			endif;
			?>
		</footer><!-- .entry-quote__footer -->

	</blockquote><!-- .entry-quote -->

</div><!-- .entry-testimonial -->
