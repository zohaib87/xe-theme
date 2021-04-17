<?php
/**
 * About author template tag for this theme.
 *
 * @package _xe
 */

if (!function_exists('_xe_about_author')) {

  function _xe_about_author() {

    $author = array(
      'id' => get_the_author_meta('ID'),
      'name' => get_the_author_meta('display_name'),
      'desc' => get_the_author_meta('description'),
      'img' => get_avatar(
        get_the_author_meta('ID'), // ID or Email
        100, // Size
        '', // Url for an image, defaults to the "Mystery Person."
        false, // alt
        array( // args
          'class' => array('img-fluid'),
        )
      ),
    ); ?>

    <div class="author-info">
      <ul class="row">
        <li class="col-md-2">
          <?php echo wp_kses_post($author['img']); ?>
        </li>
        <li class="col-md-10">
          <h5>About <?php echo esc_html($author['name']); ?></h5>
          <?php echo wp_kses_post($author['desc']); ?>
        </li>
      </ul>
    </div>

  <?php }

}
