<?php

namespace TennisScoreGrabber\Contracts;

use DateTime;

/**
 * Interface ScoresProviderInterface
 * @package TennisScoreGrabber\Contracts
 */
interface ScoresProviderInterface
{
    /**
     * @param DateTime $dateTime
     * @return array
     */
    public function getScoresForDate(DateTime $dateTime);
}
