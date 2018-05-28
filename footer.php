<!-- Footer -->
<section>
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="post-categories">
          <?php // wp_list_categories(array("title_li" => "")); ?>
          <ul>
            <?php 
            $tags = get_tags();
            foreach ($tags as $tag) {
            ?>
            <li><a href="<?php echo get_tag_link($tag->term_id) ?>"><?php echo $tag->name; ?></a></li>
            <?php } ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
<footer class="section-block">
  <div class="container">
    <div class="row">
      <div class="col text-center">
        <nav class="footer-menu">
          <ul>
            <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Sobre mí</a></li>
            <li><a href="#" data-toggle="modal" data-target="#contactModal">Contacto</a></li>
          </ul>
        </nav>
        <?php if(get_theme_mod('facebook') || get_theme_mod('twitter') || get_theme_mod('instagram') || get_theme_mod('linkedin')) { ?>
        <div class="footer-block fa-3x">
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
        <div class="copyright">©<?php echo date('Y'); ?>. Todos los derechos reservados.</div>
      </div>
    </div>
  </div>
</footer>
<!-- / Footer -->
<!-- Contact Modal -->
<div class="modal fade" id="contactModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <?php
        // the query
        $the_query = new WP_Query(array("pagename" => "contacto")); ?>
        <?php if ( $the_query->have_posts() ) : ?>
        <!-- the loop -->
        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
        <h3 class="modal-title text-center" id="exampleModalLongTitle"><?php the_title(); ?></h3>
        <?php endwhile; ?>
        <!-- end of the loop -->
        <!-- pagination here -->
        <?php wp_reset_postdata(); ?>
        <?php else : ?>
        <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
        <?php endif; ?>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <div class="row">
            <div class="col">
              <div class="contact-intro">
                <?php
                // the query
                $the_query = new WP_Query(array("pagename" => "contacto")); ?>
                <?php if ( $the_query->have_posts() ) : ?>
                <!-- the loop -->
                <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                <p><?php echo get_the_content(); ?></p>
                <?php endwhile; ?>
                <!-- end of the loop -->
                <!-- pagination here -->
                <?php wp_reset_postdata(); ?>
                <?php else : ?>
                <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
                <?php endif; ?>
              </div>
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
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="<?php bloginfo('template_directory');?>/js/scripts-blog.js"></script>
<?php wp_footer(); ?>
</body>
</html>