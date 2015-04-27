<?php

/**
 * Created by PhpStorm.
 * User: admin_000
 * Date: 27/04/2015
 * Time: 20:44.
 */

namespace Thatcheck\GoogleAdwordBundle\Google\Lang;

class GoogleEsCrawler implements GoogleLangInterface
{
    public function getLang()
    {
        return 'ES';
    }

    public function getLangConst()
    {
        return ['HL' => 'es', 'LR' => 'lang_es', 'TLD' => 'es', 'ACCEPT' => 'es;q=0.8'];
    }
}
