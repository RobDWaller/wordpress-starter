<?php
namespace App\Helper;

use App\WordPress\WordPress;
use App\WordPress\Acf;

/**
 * @author Chris Boakes <chris@chrisboakes.com>
 * @version v1.0.1
 *
 * Any project specific configuration is placed here
 */
class ProjectConfig
{
    use WordPress, Acf;

    public function ProjectConfig()
    {

        //Menus
        $this->addThemeSupport('menus');

        //Custom thumbnails
        $this->addThemeSupport('post-thumbnails');

        //Custom image sizes
        //add_image_size('medium-cropped', 900, 500, true);

        //ACF Options page
        if (function_exists('acf_add_options_page')) {
            $this->acfAddOptionsPage([
                'page_title'    =>  'General Settings',
                'menu_title'    =>  'General Settings',
                'menu_slug'     =>  'theme-general-settings',
                'capability'    =>  'edit_posts',
                'redirect'      =>  false
            ]);

            $this->acfAddOptionsSubPage([
                'page_title'    =>  'Header Settings',
                'menu_title'    =>  'Header',
                'parent_slug'   =>  'theme-general-settings',
            ]);

            $this->acfAddOptionsSubPage([
                'page_title'    =>  'Footer Settings',
                'menu_title'    =>  'Footer',
                'parent_slug'   =>  'theme-general-settings',
            ]);
        }
    }
}
