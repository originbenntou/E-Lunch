<?php

use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;
use MyApp\WebSocket\Chat;

require dirname ( __DIR__ ) . '/vendor/autoload.php';

$server1 = IoServer::factory(
	new HttpServer(
		new WsServer(
			new Chat()
		)
	), 8080);

$server2 = IoServer::factory(
	new HttpServer(
		new WsServer(
			new Chat()
		)
	), 8090);

$server1->run();
$server2->run();
