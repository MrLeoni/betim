<?php
/**
 * Template name: Quem Somos
 *
 * @package Laticínios_Betim
 */
 
 // Get page thumbnail and use for background image
 $thumb_id = get_post_thumbnail_id();
 $thumb_url = wp_get_attachment_image_src($thumb_id, "full", true);
 
 // Get ACF fields
 /* Link */
 $link_name = get_field("quem-somos-link-nome");
 $link_title = get_field("quem-somos-link-title");
 $link_url = get_field("quem-somos-link-url");
 /* Background */
 $bg_img = get_field("background-image");

get_header(); ?>

<section class="banner" style="background: url(<?php echo $thumb_url[0]; ?>) no-repeat center 25%">
  <!-- Empty -->
</section>

<div id="quem-somos" style="background: linear-gradient(rgba(250, 164, 26, 0.4),rgba(250, 164, 26, 0.4)), url(<?php echo $bg_img["url"]; ?>) no-repeat center">
	<div class="container">
		<div class="row col-sm-offset-2 col-sm-8 museo-300">
			<?php
				while(have_posts()): the_post();
					the_title("<h2 class='museo-500'>", "</h2>");
					the_content();
				endwhile
			?>
			<a href="<?php echo $link_url; ?>" title="<?php echo $link_title; ?>" class="fill custom-btn produto-link"><?php echo $link_name; ?></a>
		</div>
	</div>
</div>

<?php
get_footer();