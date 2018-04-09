<?php
namespace Theme\Model;

use App\WordPress\WordPress;
use \WP_Query;

/**
 * Fetch and parse Wordpress posts (or custom post types) for preview data of the full post
 *
 * @author Chris Boakes <chris@chrisboakes.com>
 */
class Previews
{
    use WordPress;

    protected $postType;
    protected $count;
    protected $additionalParams;

    public function __construct(string $postType = 'post', int $count = 5, array $additionalParams = [])
    {
        $this->postType = $postType;
        $this->count = $count;
        $this->additionalParams = $additionalParams;
        $this->previews = $this->parseWordpressQuery($this->previewQuery());
    }

    /**
     * Combine arguments and make a Wordpress query
     * @return Object
     */
    private function previewQuery()
    {
        $args = $this->appendParams([
            'posts_per_page' => $this->count,
            'post_type' => $this->postType
        ], $this->additionalParams);

        return new WP_Query($args);
    }

    /**
     * Loop through data returned from WP call and parse it for previews
     * @return Array
     */
    private function parseWordpressQuery(WP_Query $previewQuery)
    {
        $previews = [];

        if ($previewQuery->have_posts()):
            //Loop through the posts
            while ($previewQuery->have_posts()) {
                $previewQuery->the_post();

                $previews[] = [
                    'title' => get_the_title(),
                    'excerpt' => get_the_excerpt(),
                    'link' => get_permalink(),
                    'image' => 'https://picsum.photos/600/330'
                ];
            }
        wp_reset_postdata();
        endif;

        return $previews;
    }

    /**
     * Append array with additional arguments
     * @return Array
     */
    private function appendParams(array $args, array $params)
    {
        if (!empty($params)) {
            foreach ($params as $param) {
                if (array_key_exists('arg', $param) && array_key_exists('value', $param)) {
                    $args[$param['arg']] = $param['value'];
                }
            }
        }
        return $args;
    }

    /**
     * Get array of posts
     * @return Array
     */
    public function getPreviews()
    {
        return $this->previews;
    }
}
