<?php

namespace TennisScoreGrabber;

use DateTime;
use TennisScoreGrabber\Contracts\HttpClientInterface;
use TennisScoreGrabber\Contracts\ScoresHtmlProviderInterface;
use TennisScoreGrabber\Contracts\ScoresUrlProviderInterface;

/**
 * Class ScoresHtmlProvider
 * @package TennisScoreGrabber
 */
abstract class ScoresHtmlProvider implements ScoresHtmlProviderInterface
{
    /**
     * @var HttpClientInterface
     */
    private $httpClient;

    /**
     * @var ScoresUrlProviderInterface
     */
    private $scoresUrlProvider;

    /**
     * ScoresHtmlProvider constructor.
     * @param HttpClientInterface $httpClient
     * @param ScoresUrlProviderInterface $scoresUrlProvider
     */
    public function __construct(
        HttpClientInterface $httpClient,
        ScoresUrlProviderInterface $scoresUrlProvider
    ) {
        $this->httpClient = $httpClient;
        $this->scoresUrlProvider = $scoresUrlProvider;
    }

    /** @inheritdoc */
    public function getScoresHtmlByDate(DateTime $dateTime)
    {
        $dateUrl = $this->getUrlByDateTime($dateTime);

        return $this->getUrlContent($dateUrl);
    }

    /**
     * @param DateTime $dateTime
     * @return string
     */
    private function getUrlByDateTime(DateTime $dateTime)
    {
        return $this->scoresUrlProvider->getUrlByDateTime($dateTime);
    }

    /**
     * @param string $dateUrl
     * @return string
     */
    private function getUrlContent($dateUrl)
    {
        return $this->httpClient->getUrlContent($dateUrl);
    }
}
