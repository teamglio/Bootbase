<?php

/**
*	ReduxFramework Sample Config File
*	For full documentation, please visit http://reduxframework.com/docs/
**/


/**
* 
*	Most of your editing will be done in this section.
*
*	Here you can override default values, uncomment args and change their values.
*	No $args are required, but they can be overridden if needed.
*	
**/
$args = array();


// For use with a tab example below
$tabs = array();

ob_start();

$ct = wp_get_theme();
$theme_data = $ct;
$item_name = $theme_data->get('Name'); 
$tags = $ct->Tags;
$screenshot = $ct->get_screenshot();
$class = $screenshot ? 'has-screenshot' : '';

$customize_title = sprintf( __( 'Customize &#8220;%s&#8221;','bootbase-options' ), $ct->display('Name') );

?>
<div id="current-theme" class="<?php echo esc_attr( $class ); ?>">
	<?php if ( $screenshot ) : ?>
		<?php if ( current_user_can( 'edit_theme_options' ) ) : ?>
		<a href="<?php echo wp_customize_url(); ?>" class="load-customize hide-if-no-customize" title="<?php echo esc_attr( $customize_title ); ?>">
			<img src="<?php echo esc_url( $screenshot ); ?>" alt="<?php esc_attr_e( 'Current theme preview' ); ?>" />
		</a>
		<?php endif; ?>
		<img class="hide-if-customize" src="<?php echo esc_url( $screenshot ); ?>" alt="<?php esc_attr_e( 'Current theme preview' ); ?>" />
	<?php endif; ?>

	<h4>
		<?php echo $ct->display('Name'); ?>
	</h4>

	<div>
		<ul class="theme-info">
			<li><?php printf( __('By %s','bootbase-options'), $ct->display('Author') ); ?></li>
			<li><?php printf( __('Version %s','bootbase-options'), $ct->display('Version') ); ?></li>
			<li><?php echo '<strong>'.__('Tags', 'bootbase-options').':</strong> '; ?><?php printf( $ct->display('Tags') ); ?></li>
		</ul>
		<p class="theme-description"><?php echo $ct->display('Description'); ?></p>
		<?php if ( $ct->parent() ) {
			printf( ' <p class="howto">' . __( 'This <a href="%1$s">child theme</a> requires its parent theme, %2$s.' ) . '</p>',
				__( 'http://codex.wordpress.org/Child_Themes','bootbase-options' ),
				$ct->parent()->display( 'Name' ) );
		} ?>
		
	</div>

</div>

<?php
$item_info = ob_get_contents();
    
ob_end_clean();

$sampleHTML = '';
if( file_exists( dirname(__FILE__).'/info-html.html' )) {
	/** @global WP_Filesystem_Direct $wp_filesystem  */
	global $wp_filesystem;
	if (empty($wp_filesystem)) {
		require_once(ABSPATH .'/wp-admin/includes/file.php');
		WP_Filesystem();
	}  		
	$sampleHTML = $wp_filesystem->get_contents(dirname(__FILE__).'/info-html.html');
}

// BEGIN Sample Config

// Setting dev mode to true allows you to view the class settings/info in the panel.
// Default: true
$args['dev_mode'] = true;

// Set the icon for the dev mode tab.
// If $args['icon_type'] = 'image', this should be the path to the icon.
// If $args['icon_type'] = 'iconfont', this should be the icon name.
// Default: info-sign
//$args['dev_mode_icon'] = 'info-sign';

// Set the class for the dev mode tab icon.
// This is ignored unless $args['icon_type'] = 'iconfont'
// Default: null
$args['dev_mode_icon_class'] = 'icon-large';

// Set a custom option name. Don't forget to replace spaces with underscores!
$args['opt_name'] = 'bootbase_options';

// Setting system info to true allows you to view info useful for debugging.
// Default: false
$args['system_info'] = true;

$theme = wp_get_theme();
$args['display_name'] = $theme->get('Name');
//$args['database'] = "theme_mods_expanded";
$args['display_version'] = $theme->get('Version');

// If you want to use Google Webfonts, you MUST define the api key.
$args['google_api_key'] = 'AIzaSyB-r9td4wZ0tjd7cWndv9olOf54f6TIUg4';

// Define the starting tab for the option panel.
// Default: '0';
//$args['last_tab'] = '0';

// Define the option panel stylesheet. Options are 'standard', 'custom', and 'none'
// If only minor tweaks are needed, set to 'custom' and override the necessary styles through the included custom.css stylesheet.
// If replacing the stylesheet, set to 'none' and don't forget to enqueue another stylesheet!
// Default: 'standard'
$args['admin_stylesheet'] = 'standard';

// Setup custom links in the footer for share icons
$args['share_icons']['twitter'] = array(
    'link' => 'http://twitter.com/teamglio',
    'title' => 'Follow us on Twitter', 
    'img' => ReduxFramework::$_url . 'assets/img/social/Twitter.png'
);
// Enable the import/export feature.
// Default: true
//$args['show_import_export'] = false;

// Set the class for the import/export tab icon.
// This is ignored unless $args['icon_type'] = 'iconfont'
// Default: null
$args['import_icon_class'] = 'icon-large';

/**
 * Set default icon class for all sections and tabs
 * @since 3.0.9
 */
$args['default_icon_class'] = 'icon-large';

// Set a custom menu icon.
$args['menu_icon'] = '';

// Set a custom title for the options page.
// Default: Options
$args['menu_title'] = __('Theme Options', 'bootbase-options');

// Set a custom page title for the options page.
// Default: Options
$args['page_title'] = __('Theme Options', 'bootbase-options');

// Set a custom page slug for options page (wp-admin/themes.php?page=***).
// Default: redux_options
$args['page_slug'] = 'theme_options';

$args['default_show'] = true;
$args['default_mark'] = '*';

// Set a custom page capability.
// Default: manage_options
//$args['page_cap'] = 'manage_options';

// Set a custom page location. This allows you to place your menu where you want in the menu order.
// Must be unique or it will override other items!
// Default: null
//$args['page_position'] = null;

    
// Set ANY custom page help tabs, displayed using the new help tab API. Tabs are shown in order of definition.
$args['help_tabs'][] = array(
    'id' => 'redux-opts-1',
    'title' => __('Theme Information 1', 'bootbase-options'),
    'content' => __('<p>This is the tab content, HTML is allowed.</p>', 'bootbase-options')
);
$args['help_tabs'][] = array(
    'id' => 'redux-opts-2',
    'title' => __('Theme Information 2', 'bootbase-options'),
    'content' => __('<p>This is the tab content, HTML is allowed.</p>', 'bootbase-options')
);

// Set the help sidebar for the options page.                                        
$args['help_sidebar'] = __('<p>This is the sidebar content, HTML is allowed.</p>', 'bootbase-options');


// Add HTML before the form.
if (!isset($args['global_variable']) || $args['global_variable'] !== false ) {
	if (!empty($args['global_variable'])) {
		$v = $args['global_variable'];
	} else {
		$v = str_replace("-", "_", $args['opt_name']);
	}
	$args['intro_text'] = sprintf( __('<p>Did you know that Redux sets a global variable for you? To access any of your saved options from within your code you can use your global variable: <strong>$%1$s</strong></p>', 'bootbase-options' ), $v );
} else {
	$args['intro_text'] = __('<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'bootbase-options');
}

// Add content after the form.
$args['footer_text'] = __('<p>This text is displayed below the options panel. It isn\'t required, but more info is always better! The footer_text field accepts all HTML.</p>', 'bootbase-options');

// Set footer/credit line.
//$args['footer_credit'] = __('<p>This text is displayed in the options panel footer across from the WordPress version (where it normally says \'Thank you for creating with WordPress\'). This field accepts all HTML.</p>', 'bootbase-options');


$sections = array();              

//Background Patterns Reader
$sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
$sample_patterns_url  = ReduxFramework::$_url . '../sample/patterns/';
$sample_patterns      = array();

if ( is_dir( $sample_patterns_path ) ) :
	
  if ( $sample_patterns_dir = opendir( $sample_patterns_path ) ) :
  	$sample_patterns = array();

    while ( ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) !== false ) {

      if( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
      	$name = explode(".", $sample_patterns_file);
      	$name = str_replace('.'.end($name), '', $sample_patterns_file);
      	$sample_patterns[] = array( 'alt'=>$name,'img' => $sample_patterns_url . $sample_patterns_file );
      }
    }
  endif;
endif;


$sections[] = array(
	'title' => __('Header Settings', 'bootbase-options'),
	'header' => __('Hey! Use these settings to adjust the header area', 'bootbase-options'),
	'desc' => __('', 'bootbase-options'),
	'icon_class' => 'icon-large',
    'icon' => 'el-icon-adjust-alt',
    // 'submenu' => false, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
	'fields' => array(	
		array(
			'id'=>'header-status',
			'type' => 'switch', 
			'title' => __('Custom Header', 'bootbase-options'),
			'subtitle'=> __('Allows you to upload a custom image for the logo area', 'bootbase-options'),
			'default' 		=> 0,
			'on' => 'Enabled',
			'off' => 'Disabled',
			),
		array(
			'id'=>'media-logo',
			'type' => 'media',
			'required' => array('header-status','=','1'),
			'title' => __('Logo', 'bootbase-options'),
			'desc'=> __('Recomended size 300px X 300px or larger', 'bootbase-options'),
			'subtitle' => __('Upload your logo here', 'bootbase-options'),
			),	
		array(
			'id'=>'header-background-color',
			'type' => 'color',
			'required' => array('header-status','=','1'),
			'title' => __('Header Background', 'bootbase-options'), 
			'subtitle' => __('Pick a background color for the theme (default: #fff).', 'bootbase-options'),
			'default' => '#222222',
			'validate' => 'color',
			),
		array(
			'id'=>'header-background-image',
			'type' => 'media',
			'required' => array('header-status','=','1'),
			'title' => __('Header Background', 'bootbase-options'),
			'desc'=> __('1140x400', 'bootbase-options'),
			'subtitle' => __('Upload your image here', 'bootbase-options'),
			),
		array(
			'id'=>'patterns',
			'type' => 'image_select', 
			'tiles' => true,
			'required' => array('switch-fold','equals','0'),	
			'title' => __('Images Option (with pattern=>true)', 'bootbase-options'),
			'subtitle'=> __('Select a background pattern.', 'bootbase-options'),
			'default' 		=> 0,
			'options' => $sample_patterns
			,
			),			
        array(
            "id" => "homepage_blocks_three",
            "type" => "sorter",
            "title" => "Layout Manager Advanced",
            "subtitle" => "You can add multiple drop areas or columns.",
            "compiler"=>'true',
            'required' => array('switch-fold','equals','0'),	
            'options' => array(
                "enabled" => array(
                    "placebo" => "placebo", //REQUIRED!
                    "highlights" => "Highlights",
                    "slider" => "Slider",
                    "staticpage" => "Static Page",
                    "services" => "Services"
                ),
                "disabled" => array(
                    "placebo" => "placebo", //REQUIRED!
                ),
                "backup" => array(
                    "placebo" => "placebo", //REQUIRED!
                ),                
            ),
        ),
        array(
            "id" => "header_blocks",
            "type" => "sorter",
            "title" => "Header Area",
            "desc" => "Header area",
            "compiler"=>'true',
            'options' => array(
                "Disabled" => array(
                    "placebo" => "placebo", //REQUIRED!
                    "social" => "Social Links",
                    "search" => "Search"
                ),
                "Left" => array(
                    "placebo" => "placebo", //REQUIRED!
                ),
                "Right" => array(
                    "placebo" => "placebo", //REQUIRED!
                ),
            ),
        ),        
	),
);

$sections[] = array(
	'icon' => 'el-icon-website',
	'icon_class' => 'icon-large',
    'title' => __('Layout options', 'bootbase-options'),
	'fields' => array(
		array(
			'id'=>'social-facebook',
			'type' => 'text',
			'title' => __('Facebook', 'bootbase-options'),
			'subtitle' => __('facebook page url', 'bootbase-options'),
			'desc' => __('facebook', 'bootbase-options'),
			'validate' => 'url',
			'msg' => 'Please enter a valid url'
			),
		array(
			'id'=>'social-twitter',
			'type' => 'text',
			'title' => __('Twitter', 'bootbase-options'),
			'subtitle' => __('twitter url', 'bootbase-options'),
			'desc' => __('facebook', 'bootbase-options'),
			'validate' => 'url',
			'msg' => 'Please enter a valid url'
			),
	)
);

$sections[] = array(
	'icon' => 'el-icon-livejournal',
	'title' => __('Styling Options', 'bootbase-options'),
	'fields' => array(
		array(
			'id'=>'stylesheet',
			'type' => 'select',
			'title' => __('Theme Stylesheet', 'bootbase-options'), 
			'subtitle' => __('Select your themes alternative color scheme.', 'bootbase-options'),
			'options' => array('default.css'=>'default.css', 'color1.css'=>'color1.css'),
			'default' => 'default.css',
			),
		array(
			'id'=>'color-background',
			'type' => 'color',
			'output' => array('.site-title'),
			'title' => __('Body Background Color', 'bootbase-options'), 
			'subtitle' => __('Pick a background color for the theme (default: #fff).', 'bootbase-options'),
			'default' => '#FFFFFF',
			'validate' => 'color',
			),		
		array(
			'id'=>'color-footer',
			'type' => 'color',
			'title' => __('Footer Background Color', 'bootbase-options'), 
			'subtitle' => __('Pick a background color for the footer (default: #dd9933).', 'bootbase-options'),
			'default' => '#dd9933',
			'validate' => 'color',
			),
		array(
			'id'=>'color-header',
			'type' => 'color_gradient',
			'title' => __('Header Gradient Color Option', 'bootbase-options'),
			'subtitle' => __('Only color validation can be done on this field type', 'bootbase-options'),
			'desc' => __('This is the description field, again good for additional info.', 'bootbase-options'),
			'default' => array('from' => '#1e73be', 'to' => '#00897e')
			),
		array(
			'id'=>'link-color',
			'type' => 'link_color',
			'title' => __('Links Color Option', 'bootbase-options'),
			'subtitle' => __('Only color validation can be done on this field type', 'bootbase-options'),
			'desc' => __('This is the description field, again good for additional info.', 'bootbase-options'),
			//'regular' => false, // Disable Regular Color
			//'hover' => false, // Disable Hover Color
			//'active' => false, // Disable Active Color
			'default' => array(
				//'regular' => '#aaa',
				//'hover' => '#bbb',
				//'active' => '#ccc',
			)
		),
		array(
			'id'=>'header-border',
			'type' => 'border',
			'title' => __('Header Border Option', 'bootbase-options'),
			'subtitle' => __('Only color validation can be done on this field type', 'bootbase-options'),
			'output' => array('.site-header'), // An array of CSS selectors to apply this font style to
			'desc' => __('This is the description field, again good for additional info.', 'bootbase-options'),
			'default' => array('border-color' => '#1e73be', 'border-style' => 'solid', 'border-top'=>'3px', 'border-right'=>'3px', 'border-bottom'=>'3px', 'border-left'=>'3px')
			),	
		array(
			'id'=>'spacing',
			'type' => 'spacing',
			'output' => array('.site-header'), // An array of CSS selectors to apply this font style to
			'mode'=>'margin', // absolute, padding, margin, defaults to padding
			//'units' => 'em', // You can specify a unit value. Possible: px, em, %
			//'units_extended' => 'true', // Allow users to select any type of unit
			//'display_units' => 'false', // Set to false to hide the units if the units are specified
			'title' => __('Padding/Margin Option', 'bootbase-options'),
			'subtitle' => __('Allow your users to choose the spacing or margin they want.', 'bootbase-options'),
			'desc' => __('You can enable or disable any piece of this field. Top, Right, Bottom, Left, or Units.', 'bootbase-options'),
			'default' => array('margin-top' => '1px', 'margin-right'=>"2px", 'margin-bottom' => '3px', 'margin-left'=>'4px' )
			),	
		array(
			'id'=>'dimensions',
			'type' => 'dimensions',
			//'units' => 'em', // You can specify a unit value. Possible: px, em, %
			//'units_extended' => 'true', // Allow users to select any type of unit
			'title' => __('Dimensions (Width/Height) Option', 'bootbase-options'),
			'subtitle' => __('Allow your users to choose width, height, and/or unit.', 'bootbase-options'),
			'desc' => __('You can enable or disable any piece of this field. Width, Height, or Units.', 'bootbase-options'),
			'default' => array('width' => 200, 'height'=>'100', )
			),												
		array(
			'id'=>'body-font2',
			'type' => 'typography',
			'title' => __('Body Font', 'bootbase-options'),
			'subtitle' => __('Specify the body font properties.', 'bootbase-options'),
			'google'=>true,
			'default' => array(
				'color'=>'#dd9933',
				'font-size'=>'30px',
				'font-family'=>'Arial, Helvetica, sans-serif',
				'font-weight'=>'Normal',
				),
			),					
		array(
			'id'=>'custom-css',
			'type' => 'textarea',
			'title' => __('Custom CSS', 'bootbase-options'), 
			'subtitle' => __('Quickly add some CSS to your theme by adding it to this block.', 'bootbase-options'),
			'desc' => __('This field is even CSS validated!', 'bootbase-options'),
			'validate' => 'css',
			),
		array(
			'id'=>'custom-html',
			'type' => 'textarea',
			'title' => __('Custom HTML', 'bootbase-options'), 
			'subtitle' => __('Just like a text box widget.', 'bootbase-options'),
			'desc' => __('This field is even HTML validated!', 'bootbase-options'),
			'validate' => 'html',
			),		
	)
);

$sections[] = array(
	'type' => 'divide',
);



$sections[] = array(
	'icon' => 'el-icon-bullhorn',
	'icon_class' => 'icon-large',
    'title' => __('Social icons', 'bootbase-options'),
	'fields' => array(
		array(
			'id'=>'social-facebook',
			'type' => 'text',
			'title' => __('Facebook', 'bootbase-options'),
			'subtitle' => __('facebook page url', 'bootbase-options'),
			'desc' => __('facebook', 'bootbase-options'),
			'validate' => 'url',
			'msg' => 'Please enter a valid url'
			),
		array(
			'id'=>'social-twitter',
			'type' => 'text',
			'title' => __('Twitter', 'bootbase-options'),
			'subtitle' => __('twitter url', 'bootbase-options'),
			'desc' => __('facebook', 'bootbase-options'),
			'validate' => 'url',
			'msg' => 'Please enter a valid url'
			),
	)
);
	
$sections[] = array(
	'icon' => 'el-icon-bullhorn',
	'title' => __('Field Validation', 'bootbase-options'),
	'desc' => __('<p class="description">This is the Description. Again HTML is allowed2</p>', 'bootbase-options'),
	'fields' => array(
		array(
			'id'=>'2',
			'type' => 'text',
			'title' => __('Text Option - Email Validated', 'bootbase-options'),
			'subtitle' => __('This is a little space under the Field Title in the Options table, additional info is good in here.', 'bootbase-options'),
			'desc' => __('This is the description field, again good for additional info.', 'bootbase-options'),
			'validate' => 'email',
			'msg' => 'custom error message',
			'default' => 'test@test.com'
			),	
		array(
			'id'=>'2test',
			'type' => 'text',
			'title' => __('Text Option with Data Attributes', 'bootbase-options'),
			'subtitle' => __('You can also pass an options array if you want. Set the default to whatever you like.', 'bootbase-options'),
			'desc' => __('This is the description field, again good for additional info.', 'bootbase-options'),
			'data' => 'post_type',
			//'options' => array(1=>'One', 2=>'Two'),
			//'default' => array(1=>'Onee', 2=>'Twoo'),
			),						
		array(
			'id'=>'multi_text',
			'type' => 'multi_text',
			'title' => __('Multi Text Option - Color Validated', 'bootbase-options'),
			'validate' => 'color',
			'subtitle' => __('If you enter an invalid color it will be removed. Try using the text "blue" as a color.  ;)', 'bootbase-options'),
			'desc' => __('This is the description field, again good for additional info.', 'bootbase-options')
			),
		array(
			'id'=>'3',
			'type' => 'text',
			'title' => __('Text Option - URL Validated', 'bootbase-options'),
			'subtitle' => __('This must be a URL.', 'bootbase-options'),
			'desc' => __('This is the description field, again good for additional info.', 'bootbase-options'),
			'validate' => 'url',
			'default' => 'http://reduxframework.com'
			),
		array(
			'id'=>'4',
			'type' => 'text',
			'title' => __('Text Option - Numeric Validated', 'bootbase-options'),
			'subtitle' => __('This must be numeric.', 'bootbase-options'),
			'desc' => __('This is the description field, again good for additional info.', 'bootbase-options'),
			'validate' => 'numeric',
			'default' => '0',
			'class' => 'small-text'
			),
		array(
			'id'=>'comma_numeric',
			'type' => 'text',
			'title' => __('Text Option - Comma Numeric Validated', 'bootbase-options'),
			'subtitle' => __('This must be a comma separated string of numerical values.', 'bootbase-options'),
			'desc' => __('This is the description field, again good for additional info.', 'bootbase-options'),
			'validate' => 'comma_numeric',
			'default' => '0',
			'class' => 'small-text'
			),
		array(
			'id'=>'no_special_chars',
			'type' => 'text',
			'title' => __('Text Option - No Special Chars Validated', 'bootbase-options'),
			'subtitle' => __('This must be a alpha numeric only.', 'bootbase-options'),
			'desc' => __('This is the description field, again good for additional info.', 'bootbase-options'),
			'validate' => 'no_special_chars',
			'default' => '0'
			),
		array(
			'id'=>'str_replace',
			'type' => 'text',
			'title' => __('Text Option - Str Replace Validated', 'bootbase-options'),
			'subtitle' => __('You decide.', 'bootbase-options'),
			'desc' => __('This field\'s default value was changed by a filter hook!', 'bootbase-options'),
			'validate' => 'str_replace',
			'str' => array('search' => ' ', 'replacement' => 'thisisaspace'),
			'default' => 'This is the default.'
			),
		array(
			'id'=>'preg_replace',
			'type' => 'text',
			'title' => __('Text Option - Preg Replace Validated', 'bootbase-options'),
			'subtitle' => __('You decide.', 'bootbase-options'),
			'desc' => __('This is the description field, again good for additional info.', 'bootbase-options'),
			'validate' => 'preg_replace',
			'preg' => array('pattern' => '/[^a-zA-Z_ -]/s', 'replacement' => 'no numbers'),
			'default' => '0'
			),
		array(
			'id'=>'custom_validate',
			'type' => 'text',
			'title' => __('Text Option - Custom Callback Validated', 'bootbase-options'),
			'subtitle' => __('You decide.', 'bootbase-options'),
			'desc' => __('This is the description field, again good for additional info.', 'bootbase-options'),
			'validate_callback' => 'validate_callback_function',
			'default' => '0'
			),
		array(
			'id'=>'5',
			'type' => 'textarea',
			'title' => __('Textarea Option - No HTML Validated', 'bootbase-options'), 
			'subtitle' => __('All HTML will be stripped', 'bootbase-options'),
			'desc' => __('This is the description field, again good for additional info.', 'bootbase-options'),
			'validate' => 'no_html',
			'default' => 'No HTML is allowed in here.'
			),
		array(
			'id'=>'6',
			'type' => 'textarea',
			'title' => __('Textarea Option - HTML Validated', 'bootbase-options'), 
			'subtitle' => __('HTML Allowed (wp_kses)', 'bootbase-options'),
			'desc' => __('This is the description field, again good for additional info.', 'bootbase-options'),
			'validate' => 'html', //see http://codex.wordpress.org/Function_Reference/wp_kses_post
			'default' => 'HTML is allowed in here.'
			),
		array(
			'id'=>'7',
			'type' => 'textarea',
			'title' => __('Textarea Option - HTML Validated Custom', 'bootbase-options'), 
			'subtitle' => __('Custom HTML Allowed (wp_kses)', 'bootbase-options'),
			'desc' => __('This is the description field, again good for additional info.', 'bootbase-options'),
			'validate' => 'html_custom',
			'default' => '<p>Some HTML is allowed in here.</p>',
			'allowed_html' => array('') //see http://codex.wordpress.org/Function_Reference/wp_kses
			),
		array(
			'id'=>'8',
			'type' => 'textarea',
			'title' => __('Textarea Option - JS Validated', 'bootbase-options'), 
			'subtitle' => __('JS will be escaped', 'bootbase-options'),
			'desc' => __('This is the description field, again good for additional info.', 'bootbase-options'),
			'validate' => 'js'
			),

		)
	);
$sections[] = array(
	'icon' => 'el-icon-check',
	'title' => __('Radio/Checkbox Fields', 'bootbase-options'),
	'desc' => __('<p class="description">This is the Description. Again HTML is allowed</p>', 'bootbase-options'),
	'fields' => array(
		array(
			'id'=>'10',
			'type' => 'checkbox',
			'title' => __('Checkbox Option', 'bootbase-options'), 
			'subtitle' => __('No validation can be done on this field type', 'bootbase-options'),
			'desc' => __('This is the description field, again good for additional info.', 'bootbase-options'),
			'default' => '1'// 1 = on | 0 = off
			),
		array(
			'id'=>'11',
			'type' => 'checkbox',
			'title' => __('Multi Checkbox Option', 'bootbase-options'), 
			'subtitle' => __('No validation can be done on this field type', 'bootbase-options'),
			'desc' => __('This is the description field, again good for additional info.', 'bootbase-options'),
			'options' => array('1' => 'Opt 1','2' => 'Opt 2','3' => 'Opt 3'),//Must provide key => value pairs for multi checkbox options
			'default' => array('1' => '1', '2' => '0', '3' => '0')//See how std has changed? you also don't need to specify opts that are 0.
			),
		array(
			'id'=>'checkbox-data',
			'type' => 'checkbox',
			'title' => __('Multi Checkbox Option (with menu data)', 'bootbase-options'), 
			'subtitle' => __('No validation can be done on this field type', 'bootbase-options'),
			'desc' => __('This is the description field, again good for additional info.', 'bootbase-options'),
			'data' => "menu"
			),	
		array(
			'id'=>'checkbox-sidebar',
			'type' => 'checkbox',
			'title' => __('Multi Checkbox Option (with sidebar data)', 'bootbase-options'), 
			'subtitle' => __('No validation can be done on this field type', 'bootbase-options'),
			'desc' => __('This is the description field, again good for additional info.', 'bootbase-options'),
			'data' => "sidebars"
			),								
		array(
			'id'=>'12',
			'type' => 'radio',
			'title' => __('Radio Option', 'bootbase-options'), 
			'subtitle' => __('No validation can be done on this field type', 'bootbase-options'),
			'desc' => __('This is the description field, again good for additional info.', 'bootbase-options'),
			'options' => array('1' => 'Opt 1', '2' => 'Opt 2', '3' => 'Opt 3'),//Must provide key => value pairs for radio options
			'default' => '2'
			),
		array(
			'id'=>'radio-data',
			'type' => 'radio',
			'title' => __('Multi Checkbox Option (with menu data)', 'bootbase-options'), 
			'subtitle' => __('No validation can be done on this field type', 'bootbase-options'),
			'desc' => __('This is the description field, again good for additional info.', 'bootbase-options'),
			'data' => "menu"
			),					
		array(
			'id'=>'13',
			'type' => 'image_select',
			'title' => __('Images Option', 'bootbase-options'), 
			'subtitle' => __('No validation can be done on this field type', 'bootbase-options'),
			'desc' => __('This is the description field, again good for additional info.', 'bootbase-options'),
			'options' => array(
							'1' => array('title' => 'Opt 1', 'img' => 'images/align-none.png'),
							'2' => array('title' => 'Opt 2', 'img' => 'images/align-left.png'),
							'3' => array('title' => 'Opt 3', 'img' => 'images/align-center.png'),
							'4' => array('title' => 'Opt 4', 'img' => 'images/align-right.png')
								),//Must provide key => value(array:title|img) pairs for radio options
			'default' => '2'
			),
		array(
			'id'=>'image_select',
			'type' => 'image_select',
			'title' => __('Images Option for Layout', 'bootbase-options'), 
			'subtitle' => __('No validation can be done on this field type', 'bootbase-options'),
			'desc' => __('This uses some of the built in images, you can use them for layout options.', 'bootbase-options'),
			'options' => array(
							'1' => array('alt' => '1 Column', 'img' => ReduxFramework::$_url.'assets/img/1col.png'),
							'2' => array('alt' => '2 Column Left', 'img' => ReduxFramework::$_url.'assets/img/2cl.png'),
							'3' => array('alt' => '2 Column Right', 'img' => ReduxFramework::$_url.'assets/img/2cr.png'),
							'4' => array('alt' => '3 Column Middle', 'img' => ReduxFramework::$_url.'assets/img/3cm.png'),
							'5' => array('alt' => '3 Column Left', 'img' => ReduxFramework::$_url.'assets/img/3cl.png'),
							'6' => array('alt' => '3 Column Right', 'img' => ReduxFramework::$_url.'assets/img/3cr.png')
								),//Must provide key => value(array:title|img) pairs for radio options
			'default' => '2'
			),
		array(
            'id' => 'text_sortable',
	        'type' => 'sortable',
    	    'title' => __('Sortable Text Option', 'bootbase-options'),
        	'subtitle' => __('Define and reorder these however you want.', 'bootbase-options'),
			'desc' => __('This is the description field, again good for additional info.', 'bootbase-options'),
            'options' => array(
	            'si1' => 'Item 1',
    	        'si2' => 'Item 2',
        	    'si3' => 'Item 3',
    	    	)
        	),	
		array(
            'id' => 'check_sortable',
	        'type' => 'sortable',
	        'mode' => 'checkbox', // checkbox or text
    	    'title' => __('Sortable Text Option', 'bootbase-options'),
        	'subtitle' => __('Define and reorder these however you want.', 'bootbase-options'),
			'desc' => __('This is the description field, again good for additional info.', 'bootbase-options'),
            'options' => array(
	            'si1' => 'Item 1',
    	        'si2' => 'Item 2',
        	    'si3' => 'Item 3',
    	    	)
        	),	        																						
		)
	);
$sections[] = array(
	'icon' => 'el-icon-list-alt',
	'title' => __('Select Fields', 'bootbase-options'),
	'desc' => __('<p class="description">This is the Description. Again HTML is allowed</p>', 'bootbase-options'),
	'fields' => array(
		array(
			'id'=>'select',
			'type' => 'select',
			'title' => __('Select Option', 'bootbase-options'), 
			'subtitle' => __('No validation can be done on this field type', 'bootbase-options'),
			'desc' => __('This is the description field, again good for additional info.', 'bootbase-options'),
			'options' => array('1' => 'Opt 1','2' => 'Opt 2','3' => 'Opt 3'),//Must provide key => value pairs for select options
			'default' => '2'
			),
		array(
			'id'=>'15',
			'type' => 'select',
			'multi' => true,
			'title' => __('Multi Select Option', 'bootbase-options'), 
			'subtitle' => __('No validation can be done on this field type', 'bootbase-options'),
			'desc' => __('This is the description field, again good for additional info.', 'bootbase-options'),
			'options' => array('1' => 'Opt 1','2' => 'Opt 2','3' => 'Opt 3'),//Must provide key => value pairs for radio options
			'required' => array('select','equals',array('1','3')),	
			'default' => array('2','3')
			),
		array(
			'id'=>'multi-info',
			'type' => 'info',
			'desc' => __('You can easily add a variety of data from WordPress.', 'bootbase-options'),
			),
		array(
			'id'=>'select-categories',
			'type' => 'select',
			'data' => 'categories',
			'title' => __('Categories Select Option', 'bootbase-options'), 
			'subtitle' => __('No validation can be done on this field type', 'bootbase-options'),
			'desc' => __('This is the description field, again good for additional info.', 'bootbase-options'),
			),
		array(
			'id'=>'select-categories-multi',
			'type' => 'select',
			'data' => 'categories',
			'multi' => true,
			'title' => __('Categories Multi Select Option', 'bootbase-options'), 
			'subtitle' => __('No validation can be done on this field type', 'bootbase-options'),
			'desc' => __('This is the description field, again good for additional info.', 'bootbase-options'),
			),
		array(
			'id'=>'select-pages',
			'type' => 'select',
			'data' => 'pages',
			'title' => __('Pages Select Option', 'bootbase-options'), 
			'subtitle' => __('No validation can be done on this field type', 'bootbase-options'),
			'desc' => __('This is the description field, again good for additional info.', 'bootbase-options'),
			),
		array(
			'id'=>'pages-multi_select',
			'type' => 'select',
			'data' => 'pages',
			'multi' => true,
			'title' => __('Pages Multi Select Option', 'bootbase-options'), 
			'subtitle' => __('No validation can be done on this field type', 'bootbase-options'),
			'desc' => __('This is the description field, again good for additional info.', 'bootbase-options'),
			),	
		array(
			'id'=>'select-tags',
			'type' => 'select',
			'data' => 'tags',
			'title' => __('Tags Select Option', 'bootbase-options'), 
			'subtitle' => __('No validation can be done on this field type', 'bootbase-options'),
			'desc' => __('This is the description field, again good for additional info.', 'bootbase-options'),
			),
		array(
			'id'=>'tags-multi_select',
			'type' => 'select',
			'data' => 'tags',
			'multi' => true,
			'title' => __('Tags Multi Select Option', 'bootbase-options'), 
			'subtitle' => __('No validation can be done on this field type', 'bootbase-options'),
			'desc' => __('This is the description field, again good for additional info.', 'bootbase-options'),
			),	
		array(
			'id'=>'select-menus',
			'type' => 'select',
			'data' => 'menus',
			'title' => __('Menus Select Option', 'bootbase-options'), 
			'subtitle' => __('No validation can be done on this field type', 'bootbase-options'),
			'desc' => __('This is the description field, again good for additional info.', 'bootbase-options'),
			),
		array(
			'id'=>'menus-multi_select',
			'type' => 'select',
			'data' => 'menu',
			'multi' => true,
			'title' => __('Menus Multi Select Option', 'bootbase-options'), 
			'subtitle' => __('No validation can be done on this field type', 'bootbase-options'),
			'desc' => __('This is the description field, again good for additional info.', 'bootbase-options'),
			),	
		array(
			'id'=>'select-post-type',
			'type' => 'select',
			'data' => 'post_type',
			'title' => __('Post Type Select Option', 'bootbase-options'), 
			'subtitle' => __('No validation can be done on this field type', 'bootbase-options'),
			'desc' => __('This is the description field, again good for additional info.', 'bootbase-options'),
			),
		array(
			'id'=>'post-type-multi_select',
			'type' => 'select',
			'data' => 'post_type',
			'multi' => true,
			'title' => __('Post Type Multi Select Option', 'bootbase-options'), 
			'subtitle' => __('No validation can be done on this field type', 'bootbase-options'),
			'desc' => __('This is the description field, again good for additional info.', 'bootbase-options'),
			),
		array(
			'id'=>'post-type-multi_select_sortable',
			'type' => 'select',
			'data' => 'post_type',
			'multi' => true,
			'sortable' => true,
			'title' => __('Post Type Multi Select Option + Sortable', 'bootbase-options'), 
			'subtitle' => __('This field also has sortable enabled!', 'bootbase-options'),
			'desc' => __('This is the description field, again good for additional info.', 'bootbase-options'),
			),					
		array(
			'id'=>'select-posts',
			'type' => 'select',
			'data' => 'post',
			'title' => __('Posts Select Option2', 'bootbase-options'), 
			'subtitle' => __('No validation can be done on this field type', 'bootbase-options'),
			'desc' => __('This is the description field, again good for additional info.', 'bootbase-options'),
			),
		array(
			'id'=>'select-posts-multi',
			'type' => 'select',
			'data' => 'post',
			'multi' => true,
			'title' => __('Posts Multi Select Option', 'bootbase-options'), 
			'subtitle' => __('No validation can be done on this field type', 'bootbase-options'),
			'desc' => __('This is the description field, again good for additional info.', 'bootbase-options'),
			),
        array(
			'id'=>'select-roles',
			'type' => 'select',
			'data' => 'roles',
			'title' => __('User Role Select Option', 'bootbase-options'), 
			'subtitle' => __('No validation can be done on this field type', 'bootbase-options'),
			'desc' => __('This is the description field, again good for additional info.', 'bootbase-options'),
			),
        array(
			'id'=>'select-capabilities',
			'type' => 'select',
			'data' => 'capabilities',
			'multi' => true,
			'title' => __('Capabilities Select Option', 'bootbase-options'), 
			'subtitle' => __('No validation can be done on this field type', 'bootbase-options'),
			'desc' => __('This is the description field, again good for additional info.', 'bootbase-options'),
			),
		array(
			'id'=>'select-elusive',
			'type' => 'select',
			'data' => 'elusive-icons',
			'title' => __('Elusive Icons Select Option', 'bootbase-options'), 
			'subtitle' => __('No validation can be done on this field type', 'bootbase-options'),
			'desc' => __('Here\'s a list of all the elusive icons by name and icon.', 'bootbase-options'),
			),			
		)
	);
		
		

if (function_exists('wp_get_theme')){
$theme_data = wp_get_theme();
$theme_uri = $theme_data->get('ThemeURI');
$description = $theme_data->get('Description');
$author = $theme_data->get('Author');
$version = $theme_data->get('Version');
$tags = $theme_data->get('Tags');
}else{
$theme_data = wp_get_theme(trailingslashit(get_stylesheet_directory()).'style.css');
$theme_uri = $theme_data['URI'];
$description = $theme_data['Description'];
$author = $theme_data['Author'];
$version = $theme_data['Version'];
$tags = $theme_data['Tags'];
}	

$theme_info = '<div class="redux-framework-section-desc">';
$theme_info .= '<p class="redux-framework-theme-data description theme-uri">'.__('<strong>Theme URL:</strong> ', 'bootbase-options').'<a href="'.$theme_uri.'" target="_blank">'.$theme_uri.'</a></p>';
$theme_info .= '<p class="redux-framework-theme-data description theme-author">'.__('<strong>Author:</strong> ', 'bootbase-options').$author.'</p>';
$theme_info .= '<p class="redux-framework-theme-data description theme-version">'.__('<strong>Version:</strong> ', 'bootbase-options').$version.'</p>';
$theme_info .= '<p class="redux-framework-theme-data description theme-description">'.$description.'</p>';
if ( !empty( $tags ) ) {
	$theme_info .= '<p class="redux-framework-theme-data description theme-tags">'.__('<strong>Tags:</strong> ', 'bootbase-options').implode(', ', $tags).'</p>';	
}
$theme_info .= '</div>';

if(file_exists(dirname(__FILE__).'/README.md')){
$sections['theme_docs'] = array(
			'icon' => ReduxFramework::$_url.'assets/img/glyphicons/glyphicons_071_book.png',
			'title' => __('Documentation', 'bootbase-options'),
			'fields' => array(
				array(
					'id'=>'17',
					'type' => 'raw',
					'content' => file_get_contents(dirname(__FILE__).'/README.md')
					),				
			),
			
			);
}//if




// You can append a new section at any time.
$sections[] = array(
	'icon' => 'el-icon-eye-open',
	'title' => __('Additional Fields', 'bootbase-options'),
	'desc' => __('<p class="description">This is the Description. Again HTML is allowed</p>', 'bootbase-options'),
	'fields' => array(

		array(
			'id'=>'17',
			'type' => 'date',
			'title' => __('Date Option', 'bootbase-options'), 
			'subtitle' => __('No validation can be done on this field type', 'bootbase-options'),
			'desc' => __('This is the description field, again good for additional info.', 'bootbase-options')
			),
		array(
			'id'=>'21',
			'type' => 'divide'
			),					
		array(
			'id'=>'18',
			'type' => 'button_set',
			'title' => __('Button Set Option', 'bootbase-options'), 
			'subtitle' => __('No validation can be done on this field type', 'bootbase-options'),
			'desc' => __('This is the description field, again good for additional info.', 'bootbase-options'),
			'options' => array('1' => 'Opt 1','2' => 'Opt 2','3' => 'Opt 3'),//Must provide key => value pairs for radio options
			'default' => '2'
			),
		array(
			'id'=>'23',
			'type' => 'info',
            'required' => array('18','equals',array('1','2')),	
			'desc' => __('This is the info field, if you want to break sections up.', 'bootbase-options')
        ),
        array(
            'id'=>'info_warning',
            'type'=>'info',
            'style'=>'warning',
            'title'=> __( 'This is a title.', 'bootbase-options' ),
            'desc' => __( 'This is an info field with the warning style applied and a header.', 'bootbase-options')
        ),
        array(
            'id'=>'info_success',
            'type'=>'info',
            'style'=>'success',
            'icon'=>'el-icon-info-sign',
            'title'=> __( 'This is a title.', 'bootbase-options' ),
            'desc' => __( 'This is an info field with the success style applied, a header and an icon.', 'bootbase-options')
        ),
		array(
			'id'=>'raw_info',
			'type' => 'info',
			'required' => array('18','equals',array('1','2')),
			'raw_html'=>true,
			'desc' => $sampleHTML,
			),
		array(
			'id'=>"custom_callback",
			'type' => 'callback',
			'title' => __('Custom Field Callback', 'bootbase-options'), 
			'subtitle' => __('This is a completely unique field type', 'bootbase-options'),
			'desc' => __('This is created with a callback function, so anything goes in this field. Make sure to define the function though.', 'bootbase-options'),
			'callback' => 'my_custom_field'
			),
		array(
			'id'=>"group",
			'type' => 'group',//doesn't need to be called for callback fields
			'title' => __('Group', 'bootbase-options'), 
			'subtitle' => __('Group any items together.', 'bootbase-options'),
			'desc' => __('No limit as to what you can group. Just don\'t try to group a group.', 'bootbase-options'),
			'groupname' => __('Group', 'bootbase-options'), // Group name
			'subfields' => 
				array(
					array(
						'id'=>'switch-fold',
						'type' => 'switch', 
						'title' => __('testing fold with Group', 'bootbase-options'),
						'subtitle'=> __('Look, it\'s on!', 'bootbase-options'),
						"default" 		=> 1,
						),	
					array(
                        'id'=>'text-group',
                        'type' => 'text',
                        'title' => __('Text', 'bootbase-options'), 
                        'subtitle' => __('Here you put your subtitle', 'bootbase-options'),
                        'required' => array('switch-fold', '=' , '1'),
						),
					array(
						'id'=>'select-group',
						'type' => 'select',
						'title' => __('Testing select', 'bootbase-options'), 
						'subtitle' => __('Select your themes alternative color scheme.', 'bootbase-options'),
						'options' => array('default.css'=>'default.css', 'color1.css'=>'color1.css'),
						'default' => 'default.css',
						),
					),
			),			
			
		)

	);   

$sections[] = array(
	'type' => 'divide',
);

$sections[] = array(
	'icon' => 'el-icon-info-sign',
	'title' => __('Theme Information', 'bootbase-options'),
	'desc' => __('<p class="description">This is the Description. Again HTML is allowed</p>', 'bootbase-options'),
	'fields' => array(
		array(
			'id'=>'raw_new_info',
			'type' => 'raw',
			'content' => $item_info,
			)
		),   
	);


if(file_exists(trailingslashit(dirname(__FILE__)) . 'README.html')) {
    $tabs['docs'] = array(
		'icon' => 'el-icon-book',
		'icon_class' => 'icon-large',
        'title' => __('Documentation', 'bootbase-options'),
        'content' => nl2br(file_get_contents(trailingslashit(dirname(__FILE__)) . 'README.html'))
    );
}

global $ReduxFramework;
$ReduxFramework = new ReduxFramework($sections, $args, $tabs);

// END Sample Config


/**
 
 	Custom function for filtering the sections array. Good for child themes to override or add to the sections.
 	Simply include this function in the child themes functions.php file.
 
 	NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
 	so you must use get_template_directory_uri() if you want to use any of the built in icons
 
 **/
function add_another_section($sections){
    //$sections = array();
    $sections[] = array(
        'title' => __('Section via hook', 'bootbase-options'),
        'desc' => __('<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'bootbase-options'),
		'icon' => 'el-icon-paper-clip',
		'icon_class' => 'icon-large',
        // Leave this as a blank section, no options just some intro text set above.
        'fields' => array()
    );

    return $sections;
}
add_filter('redux/options/redux_demo/sections', 'add_another_section');
// replace redux_demo with your opt_name

/**

	Filter hook for filtering the args array given by a theme, good for child themes to override or add to the args array.

**/
function change_framework_args($args){
    //$args['dev_mode'] = true;
    
    return $args;
}
add_filter('redux/options/redux_demo/args', 'change_framework_args');
// replace redux_demo with your opt_name

/**

	Filter hook for filtering the default value of any given field. Very useful in development mode.

**/
function change_option_defaults($defaults){
    $defaults['str_replace'] = "Testing filter hook!";
    
    return $defaults;
}
add_filter('redux/options/redux_demo/defaults', 'change_option_defaults');
// replace redux_demo with your opt_name


/** 

	Custom function for the callback referenced above

 */
function my_custom_field($field, $value) {
    print_r($field);
    print_r($value);
}


/**
 
	Custom function for the callback validation referenced above

**/
function validate_callback_function($field, $value, $existing_value) {
    $error = false;
    $value =  'just testing';
    /*
    do your validation
    
    if(something) {
        $value = $value;
    } elseif(something else) {
        $error = true;
        $value = $existing_value;
        $field['msg'] = 'your custom error message';
    }
    */
    
    $return['value'] = $value;
    if($error == true) {
        $return['error'] = $field;
    }
    return $return;
}

/**

	This is a test function that will let you see when the compiler hook occurs. 
	It only runs if a field	set with compiler=>true is changed.

**/
function testCompiler($options, $css) {
	echo "<h1>The compiler hook has run!";
	//print_r($options); //Option values
	print_r($css); //So you can compile the CSS within your own file to cache
    $filename = dirname(__FILE__) . '/avada' . '.css';

		    global $wp_filesystem;
		    if( empty( $wp_filesystem ) ) {
		        require_once( ABSPATH .'/wp-admin/includes/file.php' );
		        WP_Filesystem();
		    }

		    if( $wp_filesystem ) {
		        $wp_filesystem->put_contents(
		            $filename,
		            $css,
		            FS_CHMOD_FILE // predefined mode settings for WP files
		        );
		    }

}
//add_filter('redux/options/redux_demo/compiler', 'testCompiler', 10, 2);
// replace redux_demo with your opt_name


/**

	Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.

**/
if ( class_exists('ReduxFrameworkPlugin') ) {
	//remove_action('admin_notices', array( ReduxFrameworkPlugin::get_instance(), 'admin_notices' ) );	
}


/**

	Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.

**/
function removeDemoModeLink() {
	if ( class_exists('ReduxFrameworkPlugin') ) {
		remove_filter( 'plugin_row_meta', array( ReduxFrameworkPlugin::get_instance(), 'plugin_meta_demo_mode_link'), null, 2 );
	}
}
//add_action('init', 'removeDemoModeLink');




