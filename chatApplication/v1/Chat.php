<?php
/**
 * Created by PhpStorm.
 * User: Jonathan
 * Date: 12/9/2016
 * Time: 11:46 AM
 */
namespace ChatApplication;
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

class Chat implements MessageComponentInterface{
    public function onOpen(ConnectionInterface $conn){
        // TODO: Implement onMessage() method.
    }
    public function onMessage(ConnectionInterface $from, $msg){
        // TODO: Implement onMessage() method.
    }

    public function onClose(ConnectionInterface $conn){
        // TODO: Implement onClose() method.
    }

    public function onError(ConnectionInterface $conn, \Exception $e){
        // TODO: Implement onError() method.
    }

}//end Chat class