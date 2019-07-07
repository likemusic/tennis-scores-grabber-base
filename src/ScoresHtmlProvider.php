<?php

namespace TennisScoreGrabber;

use DateTime;
use TennisScoreGrabber\Contracts\HttpClientInterface;
use TennisScoreGrabber\Contracts\ScoresHtmlProviderInterface;

/**
 * Class ScoresHtmlProvider
 * @package TennisScoreGrabber
 */
abstract class ScoresHtmlProvider implements ScoresHtmlProviderInterface
{
    /**
     * @param DateTime $dateTime
     */
    abstract protected function getUrlByDateTime(DateTime $dateTime);

    /**
     * @var HttpClientInterface
     */
    private $httpClient;

    /**
     * ScoresHtmlProvider constructor.
     * @param HttpClientInterface $httpClient
     */
    public function __construct(HttpClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    /** @inheritdoc */
    public function getScoresHtmlByDate(DateTime $dateTime)
    {
        $dateUrl = $this->getUrlByDateTime($dateTime);

        return $this->getUrlContent($dateUrl);
    }

    private function getUrlContent($dateUrl)
    {
        return $this->httpClient->getUrlContent($dateUrl);
    }
}
