<?php
/**
 * Template Name: Home Page - slider
 * Description: The sites home page.
 *
 * @package WordPress
 * @subpackage BootstrapWP
 */
get_header(); ?>

<div class="slider">
    
    <section class = 'iosSliderDemo'>
      
      <div class = 'fluidHeight'>
        
        <div class = 'sliderContainer'>

          <div class = 'iosSlider'>
          
            <div class = 'slider'>
<?php
// Blog post query
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
query_posts( array( 'post_type' => 'slider', 'paged'=>$paged, 'showposts'=>-1) );
if (have_posts()) : while ( have_posts() ) : the_post();
//slider images
$image_id = get_post_thumbnail_id();
$image_url = wp_get_attachment_image_src($image_id,'full', true);
//META
?>

              <div class = 'item'>
                <div class = 'inner' style="background-image: url(<?php echo $image_url[0]; ?>);">
                    <h1><?php the_title(); ?></h1>
                    <p><?php the_excerpt(); ?></p>
                </div>
              </div>

<?php endwhile; 
else :
  echo '<div class="item"><div class="inner" style="background-image: url(' . get_template_directory_uri() . '/assets/img/slider-default.jpg);"><div class="hp-slide-text-container" style="font-size:24px; font-weight:300; padding-top:195px; color: #202020;">';
  echo "<h1>Welcome to ";
  echo $blog_title = get_bloginfo('name');
  echo '</h1></div></div></div>';
endif; ?>
<?php wp_reset_query(); ?>   
          </div>
          
          <div class = 'slideSelectors'>
<?php
// Blog post query
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
query_posts( array( 'post_type' => 'slider', 'paged'=>$paged, 'showposts'=>$the_slide_num) );
if (have_posts()) : while ( have_posts() ) : the_post();
?>         

            <div class = 'item selected'></div>
            
<?php endwhile; endif; ?>
<?php wp_reset_query(); ?>        
          </div>     
          
        </div>
      
      </div>
    
    </section>

</div><!--/.slider -->
<br style="margin-bottom:20px;" />
<div class="container">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <div class="jumbotron">
                <?php the_content(); ?>
        </div><!--/.hero-unit -->

    <?php endwhile; endif; ?>

    <div class="row">
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