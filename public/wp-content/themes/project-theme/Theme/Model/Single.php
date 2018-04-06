<?php
namespace Theme\Model;

use App\WordPress\WordPress;

/**
 * Fetch data for a single Wordpress Item
 *
 * @author Chris Boakes <chris@chrisboakes.com>
 */
class Single
{
    use WordPress;

    protected $postId;

    public function __construct(int $postId)
    {
        $this->postId = $postId;
        $this->single = $this->parseQuery($this->singleQuery());
    }

    /**
     * Combine arguments and make a Wordpress query
     * @return Array
     */
    private function singleQuery()
    {
        return get_post($this->postId);
    }

    /**
     * Parse data from WP
     * @return Array
     */
    private function parseQuery($previewQuery)
    {
        return [
            'title' => $previewQuery->post_title,
            'content' => wpautop($previewQuery->post_content),
            'image' => 'https://picsum.photos/900/500'
        ];
    }

    /**
     * Get single item
     * @return Array
     */
    public function getSingle()
    {
        return $this->single;
    }
}
