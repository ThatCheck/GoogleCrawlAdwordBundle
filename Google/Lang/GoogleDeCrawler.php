<?php

/**
 * Created by PhpStorm.
 * User: admin_000
 * Date: 27/04/2015
 * Time: 20:43.
 */

namespace Thatcheck\GoogleAdwordBundle\Google\Lang;

class GoogleDeCrawler implements GoogleLangInterface
{
    public function getLang()
    {
        return 'DE';
    }

    public function getLangConst()
    {
        return ['HL' => 'de', 'LR' => 'lang_de', 'TLD' => 'de', 'ACCEPT' => 'de;q=0.8'];
    }
}
