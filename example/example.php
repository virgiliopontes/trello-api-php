<?php 

header('Content-Type: text/html; charset=utf-8');

require_once __DIR__.'/../vendor/autoload.php';

use virgiliopontes\TrelloApi\Trello\User;
use virgiliopontes\TrelloApi\Trello\Board;
use virgiliopontes\TrelloApi\Trello\Lists;
use virgiliopontes\TrelloApi\Trello\Card;

$key = 'YOUR_APP_KEY_HERE';
$token = 'YOU_TOEN_APP';

try {
    echo '<pre>';
   
    // -----
    // BOARD
    // -----
    // API Reference: https://developers.trello.com/advanced-reference/board
    // echo '<h1>Board</h1>';

    echo '<h1>Boards</h1>';
    // Getting boards of User
    $trelloUser = new User($key, $token);
    $boards = $trelloUser->getBoards();
    print_r($boards);
    echo '<hr>';

    echo '<h1>Lists</h1>';
    // Getting lists on board
    $trelloBoard = new Board($key, $token);
    foreach ($boards as $key => $board) {
        // Getting Card Info
        $listsOfBoards[$key] = $trelloBoard->getLists($board->id);
        print_r($listsOfBoards[$key]);
        echo '<hr>';
    }
    print_r($boards);
    echo '<hr>';

    echo '<h1>Cards</h1>';
    // Getting cards on list
    $trelloLists = new Lists($key, $token);
    foreach ($listsOfBoards as $key => $lists) {
        foreach ($lists as $key => $list) {
            // Getting Card Info
            $listas[$key] = $trelloLists->getCards($list->id);
            print_r($listas[$key]);
            echo '<hr>';
        }
    }
    print_r($boards);
    echo '<hr>';

    // // Getting board info
    // $return = $trelloBoard->get($boardId);
    // print_r($return);
    // echo '<hr>';

    // // Getting list members from board
    // $return = $trelloBoard->get($boardId, 'members');
    // print_r($return);
    // echo '<hr>';

    // // Getting list cards from board
    // $arguments = array('fields' => 'id,name,idList');
    // $return = $trelloBoard->get($boardId, 'cards', $arguments);
    // print_r($return);
    // echo '<hr>';

    // ----
    // LISTS
    // ----
    // API Reference: https://developers.trello.com/advanced-reference/card
    
    
    // ----
    // CARD
    // ----
    // API Reference: https://developers.trello.com/advanced-reference/card
    echo '<h1>Cards</h1>';
    /* $trelloCard = new Card($key, $token);
    foreach ($boards as $key => $board) {
        // Getting Card Info
        $cards[$key] = $trelloCard->get($board->id);
        print_r($cards[$key]);
        echo '<hr>';
    } */

    // // Getting Card Actions
    // $return = $trelloCard->get($cardId, 'actions');
    // print_r($return);
    // echo '<hr>';

    // // Creating a Card
    /* $data = array(
        'name' => 'Teste card ' . rand(),
        'desc' => 'This is a test card',
        'due' => null,
        'idList' => '5f50562d56ab08695f45b470',
        'urlSource' => null
    );

    $return = $trelloCard->post($data);
    print_r($return);
    echo '<hr>'; */

    /* $return = $trelloCard->comment('5649e6065320a3ee5c16e218', "testando 123"); 
    print_r($return);
    echo '<hr>'; */

} catch (Exception $e) {
    echo $e->getMessage();
}
