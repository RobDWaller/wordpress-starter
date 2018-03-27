<?php

/**
 * Check to see if ACF Custom fields exists, if so add the ones defined in the
 * acf-aconfig config file.
 */

function checkForAcf()
{
    $acfConfig = new App\Acf\Config();

    $acfConfig->make();
}

add_action('wp_loaded', 'checkForAcf');

/**
 * Remove the Custom Fields menu item from the WordPress admin dashboard.
 */

function removeAcfFromMenu()
{
    $acfConfig = new App\Acf\Config();

    $acfConfig->removeMenuItem();
}

add_action('admin_menu', 'removeAcfFromMenu');
