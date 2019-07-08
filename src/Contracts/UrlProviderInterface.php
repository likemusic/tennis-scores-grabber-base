<?php

namespace TennisScoresGrabber\Contracts;

use DateTime;

/**
 * Interface ScoresUrlProviderInterface
 * @package TennisScoreGrabber\Contracts
 */
interface UrlProviderInterface
{
    /**
     * @param DateTime $dateTime
     * @return string
     */
    public function getUrlByDateTime(DateTime $dateTime);
}
