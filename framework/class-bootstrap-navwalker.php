<?php
/**
 * Adapted from Edward McIntyre's WP_Bootstrap_Navwalker class. 
 * Added support for mega menu with ACF Pro fields.
 *
 * Class Name: WP_Bootstrap_Navwalker
 * GitHub URI: https://github.com/XeCreators/wp-bootstrap-navwalker
 * Description: A custom WordPress nav walker class to implement the Bootstrap 3 navigation style in a custom theme using the WordPress built in menu manager.
 * Version: 1.0.0
 * Author: Muhammad Zohaib - @XeCreators
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

//exit if accessed directly
if ( !defined('ABSPATH') ) exit;

class WP_Bootstrap_Navwalker extends Walker_Nav_Menu {

	private $mega_menu, $parent_mega_menu, $mega_width, $mega_width_value;

	/**
	 * @see Walker::start_lvl()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param int $depth Depth of page. Used for padding.
	 */
	public function start_lvl( &$output, $depth = 0, $args = array() ) {

		if ($depth >= 0  && $this->mega_menu == true) :

	        $output .=  '';

	    else :

			$indent = str_repeat( "\t", $depth );
			$output .= "\n$indent<ul role=\"menu\" class=\"dropdown-menu\">\n";

		endif;
		
	}

	/**
	 * Ends the list of after the elements are added.
	 *
	 * @since 3.0.0
	 *
	 * @see Walker::end_lvl()
	 *
	 * @param string   $output Passed by reference. Used to append additional content.
	 * @param int      $depth  Depth of menu item. Used for padding.
	 * @param stdClass $args   An object of wp_nav_menu() arguments.
	 */
	public function end_lvl( &$output, $depth = 0, $args = array() ) {

	    if ($depth >= 0  && $this->parent_mega_menu == true) :

	        $output .=  '';

	    else :

	    	$indent = str_repeat( "\t", $depth );
	        $output .= "$indent</ul>\n";

	    endif;

	}

	/**
	 * @see Walker::start_el()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param object $item Menu item data object.
	 * @param int $depth Depth of menu item. Used for padding.
	 * @param int $current_page Menu item ID.
	 * @param object $args
	 */
	public function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {

		if ( function_exists('get_field') ) {

			$mega_dropdown = get_field('mega_dropdown', $item->ID);
			$this->mega_menu = !empty($mega_dropdown) ? get_field('mega_menu', $item->ID) : 0;

			$parent_mega_dropdown = get_field('mega_dropdown', $item->menu_item_parent);
			$this->parent_mega_menu = !empty($parent_mega_dropdown) ? get_field('mega_menu', $item->menu_item_parent) : 0;

			$this->mega_width = get_field('mega_width', $item->ID);
			$this->mega_width_value = get_field('mega_width_value', $item->ID);
			$this->mega_width_value = ( $this->mega_width == 'sw' && !empty($this->mega_width_value) ) ? $this->mega_width_value : '480';

		} else {

			$mega_dropdown = $this->mega_menu = $parent_mega_dropdown = $this->parent_mega_menu = 0;
			$this->mega_width = 'sw';
			$this->$mega_width_value = '480';

		}

		if ($depth >= 1 && $this->parent_mega_menu == true) :

	        $output .=  '';

	    else :

	    	$indent = ($depth) ? str_repeat( "\t", $depth ) : '';

			/**
			 * Dividers, Headers or Disabled
			 * =============================
			 * Determine whether the item is a Divider, Header, Disabled or regular
			 * menu item. To prevent errors we use the strcasecmp() function to so a
			 * comparison that is not case sensitive. The strcasecmp() function returns
			 * a 0 if the strings are equal.
			 */
			if ( strcasecmp( $item->attr_title, 'divider' ) == 0 && $depth === 1 ) {

				$output .= $indent . '<li role="presentation" class="divider">';

			} else if ( strcasecmp( $item->title, 'divider') == 0 && $depth === 1 ) {

				$output .= $indent . '<li role="presentation" class="divider">';

			} else if ( strcasecmp( $item->attr_title, 'dropdown-header') == 0 && $depth === 1 ) {

				$output .= $indent . '<li role="presentation" class="dropdown-header">' . esc_attr( $item->title );

			} else if ( strcasecmp($item->attr_title, 'disabled' ) == 0 ) {

				$output .= $indent . '<li role="presentation" class="disabled"><a href="#">' . esc_attr( $item->title ) . '</a>';

			} else {

				$class_names = $value = '';
				$classes = empty( $item->classes ) ? array() : (array) $item->classes;
				$classes[] = 'menu-item-' . $item->ID;
				$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );

				/**
				 * if ($args->has_children)
				 * $class_names .= ' dropdown';
				 */
				if ( ($args->has_children || $this->mega_menu == true) && $depth === 0 ) { 

					$class_names .= ($this->mega_menu == true) ? ' dropdown megamenu-'.esc_attr($this->mega_width) : ' dropdown';

				} elseif ($args->has_children && $depth > 0) { 

					$class_names .= ' dropdown';

				}

				if ( in_array('current-menu-item', $classes) ) {

					$class_names .= ' active';

				}

				/**
				 * Remove Font Awesome icon from classes array and save the icon
				 * we will add the icon back in via a <span> below so it aligns with
				 * the menu item
				 */
				if ( in_array('fa', $classes) ) {

					$key = array_search('fa', $classes);
					$icon = $classes[$key + 1];
					$class_names = str_replace($classes[$key+1], '', $class_names);
					$class_names = str_replace($classes[$key], '', $class_names);

				} else {

					$icon = '';

				}
				
				$class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';
				$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
				$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
				$output .= $indent . '<li' . $id . $value . $class_names .'>';
				$atts = array();
				$atts['title']  = !empty($item->title) ? $item->title	: '';
				$atts['target'] = !empty($item->target) ? $item->target	: '';
				$atts['rel']    = !empty($item->xfn) ? $item->xfn	: '';

				/**
				 * If item has_children or mega menu is enabled add atts to a.
				 * if ( $args->has_children && $depth === 0 ) {
				 */
				if ($args->has_children || $this->mega_menu == true) {

					$atts['href']   		= '#';
					$atts['data-toggle']	= 'dropdown';
					$atts['class']			= 'dropdown-toggle';

				} else {

					$atts['href'] = !empty($item->url) ? $item->url : '';

				}

				$atts = apply_filters('nav_menu_link_attributes', $atts, $item, $args);
				$attributes = '';

				foreach ( $atts as $attr => $value ) {

					if ( !empty($value) ) {
						$value = ('href' === $attr) ? esc_url($value) : esc_attr($value);
						$attributes .= ' ' . $attr . '="' . $value . '"';
					}

				}

				if ($this->mega_menu == true) : 

					$output .= $this->mega_menu($item, $this->mega_menu, $mega_dropdown, $icon, $attributes, $args, $depth);

				else :

					$item_output = $args->before;
					$item_output .= $this->mega_menu($item, $this->mega_menu, $mega_dropdown, $icon, $attributes, $args, $depth);
					$item_output .= $args->after;

					$output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);

				endif;

			}

		endif; // $depth >= 1 && $this->parent_mega_menu == true

	}

	/**
	 * Ends the element output, if needed.
	 *
	 * @since 3.0.0
	 *
	 * @see Walker::end_el()
	 *
	 * @param string   $output Passed by reference. Used to append additional content.
	 * @param WP_Post  $item   Page data object. Not used.
	 * @param int      $depth  Depth of page. Not Used.
	 * @param stdClass $args   An object of wp_nav_menu() arguments.
	 */
	public function end_el( &$output, $item, $depth = 0, $args = array() ) {

		if ($depth >= 1 && $this->parent_mega_menu == true) :

	        $output .=  '';

	    else :

			$output .= "</li>\n";

		endif;

	}

	/**
	 * Traverse elements to create list from elements.
	 *
	 * Display one element if the element doesn't have any children otherwise,
	 * display the element and its children. Will only traverse up to the max
	 * depth and no ignore elements under that depth.
	 *
	 * This method shouldn't be called directly, use the walk() method instead.
	 *
	 * @see Walker::start_el()
	 * @since 2.5.0
	 *
	 * @param object $element Data object
	 * @param array $children_elements List of elements to continue traversing.
	 * @param int $max_depth Max depth to traverse.
	 * @param int $depth Depth of current element.
	 * @param array $args
	 * @param string $output Passed by reference. Used to append additional content.
	 * @return null Null on failure with no changes to parameters.
	 */
	public function display_element($element, &$children_elements, $max_depth, $depth, $args, &$output) {

        if (!$element) return;

        $id_field = $this->db_fields['id'];

        // Display this element.
        if ( is_object($args[0]) ) {
           $args[0]->has_children = !empty( $children_elements[$element->$id_field] );
        }
        parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );

    }

	/**
	 * Menu Fallback
	 * =============
	 * If this function is assigned to the wp_nav_menu's fallback_cb variable
	 * and a manu has not been assigned to the theme location in the WordPress
	 * menu manager the function with display nothing to a non-logged in user,
	 * and will add a link to the WordPress menu manager if logged in as an admin.
	 *
	 * @param array $args passed from the wp_nav_menu function.
	 *
	 */
	public static function fallback($args) {

		if ( current_user_can('manage_options') ) {

			extract($args);
			$fb_output = null;

			if ( $container ) {
				$fb_output = '<' . $container;
				if ($container_id) $fb_output .= ' id="' . $container_id . '"';
				if ($container_class) $fb_output .= ' class="' . $container_class . '"';
				$fb_output .= '>';
			}

			$fb_output .= '<ul';

			if ($menu_id) $fb_output .= ' id="' . $menu_id . '"';
			if ($menu_class) $fb_output .= ' class="' . $menu_class . '"';
			$fb_output .= '>';
			$fb_output .= '<li><a href="' . admin_url( 'nav-menus.php' ) . '">Add a menu</a></li>';
			$fb_output .= '</ul>';
			if ($container) $fb_output .= '</' . $container . '>';

			echo $fb_output;

		}

	}

	/** 
	 * Mega Menu
	 */
	public function mega_menu($item, $mega_menu, $mega_dropdown, $icon, $attributes, $args, $depth) {

		$output = '';

		// Font Awesome icons
		if ( !empty($icon) ) {
			$output .= '<a'. $attributes .'><span class="fa ' . esc_attr($icon) . '"></span>&nbsp;';
		} else {
			$output .= '<a'. $attributes .'>';
		}

		$output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
		$output .= ($args->has_children && 0 === $depth) ? ' </a>' : '</a>';

		if ($mega_menu == true) :

			$query_args = array(
				'post_type' => 'xe-mega-menus',
				'p' => $mega_dropdown
			);
			$query = new WP_Query($query_args);

			if ( $query->have_posts() ) {
				while ( $query->have_posts() ) :
					$query->the_post();

					if ($this->mega_width == 'sw') {

						$uniq = uniqid('xe-');
						$attribute = "data-xe-css=\"@media(min-width: 993px){nav.bootsnav .dropdown.megamenu-sw .dropdown-menu.".esc_attr($uniq)."{width:".esc_attr($this->mega_width_value)."px;}}\"";

					} else {

						$uniq = $attribute = '';

					}

					$output .= '<ul role="menu" class="dropdown-menu '.esc_attr($uniq).'" '.$attribute.'>';
					$output .= '<li class="megamenu-content">';
					$output .= apply_filters( 'the_content', get_the_content() );
					$output .= '</li>';
					$output .= '</ul>';
					
				endwhile;
			}

			/* Restore original Post Data */
			wp_reset_postdata();

		endif;

		return $output;
		
    }

}