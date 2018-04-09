<nav class="c-site-nav">
    <?php
        wp_nav_menu([
            'container' => '',
            'echo' => true,
            'items_wrap' => '<ul class="c-site-nav__menu">%3$s</ul>'
        ]);
    ?>
</nav>
