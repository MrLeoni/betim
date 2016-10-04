<?php
/**
 * Template name: Emporio
 *
 * @package Laticínios_Betim
 */
 
  // Get page thumbnail and use for background image
  $thumb_id = get_post_thumbnail_id();
  $thumb_url = wp_get_attachment_image_src($thumb_id, "full", true);
  
  // ACF Fields
  /* Link */
  $link_active = get_field("emporio_link_active");
  $link_name = get_field("emporio_link_name");
  $link_title = get_field("emporio_link_title");
  $link_target = get_field("emporio_link_target");
  $link_url = get_field("emporio_link_url");
  /* Image */
  $image = get_field("emporio_image");

get_header(); ?>

<section class="banner" style="background: url(<?php echo $thumb_url[0]; ?>) no-repeat center 40%">
  <!-- Empty -->
</section>

<section id="emporio">
  <div class="container">
    <div class="row">
      <div class="col-md-5">
        <?php
          while(have_posts()): the_post();
          the_content();
          endwhile;
        ?>
        <?php
          if($link_active == "true"): ?>
            <a href="<?php echo $link_url; ?>" target="<?php echo $link_target; ?>" class="emporio-link fill custom-btn museo-300" title="<?php echo $link_title; ?>"><?php echo $link_name; ?></a>
          <?php else:
            // Empty
          endif;
        ?>
      </div>
      <div class="col-md-7 hidden-sm hidden-xs">
        <div class="emporio-img-box">
          <img src="<?php echo $image["url"]; ?>" alt="<?php echo $image["alt"]; ?>">
        </div>
      </div>
    </div>
  </div>
</section>

<?php
get_footer();