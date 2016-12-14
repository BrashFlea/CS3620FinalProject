<?php
/**
 * Created by PhpStorm.
 * User: Jonathan
 * Date: 12/9/2016
 * Time: 11:46 AM
 */
namespace MyApp;
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
use \PDO;
use \PDOException;



class Chat implements MessageComponentInterface {
    protected $clients;

    public function __construct() {
        $this->clients = array();
    }

    public function onOpen(ConnectionInterface $conn) {
        // Store the new connection to send messages to later
        $this->clients[$conn->resourceId] = $conn;
        echo "New connection! ({$conn->resourceId})\n";
    }

    public function onMessage(ConnectionInterface $from, $msg) {
        //DB
        $host = "127.0.0.1"; //or IP address 127.0.0.1
        $dbname = "W01247892";
        $username = "W01247892";
        $password = "Jonathancs!";

        //Connect to database
        try {
            $dbh = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        } catch (PDOException $e) {
            echo "Exception occurred. Please try again.";
            echo $e->getMessage();
            die();
        }

        $stmtInsertChat= $dbh->prepare("INSERT INTO `ChatLog` (`Mid`,`UserName`, `Message`, `LogTime`) VALUES (NULL, :UserName, :Message, :LogTime)");
        $data[] = json_decode($msg, true);
        $UserData = array('UserName'=>strip_tags($data[0]['user']), 'Message'=> strip_tags($data[0]['text']), 'LogTime'=>strip_tags($data[0]['time']));
        //Store the message in the database for chatlog
        try {
            $stmtInsertChat->execute($UserData);
        } catch (PDOException $exception) {
            echo "Insert failed";
            echo $exception->getMessage();
            die();
        }// End DB


        $numRecv = count($this->clients) - 1;
        echo sprintf('Connection %d sending message "%s" to %d other connection%s ' . "\n"
            , $from->resourceId, $msg, $numRecv, $numRecv == 1 ? '' : 's');

        foreach ($this->clients as $key => $client) {
            if ($from !== $client) {
                // The sender is not the receiver, send to each client connected
                $client->send($msg);
            }
        }
        // Send a message to a known resourceId (in this example the sender)
        $client = $this->clients[$from->resourceId];
        $client->send("Message successfully sent to $numRecv users. \n");
    }

    public function onClose(ConnectionInterface $conn) {
        // The connection is closed, remove it, as we can no longer send it messages
        unset($this->clients[$conn->resourceId]);

        echo "Connection {$conn->resourceId} has disconnected\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
        echo "An error has occurred: {$e->getMessage()}\n";

        $conn->close();
    }
}// end Chat class