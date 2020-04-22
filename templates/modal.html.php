<div id="fancy-helper-modal" class="fancy-ls fancy-helper__modal" style="display: none">
  <div id="fancy-helper-modal-wrap" class="fancy-helper__modal-wrap">
    <header class="fancy-helper__modal-header">
      <img src="<?php echo FANCY_HELPER_PLUGIN_URL.'assets/svg/fancy-cube.svg' ?>">
      <span class="fancy-helper__modal-header-text"><?php _e('Describe your problem / failure', 'fancy-helper') ?></span>
      <span id="fancy-helper-close" class="fancy-helper__modal-close dashicons dashicons-no-alt"></span>
    </header>
    <div class="fancy-helper__modal-content">
      <form id="fancy-helper-form" enctype="multipart/form-data">
        <input type="hidden" name="fancy-helper-url" value="http<?php echo(($_SERVER['SERVER_PORT'] == 443) ? 's' : '').'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'] ?>">
        <input id="fancy-helper-screen" type="hidden" name="fancy-helper-screen" value="">
        <div class="fancy-helper__modal-field required">
          <label for="fancy-helper-name" class="fancy-helper__modal-label"><?php _e('Name and surname / company name', 'fancy-helper') ?></label>
          <input id="fancy-helper-name" name="fancy-helper-name" type="text" class="fancy-helper__modal-input" required>
        </div>
        <div class="fancy-helper__modal-field required">
          <label for="fancy-helper-email" class="fancy-helper__modal-label"><?php _e('Contact email address', 'fancy-helper') ?></label>
          <input id="fancy-helper-email" name="fancy-helper-email" type="email" class="fancy-helper__modal-input" required>
        </div>
        <div class="fancy-helper__modal-field">
          <label for="fancy-helper-phone" class="fancy-helper__modal-label"><?php _e('Phone number', 'fancy-helper') ?></label>
          <input id="fancy-helper-phone" name="fancy-helper-phone" type="text" class="fancy-helper__modal-input">
        </div>
        <div class="fancy-helper__modal-field required">
          <label for="fancy-helper-content" class="fancy-helper__modal-label"><?php _e('Description of the problem', 'fancy-helper') ?></label>
          <textarea id="fancy-helper-content" name="fancy-helper-content" class="fancy-helper__modal-textarea" required></textarea>
        </div>
        <div class="fancy-helper__modal-field">
          <label for="fancy-helper-content" class="fancy-helper__modal-label"><?php _e('Screenshot', 'fancy-helper') ?></label>
          <input id="fancy-helper-files" class="fancy-helper__file-input" type="file" name="fancy-helper-files[]" accept="image/*" multiple>
          <div id="fancy-helper-files-thumb-wrapp" class="fancy-helper__upload-thumbs">
          </div>
        </div>
        <div class="fancy-helper__modal-field required">
          <input id="fancy-helper-acceptance" name="fancy-helper-acceptance" type="checkbox" class="fancy-helper__modal-input-checkbox" required>
          <label for="fancy-helper-acceptance" class="fancy-helper__modal-label-checkbox">
          <?php
            /* translators: %s: delivery email address */
            printf(__('You agree to send information to the address %s about your website (url, version of the template and plugins, PHP version and information about your browser) and data from this form. The information you submit will be needed to diagnose the problem.', 'fancy-helper'), $_ENV['fancy_helper_delivery_address']);
          ?>
          </label>
        </div>
        <div class="fancy-helper__modal-field" style="text-align: center">
          <button id="fancy-helper-submit" class="fancy-helper__modal-submit">
            <span class="fancy-helper__modal-icons">
              <span class="dashicons dashicons-yes"></span>
              <span class="dashicons dashicons-image-rotate"></span>
            </span>
            <?php _e('Send', 'fancy-helper') ?>
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
