<?php

namespace Helper;

/**
 * @author Rob Waller <rdwaller1984@googlemail.com>
 *
 * Provides an interface for WordPress filter methods
 */

trait Filter
{
	/**
	 * Add a WordPress filter
	 */

	public function addFilter($filter, $method)
	{
		add_filter($filter, $method);
	}
}
