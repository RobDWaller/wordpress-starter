<?php
namespace Theme\Bootstrap;
/**
 * @author Milad Alizadeh <hello@mili.london>
 * @version v1
 *
 * Render function
 */
class Render
{
    /**
     * Loads a view
     * @param  string $view
     * @param  object $data
     * @example $this->loadView('grid', $data);
     * @return string Compiled view
     */
    public static function view($view, $data = null)
    {
        ob_start();
        include get_template_directory() . "/App/View/" . $view . ".php";
        $view = ob_get_contents();
        ob_end_clean();
        return $view;
    }
}
