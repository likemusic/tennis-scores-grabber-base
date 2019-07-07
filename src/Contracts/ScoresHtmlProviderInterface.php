<?php

namespace TennisScoresGrabber\Contracts;

use DateTime;

/**
 * Interface ScoresHtmlProviderInterface
 * @package TennisScoreGrabber\Contracts
 */
interface ScoresHtmlProviderInterface
{
    /**
     * @param DateTime $dateTime
     * @return string
     */
    public function getScoresHtmlByDate(DateTime $dateTime);
}
