<?php
/**
 * Class for containing CSS selectors.
 *
 * @package _xe
 */

namespace Xe_Theme\Helpers;

class Selectors {

  // Top-Bar
  public static $top_bar = [
    'text_color' => '.top_bar p',
    'bg_color' => '.top_bar',
    'phone' => '.top_bar .phone',
    'email' => '.top_bar .email'
  ],

  // Titles
  $titles = [
    'blog' => '.blog .title',
    'search' => '.search .title',
    'error' => '.error404 .title',
    'shop' => '.archive.woocommerce .title',
  ],

  // Subtitles
  $subtitles = [
    'blog' => '.blog .subtitle',
    'search' => '.search .subtitle',
    'error' => '.error404 .subtitle',
    'shop' => '.archive.woocommerce .subtitle',
  ],

  // Title-Bar
  $title_bar = [
    'title_color' => '.title-bar .title',
    'subtitle_color' => '.title-bar .subtitle',
    'height' => '.title-bar',
    'bg' => '.title-bar',
    'overlay' => '.title-bar .overlay',
  ],

  // Footer
  $footer = [
    'text_color' => '.site-info .copyright-info',
    'bg_color' => '.site-info',
  ];

}
