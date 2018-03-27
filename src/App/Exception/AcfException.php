<?php

namespace App\Exception;

/**
 * @author Rob Waller <rdwaller1984@googlemail.com>
 *
 * Exception class for Advanced Custom Fields. Makes it more obvious what the
 * exception related to
 */
use Exception;

class AcfException extends Exception
{
    /**
     * Construct class and extend PHP Exception class
     */
    public function __construct($message, $code = 0, $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
