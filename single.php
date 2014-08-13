<?php
/**
 * Default Post Template
 * Description: Post template with a content container and right sidebar.
 *
 * @package WordPress
 * @subpackage BootstrapWP
 */
get_header(); ?>
<?php while (have_posts()) : the_post(); ?>
<div class="container">
    <div class="page-feature">
    <?php
    if ( '' != get_the_post_thumbnail() ) {
        $image_id = get_post_thumbnail_id();
        $image_url = wp_get_attachment_image_src($image_id,'bootbase-1140', true);

        echo '<img src="' . $image_url[0] . '">';

    }  
    ?>
    </div>
</div>

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
        <blockquote class="meta"><?php echo bootstrapwp_posted_on();?></blockquote>
            <?php the_content(); ?>
            <?php wp_link_pages( array('before' => '<div class="page-links">' . __('Pages:', 'bootstrapwp'), 'after' => '</div>')); ?>
            <?php edit_post_link(__('Edit', 'bootstrapwp'), '<span class="edit-link">', '</span>'); ?>

            <?php endwhile; // end of the loop. ?>
            <?php comments_template(); ?>
        </div><!-- /.col-md-8 -->

        <?php get_sidebar('blog'); ?>
    </div>
</div>
    <?php get_footer(); ?>