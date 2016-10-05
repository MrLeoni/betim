<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Laticínios_Betim
 */

get_header(); ?>

	<section id="search-page" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="container">
				<div class="row">
					<?php
						if ( have_posts() ) : ?>
							<header class="page-header">
								<h1 class="page-title"><?php printf( esc_html__( 'Resultados para: %s', 'laticinios-betim' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
							</header><!-- .page-header -->
							<?php
							/* Start the Loop */
							while ( have_posts() ) : the_post(); ?>
								<div class="col-sm-4 search-post">
									<?php get_template_part( 'template-parts/content', 'search' ); ?>
								</div>
							<?php endwhile;
							the_posts_navigation();
						else : ?>
						<div class="col-sm-offset-2 col-sm-8">
							<?php get_template_part( 'template-parts/content', 'none' ); ?>
						</div>
						<?php endif;
					?>
				</div>
			</div>
		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
