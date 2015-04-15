<?php

/**
 * Created by PhpStorm.
 * User: admin_000
 * Date: 14/04/2015
 * Time: 14:20.
 */

namespace Thatcheck\GoogleAdwordBundle\Google\Lang;

class GoogleFrCrawler implements GoogleLangInterface
{
    public function getLang()
    {
        return 'FR';
    }

    public function getLangConst()
    {
        return ['HL' => 'fr', 'LR' => 'lang_fr', 'TLD' => 'fr', 'ACCEPT' => 'fr;q=0.8'];
    }
}
