<?php
namespace Theme\Bootstrap;

/**
 * @author Chris Boakes <chris@chrisboakes.com>
 * @version v1.0.1
 *
 * Any project specific configuration is placed here
 */
class ProjectConfig
{
    public static function ProjectConfig()
    {

        //Menus
        add_theme_support('menus');

        //Custom thumbnails
        add_theme_support('post-thumbnails');

        //Custom image sizes
        //add_image_size('medium-cropped', 900, 500, true);

        //ACF Options page
        if (function_exists('acf_add_options_page')) {
            acf_add_options_page(array(
                'page_title'    =>  'General Settings',
                'menu_title'    =>  'General Settings',
                'menu_slug'     =>  'theme-general-settings',
                'capability'    =>  'edit_posts',
                'redirect'      =>  false
            ));

            acf_add_options_sub_page(array(
                'page_title'    =>  'Header Settings',
                'menu_title'    =>  'Header',
                'parent_slug'   =>  'theme-general-settings',
            ));

            acf_add_options_sub_page(array(
                'page_title'    =>  'Footer Settings',
                'menu_title'    =>  'Footer',
                'parent_slug'   =>  'theme-general-settings',
            ));
        }
    }
}
