<div id="fancy-lifesaver-modal" class="fancy-lifesaver__modal" style="display: none">
  <div id="fancy-lifesaver-modal-wrap" class="fancy-lifesaver__modal-wrap">
    <header class="fancy-lifesaver__modal-header">
      <img src="<?php echo FANCY_LIFESAVER_PLUGIN_URL.'assets/svg/fancy-cube.svg' ?>">
      <span class="fancy-lifesaver__modal-header-text"><?php _e('Describe your problem / failure', 'fancy-lifesaver') ?></span>
      <span id="fancy-lifesaver-close" class="fancy-lifesaver__modal-close dashicons dashicons-no-alt"></span>
    </header>
    <div class="fancy-lifesaver__modal-content">
      <form id="fancy-lifesaver-form">
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
          <label for="fancy-lifesaver-acceptance" class="fancy-lifesaver__modal-label-checkbox">Wyrażasz zgodę na przesłanie informacji na adres aaa@bbb.pl o swojej stronie (adresu url, nazwy i wersji szablonu oraz wtyczek, wersji PHP i informacji o Twojej przeglądarce) oraz danych z tego formularza. Przesłane informacje będą potrzebne do zdiagnozowania problemu. </label>
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
