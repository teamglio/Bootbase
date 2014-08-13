<?php
/**
 * Template Name: Page - With map
 * Description: Page template with a content container and right sidebar.
 *
 * @package WordPress
 * @subpackage BootstrapWP
 */
get_header(); ?>
<?php while (have_posts()) : the_post();
global $NHP_Options;
$theme_options = $NHP_Options->options;
$lat = $theme_options['contact_map_lat'];
$lng = $theme_options['contact_map_lng'];
$zoom = $theme_options['contact_map_zoom'];
?>
<div class="container">
    <div class="page-feature">
    <?php if (!empty($lat) && !empty($lng)) { ?>

                    <div id="themap">
                    
                        <script>
                            function initialize() {
                              var myLatlng = new google.maps.LatLng(<?php echo $lat; ?>, <?php echo $lng; ?>);
                              var myOptions = {
                                zoom: <?php if (!empty($zoom)) { echo $zoom; } else { echo "14";}  ?>,
                                center: myLatlng,
                                scrollwheel: false,
                                mapTypeId: google.maps.MapTypeId.ROADMAP
                              }
                              var map = new google.maps.Map(document.getElementById("themap"), myOptions);
                              var marker = new google.maps.Marker({
                                  position: myLatlng,
                                  map: map,
                                  title: '<?php bloginfo('name'); ?>'
                              });
                            }

                            function loadScript() {
                              var script = document.createElement("script");
                              script.type = "text/javascript";
                              script.src = "http://maps.google.com/maps/api/js?sensor=false&callback=initialize";
                              document.body.appendChild(script);
                            }

                            window.onload = loadScript;
                        </script>

                </div>
        <?php } ?>
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
            <?php the_content(); ?>
            <?php wp_link_pages( array('before' => '<div class="page-links">' . __('Pages:', 'bootstrapwp'), 'after' => '</div>')); ?>
            <?php edit_post_link(__('Edit', 'bootstrapwp'), '<span class="edit-link">', '</span>'); ?>
            <?php endwhile; // end of the loop. ?>
        </div><!-- /.col-md-8 -->

        <?php get_sidebar(); ?>
    </div>
</div>
    <?php get_footer(); ?>