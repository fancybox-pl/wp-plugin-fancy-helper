<?php

use Fancybox\Fancy_Helper\Kernel;

if (is_file(__DIR__.'/env.dev.php')) {
    require_once __DIR__.'/env.dev.php';
} else {
    require_once __DIR__.'/env.php';
}

$fancy_livesaver = new Kernel();
