<?php
/**
 * Search Results Template
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
            <?php if (have_posts()) : ?>
                 <header class="post-title">
                     <h1><?php printf( __('Search Results for: %s', 'bootstrapwp'),'<span>' . get_search_query() . '</span>'); ?></h1>
                 </header>

    		  <?php while (have_posts()) : the_post(); ?>
                <div class="panel panel-default">

                        <div class="panel-body">
                                
                                    <a href="<?php the_permalink(); ?>" title="<?php the_title();?>"><h3 class="post-list-title"><?php the_title();?></h3></a>
                                    <?php the_excerpt(); ?>
                                
                        </div><!-- /.panel-dody -->

                    
                </div><!-- /.panel -->
             <?php endwhile; ?>

            <?php else : ?>
            	<div class="row content">
                    <div class="col-md-12">
                        <header class="post-title">
                            <h1><?php _e('No Results Found', 'bootstrapwp'); ?></h1>
                        </header>
                        <p class="lead">
                            <?php _e(
                                'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps you should try again with a different search term.',
                                'bootstrapwp'); ?>
                        </p>
                        <div class="well">
                            <?php get_search_form(); ?>
                        </div><!--/.well -->
                    </div>
                </div>    

             <?php bootstrapwp_content_nav('nav-below');?>

            <?php endif; ?>
            </div>
        <?php get_sidebar(); ?>
    </div>
</div>
    <?php get_footer(); ?>