<?php
/**
 * The template for displaying the home page.
 *
 * @package Laticínios_Betim
 */
 
// Set args for look into "Home Banner" taxonomy inside "Complementos" custom post type.
$banner_query_args = array(
	"post_type"	=> "complementos",
	"tax_query"	=> array(array(
		"taxonomy"	=>	"tipo",
		"field"			=>	"slug",
		"terms"			=>	"home-banner",
	)),
);
// Querying posts with $banner_query_args
$banner_query = new WP_Query( $banner_query_args );

// Set args for look into "Home Produtos" taxonomy inside "Complementos" custom post type.
$product_query_args = array(
	"post_type"	=> "complementos",
	"tax_query"	=> array(array(
		"taxonomy"	=>	"tipo",
		"field"			=>	"slug",
		"terms"			=>	"home-produtos",
	)),
);
// Querying posts with $banner_query_args
$product_query = new WP_Query( $product_query_args );

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			
			<section id="home-banner">
				<div class="slider-wrapper">
					<ul class="home-slider">
						<?php
							// Start the Loop
							while ($banner_query->have_posts()): $banner_query->the_post();
								// Getting image from ACF field
								$banner_img = get_field("home-banner-img");
								// Display content ?>
								<li><img src="<?php echo $banner_img["url"]; ?>" alt="<?php echo $banner_img["alt"]; ?>" title="<?php echo $banner_img["caption"]; ?>"></li>
								<?php // End of the loop
							endwhile;
							// Reset post data after custom query
							wp_reset_postdata();
						?>
					</ul>
				</div>
			</section>
			
			<section id="home-produtos">
				<div class="container">
					<div class="row">
						<div class="col-sm-4 mask hidden-xs"><!-- empty --></div>
						<div class="col-sm-4">
							<div class="produtos-slider-wrapper">
								<ul class="home-produtos">
									<?php
										// Start the Loop
										while ($product_query->have_posts()): $product_query->the_post();
											// Getting image from ACF field
											$product_img = get_field("home-produtos-img");
											// Storing post title for latter use
											$post_title = get_the_title();
											// Using post title to find a correspondent category on the main "Categorias" taxonomy inside of "Posts" default post type
											$correspondent_cat = get_cat_ID("$post_title");
											// Display content ?>
											<li>
												<img src="<?php echo $product_img["url"]; ?>" alt="<?php echo $product_img["alt"]; ?>" title="<?php echo $product_img["caption"]; ?>">
												<a class="produto-link" href="<?php echo get_category_link( $correspondent_cat ); ?>" title="<?php echo $post_title; ?>"><?php echo $post_title; ?></a>
											</li>
											<?php // End of the loop
										endwhile;
										// Reset post data after custom query
										wp_reset_postdata();
									?>
								</ul>
							</div>
						</div>
						<div class="col-sm-4 mask hidden-xs"><!-- empty --></div>
					</div>
				</div>
			</section>
			
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();