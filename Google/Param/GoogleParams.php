<?php

/**
 * Created by PhpStorm.
 * User: admin_000
 * Date: 14/04/2015
 * Time: 14:36.
 */

namespace Thatcheck\GoogleAdwordBundle\Google\Param;

use Thatcheck\GoogleAdwordBundle\Google\Lang\GoogleLangInterface;

class GoogleParams
{
    /**
     * @var array
     */
    private $googleParams;

    private $tld;

    public function __construct(GoogleLangInterface $lang)
    {
        $langConstant = $lang->getLangConst();
        $this->googleParams = array(
            'q' => '',                      // Search Query
            'start' => 0,                   // First result number
            'num' => 10,                    // Number of results per pages
            'complete' => 0,                // Suggestion auto
            'pws' => 0,                     // Personnal search
            'hl' =>  $langConstant['HL'],           // Interface langage
            'lr' =>  $langConstant['LR'],          // Results Langage
        );
        $this->setTld($langConstant['TLD']);
    }

    public function setTld($tld)
    {
        $this->tld = $tld;
    }

    public function setSearchTeam($q)
    {
        $this->googleParams['q'] = $q;
    }

    public function setMaxNumberResult($max)
    {
        $this->googleParams['num'] = $max;
    }

    public function generateUrl()
    {
        return 'https://www.google.'.$this->tld.'/search?'.http_build_query($this->googleParams);
    }
}
