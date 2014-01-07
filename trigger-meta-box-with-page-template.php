<?php
/**
 * Template Name: Trigger Meta Box
 * Description: Trigger meta box on page template.
 *
 * @package WordPress
 * @subpackage BootstrapWP
 */
get_header(); ?>
<?php while (have_posts()) : the_post();
//META
$meta_text = rwmb_meta('bootbase_test_text');
?>
<div class="container">

    <div class="row">
        <div class="col-md-12">
            <?php if (function_exists('bootstrapwp_breadcrumbs')) {
            bootstrapwp_breadcrumbs();
        } ?>
        </div><!--/.span12 -->
    </div><!--/.row -->

    <div class="row content">
        <div class="col-md-8">
            <header class="page-title">
                <h1><?php the_title();?></h1>
            </header>
            <?php echo $meta_text; ?>
            <?php the_content(); ?>
            <?php wp_link_pages( array('before' => '<div class="page-links">' . __('Pages:', 'bootstrapwp'), 'after' => '</div>')); ?>
            <?php edit_post_link(__('Edit', 'bootstrapwp'), '<span class="edit-link">', '</span>'); ?>
            <?php endwhile; // end of the loop. ?>
        </div><!-- /.col-md-8 -->

        <?php get_sidebar(); ?>
    </div>
</div>
    <?php get_footer(); ?>