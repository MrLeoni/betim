<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Laticínios_Betim
 */

?>

<section class="no-results not-found">
	<header class="page-header">
		<h1 class="page-title"><?php esc_html_e( 'Não encontramos nada...', 'laticinios-betim' ); ?></h1>
	</header><!-- .page-header -->

	<div class="page-content">
		<?php
		if ( is_search() ) : ?>
			<p><?php esc_html_e( 'Desculpe, mas nada foi encontrado. Tente novamente com palavras diferentes.', 'laticinios-betim' ); ?></p>
			<?php	get_search_form();
		else : ?>
			<p><?php esc_html_e( 'Parece que nada foi encontrado por aqui, deseja fazer uma pesquisa?', 'laticinios-betim' ); ?></p>
			<?php	get_search_form();
		endif;
		?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
