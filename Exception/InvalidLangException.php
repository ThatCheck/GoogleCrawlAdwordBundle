<?php

/**
 * Created by PhpStorm.
 * User: admin_000
 * Date: 15/04/2015
 * Time: 10:04.
 */

namespace Thatcheck\GoogleAdwordBundle\Exception;

class InvalidLangException extends \InvalidArgumentException
{
    public function __construct($refId)
    {
        parent::__construct('Unable to localize the lang with ref-id => '.$refId);
    }
}
