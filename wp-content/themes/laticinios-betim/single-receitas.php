<?php
/**
 * The template for displaying "Receitas" post type.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Laticínios_Betim
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<section class="banner" style="background: url(<?php bloginfo("stylesheet_directory"); ?>/assets/images/receitas/receitas-banner.png) no-repeat center 40%">
			  <!-- Empty -->
			</section>
			<section id="single-receitas">
				<div class="container">
					<?php
					while ( have_posts() ) : the_post();
						get_template_part( 'template-parts/content', "receitas" );
					endwhile; // End of the loop.
					?>
				</div>
			</section>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
