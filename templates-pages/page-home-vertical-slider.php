<?php
/**
 * Template Name: Home Page - Vertical slider
 * Description: The sites home page.
 *
 * @package WordPress
 * @subpackage BootstrapWP
 */
get_header(); ?>

<div class="container frontpage">
<div class="slider" id="hero">
    <div id="screens">
    
    <?php

// Blog post query
$counter = 0;
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
query_posts( array( 'post_type' => 'slider', 'paged'=>$paged, 'showposts'=>3) );
if (have_posts()) : while ( have_posts() ) : the_post();
//slider images
$image_id = get_post_thumbnail_id();
$image_url = wp_get_attachment_image_src($image_id,'bootbase-v-500', true);
$images = rwmb_meta( 'bootbase_vertical_slider_images', 'type=image' );
//META
$thelink = get_post_meta($post->ID, 'custompress_hp_link_to', flase );
$counter++;
?>
    <div id="panel_<?php echo $counter; ?>" class="vertical-panel col-md-4">
        <?php 
        
            foreach ( $images as $image )
                {
                $image_src = wp_get_attachment_image_src( $image['ID'], 'bootbase-v-500' );
                ?>
                    <dl class="panel-slide"> 
                        <dt style="display: block;"> <img src="<?php echo $image_src[0]; ?>" /> </dt>
                    </dl>
                <?php
                }
        ?>
    </div>

<?php endwhile; endif; ?>
<?php wp_reset_query(); ?> 

    </div> <!-- END SCREENS -->
</div> <!-- END SLIDER -->


    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <div class="home-content">
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