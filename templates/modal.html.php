<div id="fancy-lifesaver-modal" class="fancy-lifesaver__modal" style="display: none">
  <div id="fancy-lifesaver-modal-wrap" class="fancy-lifesaver__modal-wrap">
    <header class="fancy-lifesaver__modal-header">
      <img src="<?php echo FANCY_LIFESAVER_PLUGIN_URL.'assets/svg/fancy-cube.svg' ?>">
      <span class="fancy-lifesaver__modal-header-text">Opisz swój problem/awarię</span>
      <span id="fancy-lifesaver-close" class="fancy-lifesaver__modal-close dashicons dashicons-no-alt"></span>
    </header>
    <div class="fancy-lifesaver__modal-content">
      <form id="fancy-lifesaver-form">
        <div class="fancy-lifesaver__modal-field required">
          <label for="fancy-lifesaver-name" class="fancy-lifesaver__modal-label">Imię i nazwisko/nazwa firmy</label>
          <input id="fancy-lifesaver-name" name="fancy-lifesaver-name" type="text" class="fancy-lifesaver__modal-input" required>
        </div>
        <div class="fancy-lifesaver__modal-field required">
          <label for="fancy-lifesaver-email" class="fancy-lifesaver__modal-label">Adres email do kontaktu</label>
          <input id="fancy-lifesaver-email" name="fancy-lifesaver-email" type="email" class="fancy-lifesaver__modal-input" required>
        </div>
        <div class="fancy-lifesaver__modal-field">
          <label for="fancy-lifesaver-phone" class="fancy-lifesaver__modal-label">Numer telefonu</label>
          <input id="fancy-lifesaver-phone" name="fancy-lifesaver-phone" type="text" class="fancy-lifesaver__modal-input">
        </div>
        <div class="fancy-lifesaver__modal-field required">
          <label for="fancy-lifesaver-content" class="fancy-lifesaver__modal-label">Opis problemu</label>
          <textarea id="fancy-lifesaver-content" name="fancy-lifesaver-content" class="fancy-lifesaver__modal-textarea" required></textarea>
        </div>
        <div class="fancy-lifesaver__modal-field required">
          <input id="fancy-lifesaver-acceptance" name="fancy-lifesaver-acceptance" type="checkbox" class="fancy-lifesaver__modal-input-checkbox" required>
          <label for="fancy-lifesaver-acceptance" class="fancy-lifesaver__modal-label-checkbox">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Tollenda est atque extrahenda radicitus.</label>
        </div>
        <div class="fancy-lifesaver__modal-field" style="text-align: center">
          <button id="fancy-lifesaver-submit" class="fancy-lifesaver__modal-submit">
            <span class="fancy-lifesaver__modal-icons">
              <span class="dashicons dashicons-yes"></span>
              <span class="dashicons dashicons-image-rotate"></span>
            </span>
            Wyślij
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
