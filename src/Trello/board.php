<?php 
namespace virgiliopontes\TrelloApi\Trello;
use virgiliopontes\TrelloApi\Trello;

/**
 * API Reference: https://developers.trello.com/advanced-reference/board
 */
class Board extends Trello
{
    public $collection = "board";

    /**
     * Retorna as listas do Board
     *
     * @param string $idBoard ID do Board
     * 
     * @return array
     */
    public function getLists($idBoard)
    {
        $listas = $this->get($idBoard, 'lists');

        return $listas;
    }

    /**
     * Retorna os Labels do Board
     *
     * @param string $idBoard ID do Board
     * 
     * @return array
     */
    public function getLabels($idBoard)
    {
        $listas = $this->get($idBoard, 'labels');

        return $listas;
    }

    /**
     * Retorna os associacies de um quadro
     *
     * @param string $idBoard ID do Board
     * 
     * @return array
     */
    public function getMemberships($idBoard)
    {
        $associacies = $this->get($idBoard, 'memberships');

        return $associacies;
    }

    /**
     * Retorna os membros de um quadro
     *
     * @param string $idBoard ID do Board
     * 
     * @return array
     */
    public function getMembers($idBoard)
    {
        $membros = $this->get($idBoard, 'members');

        return $membros;
    }

    /**
     * Adiciona um membro ao Board
     *
     * @param string $idBoard  ID do Board
     * @param string $idMember ID do Membro
     * 
     * @return array
     */
    public function addMembers($idBoard, $idMember)
    {
        $membro = $this->put($idBoard, array(), 'members/'.$idMember);

        return $membro;
    }
}