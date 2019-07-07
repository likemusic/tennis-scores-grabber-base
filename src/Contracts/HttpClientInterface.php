<?php

namespace TennisScoreGrabber\Contracts;

/**
 * Interface HttpClientInterface
 * @package TennisScoreGrabber\Contracts
 */
interface HttpClientInterface
{
    /**
     * @param string $url
     * @return string
     */
    public function getUrlContent($url);
}
