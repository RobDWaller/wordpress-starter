<?php
namespace Theme\Bootstrap;

/**
 * @author Chris Boakes <chris@chrisboakes.com>
 * @version v1.0.1
 *
 * Wordpress Helper Functions
 */
class Helpers
{
    //<title> tag
    public static function getPageTitle()
    {
        //Yoast
        $title = wp_title('', false);
        //No Yoast
        if (!defined('WPSEO_VERSION')) {
            if ($title) {
                $title .= ' | ';
            }
            $title .= get_bloginfo('name');
        }
        return $title;
    }
}
