<?php
/**
 * Template name: Produtos
 *
 * @package Laticínios_Betim
 */
 
  // Get page thumbnail and use for background image
  $thumb_id = get_post_thumbnail_id();
  $thumb_url = wp_get_attachment_image_src($thumb_id, "full", true);
  
  // Get categories
  $sem_categoria  = get_cat_ID("Sem Categoria");
  $categories_args = array(
    "hide_empty"  => false,
    "exclude" => "-$sem_categoria",
  );
  $categories = get_categories( $categories_args );

get_header(); ?>

<section class="banner" style="background: url(<?php echo $thumb_url[0]; ?>) no-repeat center 40%">
  <!-- Empty -->
</section>

<section id="produtos" class="museo-300">
  <div class="page-content-box">
    <?php
      while(have_posts()): the_post();
        the_content();
      endwhile;
    ?>
  </div>
  
  <div class="produtos-wrapper">
    <div class="container">
      <div class="row">
        <div class="col-xs-offset-3 col-xs-6 col-sm-offset-0 col-sm-3">
          <ul class="category-menu">
            <?php
              foreach($categories as $cat) { ?>
                <li class="cat-btn" data-category="<?php echo $cat->slug; ?>"><?php echo $cat->name; ?></li>
              <?php }
            ?>
          </ul>
        </div>
        
        <div class="col-sm-9">
          
        </div>
        
      </div>
    </div>
  </div>
  
</section>

<?php
get_footer();