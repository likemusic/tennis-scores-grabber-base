<?php

namespace TennisScoresGrabber\Contracts;

/**
 * Interface TableParserInterface
 * @package TennisScoresGrabber\Contracts
 */
interface TableParserInterface
{
    public function getScoresData($scoresTable);
}
