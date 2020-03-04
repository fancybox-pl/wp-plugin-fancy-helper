<?php

/**
 * @link              https://www.fancybox.pl/
 * @since             1.0.0
 * @package           Fancy_Lifesaver
 *
 * @wordpress-plugin
 * Plugin Name:       Fancy Lifesaver
 * Plugin URI:        https://www.fancybox.pl/
 * Description:       Lifebuoy for your Wordpress
 * Version:           1.0.0
 * Author:            FancyBox
 * Author URI:        https://www.fancybox.pl/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       fancy-lifesaver
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

define('FANCY_LIFESAVER_VERSION', '1.0.0');
define('FANCY_LIFESAVER_PLUGIN_URL', plugin_dir_url(__FILE__));
define('FANCY_LIFESAVER_PLUGIN_DIR', dirname(__FILE__));
define('FANCY_LIFESAVER_PLUGIN_BASENAME', plugin_basename(__FILE__));

require_once plugin_dir_path(__FILE__).'src/Fancy_Lifesaver.php';
require_once plugin_dir_path(__FILE__).'src/Controller/Fancy_Lifesaver_Controller.php';

$fancy_livesaver = new Fancy_Lifesaver();

add_action('admin_init', function () {
    register_setting('fancy-lifesaver', 'fancy-lifesaver_visible_widget');
});
