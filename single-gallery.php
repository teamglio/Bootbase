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
<div class="page-feature"></div>

  <div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php if (function_exists('bootstrapwp_breadcrumbs')) {
            bootstrapwp_breadcrumbs();
        } ?>
        </div><!--/.span12 -->
    </div><!--/.row -->

    <div class="container">
    <div class="full-width-content">
          <div class="content">
                <div class="row">
                <div class="col-md-5">
                <?php
                if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
                            $image_id = get_post_thumbnail_id();
                            $image_url = wp_get_attachment_image_src($image_id,'bootbase-square-500', true);
                            $image_full = wp_get_attachment_image_src($image_id,'full', true);
                    
                ?>
                <a class='images' href='<?php echo $image_full[0]; ?>'><img width="100%" src="<?php echo $image_url[0]; ?>" ></a>
                <?php 
                    } //endiff
              
                        ?>
                        <header class="page-title">
                        <h3><?php the_title();?></h3>
                        </header>
                        <?php the_content(); ?>

                    
                </div>
                <div class="col-md-7">
               
                <div class="row span-overflow">
                    
            <?php 
                $images = rwmb_meta( 'bootbase_gallery_images', 'type=image' );
                    foreach ( $images as $image )
                        {
                        ?>
                          <div class="col-md-4 gallery-image">
                          <?php
                          echo "<a class='images' href='{$image['full_url']}' data-toggle='tooltip' data-placement='top' data-animation='true' title='{$image['caption']}' ><img src='{$image['url']}' width='100%'/></a>";
                          ?>
                          </div>
                        <?php
                        }
                        ?>
                    </div> <!-- row -->
         
                </div> <!-- Span -->

               
                <?php bootstrapwp_content_nav('nav-below'); ?>
        
            </div> <!-- Span -->

                <?php edit_post_link(__('Edit', 'bootstrapwp'), '<span class="edit-link">', '</span>'); ?>
                
        </div> <!-- row -->
    </div>
    </div>
    </div>

<?php endwhile; // end of the loop. 
?>
    <?php get_footer(); ?>