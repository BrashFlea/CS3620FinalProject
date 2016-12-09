<?php
/**
 * Created by PhpStorm.
 * User: Jonathan
 * Date: 12/9/2016
 * Time: 12:00 PM
 * Launches the chat server from the command line
**/
namespace ChatApplication;
use Ratchet\Server\IoServer;
use ChatApplication\Chat;
require dirname(__DIR__) . '/vendor/autoload.php';

$server = Ioserver::factory(
    new Chat(),
    8080
);

$server->run();