<?php

session_start();

$path = 'countlog.txt';
$count = file_get_contents($path) ?? 0;

if (!isset($_SESSION['started'])) {
	$count++;
	file_put_contents($path, $count);
	$_SESSION['started'] = 'started';
}





?>