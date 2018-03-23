<?php

namespace App\WordPress;

/**
 * @author Rob Waller <rdwaller1984@googlemail.com>
 *
 * Provides an interface for WordPress filter methods
 */

trait WordPress
{
    /**
     * Add a WordPress filter
     */
    public function addFilter(string $filter, callable $method, int $priority = 10, int $args = 1): bool
    {
        return add_filter($filter, $method, $priority, $args);
    }

    public function sanitizeTitle(string $title, sting $fallbackTitle = '', string $context = 'save'): string
    {
        return sanitize_title($title, $fallbackTitle, $context);
    }

    public function wpParseArgs(array $args, array $defaults = []): array
    {
        return wp_parse_args($args, $defaults);
    }

    /**
     * @return mixed
     */
    public function registerPostType(string $postType, array $args)
    {
        return register_post_type($postType, $args);
    }

    public function addAction(string $tag, callable $function, int $priority = 10, int $args = 1): bool
    {
        return add_action($tag, $function, $priority, $args);
    }

    public function getPostTypes(array $args = [], string $output = 'names', string $operator = 'and'): array
    {
        return get_post_types($args, $output, $operator);
    }

    public function postTypeSupports(string $postType, string $supports): bool
    {
        return post_type_supports($postType, $supports);
    }

    public function removePostTypeSupport(string $postType, string $supports)
    {
        remove_post_type_support($postType, $support);
    }

    /**
     * @return mixed
     */
    public function removeMenuPage(string $menuSlug)
    {
        return remove_menu_page($menuSlug);
    }

    public function adminUrl(): string
    {
        return admin_url();
    }

    public function wpRedirect(string $location, int $status = 302)
    {
        wp_redirect($location, $status);
    }

    public function removeMetaBox(string $id, string $page, string $context)
    {
        remove_meta_box($id, $page, $context);
    }

    public function isAdminBarShowing(): bool
    {
        return is_admin_bar_showing();
    }

    public function removeAction(string $tag, callable $function, int $priority = 10): bool
    {
        return remove_action($tag, $function, $priority);
    }

    public function wpEnqueueStyle()
    {
        wp_enqueue_style()
    }
}
