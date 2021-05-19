<?php 

use Workerman\Worker;
use PHPSocketIO\SocketIO;
require_once __DIR__ . '/vendor/autoload.php';

// Listen port 2021 for socket.io client
$io = new SocketIO(2021);
$io->on('connection', function ($socket) use ($io) {
	echo "connected\n";
    $socket->on('new message', function ($msg) use ($io) {
    	echo 'message is ' . $msg;
    	$io->emit('new message', $msg);
    });
});

Worker::runAll();