<?php

/**
 * Created by PhpStorm.
 * User: admin_000
 * Date: 27/04/2015
 * Time: 20:47.
 */

namespace Thatcheck\GoogleAdwordBundle\Google\Lang;

class GoogleBeCrawler implements GoogleLangInterface
{
    public function getLang()
    {
        return 'BE';
    }

    public function getLangConst()
    {
        return ['HL' => 'fr', 'LR' => 'lang_fr', 'TLD' => 'be', 'ACCEPT' => 'be;q=0.8'];
    }
}
