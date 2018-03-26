<?php

try {
    $respository = App\Config\Config::getInstance();

    $plugins = $respository->get('mu-plugins');

    if (count($plugins) >= 1) {
        foreach ($plugins as $plugin) {
            require_once __DIR__ . '/' . $plugin;
        }
    }
} catch (\Error $e) {
    echo $e->getMessage();
    die();
}
