<?php
/**
 * Default Page Header
 *
 * @package WP-Bootstrap
 * @subpackage WP-Bootstrap
 */
?>
<!DOCTYPE html>
<?php
    global $NHP_Options;
    $theme_options = $NHP_Options->options;
    //header options
    $site_logo = $theme_options['site_logo'];
    $header_position = $theme_options['header_position'];
    //social options
    $facebook = $theme_options['facebook'];
    $twitter = $theme_options['twitter'];
    $youtube = $theme_options['youtube'];
    $linkedin = $theme_options['linkedin'];
    $googleplus = $theme_options['googleplus'];
    $instagram = $theme_options['instagram'];
    $pinterest = $theme_options['pinterest'];
    //meta options
    $lat = $theme_options['contact_map_lat'];
    $lng = $theme_options['contact_map_lng'];
    $location_street_address = $theme_options['location_street_address'];
    $location_city = $theme_options['location_city'];
    $location_country = $theme_options['location_country'];
    $location_postal_code = $theme_options['location_postal_code'];
    $location_region = $theme_options['location_region'];
    $company_email = $theme_options['company_email'];
    $company_phone_number = $theme_options['company_phone_number'];
    $company_fax_number = $theme_options['company_fax_number'];
    $company_operating_days = $theme_options['company_operating_days'];
    $company_operating_hours_start = $theme_options['company_operating_hours_start'];
    $company_operating_hours_end = $theme_options['company_operating_hours_end'];
    $company_facebook_id = $theme_options['company_facebook_id'];

    if ($header_position == 'navbar-static-top') {
        $body_padding_top = '0px';
    } else {
        $body_padding_top = '50px';
    }
?>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right'); ?></title>
    <!--  Meta Information  -->
        <?php
        $og_url = current_page_url();
        global $post;
        if ( is_404() ) {
            $post_id = 1;
            $author_id = 1;
        } else {
            $author_id = $post->post_author;
            $post_id = $post->post_id;
        }
        $excerpt = "false";

        if (is_archive() || is_home()) {
            $keywords = $theme_options['seo_keywords'];
            $description = $theme_options['seo_description'];
            $og_type = 'website';
            $og_image = $theme_options['og_image'];
            $tw_card = 'summary';
        } elseif (is_single()) {
            $keywords = $theme_options['seo_keywords'];
            $description = "excerpt";
            $excerpt = "excerpt";
            //$article_author = get_the_author_meta( 'facebook_id', $author_id );
            $og_type = 'article';
            if ( '' != get_the_post_thumbnail() ) {
                $image_id = get_post_thumbnail_id();
                $og_image = wp_get_attachment_image_src($image_id,'large', true);
                $og_image = $og_image[0];
                $tw_card = 'summary_large_image';
            } else {
                $og_image = $theme_options['og_image'];
                $tw_card = 'summary';
            }
        } elseif (is_front_page() || is_page( 'contact-us' )) {
            $keywords = $theme_options['seo_keywords'];
            $description = $theme_options['seo_description'];
            $og_type = 'business.business';
            $og_image = $theme_options['og_image'];
            $tw_card = 'summary';
        } else {
            $keywords = $theme_options['seo_keywords'];
            $description = $theme_options['seo_description'];
            $og_type = 'website';
            if ( '' != get_the_post_thumbnail() ) {
                $image_id = get_post_thumbnail_id();
                $og_image = wp_get_attachment_image_src($image_id,'large', true);
                $og_image = $og_image[0];
                $tw_card = 'summary_large_image';
            } else {
                $og_image = $theme_options['og_image'];
                $tw_card = 'summary';
            }
        }
        ?>
        <!-- SEO -->
        <meta name="Keywords" content="<?php echo $keywords; ?>" />
        <meta name="description" content="<?php if ($description == $excerpt) { 
            $id = $post_id;
            $temp = $post;
            $post = get_post( $id );
            setup_postdata( $post );
            $myExcerpt = get_the_excerpt();
            $tags = array("<p>", "</p>");
            $myExcerpt = str_replace($tags, "", $myExcerpt);
            echo $myExcerpt;
            wp_reset_postdata();
            $post = $temp;
            } else { echo $description; } ?>" />
<!-- Open Graph -->
        <meta property="og:title" content="<?php if (is_front_page()) { bloginfo('name'); } else { wp_title( '|', true, 'right' ); } ?>" />
        <meta property="og:type" content="<?php echo $og_type; ?>" />
        <meta property="og:description" content="<?php if ($description == $excerpt) { 
            $id = $post_id;
            $temp = $post;
            $post = get_post( $id );
            setup_postdata( $post );
            $myExcerpt = get_the_excerpt();
            $tags = array("<p>", "</p>");
            $myExcerpt = str_replace($tags, "", $myExcerpt);
            echo $myExcerpt;
            wp_reset_postdata();
            $post = $temp;
            } else { echo $description; } ?>" />
        <?php if ($og_type == 'business.business') {
            ?>
            <meta property="place:location:latitude" content="<?php echo $lat; ?>" />
            <meta property="place:location:longitude" content="<?php echo $lng; ?>" />
            <meta property="business:contact_data:street_address" content="<?php echo $location_street_address; ?>" />
            <meta property="business:contact_data:locality" content="<?php echo $location_city; ?>" />
            <meta property="business:contact_data:country_name" content="<?php echo $location_country; ?>" />
            <meta property="business:contact_data:postal_code" content="<?php echo $location_postal_code; ?>" /> 
            <!-- MORE -->
            <meta property="business:contact_data:region" content="<?php echo $location_region; ?>" />
            <meta property="business:contact_data:email" content="<?php echo $company_email; ?>" />
            <meta property="business:contact_data:phone_number" content="<?php if (!empty ($company_phone_number)) { echo $company_phone_number; } ?>" />
            <meta property="business:contact_data:fax_number" content="<?php echo $company_fax_number; ?>" />
            <meta property="business:contact_data:website" content="<?php echo home_url('/'); ?>" />
            <?php if ($company_operating_days != null) { foreach (array_keys($company_operating_days) as $day) { ?>
                <meta property="business:hours:day" content="<?php echo $day; ?>" />
                <meta property="business:hours:start" content="<?php echo $company_operating_hours_start; ?>" />
                <meta property="business:hours:end" content="<?php echo $company_operating_hours_end; ?>" />
            <?php } 
            }
        }
        ?>
        <?php if ($og_type == 'article') {
            if  ('post' == get_post_type()) {
            ?>
            <meta property="article:author" content="<?php echo $company_facebook_id; ?>" />
            <meta property="article:publisher" content="<?php echo $company_facebook_id; ?>" />
            <?php } else { ?>
            <meta property="article:publisher" content="<?php echo $company_facebook_id; ?>" />
            <?php
                } 
            }
        ?>
        <meta property="og:url" content="<?php echo $og_url; ?>" />
        <meta property="og:image" content="<?php echo $og_image; ?>" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"/>
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri();?>/assets/ico/favicon.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144"
          href="<?php echo get_template_directory_uri();?>/assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114"
          href="<?php echo get_template_directory_uri();?>/assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72"
          href="<?php echo get_template_directory_uri();?>/assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed"
          href="<?php echo get_template_directory_uri();?>/assets/ico/apple-touch-icon-57-precomposed.png">
    <style type="text/css">
    body {
        padding-top: <?php echo $body_padding_top;?> ;
    }
    </style>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <nav class="navbar navbar-inverse <?php echo $header_position; ?>" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".main-menu">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="<?php echo home_url('/'); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home"><?php bloginfo('name'); ?></a>
            </div>

            <?php wp_nav_menu(
            array(
                'menu' => 'main-menu',
                'container_class' => 'navbar-collapse collapse main-menu navbar-right',
                'menu_class' => 'nav navbar-nav',
                'fallback_cb' => '',
                'menu_id' => 'main-menu',
                'walker' => new Bootbase_Walker_Nav_Menu()
            )
            ); ?>
        </div>
    </nav>
    <!-- End Header. Begin Template Content -->