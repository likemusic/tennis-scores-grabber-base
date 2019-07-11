<?php

namespace TennisScoresGrabber\Contracts;

use DateTime;

interface HtmlProviderInterface
{
    /**
     * @param DateTime $dateTime
     * @return string
     */
    public function getScoresHtmlByDate(DateTime $dateTime);
}
