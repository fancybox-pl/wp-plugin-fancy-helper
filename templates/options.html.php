<div class="wrap">
  <h1><?php _e('Fancy Lifesaver Settings', 'fancy-lifesaver') ?></h1>
  <form name="form" action="options.php" method="post">
    <p><?php _e('Visibility settings of Fancy Lifesaver', 'fancy-lifesaver') ?></p>
    <table class="form-table" role="presentation">
      <tbody>
        <tr>
          <th scope="row"><?php _e('Visibility lifebuoy', 'fancy-lifesaver') ?></th>
          <td>
            <fieldset>
              <label for="fancy-lifesaver_visible_widget">
                <input name="fancy-lifesaver_visible_widget" type="checkbox" id="fancy-lifesaver_visible_widget" value="1" checked="checked">
                <?php _e('Show lifebuoy in admin panel', 'fancy-lifesaver') ?>
              </label>
            </fieldset>
          </td>
        </tr>
        <tr>
          <th scope="row"><?php _e('Visibility in admin bar', 'fancy-lifesaver') ?></th>
          <td>
            <fieldset>
              <label for="fancy-lifesaver_visible_link_in_admin_bar">
                <input name="fancy-lifesaver_visible_link_in_admin_bar" type="checkbox" id="fancy-lifesaver_visible_link_in_admin_bar" value="1" checked="checked">
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
