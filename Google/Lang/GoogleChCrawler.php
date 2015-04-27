<?php

/**
 * Created by PhpStorm.
 * User: admin_000
 * Date: 27/04/2015
 * Time: 20:54.
 */

namespace Thatcheck\GoogleAdwordBundle\Google\Lang;

class GoogleChCrawler implements GoogleLangInterface
{
    public function getLang()
    {
        return 'CH';
    }

    public function getLangConst()
    {
        return ['HL' => 'fr', 'LR' => 'lang_fr', 'TLD' => 'ch', 'ACCEPT' => 'ch;q=0.8'];
    }
}
