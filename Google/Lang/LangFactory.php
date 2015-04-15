<?php

/**
 * Created by PhpStorm.
 * User: admin_000
 * Date: 15/04/2015
 * Time: 09:52.
 */

namespace Thatcheck\GoogleAdwordBundle\Google\Lang;

use Thatcheck\GoogleAdwordBundle\Exception\InvalidLangException;

class LangFactory
{
    private $langArray;

    public function __construct()
    {
        $this->langArray = array();
    }

    public function addLang(GoogleLangInterface $interface, $id)
    {
        $this->langArray[$id] = $interface;
    }

    public function getLang($string)
    {
        if (array_key_exists($string, $this->langArray)) {
            return $this->langArray[$string];
        }
        throw new InvalidLangException($string);
    }

    public function getAvailableLang()
    {
        return array_keys($this->langArray);
    }
}
