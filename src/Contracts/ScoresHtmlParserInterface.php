<?php

namespace TennisScoreGrabber\Contracts;

/**
 * Interface ScoresHtmlParserInterface
 * @package TennisScoreGrabber\Contracts
 */
interface ScoresHtmlParserInterface
{
    /**
     * @param string $scoresHtml
     * @return array
     */
    public function getScoresDataByHtml($scoresHtml);
}
