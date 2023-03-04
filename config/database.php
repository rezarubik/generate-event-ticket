<?php

// define('HOST', 'localhost');
define('HOST', '127.0.0.1');
define('USER', 'root');
define('DATABASE', 'detikcom_event');
define('PASS', '');
$connection = mysqli_connect(HOST, USER, PASS, DATABASE) or die('Error connection');
