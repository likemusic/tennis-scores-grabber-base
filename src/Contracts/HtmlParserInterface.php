<?php

namespace TennisScoresGrabber\Contracts;

/**
 * Interface ScoresHtmlParserInterface
 * @package TennisScoreGrabber\Contracts
 */
interface HtmlParserInterface
{
    /**
     * @param string $scoresHtml
     * @return array
     */
    public function getScoresDataByHtml($scoresHtml);
}
