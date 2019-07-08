<?php

namespace TennisScoresGrabber;

use DateTime;
use TennisScoresGrabber\Contracts\ScoresProviderInterface;
use TennisScoresGrabber\Contracts\HtmlProviderInterface;
use TennisScoresGrabber\Contracts\HtmlParserInterface;

class ScoresProvider implements ScoresProviderInterface
{
    /**
     * @var HtmlProviderInterface
     */
    private $scoresHtmlProvider;

    /**
     * @var HtmlParserInterface
     */
    private $scoresHtmlParser;

    /**
     * ScoresProvider constructor.
     * @param HtmlProviderInterface $scoresHtmlProvider
     * @param HtmlParserInterface $scoresHtmlParser
     */
    public function __construct(
        HtmlProviderInterface $scoresHtmlProvider,
        HtmlParserInterface $scoresHtmlParser
    ) {
        $this->scoresHtmlProvider = $scoresHtmlProvider;
        $this->scoresHtmlParser = $scoresHtmlParser;
    }

    /**
     * @param DateTime $dateTime
     * @return array
     */
    public function getScoresForDate(DateTime $dateTime)
    {
        $scoresHtml = $this->getScoresHtml($dateTime);
        $scoresData = $this->htmlToScoresData($scoresHtml);

        return $scoresData;
    }

    /**
     * @param DateTime $dateTime
     * @return string
     */
    private function getScoresHtml(DateTime $dateTime)
    {
        return $this->scoresHtmlProvider->getScoresHtmlByDate($dateTime);
    }

    /**
     * @param string $scoresHtml
     * @return array
     */
    private function htmlToScoresData($scoresHtml)
    {
        return $this->scoresHtmlParser->getScoresDataByHtml($scoresHtml);
    }
}
