<?php

$host = "localhost"; //Host address (most likely localhost)
$username = "username"; //Name of Database
$password = "password"; //Password for database user
$db_name = "db_webserv";

$db=mysql_connect($host, $username, $password) or die('Could not connect');
mysql_select_db($db_name, $db) or die('Unable to connect to database.');

?>