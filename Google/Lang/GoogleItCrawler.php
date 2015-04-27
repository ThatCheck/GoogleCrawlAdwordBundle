<?php

/**
 * Created by PhpStorm.
 * User: admin_000
 * Date: 27/04/2015
 * Time: 20:55.
 */

namespace Thatcheck\GoogleAdwordBundle\Google\Lang;

class GoogleItCrawler implements GoogleLangInterface
{
    public function getLang()
    {
        return 'IT';
    }

    public function getLangConst()
    {
        return ['HL' => 'it', 'LR' => 'lang_it', 'TLD' => 'it', 'ACCEPT' => 'it;q=0.8'];
    }
}
