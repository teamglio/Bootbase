<?php
/**
 * Template Name: Page - Blog Template
 * Description: Displays blog posts with pagination and featured image.
 *
 * @package WordPress
 * @subpackage BootstrapWP
 */
get_header(); ?>
<div class="container">
        <div class="page-feature">
    
        </div>
        <div class="row">
            <div class="col-md-12">
                <?php if (function_exists('bootstrapwp_breadcrumbs')) {
                bootstrapwp_breadcrumbs();
            } ?>
            </div><!--/.span12 -->
        </div><!--/.row -->

    <div class="row content">
            <div class="col-md-8">
            <?php while (have_posts()) : the_post(); ?>
                <header class="page-title">
                    <h1><?php the_title();?></h1>
                </header>

                <?php the_content(); ?>
                <hr/>

            <?php // reset the loop
            endwhile;
            wp_reset_query(); ?>

            <?php // Blog post query
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            query_posts(array('post_type' => 'post', 'paged' => $paged, 'showposts' => 0));
            if (have_posts()) : while (have_posts()) : the_post(); ?>

            <div <?php post_class(); ?>>
                <div class="row">
                            <?php // Post thumbnail conditional display.
                            if ( bootstrapwp_autoset_featured_img() !== false ) : ?>
                                <div class="col-md-4">
                                    <a href="<?php the_permalink(); ?>" title="<?php  the_title_attribute( 'echo=0' ); ?>">
                                        <?php echo bootstrapwp_autoset_featured_img(); ?>
                                    </a>
                                </div>
                                <div class="col-md-8">
                            <?php else : ?>
                                <div class="col-md-12">
                            <?php endif; ?>
                                    <a href="<?php the_permalink(); ?>" title="<?php the_title();?>"><h3 class="post-list-title"><?php the_title();?></h3></a>
                                    <blockquote class="meta"><?php echo bootstrapwp_posted_on();?></blockquote>
                                    <?php the_excerpt(); ?>
                                </div>
                        </div><!-- /.row -->

                    <hr/>
                </div><!-- /.post_class -->
                <?php endwhile; ?>

                <?php bootstrapwp_content_nav('nav-below');?>

            <?php endif; ?>
            </div><!-- /.col-md-8 -->
        <?php get_sidebar('blog'); ?>
    </div>
</div>
    <?php get_footer(); ?>