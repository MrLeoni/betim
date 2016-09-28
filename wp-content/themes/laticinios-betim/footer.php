<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Laticínios_Betim
 */

?>

	<footer id="footer">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-3">
					<a class="footer-logo" href="<?php echo esc_html( home_url("/") ); ?>" title="Laticínios Betim"><img src="<?php bloginfo("stylesheet_directory"); ?>/assets/images/logo/logo-betim.svg" alt="Laticínios Betim"></a>
				</div>
				<div class="col-xs-6 col-sm-3">
					<?php
            $footer_menu_args = array(
              "theme_location"	=> "footer",
              "container"				=> "ul",
              "menu_class"			=> "footer-menu museo-700"
            );
            wp_nav_menu($footer_menu_args);
          ?>
				</div>
				<div class="col-xs-6 col-sm-3">
					<div class="footer-widget-box museo-300">
						<?php get_sidebar(); ?>
					</div>
				</div>
				<div class="col-xs-12 col-sm-3">
					<div class="footer-info-box museo-300">
						<?php
							// Set args for look into "Rodapé Info" taxonomy inside "Complementos" custom post type and only show one post
							$footer_query_args = array(
								"posts_per_page"	=> 1,
								"post_type"	=> "complementos",
								"tax_query"	=> array(array(
									"taxonomy"	=>	"tipo",
									"field"			=>	"slug",
									"terms"			=>	"rodape-info",
								)),
							);
							// Querying posts with $footer_query_args
							$footer_query = new WP_Query( $footer_query_args );
							// Start the Loop
							while ($footer_query->have_posts()): $footer_query->the_post();
							// Display content
							the_content();
							// End of the loop
							endwhile;
							// Reset post data after custom query
							wp_reset_postdata();
						?>
					</div>
				</div>
			</div>
		</div>
		<div class="copy">
			<div class="container">
				<p class="museo-300">2016 - Laticínios Betim - Todos os Direitos Reservados <span class="logo-delucca"><a href="http://www.agenciadelucca.com.br" title="Agência Delucca" target="_blank">Agência Delucca</a></span></p>
			</div>
		</div>
	</footer>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="<?php bloginfo( "template_url" ) ?>/assets/js/jquery-1.12.4.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="<?php bloginfo( "template_url" ) ?>/assets/js/bootstrap.min.js"></script>
	<script src="<?php bloginfo( "template_url" ) ?>/assets/js/jquery.bxslider.min.js"></script>
	<script src="<?php bloginfo( "template_url" ) ?>/assets/js/main.js"></script>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
