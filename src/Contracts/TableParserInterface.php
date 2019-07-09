<?php

namespace TennisScoresGrabber\Contracts;

use DOMElement;

/**
 * Interface TableParserInterface
 * @package TennisScoresGrabber\Contracts
 */
interface TableParserInterface
{
    public function getScoresData(DOMElement $scoresTable);
}
