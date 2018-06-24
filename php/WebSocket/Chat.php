<?php

namespace MyApp\WebSocket;

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

class Chat implements MessageComponentInterface {
	protected $clients;
	protected $messages;

	public function __construct() {
		$this->clients = new \SplObjectStorage ();
		$this->messages = [];
	}

	public function onOpen(ConnectionInterface $conn) {
		// Store the new connection to send messages to later
		$this->clients->attach($conn);
		// how to send cookie
		// $cookie = $conn->httpRequest->getHeaders()["Cookie"][0];
		// $conn->send($cookie);
		echo "New connection! ({$conn->resourceId})\n";
		if (!empty($this->messages)) {
			$conn->send(json_encode($this->messages, JSON_UNESCAPED_UNICODE));
		}
	}

	public function onMessage(ConnectionInterface $from, $msg) {
		$numRecv = count($this->clients) - 1;
		echo sprintf ('Connection %d sending message "%s" to %d other connection%s' . "\n", $from->resourceId, $msg, $numRecv, $numRecv == 1 ? '' : 's');

		$this->messages[] = $msg;

		foreach ($this->clients as $client) {
			if ($from !== $client) {
				// The sender is not the receiver, send to each client connected
				$client->send(json_encode($msg, JSON_UNESCAPED_UNICODE));
			}
		}
	}

	public function onClose(ConnectionInterface $conn) {
		// The connection is closed, remove it, as we can no longer send it messages
		$this->clients->detach($conn);

		echo "Connection {$conn->resourceId} has disconnected\n";
	}
	public function onError(ConnectionInterface $conn, \Exception $e) {
		echo "An error has occurred: {$e->getMessage()}\n";

		$conn->close();
	}
}
