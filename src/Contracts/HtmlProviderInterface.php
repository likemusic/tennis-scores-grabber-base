<?php

namespace TennisScoresGrabber\Contracts;

use DateTime;

/**
 * Interface ScoresHtmlProviderInterface
 * @package TennisScoreGrabber\Contracts
 */
interface HtmlProviderInterface
{
    /**
     * @param DateTime $dateTime
     * @return string
     */
    public function getScoresHtmlByDate(DateTime $dateTime);
}
