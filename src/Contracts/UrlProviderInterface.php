<?php

namespace TennisScoresGrabber\Contracts;

use DateTime;

interface UrlProviderInterface
{
    /**
     * @param DateTime $dateTime
     * @return string
     */
    public function getUrlByDateTime(DateTime $dateTime);
}
