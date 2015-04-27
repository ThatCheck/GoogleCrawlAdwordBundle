<?php

/**
 * Created by PhpStorm.
 * User: admin_000
 * Date: 27/04/2015
 * Time: 20:46.
 */

namespace Thatcheck\GoogleAdwordBundle\Google\Lang;

class GooglePtCrawler  implements GoogleLangInterface
{
    public function getLang()
    {
        return 'PT';
    }

    public function getLangConst()
    {
        return ['HL' => 'pt-PT', 'LR' => 'lang_pt', 'TLD' => 'pt', 'ACCEPT' => 'pt;q=0.8'];
    }
}
