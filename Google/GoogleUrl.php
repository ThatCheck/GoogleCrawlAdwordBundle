<?php

/**
 * Created by PhpStorm.
 * User: admin_000
 * Date: 14/04/2015
 * Time: 13:35.
 */

namespace Thatcheck\GoogleAdwordBundle\Google;

use Goutte\Client;
use Symfony\Component\DomCrawler\Crawler;
use Thatcheck\GoogleAdwordBundle\Google\Lang\GoogleFrCrawler;
use Thatcheck\GoogleAdwordBundle\Google\Lang\GoogleLangInterface;
use Thatcheck\GoogleAdwordBundle\Google\Param\GoogleParams;
use Thatcheck\GoogleAdwordBundle\Google\Parser\AdwordParser;

class GoogleUrl
{
    /**
     * @var Client
     */
    private $client;

    /**
     * @var GoogleParams
     */
    private $googleParams;

    /**
     * @var GoogleLangInterface
     */
    private $googleLang;

    /**
     * @var Crawler
     */
    private $request;

    public function __construct()
    {
        $this->client = new Client();
        $this->googleLang = new GoogleFrCrawler();
        $this->setLang($this->googleLang);
    }

    private function configureGoutteClient()
    {
        $this->client->followRedirects(true);
        $this->client->setHeader('User-Agent', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2049.0 Safari/537.36');
        $this->client->setHeader('Accept-Language', $this->googleLang->getLangConst()['ACCEPT']);
        $this->client->getClient()->setDefaultOption('config/curl/'.CURLOPT_SSL_VERIFYPEER, false);
    }

    public function setLang(GoogleLangInterface $lang)
    {
        $this->googleLang = $lang;
        $this->googleParams = new GoogleParams($this->googleLang);

        $this->configureGoutteClient();
    }

    public function search($term)
    {
        $this->googleParams->setSearchTeam($term);
        $this->request = $this->client->request('GET', $this->getGoogleParams()->generateUrl());
    }

    /**
     * @return array
     */
    public function parseAdword()
    {
        return AdwordParser::parseAll($this->request);
    }

    /**
     * @return array
     */
    public function parseAdwordBody()
    {
        return AdwordParser::parseBody($this->request);
    }

    /**
     * @return array
     */
    public function parseAdwordColumn()
    {
        return AdwordParser::parseColmun($this->request);
    }

    /**
     * @return GoogleParams
     */
    public function getGoogleParams()
    {
        return $this->googleParams;
    }
}
