<?php

namespace App\WordPress;

/**
 * @author Rob Waller <rdwaller1984@googlemail.com>
 *
 * Provides an interface for WordPress Advanced Custom Fields methods
**/
trait Acf
{
    /**
     * Add a ACF custom field group to a relevant post or page
     */
    public function acfAddLocalFieldGroup(array $data)
    {
        acf_add_local_field_group($data);
    }

    public function acfAddOptionsPage(array $data)
    {
        acf_add_options_page($data);
    }

    public function acfAddOptionsSubPage(array $data)
    {
        acf_add_options_sub_page($data);
    }
}
