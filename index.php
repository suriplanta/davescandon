<?php get_header(); ?>
<!-- Main Content -->
<main class="section-block">
  <div class="container">
    <?php $i = 0; // contador ?>
    <div class="row">
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
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
      <?php $i++; // incrementar en cada ciclo el contador ?>
      <?php // si el contador es múltiplo de 3 cierra una columna y comienza otra
      if ($i % 3 == 0) {
      echo '</div><div class="row">';
      }
      ?>
      <?php endwhile; else : ?>
      <div class="col">
        <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
      </div>
      <?php endif; ?>
    </div>
  </div>
</main>
<div class="container">
  <div class="row">
    <div class="col text-center">
      <?php custom_pagination(); ?>
    </div>
  </div>
</div>
<!-- / Main Content -->
<?php get_footer(); ?>