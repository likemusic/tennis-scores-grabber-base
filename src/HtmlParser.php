<?php

namespace TennisScoresGrabber;

use DOMDocument;
use DOMElement;
use DOMXPath;
use TennisScoresGrabber\Contracts\TableParserInterface;

abstract class HtmlParser
{
    /**
     * @var TableParserInterface
     */
    private $tableParser;

    public function __construct(TableParserInterface $tableParser)
    {
        $this->tableParser = $tableParser;
    }

    public function getScoresDataByHtml($scoresHtml)
    {
        $scoresTable= $this->getScoresTable($scoresHtml);

        return $this->parseScoresTable($scoresTable);
    }

    private function getScoresTable($scoresHtml): DOMElement
    {
        $scoresTableSelector = $this->getScoresTableSelector();

        return $this->getFirstByXPath($scoresHtml, $scoresTableSelector);
    }

    abstract protected function getScoresTableSelector(): string;

    private function getFirstByXPath(string $html, string $xPathQuery)
    {
        $domNodeList = $this->getByXPath($html, $xPathQuery);

        return $domNodeList->item(0);
    }

    private function getByXPath(string $html, string $xPathQuery)
    {
        libxml_use_internal_errors(true);
        $domDocument = new DOMDocument();
        $domDocument->loadHTML($html);
        libxml_use_internal_errors(false);

        $domXPath = new DOMXPath($domDocument);

        return $domXPath->query($xPathQuery);
    }

    private function parseScoresTable(DOMElement $scoresTable)
    {
        return $this->tableParser->getScoresData($scoresTable);
    }
}
