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
  
  // Products query args
  $products_args = array(
    "post_type" => "post",
    "posts_per_page"  => 999,
    "cat" => "-$sem_categoria",
  );
  // Products query
  $products_query = new WP_Query( $products_args );

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
        <?php
          // Check if have any posts, if has, show the content bellow
          if($products_query->have_posts()): ?>
            <div class="col-xs-offset-3 col-xs-6 col-sm-offset-0 col-sm-3">
              <ul class="category-menu">
                <?php
                  // List categories as "Filters"
                  foreach($categories as $cat) { ?>
                    <li class="cat-btn" data-category="<?php echo $cat->slug; ?>"><?php echo $cat->name; ?></li>
                  <?php }
                ?>
              </ul>
            </div>
            
            <div class="col-xs-12 col-sm-9">
              <div class="row">
                <?php
                  // Start Loop of posts
                  while($products_query->have_posts()): $products_query->the_post();
                  // Get posts categories. Using this just to get post categories slug.
                  // The slug link the whole product-box to filters options
                  $cat = get_the_category(); ?>
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4 product-box museo-300 <?php echo $cat[0]->slug; ?>">
                      <div class="product-wrapper">
                        <a class="product-link" href="<?php the_permalink(); ?>" title="<?php esc_html(get_the_title()); ?>"><?php the_post_thumbnail("full"); ?><p>+ informações</p></a>
                        <div class="product-info museo-300">
                          <?php the_title("<h4><a href='" . esc_html(get_permalink()) ."' title='" . esc_html(get_the_title()) . "'>", "</a></h4>");
                          the_excerpt(); ?>
                          <a class="custom-btn" href="<?php echo esc_html(home_url("/contato")); ?>" title="Orçamento">Solicitar Orçamento</a>
                        </div>
                      </div>
                    </div>
                  <?php
                  // End of the Loop
                  endwhile;
                  wp_reset_postdata();
                ?>
              </div>
            </div>
          <?php else:
            // Simple fallback in case of 0 posts
            echo "<div class='fallback-alert'><h2>Parece que ainda não temos produtos cadastrados</h2><p>Veja nossas receitas, curiosidades ou entre em contato para maiores informações</div>";
          endif;
        ?>
      </div>
    </div>
  </div>
  
</section>

<?php
get_footer();