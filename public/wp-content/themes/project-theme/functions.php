<?php
use App\Helper\CustomPostType;
use App\Helper\CustomTaxonomy;
use App\Helper\Enqueues;
use App\Helper\Reset;
use App\Helper\DisableComments;
use App\Helper\Utilities;
use App\Helper\ProjectConfig;

//Reset Wordpress (removes redundant scripts etc.)
    add_action('init', 'resetWordpressDefaults');
    function resetWordpressDefaults()
    {
        // DisableComments::disableAllComments();
        // Reset::resetWordpressDefaults();
    }

    //Enqueue scripts and styles
    add_action('wp_enqueue_scripts', 'enqueueScriptsAndStyles');
    function enqueueScriptsAndStyles()
    {
        new Enqueues();
    }

    //Post types
    add_action('init', 'createPostTypes');
    function createPostTypes()
    {
        //CustomPostType::createPostType('Event', 'Events');
    }

    //Taxonomies
    add_action('init', 'createTaxonomies');
    function createTaxonomies()
    {
        // $eventType = CustomTaxonomy::createTaxonomy("Event Type", "Event Types", "event_type");
        // register_taxonomy("event_type", array("event"), $eventType["args"]);
    }

    //Project configuration - menus, image crops etc.
    add_action('init', 'projectConfig');
    function projectConfig()
    {
        // ProjectConfig::ProjectConfig();
    }
