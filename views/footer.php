<?php
/**
 * Template part for displaying Footer.
 *
 * @var $xe_opt->footer['logo'] [< Returns url >]
 * @var $xe_opt->footer['social'] [< Returns on or off >]
 * @var $xe_opt->footer['copyright'] [< String of copyright info (Use wp_kses_post) >]
 * @var $xe_opt->footer['logo']
 *
 * @package _xe
 */

global $xe_opt;

$sub_footer = $xe_opt->sub_footer();

if ($sub_footer['col']) : ?>
  <div id="sub-footer" class="sub-footer">
    <div class="<?php echo esc_attr($xe_opt->container); ?>">
      <div class="row">
        <?php if (is_active_sidebar('footer-1')) : ?>
          <div class="col-md-<?php echo esc_attr($sub_footer['col']); ?> col-one">
            <?php dynamic_sidebar('footer-1'); ?>
          </div>
        <?php endif; ?>

        <?php if (is_active_sidebar('footer-2')) : ?>
          <div class="col-md-<?php echo esc_attr($sub_footer['col']); ?> col-two">
            <?php dynamic_sidebar('footer-2'); ?>
          </div>
        <?php endif; ?>

        <?php if (is_active_sidebar('footer-3')) : ?>
          <div class="col-md-<?php echo esc_attr($sub_footer['col']); ?> col-three">
            <?php dynamic_sidebar('footer-3'); ?>
          </div>
        <?php endif; ?>

        <?php if (is_active_sidebar('footer-4')) : ?>
          <div class="col-md-<?php echo esc_attr($sub_footer['col']); ?> col-four">
            <?php dynamic_sidebar('footer-4'); ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
<?php endif; ?>

<div id="footer" class="site-info">
  <div class="<?php echo esc_attr($xe_opt->container); ?>">
    <div class="row">

      <div class="col-md-3 d-none d-md-block">
        <div class="back-to-top">
          <a href="#top" title="Back to top">
            <i class="fa fa-angle-double-up"></i>
          </a>
        </div>
      </div>

      <div class="col-md-9">
        <span class="copyright-info">
          <?php echo wp_kses_post($xe_opt->footer['copyright']); ?>
        </span>
        <div class="back-to-top xs d-md-none">
          <a href="#top" title="Back to top">
            <i class="fa fa-angle-double-up"></i>
          </a>
        </div>
      </div>

    </div><!-- .row -->
  </div><!-- .container -->
</div><!-- #footer -->