<div class="wrap">
  <h1><?php _e('Fancy Lifesaver Settings', 'fancy-lifesaver') ?></h1>
  <form name="form" action="options.php" method="post">
    <?php settings_fields('fancy_lifesaver_plugin_page'); ?>

    <p><?php _e('Visibility settings of Fancy Lifesaver', 'fancy-lifesaver') ?></p>

    <table class="form-table" role="presentation">
      <tbody>
        <tr>
          <th scope="row"><?php _e('Visibility lifebuoy', 'fancy-lifesaver') ?></th>
          <td>
            <fieldset>
              <label for="fancy_lifesaver_lifebuoy_visible">
                <input
                  id="fancy_lifesaver_lifebuoy_visible"
                  type="checkbox"
                  name="fancy_lifesaver_lifebuoy_visible"
                  <?php if (!empty(get_option('fancy_lifesaver_lifebuoy_visible', 1))): ?>checked="checked"<?php endif; ?>
                  value="1">
                <?php _e('Show lifebuoy in admin panel', 'fancy-lifesaver') ?>
              </label>
            </fieldset>
          </td>
        </tr>
        <tr>
          <th scope="row"><?php _e('Visibility in admin bar', 'fancy-lifesaver') ?></th>
          <td>
            <fieldset>
              <label for="fancy_lifesaver_admin_bar_link_visible">
                <input
                  id="fancy_lifesaver_admin_bar_link_visible"
                  type="checkbox"
                  name="fancy_lifesaver_admin_bar_link_visible"
                  <?php if (!empty(get_option('fancy_lifesaver_admin_bar_link_visible', 1))): ?>checked="checked"<?php endif; ?>
                  value="1">
                <?php _e('Show help link in admin bar', 'fancy-lifesaver') ?>
              </label>
            </fieldset>
          </td>
        </tr>
      </tbody>
    </table>

    <?php submit_button(); ?>
  </form>
</div>
