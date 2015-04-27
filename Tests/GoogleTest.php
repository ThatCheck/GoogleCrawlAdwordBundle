<?php

/**
 * Created by PhpStorm.
 * User: admin_000
 * Date: 14/04/2015
 * Time: 13:39.
 */

namespace Thatcheck\GoogleAdwordBundle\Test;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Thatcheck\GoogleAdwordBundle\Google\GoogleUrl;

class GoogleTest extends KernelTestCase
{
    /**
     * @dataProvider dataProviderSite
     */
    public function testSendFrRequest($input)
    {
        $kernel = $this->createKernel();
        $kernel->boot();
        $service = $kernel->getContainer()->get('thatcheck_google_adword.google');
        /*
         * @var GoogleUrl $service
         */
        $service->setLang($input);
        $service->search('amazon');

        $this->assertNotEquals(0, $service->getClient()->getCrawler()->filter('#resultStats')->count());
    }

    public function dataProviderSite()
    {
        return array(array('FR'),array('BE'),array('CH'),array('DE'),array('EN'), array('ES'), array('IT'), array('PT'));
    }
}
