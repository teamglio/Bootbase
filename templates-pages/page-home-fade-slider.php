<?php
/**
 * Template Name: Home Page - fade slider
 * Description: The sites home page.
 *
 * @package WordPress
 * @subpackage BootstrapWP
 */
get_header(); ?>

<div class="container">
<div class="slider">
    <ul class="rslides">
    <?php

// Blog post query
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
query_posts( array( 'post_type' => 'slider', 'paged'=>$paged, 'showposts'=>-1) );
if (have_posts()) : while ( have_posts() ) : the_post();
//slider images
$image_id = get_post_thumbnail_id();
$image_url = wp_get_attachment_image_src($image_id,'bootbase-1140', true);
//META
$thelink = get_post_meta($post->ID, 'custompress_hp_link_to', flase );
?>

  <li>
    <img src="<?php echo $image_url[0]; ?>">
    <div class="slide-title">
    <?php 
    if (!empty($thelink)) {
        echo '<a href="' . $thelink . '">';
        the_title();
        echo '</a>';
    } else {
        the_title();
    }
    ?>
    </div>
  </li>

<?php endwhile; endif; ?>
<?php wp_reset_query(); ?> 
    </ul>
</div> <!-- END SLIDER -->

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <div class="jumbotron">
                <?php the_content(); ?>
        </div><!--/.hero-unit -->

    <?php endwhile; endif; ?>

    <div class="row the-clear">
        <?php
                if ( is_active_sidebar( 'home-left' ) ) {
                    ?>
                    <div class="col-md-4 centered">
                        <?php
                        if (function_exists('dynamic_sidebar')) {
                            dynamic_sidebar("home-left");
                        } ?>
                    </div>
                    <?php
                } else {
                    ?>
                    <div class="col-md-4"></div>
                    <?php
                };
            ?>
            <?php
                if ( is_active_sidebar( 'home-middle' ) ) {
                    ?>
                    <div class="col-md-4 centered">
                        <?php
                        if (function_exists('dynamic_sidebar')) {
                            dynamic_sidebar("home-middle");
                        } ?>
                    </div>
                    <?php
                } else {
                    ?>
                    <div class="col-md-4"></div>
                    <?php
                };
            ?>
            <?php
                if ( is_active_sidebar( 'home-right' ) ) {
                    ?>
                    <div class="col-md-4 centered">
                        <?php
                        if (function_exists('dynamic_sidebar')) {
                            dynamic_sidebar("home-right");
                        } ?>
                    </div>
                    <?php
                } else {
                    ?>
                    <div class="col-md-4"></div>
                    <?php
                };
            ?>
    </div><!--/.row -->
</div><!--/.container -->

<?php get_footer(); ?>