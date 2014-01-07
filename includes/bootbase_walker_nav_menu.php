<?php
 /**
 * class Bootbase_Walker_Nav_Menu()
 *
 * Extending Walker_Nav_Menu to modify class assigned to submenu ul element
 *
 * @author Stephnaus van Vuuren
 * @author Glio Digital Innovations
 *
 **/
class Bootbase_Walker_Nav_Menu extends Walker_Nav_Menu {
    /**
	* Get values
    */
    
    /**
     * Opening tag for menu list before anything is added
     *
     *
     * @param array reference       &$output    Reference to class' $output
     * @param int                   $depth      Depth of menu (if nested)
     * @param array                 $args       Class args, unused here
     *
     * @return string $indent
     * @return array by-reference   &$output
     *
     */
    function start_lvl( &$output, $depth = 0, $args = array() ) {

        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"dropdown-menu\">\n";
    }

    /**
     * @see Walker::end_lvl()
     * @since 3.0.0
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param int $depth Depth of page. Used for padding.
     */
    function end_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n";
    }

	/**
     * Opening tag for menu list before anything is added
     *
     *
     * @param array reference       &$output    Reference to class' $output
     * @param int                   $depth      Depth of menu (if nested)
     * @param array                 $args       Class args, unused here
     *
     * @return string $indent
     * @return array by-reference   &$output
     *
     */
    function start_el( &$output, $item, $depth = 0, $args = array() ) {

        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<li><a href=\"";
        $output .= $item->url;
        $output .= "\"";

        	if ($depth == 0) {
             // Has children
                $children = get_posts(array('post_type' => 'nav_menu_item', 'nopaging' => true, 'numberposts' => 1, 'meta_key' => '_menu_item_menu_item_parent', 'meta_value' => $item->ID));
                if (!empty($children)) {
                    $output .= "\n class=\"dropdown-toggle\" data-toggle=\"dropdown\" ";
                }	
    		}
    	$output .= ">";
        $output .= $item->title;
    }

    /**
     * @see Walker::end_lvl()
     * @since 3.0.0
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param int $depth Depth of page. Used for padding.
     */
    function end_el( &$output, $item ,$depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</a></li>\n";
    }

}
?>