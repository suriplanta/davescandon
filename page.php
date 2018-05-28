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
            <div class="post-content">
              <?php the_content(); ?>
            </div>
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
  <?php get_footer(); ?>