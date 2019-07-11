<?php

namespace TennisScoresGrabber\Contracts;

use DateTime;

interface ScoresProviderInterface
{
    /**
     * @param DateTime $dateTime
     */
    public function getScoresForDate(DateTime $dateTime);
}
