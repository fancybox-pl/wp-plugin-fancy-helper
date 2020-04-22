<?php if (!empty(get_option('fancy_helper_lifebuoy_visible', 1))): ?>
  <div id="fancy-helper-show" class="fancy-helper">
    <div class="fancy-helper__widget">
      <img src="<?php echo FANCY_HELPER_PLUGIN_URL.'assets/svg/icon.svg' ?>" alt="<?php _e('Help', 'fancy-helper') ?>">
      <span class="fancy-helper__widget-label"><?php _e('Need help?', 'fancy-helper') ?></span>
    </div>
  </div>
<?php endif; ?>
