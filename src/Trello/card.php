<?php
namespace virgiliopontes\TrelloApi\Trello;
use virgiliopontes\TrelloApi\Trello;

/**
 * API Reference: https://developers.trello.com/advanced-reference/card
 */
class Card extends Trello
{
    /**
     * The string of collection on Trello API.
     * Will be used to generate the URLs for requests.
     * 
     * @var string
     */
    public $collection = "cards";

    public $id = "";

    /**
     * Update a Card
     *
     * @param string $cardID ID of the card
     * @param array  $data   New data of card
     * 
     * @return object
     */
    public function update($cardID, $data)
    {
        $this->put($cardID, $data);

        return $this->curl->response;
    }

    /**
     * Archive a Trello Card
     * 
     * @param string $cardID ID of the card that will be archived
     * 
     * @return object Response of Trello API
     */
    public function archive($cardID)
    {
        $data = array("value" => true);
        $this->put($cardID, $data, "closed");
        return $this->curl->response;
    }

    /**
     * Remove a Trello Card from Archive to your last list
     * 
     * @param string $cardID ID of the card that will be removed from archive
     * 
     * @return object Response of Trello API
     */
    public function unarchive($cardID)
    {
        $data = array("value" => false);
        $this->put($cardID, $data, "closed");
        return $this->curl->response;
    }

    /**
     * Comment a Trello Card
     * 
     * @param string $cardID  ID of the card that will be commented
     * @param string $comment Comment text
     * 
     * @return object Response of Trello API
     */
    public function comment($cardID, $comment)
    {
        $data = array("text" => $comment);
        $this->post($data, "actions/comments", $cardID);
        return $this->curl->response;
    }

    /**
     * Mover um Card para outra lista
     *
     * @param int $cardID   ID do Card
     * @param int $boardID  ID da Lista
     * @param int $listID   ID da Lista
     * @param int $position ID da Lista
     * 
     * @return object Response of Trello API
     */
    public function moveToList($cardID, $boardID, $listID, $position = '')
    {
        $data = array(
            "idList" => $listID,
            'idBoard' => $boardID
        );

        if ($position == 'top' || $position == 'bottom') {
            $data['pos'] = $position;
        }

        $this->put($cardID, $data);

        return $this->curl->response;
    }
}
