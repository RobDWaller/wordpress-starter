<?php

try {
    $respository = Config\Config::getInstance();

    $plugins = $respository->get('mu-plugins');

    if (count($plugins) >= 0) {
        foreach ($plugins as $plugin) {
            require_once __DIR__ . '/' . $plugin;
        }
    }
} catch (\Error $e) {
    echo $e->getMessage();
    die();
}
