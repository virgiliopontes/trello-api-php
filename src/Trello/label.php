<?php

namespace virgiliopontes\TrelloApi\Trello;
use virgiliopontes\TrelloApi\Trello;

/**
 * API Reference: https://developers.trello.com/advanced-reference/label
 */
class Label extends Trello
{
    /**
     * The string of collection on Trello API.
     * Will be used to generate the URLs for requests.
     * @var string
     */
    public $collection = "label";

    public $id = "";

}
