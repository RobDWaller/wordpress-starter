<?php

namespace App\Acf;

/**
 * @author Rob Waller <rdwaller1984@googlemail.com>
 *
 * A class to translate the WordPress Starter Repo config into Advanced Custom
 * Fields field groups. Also makes ACF unaccessible from WordPress Admin area.
 * The reason for this is that ACF is a config based plugin and the config setup
 * should exist in the codebase not the the database. This is so changes can be
 * made without the need to deploy an updated database.
 */

use App\Config\Config as AppConfig;
use App\Exception\AcfException;
use App\WordPress\Acf;
use App\WordPress\WordPress;

class Config
{
    use Acf, WordPress;

    protected $config;

    /**
     * Construct class and instantiate the config
     */
    public function __construct()
    {
        $this->config = AppConfig::getInstance();
    }

    /**
     * Check if the ACF plugin exists and the ACF config exists. Then validate
     * the config and create the ACF custom fields based on the config
     */
    public function make()
    {
        if ($this->acfExists() && $this->config->has('acf-config')) {
            $this->validate($this->config->get('acf-config'));
            $this->passToAcf($this->config->get('acf-config'));
        }
    }

    /**
     * Remove the ACF menu button from the WordPress admin dashboard
     */
    public function removeMenuItem()
    {
        if ($this->acfExists()) {
            $this->addFilter('acf/settings/show_admin', '__return_false');
        }
    }

    /**
     * Check that ACF exists within the application codebase
     */
    private function acfExists()
    {
        return function_exists('acf_add_local_field_group');
    }

    /**
     * Validate the ACF config to make sure the key parts exist, otherwise
     * through the exception
     */
    private function validate(array $data)
    {
        foreach ($data as $acfArray) {
            if (!array_key_exists('key', $acfArray) ||
                !array_key_exists('title', $acfArray) ||
                !array_key_exists('fields', $acfArray) ||
                !array_key_exists('location', $acfArray)) {
                throw new AcfException(
                    'Make sure the ACF config array structure is correct,
					it must include a key, title, fields and location.'
                );
            }
        }
    }

    /**
     * Pass the ACF config to ACF itself to create the relevant custom fields
     */
    private function passToAcf(array $data)
    {
        foreach ($data as $acfArray) {
            $this->acfAddLocalFieldGroup($acfArray);
        }
    }
}
