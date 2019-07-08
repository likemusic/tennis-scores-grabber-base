<?php

namespace TennisScoresGrabber;

use DOMDocument;
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

    private function getScoresTable($scoresHtml)
    {
        $scoresTableSelector = $this->getScoresTableSelector();

        return $this->getByXPath($scoresHtml, $scoresTableSelector);
    }

    abstract protected function getScoresTableSelector(): string;

    private function getByXPath($html, $xPathQuery)
    {
        $domDocument = new DOMDocument();
        $domDocument->loadHTML($html);

        $domXPath = new DOMXPath($domDocument);

        return $domXPath->query($xPathQuery);
    }

    private function parseScoresTable($scoresTable)
    {
        return $this->tableParser->getScoresData($scoresTable);
    }
}
