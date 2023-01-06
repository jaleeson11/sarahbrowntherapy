<?php
/**
 * Template part for displaying services
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package sarahbrowntherapy
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
	if ( has_post_thumbnail() ) :
		?>
		<a href="<?php the_permalink(); ?>">
			<div class="entry-thumbnail observe" style="background-image: url( '<?php echo esc_url( get_the_post_thumbnail_url() ); ?>' );"></div>
		</a>
		<?php
	endif;
	?>

	<div class="entry-body observe">
		<header class="entry-header">
			<?php
			if ( is_singular() ) :
				the_title( '<h3 class="entry-title">', '</h3>' );
			else :
				the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
			endif;
			?>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 50 ) ); ?></p>
		</div><!-- .entry-content -->

		<footer class="entry-footer">
			<a href="<?php the_permalink(); ?>" class="site-button"><?php echo esc_html( 'Find Out More' ); ?></a>
		</footer><!-- .entry-footer -->
	</div><!-- .entry-body -->

</article><!-- #post-<?php the_ID(); ?> -->
