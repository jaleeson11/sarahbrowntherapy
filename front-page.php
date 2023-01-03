<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package sarahbrowntherapy
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) :
				?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
				<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;

		?>

        <div class="container">
            <section id="about-me" class="site-section">
                <img class="about-me__image" src="<?php echo get_theme_mod( 'home_about_image' ); ?>" alt="<?php echo get_theme_mod( 'home_about_image_alt' ); ?>">
                <div class="about-me__content">
                    <h2><?php echo get_theme_mod( 'home_about_heading' ); ?></h2>
                    <p><?php echo get_theme_mod( 'home_about_text' ); ?></p>
                    <a href="<?php echo get_the_permalink( get_theme_mod( 'home_about_button_link' ) );  ?>" class="site-button"><?php echo get_theme_mod( 'home_about_button_text' ); ?></a>
                </div>
            </section><!-- #about-me -->
        </div><!-- .container -->

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
