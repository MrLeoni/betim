<?php
/**
 * The template for displaying the home page.
 *
 * @package Laticínios_Betim
 */
 
// Set args for look into "Home Banner" taxonomy inside "Complementos" custom post type.
$banner_query_args = array(
	"posts_per_page"	=>	99,
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
	"posts_per_page"	=>	99,
	"post_type"	=> "complementos",
	"tax_query"	=> array(array(
		"taxonomy"	=>	"tipo",
		"field"			=>	"slug",
		"terms"			=>	"home-produtos",
	)),
);
// Querying posts with $product_query_args
$product_query = new WP_Query( $product_query_args );

// Set args to query "Receitas" post type
$receitas_query_args = array(
	"posts_per_page"	=>	2,
	"post_type"	=> "receitas",
);
// Querying posts with $receitas_query_args
$receitas_query = new WP_Query( $receitas_query_args );

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			
			<section id="home-banner">
				<div class="slider-wrapper">
					<?php if($banner_query->have_posts()) : ?>
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
					<?php
						else:
							echo "<div class='fallback-alert'><h2>Não existe conteúdo cadastrado em 'Complementos' do Tipo 'Home Banner'</h2><p>Crie um post dentro dentro dessa categoria para que ele apareça aqui e essa mensagem desapareça</div>" ;
						endif;
					?>
					
				</div>
			</section>
			
			<section id="home-produtos">
				<div class="container">
					<div class="row">
						<div class="col-sm-4 mask hidden-sm"><!-- empty --></div>
						<div class="col-sm-4">
							<div class="produtos-slider-wrapper">
								<?php if($product_query->have_posts()): ?>
									<ul class="home-produtos">
										<?php
											// Start the Loop
											while ($product_query->have_posts()): $product_query->the_post();
												// Getting image from ACF field
												$product_img = get_field("home-produtos-img");
												// Display content ?>
												<li>
													<img src="<?php echo $product_img["url"]; ?>" alt="<?php echo $product_img["alt"]; ?>" title="<?php echo $product_img["caption"]; ?>">
												</li>
												<?php // End of the loop
											endwhile;
											// Reset post data after custom query
											wp_reset_postdata();
										?>
									</ul>
								<?php
									else:
										echo "<div class='fallback-alert'><h2>Não existe conteúdo cadastrado em 'Complementos' do Tipo 'Home Produtos'</h2><p>Crie um post dentro dentro dessa categoria para que ele apareça aqui e essa mensagem desapareça</div>" ;
									endif;
								?>
							</div>
							<div class="link-box">
								<a class="fill custom-btn produto-link" href="<?php echo esc_html(home_url("/produtos")); ?>" title="Produtos">Ver todos</a>
							</div>
						</div>
						<div class="col-sm-4 mask hidden-sm"><!-- empty --></div>
					</div>
				</div>
			</section>
			
			<section id="receitas" class="home">
				<div class="container">
					<div class="row">
						<h3 class="museo-500">Receitas</h3>
						<?php if($receitas_query->have_posts()): ?>
						<div class="col-sm-1 hidden-xs"><!-- Empty --></div>
							<?php
								// Start the Loop
								while($receitas_query->have_posts()): $receitas_query->the_post();
								// Display Content
							?>
							
							<div class="col-sm-5 receita-wrapper">
								<a class="receita-img-link" href="<?php the_permalink(); ?>" title="<?php get_the_title(); ?>"><?php the_post_thumbnail("full"); ?></a>
								<div class="receita-info-box museo-300">
									<?php
										the_title("<h5 class='museo-700'><a href='" . esc_html(get_permalink()) ."' title='" . esc_html(get_the_title()) . "'><em>", "</em></a></h5>");
										the_excerpt();
									?>
								</div>
							</div>
							
							<?php // End of the loop
								endwhile;
								// Reset post data after custom query
								wp_reset_postdata();
							?>
							<div class="link-box">
								<a class="fill custom-btn produto-link" href="<?php echo esc_html(home_url("/receitas")); ?>" title="Receitas">Ver todas</a>
							</div>
						<?php
							else:
								echo "<div class='fallback-alert'><h2>Não existe conteúdo cadastrado em 'Receitas'</h2><p>Crie um post dentro dentro dessa categoria para que ele apareça aqui e essa mensagem desapareça</div>" ;
							endif;
						?>
					</div>
				</div>
			</section>
			
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();