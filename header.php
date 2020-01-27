<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= wp_title() ?></title>
    <?php wp_head(); ?>
</head>

<body id="page-top" <?php body_class(); ?>>
    <!-- Navigation -->
    <input type='hidden' value='<?= is_front_page() ? "" : "navbar-scrolled" ?> ' id='wp_is_front_page'>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="#page-top">
              <img src='<?= get_site_icon_url('32') ?>' class='img-fluid'> <?= get_bloginfo( 'name' ); ?>
            </a>
            <button
            class="navbar-toggler navbar-toggler-right"
            type="button"
            data-toggle="collapse"
            data-target="#navbarResponsive"
            aria-controls="navbarResponsive"
            aria-expanded="false"
            aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
              <?php
                  wp_nav_menu(array(
                      'theme_location' => 'header-menu',
                      'menu_class' => 'navbar-nav ml-auto my-2 my-lg-0',
                      'anchor_class' => 'nav-link js-scroll-trigger',
                      'li_class' => 'nav-item',
                      'container_class' => 'nav navbar-nav ml-auto'
                  ));
              ?>
            </div>
        </div>
    </nav>
