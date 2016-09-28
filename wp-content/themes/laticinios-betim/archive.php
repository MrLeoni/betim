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
							<div class="col-sm-12">
								<header class="page-header">
									<?php
										the_archive_title( '<h1 class="page-title">', '</h1>' );
										the_archive_description( '<div class="archive-description">', '</div>' );
									?>
								</header><!-- .page-header -->
							</div>
							
							<?php
							/* Start the Loop */
							while ( have_posts() ) : the_post();
							
								/*
								 * Include the Post-Format-specific template for the content.
								 * If you want to override this in a child theme, then include a file
								 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
								 */?>
								<div class="col-sm-12">
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
