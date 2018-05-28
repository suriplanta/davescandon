<!doctype html>
<html <?php language_attributes(); ?> class="post-layout">

<head>
  <!-- Required meta tags -->
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script defer src="https://use.fontawesome.com/releases/v5.0.4/js/all.js"></script>
  <link rel="stylesheet" href="<?php bloginfo('template_directory');?>/css/styles.css">
  <?php wp_head(); ?>
</head>

<body <?php body_class( "post-layout"); ?>>
  <!-- Header -->
  <header class="section-block">
    <div class="container">
      <div class="row">
        <div class="offset-2 col-8">
          <div class="logo-post text-center">
            <h2>
              <a href="<?php echo esc_url(home_url('blog')); ?>">
                <?php bloginfo('name');?>
              </a>
            </h2>
            <h5 class="tagline">
              <?php bloginfo('description');?>
            </h5>
          </div>
        </div>
        <div class="col-2 align-self-center">
          <div class="search-ico text-right">
            <a id="toggleSearch"><i class="fas fa-search"></i></a>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- / Header -->
  <!-- Search Form -->
  <div class="search-block-post">
    <div class="container">
      <div class="row">
        <div class="offset-sm-3 col-sm-6">
          <?php get_search_form(); ?>
        </div>
      </div>
    </div>
  </div>
  <!-- /Search Form -->