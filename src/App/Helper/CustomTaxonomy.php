<?php
namespace App\Helper;

use App\WordPress\WordPress;

/**
 * @author Chris Boakes <chris@chrisboakes.com>
 * @version v1.0.1
 *
 * Manages custom taxonomy integration with Wordpress
 */
class CustomTaxonomy
{
    use WordPress;

    //Return array of labels and arguments for custom taxonomy
    public static function createTaxonomy($titleSingle, $titlePlural, $taxSlug)
    {

        //Empty array to store the labels and arguments
        $taxVars = [];

        //Labels for the new taxonomy
        $taxLabels = [
            "name"              =>	_x($titlePlural, "taxonomy general name"),
            "singular_name"     =>	_x($titleSingle, "taxonomy singular name"),
            "search_items"      =>	__("Search $titlePlural"),
            "all_items"         =>	__("All $titlePlural"),
            "parent_item"       =>	__("Parent $titleSingle"),
            "parent_item_colon" =>	__("Parent $titleSingle:"),
            "edit_item"         =>	__("Edit $titleSingle"),
            "update_item"       =>	__("Update $titleSingle"),
            "add_new_item"      =>	__("Add New $titleSingle"),
            "new_item_name"     =>	__("New $titleSingle Name"),
            "menu_name"         =>	__("$titleSingle")
        ];

        //Arguments
        $taxVars["args"] = [
            "hierarchical"		=>	true,
            "labels"			=>	$taxLabels,
            "show_ui"			=>	true,
            "show_admin_column"	=>	true,
            "query_var"			=>	true,
            "rewrite"			=>	array( "slug" => "$taxSlug" )
        ];

        //Return the array
        return $taxVars;
    }
}
