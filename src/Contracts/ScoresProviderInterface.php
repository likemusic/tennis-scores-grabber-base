<?php

namespace TennisScoresGrabber\Contracts;

use DateTime;

/**
 * Interface ScoresProviderInterface
 * @package TennisScoreGrabber\Contracts
 */
interface ScoresProviderInterface
{
    /**
     * @param DateTime $dateTime
     */
    public function getScoresForDate(DateTime $dateTime);
}
