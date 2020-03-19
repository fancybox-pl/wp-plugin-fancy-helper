<?php

use Fancybox\Fancy_Lifesaver\Fancy_Lifesaver_Kernel;

define('FANCY_LIFESAVER_VERSION', '1.0.0');
define('FANCY_LIFESAVER_PLUGIN_URL', plugin_dir_url(__FILE__));
define('FANCY_LIFESAVER_PLUGIN_DIR', dirname(__FILE__));
define('FANCY_LIFESAVER_PLUGIN_BASENAME', plugin_basename(__FILE__));

require_once plugin_dir_path(__FILE__).'src/routing.php';

$fancy_livesaver = new Fancy_Lifesaver_Kernel();
