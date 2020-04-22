<div class="wrap">
  <h1><?php _e('Fancy Helper Settings', 'fancy-helper') ?></h1>
  <form name="form" action="options.php" method="post">
    <?php settings_fields('fancy_helper_plugin_page'); ?>

    <p><?php _e('Visibility settings of Fancy Helper', 'fancy-helper') ?></p>

    <table class="form-table" role="presentation">
      <tbody>
        <tr>
          <th scope="row"><?php _e('Visibility lifebuoy', 'fancy-helper') ?></th>
          <td>
            <fieldset>
              <label for="fancy_helper_lifebuoy_visible">
                <input
                  id="fancy_helper_lifebuoy_visible"
                  type="checkbox"
                  name="fancy_helper_lifebuoy_visible"
                  <?php if (!empty(get_option('fancy_helper_lifebuoy_visible', 1))): ?>checked="checked"<?php endif; ?>
                  value="1">
                <?php _e('Show lifebuoy in admin panel', 'fancy-helper') ?>
              </label>
            </fieldset>
          </td>
        </tr>
        <tr>
          <th scope="row"><?php _e('Visibility in admin bar', 'fancy-helper') ?></th>
          <td>
            <fieldset>
              <label for="fancy_helper_admin_bar_link_visible">
                <input
                  id="fancy_helper_admin_bar_link_visible"
                  type="checkbox"
                  name="fancy_helper_admin_bar_link_visible"
                  <?php if (!empty(get_option('fancy_helper_admin_bar_link_visible', 1))): ?>checked="checked"<?php endif; ?>
                  value="1">
                <?php _e('Show help link in admin bar', 'fancy-helper') ?>
              </label>
            </fieldset>
          </td>
        </tr>
      </tbody>
    </table>

    <?php submit_button(); ?>
  </form>
</div>
