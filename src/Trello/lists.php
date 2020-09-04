<?php

namespace virgiliopontes\TrelloApi\Trello;
use virgiliopontes\TrelloApi\Trello;

/**
 * API Reference: https://developers.trello.com/advanced-reference/list
 */
class Lists extends Trello
{
    /**
     * The string of collection on Trello API.
     * Will be used to generate the URLs for requests.
     * 
     * @var string
     */
    public $collection = "lists";

    public $id = "";

    /**
     * Retorna os Cards de uma Lista
     *
     * @param int $idList ID da Lista
     * 
     * @return array
     */
    public function getCards($idList)
    {
        $cards = $this->get($idList, 'cards');

        return $cards;
    }

    /**
     * Archive a Trello List
     * 
     * @param string $listID ID of the list that will be archived
     * 
     * @return object Response of Trello API
     */
    public function archive($listID)
    {
        $data = array("value" => true);
        $this->put($listID, $data, "closed");
        return $this->curl->response;
    }

    /**
     * Remove a Trello List from Archive to your last list
     * 
     * @param string $listID ID of the list that will be removed from archive
     * 
     * @return object Response of Trello API
     */
    public function unarchive($listID)
    {
        $data = array("value" => false);
        $this->put($listID, $data, "closed");
        return $this->curl->response;
    }

    public function moveToBoard($listID, $boardID, $position = "")
    {
        $data = array("value" => $boardID);
        if (!empty($position)) {
            $data['pos'] = $position;
        }
        $this->put($listID, $data, "idBoard");
    }
}
