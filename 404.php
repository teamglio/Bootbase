<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package WordPress
 * @subpackage BootstrapWP
 */
get_header(); ?>
<div id="fullpage">
<div id="fullpage-inside" class="full-cover-image not-found">
<div class="container">

   <div class="row content">
       <div class="col-md-12">
          <div class="centered">Page Not Found</div>
            <div class="centered col-md-4 col-md-offset-4">
              <form role="search" method="get" id="searchform" action="<?php echo get_bloginfo('url'); ?>">
                  <input class="form-control" type="text" name="s" id="s" placeholder="type here to search">
                  <!-- <input type="submit" value="Search" id="searchsubmit"> -->
              </form>
           </div>
       </div>     
    </div><!--/.row -->
</div>
</div> <!--/.full-cover-image -->
</div>
<br style="clear:both;" />
<?php get_footer(); ?>