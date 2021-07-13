<?php
define('HELPER_ON', env('HELPER_ON', true));
define('HELPER_DIR', env('HELPER_DIR', '../app/Helper/'));
define('HELPER_PREFIX', env('HELPER_PREFIX', '_helper'));

function load_helper(string $file)
{
    include_once __DIR__ . '/' . $file . '.php';
}

if (HELPER_ON) {
    foreach (glob(HELPER_DIR . "*.php") as $helper) {
        if (substr($helper, -11) === HELPER_PREFIX . '.php') {
            include $helper;
        }
    }
}
