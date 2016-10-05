<?php
/**
 * Template part for displaying "Receitas" post type.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Laticínios_Betim
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="row">
		<div class="col-sm-5">
			<header class="entry-header">
				<?php the_title("<h2 class='museo-500'>", "</h2>");?>
			</header><!-- .entry-header -->
			<div class="entry-content museo-300">
				<?php the_content(); ?>
			</div><!-- .entry-content -->
			<div class="entry-footer">
			  <a class="custom-btn voltar" href="<?php echo esc_html(home_url("/receitas")); ?>" title="Produtos">Voltar</a>
			</div>
		</div>
	</div>
	
</article><!-- #post-## -->
