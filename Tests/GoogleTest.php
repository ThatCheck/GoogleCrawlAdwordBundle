<?php

/**
 * Created by PhpStorm.
 * User: admin_000
 * Date: 14/04/2015
 * Time: 13:39.
 */

namespace Thatcheck\GoogleAdwordBundle\Test;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class GoogleTest extends KernelTestCase
{
    public function testSendFrRequest()
    {
        $kernel = $this->createKernel();
        $kernel->boot();
        $kernel->getContainer()->get('thatcheck_google_adword.google')->search('amazon');
    }
}
