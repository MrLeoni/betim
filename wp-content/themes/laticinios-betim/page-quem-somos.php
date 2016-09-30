<?php
/**
 * Template name: Quem Somos
 *
 * @package Laticínios_Betim
 */
 
// Get page thumbnail and use for background image
$thumb_id = get_post_thumbnail_id();
$thumb_url = wp_get_attachment_image_src($thumb_id, "full", true);

get_header(); ?>

<section class="banner" style="background: url(<?php echo $thumb_url[0] ?>) no-repeat center top;">
  <!-- Empty -->
</section>

<?php
get_footer();