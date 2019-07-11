<?php

namespace TennisScoresGrabber;

use DateTime;
use Likemusic\SimpleHttpClient\HttpClientInterface;
use TennisScoresGrabber\Contracts\HtmlProviderInterface;
use TennisScoresGrabber\Contracts\UrlProviderInterface;

abstract class HtmlProvider implements HtmlProviderInterface
{
    /**
     * @var HttpClientInterface
     */
    private $httpClient;

    /**
     * @var UrlProviderInterface
     */
    private $scoresUrlProvider;

    /**
     * ScoresHtmlProvider constructor.
     * @param HttpClientInterface $httpClient
     * @param UrlProviderInterface $scoresUrlProvider
     */
    public function __construct(
        HttpClientInterface $httpClient,
        UrlProviderInterface $scoresUrlProvider
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
