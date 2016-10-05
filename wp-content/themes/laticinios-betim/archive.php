<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Laticínios_Betim
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<section id="archive">
				<div class="container">
					<div class="row">
						<?php
						if ( have_posts() ) : ?>
							<header class="page-header">
								<?php the_archive_title( '<h1>', '</h1>' ); ?>
							</header><!-- .page-header -->
							<?php
							/* Start the Loop */
							while ( have_posts() ) : the_post(); ?>
								<div class="col-sm-12 archive-post">
									<?php get_template_part( 'template-parts/content', get_post_format() ); ?>
								</div>
							<?php endwhile;
							the_posts_navigation();
						else : ?>
							<div class="col-sm-offset-2 col-sm-8">
								<?php get_template_part( 'template-parts/content', 'none' ); ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</section>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
