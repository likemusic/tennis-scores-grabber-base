<?php

namespace TennisScoresGrabber;

use DateTime;
use TennisScoresGrabber\Contracts\ScoresProviderInterface;
use TennisScoresGrabber\Contracts\ScoresHtmlProviderInterface;
use TennisScoresGrabber\Contracts\ScoresHtmlParserInterface;

class ScoresProvider implements ScoresProviderInterface
{
    /**
     * @var ScoresHtmlProviderInterface
     */
    private $scoresHtmlProvider;

    /**
     * @var ScoresHtmlParserInterface
     */
    private $scoresHtmlParser;

    /**
     * ScoresProvider constructor.
     * @param ScoresHtmlProviderInterface $scoresHtmlProvider
     * @param ScoresHtmlParserInterface $scoresHtmlParser
     */
    public function __construct(
        ScoresHtmlProviderInterface $scoresHtmlProvider,
        ScoresHtmlParserInterface $scoresHtmlParser
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
