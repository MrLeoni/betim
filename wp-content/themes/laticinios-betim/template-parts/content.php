<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Laticínios_Betim
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="row">
		<div class="col-sm-6">
			<div class="entry-image">
				<?php the_post_thumbnail("full"); ?>
			</div>
		</div>
		<div class="col-sm-6">
			<header class="entry-header">
				<?php the_title("<h2 class='museo-500'>", "</h2>");?>
			</header><!-- .entry-header -->
			<div class="entry-content museo-300">
				<?php the_content(); ?>
			</div><!-- .entry-content -->
			<div class="entry-footer">
				<div class="row">
					<div class="col-xs-6">
						<a class="custom-btn" href="<?php echo esc_html(home_url("/contato")); ?>" title="Orçamento">Solicitar Orçamento</a>
					</div>
					<div class="col-xs-6">
						<a class="custom-btn voltar" href="<?php echo esc_html(home_url("/produtos")); ?>" title="Produtos">Voltar</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	
</article><!-- #post-## -->
