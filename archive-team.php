<?php
/**
 * Default Post Template
 * Description: Post template with a content container and right sidebar.
 *
 * @package WordPress
 * @subpackage BootstrapWP
 */
get_header(); ?>
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

                <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    query_posts( array( 'post_type' => 'team', 'paged'=>$paged, 'showposts'=>-1) );
                    if (have_posts()) : while ( have_posts() ) : the_post(); 
                    
                $featured = rwmb_meta('bootbase_member_featured');
                if ($featured == true) {
                	# We list person
                $position = rwmb_meta('bootbase_member_position');
                if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
                            $image_id = get_post_thumbnail_id();
                            $image_url = wp_get_attachment_image_src($image_id,'bootbase-square-500', true);
                            $image_full = wp_get_attachment_image_src($image_id,'full', true);
                    
                ?>
                <a class='images' href='<?php echo $image_full[0]; ?>'><img width="100%" src="<?php echo $image_url[0]; ?>" ></a>
                <?php 
                    } //endiff
                 ?>
                        <div class="member-info">
			                <h3><?php the_title();?></h3>
			                <?php if (!empty($position)) { ?>
			                <p class="member-position"><?php echo $position; ?></p>
			                <?php } ?>
			            </div>
                        <?php the_content(); ?>

                 <?php 
                        // Prevent weirdness
                        wp_reset_postdata();
                    } # End of featured person
                        endwhile; endif;
                ?>
                </div> <!-- end col-md-5 -->
                <div class="col-md-7">
               
                	<div class="row span-overflow">

                	<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    query_posts( array( 'post_type' => 'team', 'paged'=>$paged, 'showposts'=>-1) );
                    if (have_posts()) : while ( have_posts() ) : the_post();

                	$featured = rwmb_meta('bootbase_member_featured');
			                if ($featured == false) {
			                	# We list person
                	?>

		                <div class="col-md-6 team-image">
		                    <?php
		                    $position = rwmb_meta('bootbase_member_position');
			                if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
			                            $image_id = get_post_thumbnail_id();
			                            $image_url = wp_get_attachment_image_src($image_id,'bootbase-square-500', true);
			                            $image_full = wp_get_attachment_image_src($image_id,'full', true);
			                    
			                ?>
			                <a class='images' href='<?php echo $image_full[0]; ?>'><img width="100%" src="<?php echo $image_url[0]; ?>" ></a>
			                <div class="member-info">
			                <h4><?php the_title();?></h4>
			                <?php if (!empty($position)) { ?>
			                <p class="member-position"><?php echo $position; ?></p>
			                <?php } else { ?>
			                <p style="display:block; height:20px;"></p>
			                <?php } ?>
			            </div>
			                <?php
			                    } //endiff
			                ?>
		    			</div>

			    		<?php 
	                        // Prevent weirdness
	                        wp_reset_postdata();
		                    } # End of person
		                     endwhile; endif;
		                ?>

                    </div> <!-- row -->
         
                </div> <!-- end col-md-7 -->
        
            </div> <!-- Span -->
                
        </div> <!-- row -->

    </div>
    </div>
    </div>
    <?php get_footer(); ?>