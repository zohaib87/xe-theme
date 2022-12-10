<?php
/**
 * Enqueue dynamic styles in theme <head> tags.
 *
 * @package _xe
 */

use Helpers\Xe_Helpers as Helper;
use Helpers\Xe_Selectors as Se;

class Xe_DynamicStyles {

	function __construct() {

		add_action( 'wp_enqueue_scripts', array($this, 'enqueue_dynamic_styles') );

	}

	/**
	 * Primary Color
	 */
	protected function css_variables() {

		global $xe_opt;

		$color = $xe_opt->primary_color;
		$rgb = Helper::hex2rgb($color);
		$dark = Helper::darken($color, 20);
		$light = Helper::darken($color, -20);

		$css = "
    :root{
      --primary-color: ".esc_attr($color).";
      --primary-dark: ".esc_attr($dark).";
      --primary-light: ".esc_attr($light).";
      --selection-color: ".esc_attr($xe_opt->txt_selection_color).";
      --selection-bg-color: ".esc_attr($xe_opt->txt_selection_bg_color).";

      --bg-color: ".esc_attr($xe_opt->bg_color).";

      --top-bar-text-color: ".esc_attr($xe_opt->top_bar['text-color']).";
      --top-bar-bg-color: ".esc_attr($xe_opt->top_bar['bg-color']).";

      --title-color: ".esc_attr($xe_opt->title_bar['title-color']).";
      --subtitle-color: ".esc_attr($xe_opt->title_bar['subtitle-color']).";
      --title-bar-bg-color: ".esc_attr($xe_opt->title_bar['bg-color']).";
      --title-bar-bg-image: url(".esc_attr($xe_opt->title_bar['bg-image']).");

      --padding-top: ".esc_attr($xe_opt->padding_top)."px;
      --padding-bottom: ".esc_attr($xe_opt->padding_bottom)."px;

      --blog-columns: ".esc_attr($xe_opt->blog['columns']).";
      --shop-columns: ".esc_attr($xe_opt->shop['columns']).";

      --footer-bg-color: ".esc_attr($xe_opt->footer['bg-color']).";
      --footer-text-color: ".esc_attr($xe_opt->footer['text-color']).";
    }
		";

		return $css;

	}

  /**
   * Top-Bar
   */
  protected function top_bar() {

    $css = '';
    $css .= "
    ".wp_strip_all_tags(Se::$top_bar['text_color'])." {
      color: var(--top-bar-text-color);
    }
    ";
    $css .= "
    ".wp_strip_all_tags(Se::$top_bar['bg_color'])." {
      background-color: var(--top-bar-bg-color);
    }
    ";

    return $css;

  }

  /**
   * Title-Bar
   */
  protected function title_bar() {

    $css = '';
    $css .= "
    ".wp_strip_all_tags(Se::$title_bar['bg'])." {
      background-color: var(--title-bar-bg-color);
      background-image: var(--title-bar-bg-image);
    }
    ";
    $css .= "
    ".wp_strip_all_tags(Se::$title_bar['title_color'])." {
      color: var(--title-color);
    }
    ";
    $css .= "
    ".wp_strip_all_tags(Se::$title_bar['subtitle_color'])." {
      color: var(--subtitle-color);
    }
    ";
    $css .= "
    ".wp_strip_all_tags(Se::$title_bar['overlay'])." {
      background-color: var(--title-bar-overlay);
    }
    ";

    return $css;

  }

  /**
   * Footer
   */
  protected function footer() {

    $css = '';
    $css .= "
    ".wp_strip_all_tags(Se::$footer['text_color'])." {
      color: var(--footer-text-color);
    }
    ";
    $css .= "
    ".wp_strip_all_tags(Se::$footer['bg_color'])." {
      background-color: var(--footer-bg-color);
    }
    ";

    return $css;

  }

	/**
	 * Boxed Layout
	 */
	protected function boxed_layout() {

		global $xe_opt;

		if ( isset($xe_opt->site_layout) && $xe_opt->site_layout == 'boxed') {
			$css = "
			.bg {
				background-color: ".esc_attr($xe_opt->bg['color']).";
				background-image: url(".esc_url($xe_opt->bg['image']).");
				background-repeat: ".esc_attr($xe_opt->bg['repeat']).";
				background-size: ".esc_attr($xe_opt->bg['size']).";
				background-attachment: ".esc_attr($xe_opt->bg['attachment']).";
				background-position: ".esc_attr($xe_opt->bg['position']).";
			}
			.boxed {
				background: white;
			}
			@media (min-width: 768px) {
				.boxed {
			    max-width: 750px;
			    margin: ".esc_attr($xe_opt->boxed_layout_margin)."px auto;
				}
			}
			@media (min-width: 992px) {
				.boxed {
			    max-width: 970px;
			    margin: ".esc_attr($xe_opt->boxed_layout_margin)."px auto;
				}
			}
			@media (min-width: 1200px) {
				.boxed {
			    max-width: ".esc_attr($xe_opt->main_grid_width)."px;
			    margin: ".esc_attr($xe_opt->boxed_layout_margin)."px auto;
				}
			}
			";
		} else {
			$css = '';
		}

		return $css;

	}

	/**
	 * Main grid width
	 */
	protected function main_grid_width() {

		global $xe_opt;

		if ($xe_opt->main_grid_width != '1170') {
			$css = "@media (min-width: 1200px) {
				.container {
			    width: ".esc_attr($xe_opt->main_grid_width)."px;
				}
			}";
		} else {
			$css = '';
		}

		return $css;

	}

	/**
	 * Content width
	 */
	protected function content_width() {

		global $xe_opt;

		$left_sidebar_width = $xe_opt->left_sidebar_width;
		$right_sidebar_width = $xe_opt->right_sidebar_width;
		$content_width = 100 - ($left_sidebar_width + $right_sidebar_width);
		$left_sidebar_margin = $content_width + $right_sidebar_width;
		$sidebar = $xe_opt->sidebar();

		$left_sidebar = ".content-area {
			float: right;
			margin: 0 0 0 -".esc_attr($left_sidebar_width)."%;
			width: 100%;
		}
		.site-main {
			margin: 0 0 0 ".esc_attr($left_sidebar_width)."%;
		}
		.site-content .widget-area {
			float: left;
			overflow: hidden;
			width: ".esc_attr($left_sidebar_width)."%;
		}
		.site-footer {
			clear: both;
			width: 100%;
		}
		@media (min-width: 992px) {
			.content-area {
				padding-left: 30px;
			}
		}";

		$right_sidebar = ".content-area {
			float: left;
			margin: 0 -".esc_attr($right_sidebar_width)."% 0 0;
			width: 100%;
		}
		.site-main {
			margin: 0 ".esc_attr($right_sidebar_width)."% 0 0;
		}
		.site-content .widget-area {
			float: right;
			overflow: hidden;
			width: ".esc_attr($right_sidebar_width)."%;
		}
		.site-footer {
			clear: both;
			width: 100%;
		}
		@media (min-width: 992px) {
			.content-area {
				padding-right: 30px;
			}
		}";

		$both_sidebars = ".content-area {
			float: left;
			margin: 0 0 0 ".esc_attr($left_sidebar_width)."%;
			width: ".esc_attr($content_width)."%;
		}
		.site-content .widget-area.left {
			float: left;
			margin: 0 0 0 -".esc_attr($left_sidebar_margin)."%;
			overflow: hidden;
			width: ".esc_attr($left_sidebar_width)."%;
		}
		.site-content .widget-area.right {
			float: right;
			overflow: hidden;
			width: ".esc_attr($right_sidebar_width)."%;
		}
		.site-footer {
			clear: both;
			width: 100%;
		}
		@media (min-width: 992px) {
			.content-area {
				padding-left: 30px;
				padding-right: 30px;
			}
		}";

		$media_query = "@media (max-width: 991px) {
			.content-area {
				float: none;
				overflow: hidden;
				width: 100%;
				margin: 0px;
			}
			.site-main {
				margin: 0px;
			}
			.site-content .widget-area.left,
			.site-content .widget-area.right {
				float: none;
				margin: 30px 0 0;
				overflow: hidden;
				width: 100%;
			}
		}";

		if ( $sidebar['position'] == 'left' && is_active_sidebar($sidebar['left']) ) {

			return $left_sidebar . $media_query;

		} elseif ( $sidebar['position'] == 'right' && is_active_sidebar($sidebar['right']) ) {

			return $right_sidebar . $media_query;

    } elseif ( $sidebar['position'] == 'both' && is_active_sidebar($sidebar['left']) && is_active_sidebar($sidebar['right']) ) {

      return $both_sidebars . $media_query;

    } elseif ( $sidebar['position'] == 'both' && is_active_sidebar($sidebar['left']) ) {

      return $left_sidebar . $media_query;

    } elseif ( $sidebar['position'] == 'both' && is_active_sidebar($sidebar['right']) ) {

      return $right_sidebar . $media_query;

		}

	}

	/**
	 * Push header down if admin-bar is showing
	 */
	protected function admin_bar() {

		if ( is_admin_bar_showing() ) {

			$css = "@media (min-width: 783px) {
				body {
					padding-top: 32px;
				}
			}
			@media (max-width: 782px) {
				body {
					padding-top: 46px;
				}
			}";

		} else {

			$css = '';

		}

		return $css;

	}

	public function enqueue_dynamic_styles() {

		global $xe_opt;

    $style_css = $this->css_variables();

		$main_css = $this->main_grid_width();
		$main_css .= $this->content_width();
		$main_css .= $this->boxed_layout();
		$main_css .= $this->admin_bar();
    $main_css .= $this->top_bar();
    $main_css .= $this->title_bar();
    $main_css .= $this->footer();

		// Enqueue Styles
    if ( !empty($style_css) ) {
      wp_add_inline_style( '_xe-style', Helper::minify_css($style_css) );
    }
    if ( !empty($main_css) ) {
      wp_add_inline_style( '_xe-main', Helper::minify_css($main_css) );
    }

	}


}
new Xe_DynamicStyles();