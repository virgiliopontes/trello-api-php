<?php
namespace virgiliopontes\TrelloApi\Trello;
use virgiliopontes\TrelloApi\Trello;

/**
 * API Reference: https://developers.trello.com/advanced-reference/checklist
 */
class Checklist extends Trello
{
    /**
     * The string of collection on Trello API.
     * Will be used to generate the URLs for requests.
     * 
     * @var string
     */
    public $collection = "checklist";

    public $id = "";

}
