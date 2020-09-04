<?php

namespace virgiliopontes\TrelloApi\Trello;
use virgiliopontes\TrelloApi\Trello;

/**
 * API Reference: https://developers.trello.com/advanced-reference/me
 */
class User extends Trello
{
    public $collection = "members/me";

    public function getBoards()
    {
        $dados = $this->get('boards');

        return $dados;
    }
}