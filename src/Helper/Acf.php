<?php

namespace Helper;

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
}
