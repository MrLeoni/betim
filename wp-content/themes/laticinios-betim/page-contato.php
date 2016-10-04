<?php
/**
 * Template name: Contato
 *
 * @package Laticínios_Betim
 */
 
  // Get page thumbnail and use for background image
  $thumb_id = get_post_thumbnail_id();
  $thumb_url = wp_get_attachment_image_src($thumb_id, "full", true);

get_header(); ?>

<section class="banner" style="background: url(<?php echo $thumb_url[0]; ?>) no-repeat center 40%">
  <!-- Empty -->
</section>

<section id="contato">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-offset-2 col-md-4 contato-content">
        <?php
          while(have_posts()): the_post();
            the_content();
          endwhile;
        ?>
      </div>
      <div class="col-md-6 map-box">
        <iframe frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJfxmo1ynPyJQRcmt0kdlr99k&key=AIzaSyAzBLS1Si2u26eosc81Qj8jV0w4dAbmk60"></iframe>
      </div>
    </div>
  </div>
</section>

<?php
get_footer();