<?php
namespace App\Helper;

use App\WordPress\WordPress;

/**
 * @author Chris Boakes <chris@chrisboakes.com>
 * @version v1.0.1
 *
 * Resets Wordpress default actions and filters
 */
class Reset
{
    use WordPress;

    public function resetWordpressDefaults()
    {
        //Remove emojis
        $this->removeAction('wp_head', 'print_emoji_detection_script', 7);
        $this->removeAction('admin_print_scripts', 'print_emoji_detection_script');
        $this->removeAction('wp_print_styles', 'print_emoji_styles');
        $this->removeAction('admin_print_styles', 'print_emoji_styles');

        //Additional removals
        $this->removeAction('wp_head', 'rest_output_link_wp_head');
        $this->removeAction('wp_head', 'wp_oembed_add_discovery_links');
        $this->removeAction('template_redirect', 'rest_output_link_header', 11);
        $this->removeAction('wp_head', 'rsd_link');
        $this->removeAction('wp_head', 'wlwmanifest_link');
        $this->removeAction('wp_head', 'wp_generator');
        $this->removeAction('welcome_panel', 'wp_welcome_panel');

        //Remove excerpt auto <p> tags
        $this->removeFilter('the_excerpt', 'wpautop');

        //Remove dashboard widgets
        $this->addAction('wp_dashboard_setup', function () {
            global $wp_meta_boxes;
            unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
            unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
            unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
            unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
            unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_drafts']);
            unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
            unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
            unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
        });

        //Remove footer scripts
        $this->addAction('wp_footer', function () {
            $this->wpDeregisterScript('wp-embed');
        });

        //Visually move Yoast panel down in admin
        $this->addFilter('wpseo_metabox_prio', function () {
            return 'low';
        });

        // Remove Wordpress version number from scripts and css
        $this->addFilter('style_loader_src', function ($src) {
            return $this->removeWpVersionNo($src);
        }, 9999);

        $this->addFilter('script_loader_src', function ($src) {
            return $this->removeWpVersionNo($src);
        }, 9999);
    }

    public function removeWpVersionNo($src)
    {
        if (strpos($src, 'ver=' . $this->getBlogInfo('version'))) {
            $src = $this->removeQueryArg('ver', $src);
        }
        return $src;
    }
}
