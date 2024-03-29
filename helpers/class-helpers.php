<?php
/**
 * Functions that helps to ease theme development.
 *
 * @package _xe
 */

namespace Xe_Theme\Helpers;

class Helpers {

  /**
   * # Enqueue style or script with auto version control
   *
   * @link https://developer.wordpress.org/reference/functions/wp_enqueue_style/
   * @link https://developer.wordpress.org/reference/functions/wp_enqueue_script/
   *
   * @param string    $script     Accepts 'style' or 'script'
   * @param string    $handle     Name of the script. Should be unique.
   * @param string    $src        Path of the script relative to plugins folder.
   * @param array     $deps       An array of registered script handles this script depends on.
   * @param string    $media      The media for which this stylesheet has been defined.
   * @param bool      $in_footer  Whether to enqueue the script before </body> instead of in the <head>.
   * @param string    $ver        Version of the script.
   */
  public static function enqueue( $script, $handle, $src = '', $deps = array(), $media = 'all', $in_footer = true, $ver = '' ) {

    $ver = empty($ver) ? filemtime( get_template_directory() . $src ) : $ver;

    if ( $script == 'style' ) {

      wp_enqueue_style( esc_attr($handle), get_template_directory_uri() . esc_attr($src), $deps, esc_attr($ver), esc_attr($media) );

    } elseif ( $script == 'script' ) {

      wp_enqueue_script( esc_attr($handle), get_template_directory_uri() . esc_attr($src), $deps, esc_attr($ver), $in_footer );

    }

  }

  /**
   * # Auto load files from a directory
   *
   * @param string  $path   Path to files (*.php) that needs to be auto loaded.
   */
  public static function auto_load_files( $path ) {

    $files = glob( $path );

    foreach ( $files as $file ) {

      if (basename($file) == 'index.php') continue;

      require($file);

    }

  }

  /**
   * Array of header or footer styles.
   */
  public static function files_array( $prefix, $override = false ) {

    $files = glob( get_stylesheet_directory() . '/views/'.$prefix.'*.php' );
    $files = glob( get_template_directory() . '/views/'.$prefix.'*.php' );

    if ($override == true) {
      $output = array('0' => 'Default');
    } else {
      $output = array();
    }

    foreach ($files as $file) {
      // if (basename($file) == 'index.php') continue;
      $file = basename($file, '.php');
      $id = str_replace(array('-', $prefix), '', $file);
      $file = ucwords(str_replace('-', ' ', $file));
      $file = ($file == 'Header') ? 'Header Primary' : $file;
      $file = ($file == 'Footer') ? 'Footer Primary' : $file;
      $file = ($file == 'Archive') ? 'Archive Primary' : $file;
      $file = str_replace(array('Header ', 'Footer ', 'Archive '), '', $file);
      $output[$id] = $file . ' Style';
    }

    return $output;

  }

  /**
   * # Get and list menu locations.
   * Will only work after init and wp hook.
   */
  public static function menu_locations( $override = false ) {

    global $_wp_registered_nav_menus;

    if ($override == true) :
      $data['0'] = 'Default';
    endif;

    foreach ( $_wp_registered_nav_menus as $k => $v ) {
      $data[$k] = $v;
    }

    return $data;

  }

  /**
   * Get list of revolution sliders.
   */
  public static function rev_sliders() {

    $data = array();
    $data['none'] = esc_html__( 'None', '_xe' );

    if ( class_exists('RevSlider') ) {

      $slider = new \RevSliderSlider();
      $sliders = $slider->getArrSlidersShort();

      if ( ! empty( $sliders ) ) {

        foreach ( $sliders as $key => $val ) {

          $data[$key] = $val;

        }

      }

    }

    return $data;

  }

  /**
   * Get list of sidebars.
   *
   * Will only work after init and wp hook.
   */
  public static function get_sidebars() {

    global $wp_registered_sidebars;
    $data = array();

    foreach ( $GLOBALS['wp_registered_sidebars'] as $sidebar ) {

      $key = $sidebar['id'];
      $val = $sidebar['name'];
      $data[$key] = $val;

    }

    return $data;

  }

  /**
   * # Minifying styles
   *
   * @param string  $css   Not compressed css.
   *
   * @return string of minified css.
   */
  public static function minify_css( $css ) {

    $css = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $css);
    $css = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $css);
    $css = str_replace(array('{ ', ' {'), '{', $css);
    $css = str_replace(array('} ', ' }'), '}', $css);
    $css = str_replace('; ', ';', $css);
    $css = str_replace(': ', ':', $css);
    $css = str_replace(', ', ',', $css);
    $css = str_replace(array('> ', ' >'), '>', $css);
    $css = str_replace(array('+ ', ' +'), '+', $css);
    $css = str_replace(array('~ ', ' ~'), '~', $css);
    $css = str_replace(';}', '}', $css);

    return $css;

  }

  /**
   * # Hex color to rgb conversion
   *
   * @param string  $color   Hex color code.
   *
   * @return string of RGB color.
   */
  public static function hex2rgb( $color ) {

    if ( $color[0] == '#' ) {
      $color = substr( $color, 1 );
    }
    if ( strlen( $color ) == 6 ) {
      list( $r, $g, $b ) = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
    } elseif ( strlen( $color ) == 3 ) {
      list( $r, $g, $b ) = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
    } else {
      return false;
    }

    $r = hexdec( $r );
    $g = hexdec( $g );
    $b = hexdec( $b );

    return $r.', '.$g.', '.$b;

  }

  /**
   * # Darken or Lighten Color
   *
   * @param string  $color  Hex color code.
   * @param int     $dif    Number amount of lightning or darkening.
   *
   * @return string of lighter or darker color.
   */
  public static function darken( $color, $dif = 20 ) {

    $color = str_replace('#','', $color);
    $rgb = '';

    if (strlen($color) != 6) {

      // reduce the default amount a little
      $dif = ($dif==20)?$dif/10:$dif;

      for ($x = 0; $x < 3; $x++) {

        $c = hexdec(substr($color,(1*$x),1)) - $dif;
        $c = ($c < 0) ? 0 : dechex($c);
        $rgb .= $c;

      }

    } else {

      for ($x = 0; $x < 3; $x++) {

        $c = hexdec(substr($color, (2*$x),2)) - $dif;
        $c = ($c < 0) ? 0 : dechex($c);
        $rgb .= (strlen($c) < 2) ? '0'.$c : $c;

      }

    }

    return '#'.$rgb;

  }

  /**
   * # Adjusting spacing of classes
   *
   * @param array   $classes   An array of classes
   *
   * @return string of classes with single space in between.
   */
  public static function classes( $classes = array() ) {

    $classes = implode(' ', $classes);
    $classes = trim( preg_replace('/\s+/', ' ', $classes) );

    return $classes;

  }

  /**
   * # Check if a plugin is active
   *
   * @param string  $plugin_file  Folder name and main file e.g: 'elementor/elementor.php'
   *
   * @return bool either true or false
   */
  public static function is_plugin_active( $plugin_file ) {

    if ( in_array( $plugin_file, apply_filters( 'active_plugins', get_option('active_plugins') ) ) ) {

      return true;

    } else {

      return false;

    }

  }

  /**
   * # Check if elementor is used.
   *
   * @return bool true or false
   */
  public static function is_elementor_used() {

    global $post;

    if ( self::is_plugin_active( 'elementor/elementor.php' ) ) {

      return \Elementor\Plugin::$instance->documents->get( $post->ID )->is_built_with_elementor();

    } else {

      return false;

    }

  }

  /**
   * # Check if WPBakery plugin is active and used.
   *
   * @return bool true or false
   */
  public static function is_wpbakery_used() {

    global $post;

    if ( self::is_plugin_active( 'js_composer/js_composer.php' ) ) {

      if ( $post && preg_match('/vc_row/', $post->post_content) ) {

        return true;

      }

    }

    return false;

  }

  /**
   * # Update post meta fields
   *
   * @param int     $post_id      Current post id
   * @param string  $name         Input name attribute
   * @param bool    $is_array     If the input name attribute is array or not
   * @param string  $validation   Sanitization type, accepts: 'text', 'intval', 'floatval', 'textarea', 'email', 'url'
   * @param string  $meta_key     Post meta key
   * @param string  $delete       If true, post meta will be deleted when the specified name attribute is not set.
   */
  public static function update_field( $post_id, $name, $is_array, $validation, $meta_key, $delete = false ) {

    if ( ! array_key_exists($name, $_POST) && $delete == false ) {

      return;

    } elseif ( ! array_key_exists( $name, $_POST) && $delete == true ) {

      delete_post_meta( $post_id, $meta_key );
      return;

    }

    if ( $is_array == true ) {

      switch ( $validation ) {

        case 'text' :
          $updated_val = array_map( 'sanitize_text_field', $_POST[$name] );
          break;

        case 'intval' :
          $updated_val = array_map( 'intval', $_POST[$name] );
          break;

        case 'floatval' :
          $updated_val = array_map( 'floatval', $_POST[$name] );
          break;

        case 'textarea' :
          $updated_val = array_map( 'sanitize_textarea_field', $_POST[$name] );
          break;

        case 'email' :
          $updated_val = array_map( 'sanitize_email', $_POST[$name] );
          break;

        case 'url' :
          $updated_val = array_map( 'sanitize_url', $_POST[$name] );
          break;

      }

    } else {

      switch ( $validation ) {

        case 'text' :
          $updated_val = sanitize_text_field( $_POST[$name] );
          break;

        case 'intval' :
          $updated_val = intval( $_POST[$name] );
          break;

        case 'floatval' :
          $updated_val = floatval( $_POST[$name] );
          break;

        case 'textarea' :
          $updated_val = sanitize_textarea_field( $_POST[$name] );
          break;

        case 'email' :
          $updated_val = sanitize_email( $_POST[$name] );
          break;

        case 'url' :
          $updated_val = sanitize_url( $_POST[$name] );
          break;

      }

    }

    update_post_meta( $post_id, $meta_key, $updated_val );

    return $updated_val;

  }

  /**
   * # Verify or check for nonce, auto save and post type.
   *
   * @param string  $action      Nonce action ID
   * @param string  $nonce       Nonce ID
   * @param string  $post_type   Post type for which saving is going to proceed
   * @param string  $post_id     Current post ID
   *
   * @return bool true or false
   */
  public static function verify_save( $action, $nonce, $post_type, $post_id ) {

    // Check if our nonce is set.
    if ( ! isset( $_POST[$nonce] ) ) {
      return false;
    }

    // Verify that the nonce is valid.
    if ( ! wp_verify_nonce( $_POST[$nonce], $action ) ) {
      return false;
    }

    // If this is an autosave, our form has not been submitted,
    // so we don't want to do anything.
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
      return false;
    }

    // Check the user's permissions.
    if ( $post_type == $_POST['post_type'] ) {

      if ( ! current_user_can( 'edit_page', $post_id ) ) {
        return false;
      }

    } else {

      if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return false;
      }

    }

    return true;

  }

  /**
   * # Register sidebar
   *
   * @param string  $name   Title of the sidebar
   * @param string  $id     Unique ID of the sidebar
   */
  public static function register_sidebar( $name, $id ) {

    register_sidebar( [
      'name'          => $name,
      'id'            => $id,
      'description'   => esc_html__( 'Add widgets here.', '_xe' ),
      'before_widget' => '<section id="%1$s" class="widget %2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h4 class="widget-title">',
      'after_title'   => '</h4>',
    ] );

  }

}
