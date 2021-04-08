<?php
/**
 * Template part for displaying Header.
 *
 * @var $xe_opt->top_bar['switch'] [< Returns on or off >]
 * @var $xe_opt->top_bar['menu'] [< Menu location >]
 * @var $xe_opt->top_bar['social'] [< Returns on or off >]
 * @var $xe_opt->top_bar['phone']
 * @var $xe_opt->top_bar['email']
 * 
 * @var $xe_opt->header['container'] [< Returns container or container-fluid >]
 * @var $xe_opt->header['menu'] [< Returns menu location >]
 * @var $xe_opt->header['search'] [< Returns on or off >]
 * @var $xe_opt->header['cart'] [< Returns on or off >]
 * @var $xe_opt->header['social'] [< Returns on or off >]
 * @var $xe_opt->logo['dark']
 * @var $xe_opt->logo['light']
 *
 * @var $xe_opt->title_bar['title'] [< Escape with wp_kses >]
 * @var $xe_opt->title_bar['subtitle'] [< Returns subtitle for current post type >]
 * @var $xe_opt->title_bar['breadcrumb'] [< Returns on or off >]
 * @var $xe_opt->title_bar['parallax'] [< Returns on or off >]
 * 
 * @method $xe_opt->classes() [< Adjusting spacing of classes (Array) >]
 *
 * @package _xe
 */

use Helpers\Xe_Helpers as Helper;

global $xe_opt;

$header_classes = Helper::classes( array('site-header', 'bg-primary') );
$nav_classes = Helper::classes( array('navbar', 'navbar-expand-lg', 'navbar-dark') );

$args = array(
  'strong' => array(),
  'em' => array(),
  'b' => array(),
  'br' => array(),
  'span' => array(
    'class' => array(),
  ),
); 

?>

<!-- Top-Bar -->
<?php if ($xe_opt->top_bar['switch'] == 'on') : ?>
<?php endif; ?>

<header id="masthead" class="<?php echo esc_attr($header_classes); ?>" role="banner">

  <div class="<?php echo esc_attr($xe_opt->header['container']); ?>">

    <!-- Navigation -->
    <nav id="site-navigation" class="<?php echo esc_attr($nav_classes); ?>" role="navigation">
      <a class="navbar-brand" href="<?php echo esc_url( home_url('/') ); ?>">XE</a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
      </button>

      <?php
        wp_nav_menu( array(
          'theme_location'    => $xe_opt->header['menu'],
          'depth'             => 3,
          'container'         => 'div',
          'container_class'   => 'collapse navbar-collapse',
          'container_id'      => 'navbarSupportedContent',
          'menu_class'        => 'navbar-nav ml-auto',
          'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s</ul>',
          'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
          'walker'            => new WP_Bootstrap_Navwalker(),
        ) );
      ?>
    </nav><!-- #site-navigation -->

  </div><!-- .container -->

</header><!-- #masthead -->

<!-- Title-Bar -->
<?php if ( $xe_opt->title_bar['switch'] == 'on' ) : ?>
  <div id="title-bar" class="title-bar text-center">
    <div class="overlay">
      <div class="<?php echo esc_attr($xe_opt->container); ?>">
        <h1 class="display-4 title"><?php echo wp_kses($xe_opt->title_bar['title'], $args); ?></h1>
        <p class="lead subtitle"><?php echo wp_kses($xe_opt->title_bar['subtitle'], $args); ?></p>
      </div>
    </div>
  </div>
<?php endif; 