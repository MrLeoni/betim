<?php
/**
 * Template name: Curiosidade
 *
 * @package Laticínios_Betim
 */
 
  // Get page thumbnail and use for background image
  $thumb_id = get_post_thumbnail_id();
  $thumb_url = wp_get_attachment_image_src($thumb_id, "full", true);
  
  // Create $curiosidade_args for query "Curiosidades" post type
  $curiosidade_args = array(
    "post_type"  => "curiosidades",
    "posts_per_page" => 99,
  );
  
  $curiosidade_query = new WP_Query( $curiosidade_args );

get_header(); ?>

<section class="banner" style="background: url(<?php echo $thumb_url[0]; ?>) no-repeat center 40%">
  <!-- Empty -->
</section>

<section id="curiosidade">
  <div class="container">
    <div class="row">
      <?php
        if( $curiosidade_query->have_posts() ) :
          while( $curiosidade_query->have_posts() ) : $curiosidade_query->the_post(); ?>
            <div class="col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1 curiosidade-info-box">
              <?php the_content(); ?>
            </div>
          <?php endwhile;
          wp_reset_postdata();
        else :
          echo "<div class='fallback-alert'><h2>Não existe conteúdo cadastrado em 'Curiosidades'</h2><p>Crie um post dentro dentro dessa area para que ele apareça aqui e essa mensagem desapareça</div>";
        endif;
      ?>
    </div>
  </div>
</section>

<?php
get_footer();