<?php
namespace App\Helper;

use App\WordPress\WordPress;

/**
 * @author Milad Alizadeh <hello@mili.london>
 * @version v1.0.0
 */
class DisableComments
{
    use WordPress;

    public function disableAllComments()
    {
        $this->addAction('admin_init', function () {
            $post_types = $this->getPostTypes();
            foreach ($post_types as $post_type) {
                if ($this->postTypeSupports($post_type, 'comments')) {
                    $this->removePostTypeSupport($post_type, 'comments');
                    $this->removePostTypeSupport($post_type, 'trackbacks');
                }
            }
        });


        // Close comments on the front-end
        $this->addFilter('comments_open', function () {
            return false;
        }, 20, 2);
        $this->addFilter('pings_open', function () {
            return false;
        }, 20, 2);

        // Hide existing comments
        $this->addFilter('comments_array', function ($comments) {
            $comments = array();
            return $comments;
        }, 10, 2);

        // Remove comments page in menu
        $this->addAction('admin_menu', function () {
            $this->removeMenuPage('edit-comments.php');
        });

        // Redirect any user trying to access comments page
        $this->addAction('admin_init', function () {
            global $pagenow;
            if ($pagenow === 'edit-comments.php') {
                $this->wpRedirect($this->adminUrl());
                exit;
            }
        });

        $this->addAction('admin_init', // Remove comments metabox from dashboard
        function () {
            $this->removeMetaBox('dashboard_recent_comments', 'dashboard', 'normal');
        });

        // Remove comments links from admin bar
        $this->addAction('init', function () {
            if ($this->isAdminBarShowing()) {
                $this->removeAction('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
            }
        });
    }
}
