<nav class="c-nav">
    <?php
        $args = [
            'container' => '',
            'echo' => true,
            'items_wrap' => '<ul class="c-nav__menu">%3$s</ul>'
        ];
        wp_nav_menu($args);
    ?>
</nav>
