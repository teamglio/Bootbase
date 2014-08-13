<?php
/**
 * Template Name: Home Page - large image
 * Description: The sites home page.
 *
 * @package WordPress
 * @subpackage BootstrapWP
 */
get_header(); ?>


    <?php
    if (have_posts()) : while (have_posts()) : the_post();
    $image_id = get_post_thumbnail_id();
    $image_url = wp_get_attachment_image_src($image_id,'full', true); 
    ?>
<script type="text/javascript">
 
</script>
<div id="fullpage">
<div id="fullpage-inside" class="full-cover-image under" style="background-image: url(<?php echo $image_url[0]; ?>);">

        <div class="full-cover-content over">
            <?php the_content(); ?>
        </div>
    <div class="stick-to-bottom">
        <div class="container">
            <div class="row">
            <?php
                if ( is_active_sidebar( 'home-left' ) ) {
                    ?>
                    <div class="col-md-4 centered">
                        <div class="dark-back-8">
                        <?php
                        if (function_exists('dynamic_sidebar')) {
                            dynamic_sidebar("home-left");
                        } ?>
                        </div>
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
                        <div class="dark-back-8">
                        <?php
                        if (function_exists('dynamic_sidebar')) {
                            dynamic_sidebar("home-middle");
                        } ?>
                        </div>
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
                        <div class="dark-back-8">
                        <?php
                        if (function_exists('dynamic_sidebar')) {
                            dynamic_sidebar("home-right");
                        } ?>
                        </div>
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
    </div>
</div> <!--/.full-cover-image -->
</div>
<br style="clear:both;" />
<?php endwhile; endif; ?>
<?php get_footer(); ?>