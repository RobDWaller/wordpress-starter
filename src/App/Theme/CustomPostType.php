<?php
namespace Theme;

use App\WordPress\WordPress;

/**
 * @author Chris Boakes <chris@chrisboakes.com>
 * @version v1.0.1
 *
 * Manages custom post type integration with Wordpress
 */
class CustomPostType
{
    use WordPress;

    //Custom post type function
    public static function createPostType($titleSingle=false, $titlePlural=false, $args=array())
    {
        //If we've set a single and plural title
        if ($titleSingle && $titlePlural) {
            $titleSlug = $this->sanitizeTitle($titleSingle);

            $defaults = array(
                'labels' => array(
                    'name' => __($titlePlural, $titleSlug),
                    'singular_name' => __($titleSingle, $titleSlug),
                    'add_new' => __('Add New', $titleSlug),
                    'add_new_item' => __('Add New '.$titleSingle, $titleSlug),
                    'edit' => __('Edit', $titleSlug),
                    'edit_item' => __('Edit '.$titleSingle, $titleSlug),
                    'new_item' => __('New '.$titleSingle, $titleSlug),
                    'view' => __('View '.$titleSingle, $titleSlug),
                    'view_item' => __('View '.$titleSingle, $titleSlug),
                    'search_items' => __('Search '.$titlePlural, $titleSlug),
                    'not_found' => __('No '.$titlePlural.' found', $titleSlug),
                    'not_found_in_trash' => __('No '.$titlePlural.' found in Trash', $titleSlug)
                ),
                'public' => true,
                'hierarchical' => true,
                'has_archive' => true,
                'menu_icon' =>  null,
                'supports' => array(
                    'title',
                    'editor',
                    'excerpt',
                    'thumbnail'
                ),
                'taxonomies' => array(),
                'can_export' => true
            );

            $args = $this->wpParseArgs($args, $defaults);

            $this->registerPostType($titleSlug, $args);
        }
    }
}
