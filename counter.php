<?php

session_start();

$path = 'countlog.txt';
$count = intval(file_get_contents($path));

if (!isset($_SESSION['started'])) {
	$count++;
	file_put_contents($path, $count);
	$_SESSION['started'] = 'started';
}
