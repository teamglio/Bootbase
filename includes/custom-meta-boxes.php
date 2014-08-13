<?
/********************* META BOX DEFINITIONS ***********************/

/**
 * Prefix of meta keys (optional)
 * Use underscore (_) at the beginning to make keys hidden
 * Alt.: You also can make prefix empty to disable it
 */
// Better has an underscore as last sign
$prefix = 'bootbase_';

global $meta_boxes;

$meta_boxes = array();

/********************* GRIDPOST META BOX ***********************/
// meta box
$bootbase_meta_boxes[] = array(
    // Meta box id, UNIQUE per meta box. Optional since 4.1.5
  'id' => 'gallery_images',

  // Meta box title - Will appear at the drag and drop handle bar. Required.
  'title' => 'Upload Images (Max 48 files)',

  // Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
  'pages' => array('gallery'),

  // Where the meta box appear: normal (default), advanced, side. Optional.
  'context' => 'normal',

  // Order of meta box: high (default), low. Optional.
  'priority' => 'low',

  // Auto save: true, false (default). Optional.
  'autosave' => true,


  'fields' => array(
    // IMAGE ADVANCED (WP 3.5+)
    array(
      'id'               => "{$prefix}gallery_images",
      'type'             => 'image_advanced',
      'max_file_uploads' => 48,
    ),
  )
);

/********************* TEAM META BOX ***********************/
// meta box
$bootbase_meta_boxes[] = array(
    // Meta box id, UNIQUE per meta box. Optional since 4.1.5
  'id' => 'team_info',

  // Meta box title - Will appear at the drag and drop handle bar. Required.
  'title' => 'Information',

  // Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
  'pages' => array('team'),

  // Where the meta box appear: normal (default), advanced, side. Optional.
  'context' => 'normal',

  // Order of meta box: high (default), low. Optional.
  'priority' => 'low',

  // Auto save: true, false (default). Optional.
  'autosave' => true,


  'fields' => array(
    // TEXT
    array(
      // Field name - Will be used as label
      'name'  => __( 'Position', 'rwmb' ),
      // Field ID, i.e. the meta key
      'id'    => "{$prefix}member_position",
      // Field description (optional)
      'desc'  => __( 'What roll does this person play in your team?', 'rwmb' ),
      'type'  => 'text',
    ),
    // CHECKBOX
    array(
      'name' => __( 'Featured Member?', 'rwmb' ),
      'id'   => "{$prefix}member_featured",
      'type' => 'checkbox',
      'desc'  => __( 'For display purposes best practise is to have no more than one featured member per every five members.', 'rwmb' ),
      // Value can be 0 or 1
      'std'  => 0,
    ),
  )
);

/********************* GRIDPOST META BOX ***********************/
// meta box
$bootbase_meta_boxes[] = array(
    // Meta box id, UNIQUE per meta box. Optional since 4.1.5
  'id' => 'vertical_slider',

  // Meta box title - Will appear at the drag and drop handle bar. Required.
  'title' => 'Vertical Slider Images (Max 3 images)',

  // Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
  'pages' => array('slider'),

  // Where the meta box appear: normal (default), advanced, side. Optional.
  'context' => 'normal',

  // Order of meta box: high (default), low. Optional.
  'priority' => 'low',

  // Auto save: true, false (default). Optional.
  'autosave' => true,


  'fields' => array(
    // IMAGE ADVANCED (WP 3.5+)
    array(
      'id'               => "{$prefix}vertical_slider_images",
      'type'             => 'image_advanced',
      'max_file_uploads' => 3,
    ),
  )
);



/********************* META BOX REGISTERING ***********************/

/**
 * Register meta boxes
 *
 * @return void
 */
function bootbase_register_meta_boxes()
{
  // Make sure there's no errors when the plugin is deactivated or during upgrade
  if ( !class_exists( 'RW_Meta_Box' ) )
    return;

  global $bootbase_meta_boxes;
  foreach ( $bootbase_meta_boxes as $meta_box )
  {
    new RW_Meta_Box( $meta_box );
  }
}
// Hook to 'admin_init' to make sure the meta box class is loaded before
// (in case using the meta box class in another plugin)
// This is also helpful for some conditionals like checking page template, categories, etc.
add_action( 'admin_init', 'bootbase_register_meta_boxes' );
?>