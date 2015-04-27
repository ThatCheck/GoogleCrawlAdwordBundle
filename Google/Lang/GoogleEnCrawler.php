<?php

/**
 * Created by PhpStorm.
 * User: admin_000
 * Date: 27/04/2015
 * Time: 20:42.
 */

namespace Thatcheck\GoogleAdwordBundle\Google\Lang;

class GoogleEnCrawler implements GoogleLangInterface
{
    public function getLang()
    {
        return 'EN';
    }

    public function getLangConst()
    {
        return ['HL' => 'en', 'LR' => 'lang_en', 'TLD' => 'com', 'ACCEPT' => 'en-us,en;q=0.8'];
    }
}
