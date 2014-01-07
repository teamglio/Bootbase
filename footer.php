<?php
/**
 * Default Footer
 *
 * @package WordPress
 * @subpackage BootstrapWP
 */
?>
        <footer>
            <div class="container">
                    <?php
                    if (function_exists('dynamic_sidebar')) {
                        dynamic_sidebar("footer-content");
                    } ?>
                    <div class="footer-info"> 
                    &copy; <?php bloginfo('name'); ?> <?php echo date('Y'); ?>
                    </div>
                    <div class="social-media pull-right">
                    <?php
                    //global $bootbase_options;
                    $facebook = $theme_options['social-facebook'];
                    ?>
                        <?php if (!empty($youtube)) { ?>
                        <a target="_blank" href="<?php echo $youtube; ?>" class="sm-youtube"></a>
                        <?php } ?>
                        <?php if (!empty($linkedin)) { ?>
                        <a target="_blank" href="<?php echo $linkedin; ?>" class="sm-linkedin"></a>
                        <?php } ?>
                        <?php if (!empty($pinterest)) { ?>
                        <a target="_blank" href="<?php echo $pinterest; ?>" class="sm-pinterest"></a>
                        <?php } ?>
                        <?php if (!empty($instagram)) { ?>
                        <a target="_blank" href="<?php echo $instagram; ?>" class="sm-instagram"></a>
                        <?php } ?>
                        <?php if (!empty($googleplus)) { ?>
                        <a target="_blank" href="<?php echo $googleplus; ?>" class="sm-googleplus"></a>
                        <?php } ?>
                        <?php if (!empty($facebook)) { ?>
                        <a target="_blank" href="<?php echo $facebook; ?>" class="sm-facebook"></a>
                        <?php } ?>
                        <?php if (!empty($twitter)) { ?>
                        <a target="_blank" href="<?php echo $twitter; ?>" class="sm-twitter"></a>
                        <?php } ?>
                    </div>
                </div>
            </div><!-- /container -->
            <!-- <div class="madebyglio"><a href="http://glio.co.za">Made by Glio Digital Innovations</a></div> -->
        </footer>
        <?php wp_footer(); ?>
    </body>
</html>