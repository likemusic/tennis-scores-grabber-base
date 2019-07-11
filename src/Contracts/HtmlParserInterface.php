<?php

namespace TennisScoresGrabber\Contracts;

interface HtmlParserInterface
{
    /**
     * @param string $scoresHtml
     * @return array
     */
    public function getScoresDataByHtml($scoresHtml);
}
