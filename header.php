<?php
/**
 * Default Page Header
 *
 * @package WP-Bootstrap
 * @subpackage WP-Bootstrap
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right'); ?></title>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"/>
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri();?>/assets/ico/favicon.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144"
          href="<?php echo get_stylesheet_directory_uri();?>/assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114"
          href="<?php echo get_stylesheet_directory_uri();?>/assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72"
          href="<?php echo get_stylesheet_directory_uri();?>/assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed"
          href="<?php echo get_stylesheet_directory_uri();?>/assets/ico/apple-touch-icon-57-precomposed.png">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php 
global $bootbase_options;
$facebook = $bootbase_options['social-facebook'];
$twitter = $bootbase_options['social-twitter'];
$header_status = $bootbase_options['header-status'];
$logo = $bootbase_options['media-logo'];
$header_background_color = $bootbase_options['header-background-color'];
$header_background_image = $bootbase_options['header-background-image'];
if ($header_status == 1) {
?>
    <header class="header" style=" <?php if (!empty($header_background_image)) { ?> background-image: url(<?php echo $header_background_image['url']; ?>); <?php } if (!empty($header_background_color)) { ?> background-color:<?php echo $header_background_color; ?>; <?php } ?>"  >
        <div class="container">
            <div class="col-md-4 col-sm-4 logo">
                <a href="<?php echo home_url('/'); ?>">
            <?php if (!empty($logo['url'])) { ?>
                <img src="<?php echo $logo['url']; ?>" width="100%" />
            <?php } else { ?>
                <img src="<?php echo get_stylesheet_directory_uri();?>/assets/img/defualt-logo.png" width="100%" />
            <?php } ?>
                </a>
            </div>
            <div class="header-area col-md-8 col-sm-8">
                <div class="search">
                        <form class="form-inline pull-right" role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
                            <div class="form-group">
                                <input class="form-control" type="text" value="" name="s" id="s" placeholder="Search this site" />
                            </div>
                            <div class="form-group">
                            <button class="btn" type="submit"><i class="icon-search"></i></button>
                            </div>
                        </form>
                </div>
                <div class="social-media">
                    <div class="social-icons pull-right">
                        <?php if (!empty($youtube)) { ?>
                        <a target="_blank" href="<?php echo $youtube; ?>" class="sm-youtube"></a>
                        <?php } ?>
                        <?php if (!empty($linkedin)) { ?>
                        <a target="_blank" href="<?php echo $linkedin; ?>" class="sm-linkedin"></a>
                        <?php } ?>
                        <?php if (!empty($pinterest)) { ?>
                        <a target="_blank" href="<?php echo $pinterest; ?>" class="sm-pinterest"></a>
                        <?php } ?>
                        <?php if (!empty($instagram)) { ?>
                        <a target="_blank" href="<?php echo $instagram; ?>" class="sm-instagram"></a>
                        <?php } ?>
                        <?php if (!empty($googleplus)) { ?>
                        <a target="_blank" href="<?php echo $googleplus; ?>" class="sm-googleplus"></a>
                        <?php } ?>
                        <?php if (!empty($facebook)) { ?>
                        <a target="_blank" href="<?php echo $facebook; ?>" class="sm-facebook"></a>
                        <?php } ?>
                        <?php if (!empty($twitter)) { ?>
                        <a target="_blank" href="<?php echo $twitter; ?>" class="sm-twitter"></a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </header>
<?php } //end of if header_status ?>
    <nav class="navbar navbar-inverse navbar-static-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".main-menu">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            <?php if ($header_status == 0) { ?>
              <a class="navbar-brand" href="<?php echo home_url('/'); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home"><?php bloginfo('name'); ?></a>
            <?php } ?>
            </div>

            <?php wp_nav_menu(
            array(
                'menu' => 'main-menu',
                'container_class' => 'navbar-collapse collapse main-menu navbar-right',
                'menu_class' => 'nav navbar-nav',
                'fallback_cb' => '',
                'menu_id' => 'main-menu',
                'walker' => new Bootbase_Walker_Nav_Menu()
            )
            ); ?>
        </div>
    </nav>
    <!-- End Header. Begin Template Content -->