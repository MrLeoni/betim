<?php
/**
 * Template name: Receitas
 *
 * @package Laticínios_Betim
 */
 
  // Get page thumbnail and use for background image
  $thumb_id = get_post_thumbnail_id();
  $thumb_url = wp_get_attachment_image_src($thumb_id, "full", true);
 
  // Set args to query "Receitas" post type
  $receitas_query_args = array(
  	"posts_per_page"	=>	99,
  	"post_type"	=> "receitas",
  );
  // Querying posts with $receitas_query_args
  $receitas_query = new WP_Query( $receitas_query_args );

get_header(); ?>

<section class="banner" style="background: url(<?php echo $thumb_url[0]; ?>) no-repeat center 40%">
  <!-- Empty -->
</section>

<section id="receitas">
  <div class="container">
    <div class="row">
      <h3 class="museo-500"><?php the_title(); ?></h3>
      <?php
        // If have posts, show them
        if($receitas_query->have_posts()):
          // Creating a number variable
          $number = 1;
          while($receitas_query->have_posts()): $receitas_query->the_post(); 
          // Check if $number is a even or a odd number
          // If is odd, then this col won't have a ".col-sm-offset-*" class
          if ($number % 2 == 0):
            echo "<div class='col-sm-5 receita-wrapper'>";
          // If is even, then put "col-sm-offset-1" class
          else :
            echo "<div class='col-sm-offset-1 col-sm-5 receita-wrapper'>";
          // End if
          endif; ?>
  					<a class="receita-img-link" href="<?php the_permalink(); ?>"><?php the_post_thumbnail("full"); ?></a>
  					<div class="receita-info-box museo-300">
  						<?php
  							the_title("<h5 class='museo-700'><a href='" . esc_html(get_permalink()) ."' title='" . esc_html(get_the_title()) . "'><em>", "</em></a></h5>");
  							the_excerpt();
  						?>
  					</div>
  				</div>
        <?php 
          $number++;
          endwhile;
          wp_reset_postdata();
        
        // If not have posts show this fallback message
        else:
          echo "<div class='fallback-alert'><h2>Não existe conteúdo cadastrado em 'Receitas'</h2><p>Crie um post dentro dentro dessa area para que ele apareça aqui e essa mensagem desapareça</div>";
        endif;
      ?>
    </div>
  </div>
</section>

<?php
get_footer();