<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Laticínios_Betim
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<section class="error-404 not-found">
				<div class="container">
					<header class="page-header">
						<h1 class="page-title"><?php esc_html_e( '404', 'laticinios-betim' ); ?></h1>
						<p>A página que você está procurando não foi encontrada.</p>
					</header><!-- .page-header -->
				</div>
			</section><!-- .error-404 -->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
