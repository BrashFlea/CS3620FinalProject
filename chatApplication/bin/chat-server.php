<?php
/**
 * Created by PhpStorm.
 * User: Jonathan
 * Date: 12/9/2016
 * Time: 12:00 PM
 * Launches the chat server from the command line
**/
use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;
use MyApp\Chat;

    require dirname(__DIR__) . '/vendor/autoload.php';

    $server = IoServer::factory(
        new HttpServer(
            new WsServer(
                new Chat()
            )
        ),
        8008 //8080 was taken
    );

    $server->run();