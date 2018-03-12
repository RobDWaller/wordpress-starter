<?php
namespace Theme\Bootstrap;

/**
 * @author Chris Boakes <chris@chrisboakes.com>
 * @version v1.0.1
 *
 * Resets Wordpress default actions and filters
 */
class Reset
{
    public static function resetWordpressDefaults()
    {
        //Remove emojis
        remove_action('wp_head', 'print_emoji_detection_script', 7);
        remove_action('admin_print_scripts', 'print_emoji_detection_script');
        remove_action('wp_print_styles', 'print_emoji_styles');
        remove_action('admin_print_styles', 'print_emoji_styles');

        //Additional removals
        remove_action('wp_head', 'rest_output_link_wp_head');
        remove_action('wp_head', 'wp_oembed_add_discovery_links');
        remove_action('template_redirect', 'rest_output_link_header', 11, 0);
        remove_action('wp_head', 'rsd_link');
        remove_action('wp_head', 'wlwmanifest_link');
        remove_action('wp_head', 'wp_generator');
        remove_action('welcome_panel', 'wp_welcome_panel');

        //Remove excerpt auto <p> tags
        remove_filter('the_excerpt', 'wpautop');

        //Remove dashboard widgets
        add_action('wp_dashboard_setup', function () {
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
        add_action('wp_footer', function () {
            wp_deregister_script('wp-embed');
        });

        //Visually move Yoast panel down in admin
        add_filter('wpseo_metabox_prio', function () {
            return 'low';
        });

        // Remove Wordpress version number from scripts and css
        add_filter( 'style_loader_src', function ($src) {
            return self::removeWpVersionNo($src);
        }, 9999);

        add_filter( 'script_loader_src', function ($src) {
            return self::removeWpVersionNo($src);
        }, 9999);
    }

    public static function removeWpVersionNo( $src ) {
        if ( strpos( $src, 'ver=' . get_bloginfo( 'version' ) ) )
        $src = remove_query_arg( 'ver', $src );
        return $src;
    }
}
