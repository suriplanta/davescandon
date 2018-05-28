<?php get_header(); ?>
  <!-- Main Content -->
  <main>
    <article>
      <div class="container">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <div class="row">
          <div class="offset-sm-2 col-sm-8">
            <div class="post-cat"><a href="#"><?php echo get_the_category_list(', '); ?></a></div>
            <div class="post-title">
              <h1><?php the_title(); ?></h1>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <div class="post-img">
              <?php the_post_thumbnail('index-single', array( 'class' => "img-fluid")); ?>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="offset-sm-2 col-sm-8">
            <div class="post-date"><?php the_time('F j, Y'); ?> · <?php the_author(); ?></div>
            <div class="post-content">
              <?php the_content(); ?>
              <p class="post-tags"><i class="fas fa-tags"></i> Etiquetas: <?php echo get_the_tag_list('',', ',''); ?></p>
            </div>
            <div class="post-comments" id="disqus_thread"></div>
          </div>
        </div>
        <?php endwhile; else : ?>
        <div class="row">
          <div class="offset-sm-2 col-sm-8">
            <div class="post-title">
              <h1><?php _e( 'Sorry, no posts matched your criteria.' ); ?></h1>
            </div>
          </div>
        </div>
        <?php endif; ?>
      </div>
    </article>
  </main>
          <?php
            $orig_post = $post;
            global $post;
            $tags = wp_get_post_tags($post->ID);

            if ($tags) {
            $tag_ids = array();
            foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
            $args=array(
            'tag__in' => $tag_ids,
            'post__not_in' => array($post->ID),
            'posts_per_page' => 3, // Number of related posts to display.
            'caller_get_posts' => 1,
            'orderby' => 'rand'
            );

            $my_query = new wp_query( $args );
            
            if($my_query->have_posts()) { ?>
            <section class="related-posts">
              <div class="container">
                <div class="row">
                  <div class="col">
                    <h3 class="text-center related-header">Posts relacionados</h3>
                      <?php

                      while( $my_query->have_posts() ) {
                      $my_query->the_post();
                      ?>            
                      <div class="col-sm-4">
                        <div class="post-teaser">
                          <div class="post-teaser-img">
                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('index-teaser', array( 'class' => "img-fluid")); ?></a>
                          </div>
                          <div class="post-teaser-text">
                            <div class="post-teaser-cat">
                              <?php echo get_the_category_list(', '); ?>
                            </div>
                            <div class="post-teaser-title">
                              <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            </div>
                            <div class="post-teaser-date">
                              <p><?php the_time('F j, Y'); ?></p>
                            </div>
                          </div>
                        </div>
                      </div>

                      <?php } ?>
                  </div>
                </div>
              </div>
            </section> 
            <?php  }
            }
            $post = $orig_post;
            wp_reset_query();
            ?>
  <!-- Go to www.addthis.com/dashboard to customize your tools --> <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5b04cf9caac880f3"></script>
  <script>

  /**
  *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
  *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
  /*
  var disqus_config = function () {
  this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
  this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
  };
  */
  (function() { // DON'T EDIT BELOW THIS LINE
  var d = document, s = d.createElement('script');
  s.src = 'https://davescandon.disqus.com/embed.js';
  s.setAttribute('data-timestamp', +new Date());
  (d.head || d.body).appendChild(s);
  })();
  </script>
  <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
<?php get_footer(); ?>