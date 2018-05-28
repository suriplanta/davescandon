<?php get_header('front'); ?>
<div class="slider">
  <!-- header -->
  <header class="slide-header slide-flex-center">
    <div class="menu slide-header-item">
      <nav>
        <?php
        $args = array(
          'theme_location' => 'front',
          'container' => 'ul',
          'menu_class' => 'main-nav'
        );
        wp_nav_menu($args);
        ?>
      </nav>
    </div>
    <div class="logo slide-header-item">
      <h2><?php bloginfo('name'); ?></h2>
      <h5 class="tagline"><?php bloginfo('description'); ?></h5>
    </div>
    <div class="lang gallery slide-header-item">©<?php echo date('Y'); ?>. Todos los derechos reservados.</div>
  </header>
  <!--slide 1-->
  <div class="slide slide-right slide-1">
    <?php
      // Random PIC
      $path = "wp-content/uploads/cover"; 
      function random_pic($dir) {
          $files = glob($dir . '/*.jpg');
          $file = array_rand($files);
          return $files[$file];
      }    
    ?>
    <img src="<?php bloginfo('url');?>/<?php echo random_pic($path); ?>" alt="David Escandon" class="cover-image">
  </div>
  <!--slide 2-->
  <div class="slide slide-right slide-2 slide-center-single">
    <div class="slide-content slide-header-item-single">
      <?php
      // the query
      $the_query = new WP_Query(array("pagename" => "intro")); ?>
      <?php if ( $the_query->have_posts() ) : ?>
      <!-- the loop -->
      <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
      <div class="profile-img text-center">
        <?php the_post_thumbnail('profile-pic', array( 'class' => "img-circle img-fluid mx-auto d-block rounded-circle")); ?>
      </div>
      <h1 class="sm-size"><?php the_title(); ?></h1>
      <?php the_content(); ?>
      <?php if(get_theme_mod('facebook') || get_theme_mod('twitter') || get_theme_mod('instagram') || get_theme_mod('linkedin')) { ?>
      <div class="text-center fa-3x">
        <?php if(get_theme_mod('linkedin')) { ?>
        <a href="<?php echo get_theme_mod('linkedin'); ?>" class="sm-icon sm-linkedin" target="_blank"><i class="fab fa-linkedin-in" data-fa-transform="shrink-6" data-fa-mask="fas fa-circle"></i></a>
        <?php } ?>
        <?php if(get_theme_mod('facebook')) { ?>
        <a href="<?php echo get_theme_mod('facebook'); ?>" class="sm-icon sm-facebook" target="_blank"><i class="fab fa-facebook-f" data-fa-transform="shrink-6" data-fa-mask="fas fa-circle"></i></a>
        <?php } ?>
        <?php if(get_theme_mod('twitter')) { ?>
        <a href="<?php echo get_theme_mod('twitter'); ?>" class="sm-icon sm-twitter" target="_blank"><i class="fab fa-twitter" data-fa-transform="shrink-6" data-fa-mask="fas fa-circle"></i></a>
        <?php } ?>
        <?php if(get_theme_mod('instagram')) { ?>
        <a href="<?php echo get_theme_mod('instagram'); ?>" class="sm-icon sm-instagram" target="_blank"><i class="fab fa-instagram" data-fa-transform="shrink-6" data-fa-mask="fas fa-circle"></i></a>
        <?php } ?>
      </div>
      <?php } ?>
      <?php endwhile; ?>
      <!-- end of the loop -->
      <!-- pagination here -->
      <?php wp_reset_postdata(); ?>
      <?php else : ?>
      <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
      <?php endif; ?>
    </div>
  </div>
  <!--slide 3-->
  <div class="slide slide-right slide-3 slide-center-single">
    <div class="half-block slide-center-single">
      <div class="slide-content slide-header-item-single">
        <?php
        // the query
        $the_query = new WP_Query(array("pagename" => "digital-marketing")); ?>
        <?php if ( $the_query->have_posts() ) : ?>
        <!-- the loop -->
        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
        <h1 class="sm-size"><?php the_title(); ?></h1>
        <?php the_content(); ?>
        <?php endwhile; ?>
        <!-- end of the loop -->
        <!-- pagination here -->
        <?php wp_reset_postdata(); ?>
        <?php else : ?>
        <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
        <?php endif; ?>
      </div>
    </div>
    <div class="half-block image-grid">
      <?php
      // the query
      $the_query = new WP_Query(array("category_name" => "digital-marketing", 'posts_per_page' => 8)); ?>
      <?php if ( $the_query->have_posts() ) : ?>
      <!-- the loop -->
      <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
      <div class="grid-block">
        <?php the_post_thumbnail('home-teaser'); ?>
        <div class="grid-description">
          <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        </div>
      </div>
      <?php endwhile; ?>
      <!-- end of the loop -->
      <!-- pagination here -->
      <?php wp_reset_postdata(); ?>
      <?php else : ?>
      <div class="post-placeholder">
        <img src="https://source.unsplash.com/1600x900/?digital" alt="Marketing">
      </div>
      <?php endif; ?>
    </div>
  </div>
  <!--slide 4-->
  <div class="slide slide-right slide-4 slide-flex-center">
    <div class="half-block slide-center-single">
      <div class="slide-content slide-header-item-single">
        <?php
        // the query
        $the_query = new WP_Query(array("pagename" => "ux-ui-design")); ?>
        <?php if ( $the_query->have_posts() ) : ?>
        <!-- the loop -->
        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
        <h1 class="sm-size"><?php the_title(); ?></h1>
        <?php the_content(); ?>
        <?php endwhile; ?>
        <!-- end of the loop -->
        <!-- pagination here -->
        <?php wp_reset_postdata(); ?>
        <?php else : ?>
        <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
        <?php endif; ?>
      </div>
    </div>
    <div class="half-block image-grid">
      <?php
      // the query
      $the_query = new WP_Query(array("category_name" => "ux-ui", 'posts_per_page' => 8)); ?>
      <?php if ( $the_query->have_posts() ) : ?>
      <!-- the loop -->
      <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
      <div class="grid-block">
        <?php the_post_thumbnail('home-teaser'); ?>
        <div class="grid-description">
          <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        </div>
      </div>
      <?php endwhile; ?>
      <!-- end of the loop -->
      <!-- pagination here -->
      <?php wp_reset_postdata(); ?>
      <?php else : ?>
      <div class="post-placeholder">
        <img src="https://source.unsplash.com/1600x900/?website" alt="Marketing">
      </div>
      <?php endif; ?>
    </div>
  </div>
  <!--slide 5-->
  <div class="slide slide-right slide-5 slide-flex-center">
    <div class="half-block slide-center-single">
      <div class="slide-content slide-header-item-single">
        <?php
        // the query
        $the_query = new WP_Query(array("pagename" => "frontend-dev")); ?>
        <?php if ( $the_query->have_posts() ) : ?>
        <!-- the loop -->
        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
        <h1 class="sm-size"><?php the_title(); ?></h1>
        <?php the_content(); ?>
        <?php endwhile; ?>
        <!-- end of the loop -->
        <!-- pagination here -->
        <?php wp_reset_postdata(); ?>
        <?php else : ?>
        <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
        <?php endif; ?>
      </div>
    </div>
    <div class="half-block image-grid">
      <?php
      // the query
      $the_query = new WP_Query(array("category_name" => "frontend", 'posts_per_page' => 8)); ?>
      <?php if ( $the_query->have_posts() ) : ?>
      <!-- the loop -->
      <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
      <div class="grid-block">
        <?php the_post_thumbnail('home-teaser'); ?>
        <div class="grid-description">
          <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        </div>
      </div>
      <?php endwhile; ?>
      <!-- end of the loop -->
      <!-- pagination here -->
      <?php wp_reset_postdata(); ?>
      <?php else : ?>
      <div class="post-placeholder">
        <img src="https://source.unsplash.com/1600x900/?code" alt="Marketing">
      </div>
      <?php endif; ?>
    </div>
  </div>
  <!--slide 6-->
  <div class="slide slide-right slide-6 slide-flex-center">
    <div class="serp">
      <div class="serp-header">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-2 serp-logo-cont"><img src="<?php bloginfo('template_directory');?>/img/serp-search.svg" alt="Search" class="img-fluid serp-logo"></div>
            <div class="col-sm-10">
              <i class="fas fa-search search-ico"></i><i class="fas fa-microphone search-ico"></i>
              <div class="search-block">
                <form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get" id="searchform">
                  <input type="search" name="s" id="s" placeholder="Search Engine Optimization">
                </form>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="offset-1 col-10">
              <ul class="serp-cat">
                <li class="active">Todo</li>
                <li>Imágenes</li>
                <li>Noticias</li>
                <li>Mapas</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="serp-body">
        <div class="container-fluid">
          <div class="row">
            <div class="offset-1 col-10">
              <div class="result-stats">Cerca de <?php echo number_format(mt_rand(10000,1000000),0,",","."); ?> resultados (0,<?php echo mt_rand(10,99); ?> segundos)</div>
            </div>
          </div>
          <div class="row serp-results">
            <div class="offset-sm-1 col-sm-9">
              <div class="serp-result">
                <?php
                // the query
                $the_query = new WP_Query(array("pagename" => "search-engine-optimization")); ?>
                <?php if ( $the_query->have_posts() ) : ?>
                <!-- the loop -->
                <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                <h3><a href="#"><?php the_title(); ?></a></h3>
                <div class="serp-url"><?php echo substr(site_url(), 7); ?></div>
                <div class="serp-description"><?php echo substr(get_the_content(), 0, 155); ?></div>
                <div class="site-pages">
                  <div class="row">
                    <div class="col-sm-5 offset-sm-1">
                      <div class="site-pages-result">
                        <h3><a href="#"><?php echo get_post_meta(get_the_ID(), 'subtitle1', true); ?></a></h3>
                        <div class="serp-description"><?php echo get_post_meta(get_the_ID(), 'subtitle1_text', true); ?></div>
                      </div>
                      <div class="site-pages-result">
                        <h3><a href="#"><?php echo get_post_meta(get_the_ID(), 'subtitle2', true); ?></a></h3>
                        <div class="serp-description"><?php echo get_post_meta(get_the_ID(), 'subtitle2_text', true); ?></div>
                      </div>
                      <div class="site-pages-result">
                        <h3><a href="#"><?php echo get_post_meta(get_the_ID(), 'subtitle3', true); ?></a></h3>
                        <div class="serp-description"><?php echo get_post_meta(get_the_ID(), 'subtitle3_text', true); ?></div>
                      </div>
                    </div>
                    <div class="col-sm-5 offset-sm-1">
                      <div class="site-pages-result">
                        <h3><a href="#"><?php echo get_post_meta(get_the_ID(), 'subtitle4', true); ?></a></h3>
                        <div class="serp-description"><?php echo get_post_meta(get_the_ID(), 'subtitle4_text', true); ?></div>
                      </div>
                      <div class="site-pages-result">
                        <h3><a href="#"><?php echo get_post_meta(get_the_ID(), 'subtitle5', true); ?></a></h3>
                        <div class="serp-description"><?php echo get_post_meta(get_the_ID(), 'subtitle5_text', true); ?></div>
                      </div>
                      <div class="site-pages-result">
                        <h3><a href="#"><?php echo get_post_meta(get_the_ID(), 'subtitle6', true); ?></a></h3>
                        <div class="serp-description"><?php echo get_post_meta(get_the_ID(), 'subtitle6_text', true); ?></div>
                      </div>
                    </div>
                  </div>
                </div>
                <?php endwhile; ?>
                <!-- end of the loop -->
                <!-- pagination here -->
                <?php wp_reset_postdata(); ?>
                <?php else : ?>
                <p></p>
                <?php endif; ?>
              </div>
              
              <?php
              // the query
              $the_query = new WP_Query(array("category_name" => "seo", 'posts_per_page' => 3)); ?>
              <?php if ( $the_query->have_posts() ) : ?>
              <!-- the loop -->
              <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
              <div class="serp-result">
                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <div class="serp-url"><?php echo substr(get_the_permalink(), 7); ?></div>
                <div class="serp-description"><?php echo substr(get_the_content(), 0, 155); ?></div>
              </div>
              <?php endwhile; ?>
              <!-- end of the loop -->
              <!-- pagination here -->
              <?php wp_reset_postdata(); ?>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--slide 7-->
  <div class="slide slide-right slide-7 slide-center-single">
    <div class="slide-content slide-header-item-single">
      <?php
      // the query
      $the_query = new WP_Query(array("pagename" => "contacto")); ?>
      <?php if ( $the_query->have_posts() ) : ?>
      <!-- the loop -->
      <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
      <h1 class="sm-size"><?php the_title(); ?></h1>
      <?php the_content(); ?>
      <?php endwhile; ?>
      <!-- end of the loop -->
      <!-- pagination here -->
      <?php wp_reset_postdata(); ?>
      <?php else : ?>
      <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
      <?php endif; ?>
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-8 offset-sm-2">
            <div class="contact-form-wrapper">
              <?php if(get_theme_mod('contact_form_code')) { 
                echo do_shortcode(get_theme_mod('contact_form_code'));  
              } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php get_footer('front'); ?>