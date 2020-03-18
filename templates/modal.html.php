<div id="fancy-lifesaver-modal" class="fancy-lifesaver__modal" style="display: none">
  <div id="fancy-lifesaver-modal-wrap" class="fancy-lifesaver__modal-wrap">
    <header class="fancy-lifesaver__modal-header">
      <img src="<?php echo FANCY_LIFESAVER_PLUGIN_URL.'assets/svg/fancy-cube.svg' ?>">
      <span class="fancy-lifesaver__modal-header-text"><?php _e('Describe your problem / failure', 'fancy-lifesaver') ?></span>
      <span id="fancy-lifesaver-close" class="fancy-lifesaver__modal-close dashicons dashicons-no-alt"></span>
    </header>
    <div class="fancy-lifesaver__modal-content">
      <form id="fancy-lifesaver-form">
        <input type="hidden" name="fancy-lifesaver-url" value="http<?php echo (($_SERVER['SERVER_PORT'] == 443) ? 's' : '') . '://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'] ?>">
        <input id="fancy-lifesaver-screen" type="hidden" name="fancy-lifesaver-screen" value="">
        <div class="fancy-lifesaver__modal-field required">
          <label for="fancy-lifesaver-name" class="fancy-lifesaver__modal-label"><?php _e('Name and surname / company name', 'fancy-lifesaver') ?></label>
          <input id="fancy-lifesaver-name" name="fancy-lifesaver-name" type="text" class="fancy-lifesaver__modal-input" required>
        </div>
        <div class="fancy-lifesaver__modal-field required">
          <label for="fancy-lifesaver-email" class="fancy-lifesaver__modal-label"><?php _e('Contact email address', 'fancy-lifesaver') ?></label>
          <input id="fancy-lifesaver-email" name="fancy-lifesaver-email" type="email" class="fancy-lifesaver__modal-input" required>
        </div>
        <div class="fancy-lifesaver__modal-field">
          <label for="fancy-lifesaver-phone" class="fancy-lifesaver__modal-label"><?php _e('Phone number', 'fancy-lifesaver') ?></label>
          <input id="fancy-lifesaver-phone" name="fancy-lifesaver-phone" type="text" class="fancy-lifesaver__modal-input">
        </div>
        <div class="fancy-lifesaver__modal-field required">
          <label for="fancy-lifesaver-content" class="fancy-lifesaver__modal-label"><?php _e('Description of the problem', 'fancy-lifesaver') ?></label>
          <textarea id="fancy-lifesaver-content" name="fancy-lifesaver-content" class="fancy-lifesaver__modal-textarea" required></textarea>
        </div>
        <div class="fancy-lifesaver__modal-field required">
          <input id="fancy-lifesaver-acceptance" name="fancy-lifesaver-acceptance" type="checkbox" class="fancy-lifesaver__modal-input-checkbox" required>
          <label for="fancy-lifesaver-acceptance" class="fancy-lifesaver__modal-label-checkbox">
          <?php
            /* translators: %s: delivery email address */
            printf(__('You agree to send information to the address %s about your website (url, version of the template and plugins, PHP version and information about your browser) and data from this form. The information you submit will be needed to diagnose the problem.', 'fancy-lifesaver'), Fancy_Lifesaver::DELIVERY_ADDRESS);
          ?>
          </label>
        </div>
        <div class="fancy-lifesaver__modal-field" style="text-align: center">
          <button id="fancy-lifesaver-submit" class="fancy-lifesaver__modal-submit">
            <span class="fancy-lifesaver__modal-icons">
              <span class="dashicons dashicons-yes"></span>
              <span class="dashicons dashicons-image-rotate"></span>
            </span>
            <?php _e('Send', 'fancy-lifesaver') ?>
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
