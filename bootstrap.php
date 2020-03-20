<?php

use Fancybox\Fancy_Lifesaver\Kernel;

define('FANCY_LIFESAVER_VERSION', '1.0.0');
define('FANCY_LIFESAVER_PLUGIN_URL', plugin_dir_url(__FILE__));
define('FANCY_LIFESAVER_PLUGIN_DIR', dirname(__FILE__));
define('FANCY_LIFESAVER_PLUGIN_BASENAME', plugin_basename(__FILE__));

if (is_file(__DIR__.'/env.dev.php')) {
    require_once __DIR__.'/env.dev.php';
} else {
    require_once __DIR__.'/env.php';
}

$fancy_livesaver = new Kernel();
