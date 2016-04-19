<?php

/**
 * Created by PhpStorm.
 * User: admin_000
 * Date: 14/04/2015
 * Time: 13:35.
 */
namespace thatcheck\GoogleAdwordBundle\Google;

use Goutte\Client;
use Symfony\Component\DomCrawler\Crawler;
use Thatcheck\GoogleAdwordBundle\Google\Lang\GoogleFrCrawler;
use Thatcheck\GoogleAdwordBundle\Google\Lang\GoogleLangInterface;
use Thatcheck\GoogleAdwordBundle\Google\Lang\LangFactory;
use Thatcheck\GoogleAdwordBundle\Google\Param\GoogleParams;
use Thatcheck\GoogleAdwordBundle\Google\Parser\AdwordParser;
use GuzzleHttp\Client as GuzzleClient;

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

    /**
     * @var LangFactory
     */
    private $langFactory;

    public function __construct(LangFactory $lang)
    {
        $this->langFactory = $lang;
        $this->client = new Client();
        $this->googleLang = new GoogleFrCrawler();
        $this->setLang('FR');
    }

    private function configureGoutteClient()
    {
        $guzzleClient = new GuzzleClient(array(
            'defaults' => array(
                'allow_redirects' => false,
                'cookies' => true,
            ),
            'curl' => array(
                CURLOPT_SSL_VERIFYPEER => false,
            ),
        ));
        $this->client->setClient($guzzleClient);
        $this->client->followRedirects(true);
        $this->client->setHeader('User-Agent', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2049.0 Safari/537.36');
        $this->client->setHeader('Accept-Language', $this->googleLang->getLangConst()['ACCEPT']);
    }

    public function setLang($lang)
    {
        $this->googleLang = $this->langFactory->getLang($lang);
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

    /**
     * @return Client
     */
    public function getClient()
    {
        return $this->client;
    }
}
