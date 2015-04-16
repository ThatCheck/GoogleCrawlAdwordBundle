<?php

/**
 * Created by PhpStorm.
 * User: admin_000
 * Date: 14/04/2015
 * Time: 15:18.
 */

namespace Thatcheck\GoogleAdwordBundle\Google\Parser;

use Symfony\Component\DomCrawler\Crawler;

class AdwordParser
{
    const RHS_QUERY_COLUMN = "//div[@id = 'rhs']//ol/li[@class = 'ads-ad']";
    const RHS_QUERY_BODY = "//div[@id = 'tads']//ol/li[@class = 'ads-ad']";
    const RHS_LINK = 'descendant::h3/a[@onmousedown]';
    const RHS_VISURL = "descendant::div[@class='ads-visurl']/cite";
    const RHS_TEXT = "descendant::div[@class='ads-creative']";

    public static function parseBody(Crawler $crawler)
    {
        $arrayResult = array();
        $crawler->filterXPath(self::RHS_QUERY_BODY)->each(
            function (Crawler $node, $i) use (&$arrayResult) {
                $aTag = $node->filterXPath(self::RHS_LINK, $node)->getNode(0);
                $visUrlTag = $node->filterXPath(self::RHS_VISURL, $node)->getNode(0);
                $textTag = $node->filterXPath(self::RHS_TEXT, $node)->getNode(0);

                $title = $aTag ?  strip_tags($aTag->textContent) : '';
                $adwordsUrl = $aTag ? $aTag->getAttribute('href') : '';
                $visurl = $visUrlTag ? strip_tags($visUrlTag->textContent) : '';
                $text = $textTag ? strip_tags($textTag->textContent) : '';
                $arrayResult[] = array(
                    'title' => $title,
                    'adwordUrl' => $adwordsUrl,
                    'visuUrl' => $visurl,
                    'text' => $text,
                );
            });

        return $arrayResult;
    }

    public static function parseColmun(Crawler $crawler)
    {
        $arrayResult = array();
        $crawler->filterXPath(self::RHS_QUERY_BODY)->each(
            function (Crawler $node, $i) use (&$arrayResult) {
                $aTag = $node->filterXPath(self::RHS_LINK, $node)->getNode(0);
                $visUrlTag = $node->filterXPath(self::RHS_VISURL, $node)->getNode(0);
                $textTag = $node->filterXPath(self::RHS_TEXT, $node)->getNode(0);

                $title = $aTag ?  strip_tags($aTag->textContent) : '';
                $adwordsUrl = $aTag ? $aTag->getAttribute('href') : '';
                $visurl = $visUrlTag ? strip_tags($visUrlTag->textContent) : '';
                $text = $textTag ? strip_tags($textTag->textContent) : '';
                $arrayResult[] = array(
                    'title' => $title,
                    'adwordUrl' => $adwordsUrl,
                    'visuUrl' => $visurl,
                    'text' => $text,
                );
            });

        return $arrayResult;
    }

    public static function parseAll(Crawler $crawler)
    {
        $res1 = self::parseBody($crawler);
        $res2 = self::parseColmun($crawler);
        return array_merge($res1, $res2);
    }
}
