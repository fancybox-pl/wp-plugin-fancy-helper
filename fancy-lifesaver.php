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

if (defined('PHP_MAJOR_VERSION') && PHP_MAJOR_VERSION <= 5) {
    function fancy_lifesaver_languages()
    {
        load_plugin_textdomain('fancy-lifesaver', false, '/fancy-lifesaver/languages/');
    }
    add_action('plugins_loaded', 'fancy_lifesaver_languages');

    function fancy_lifesaver_notice()
    {
        echo '<div class="error"><p>'.__('Danger - You are using a very old version of PHP, update it as soon as possible.', 'fancy-lifesaver').'</p></div>';
    }
    add_action('admin_notices', 'fancy_lifesaver_notice');
} else {
    define('FANCY_LIFESAVER_VERSION', '1.0.0');
    define('FANCY_LIFESAVER_PLUGIN_URL', plugin_dir_url(__FILE__));
    define('FANCY_LIFESAVER_PLUGIN_DIR', dirname(__FILE__));
    define('FANCY_LIFESAVER_PLUGIN_BASENAME', plugin_basename(__FILE__));

    require_once plugin_dir_path(__FILE__).'src/Fancy_Lifesaver.php';
    require_once plugin_dir_path(__FILE__).'src/Controller/Fancy_Lifesaver_Controller.php';
    require_once plugin_dir_path(__FILE__).'src/routing.php';

    $fancy_livesaver = new Fancy_Lifesaver();
}
