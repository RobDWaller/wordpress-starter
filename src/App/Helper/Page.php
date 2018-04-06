<?php
namespace App\Helper;

use App\WordPress\WordPress;

/**
 * @author Chris Boakes <chris@chrisboakes.com>
 * @version v1.0.1
 *
 * Wordpress Helper Functions
 */
class Page
{
    use WordPress;

    //<title> tag
    public function getPageTitle()
    {
        //Yoast
        $title = $this->wpTitle('', false);
        //No Yoast
        if (!defined('WPSEO_VERSION')) {
            if ($title) {
                $title .= ' | ';
            }
            $title .= $this->getBlogInfo('name');
        }
        return $title;
    }
}
