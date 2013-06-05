<?php

function db(){
	//Connect to db using MySQLi
	$sv = "127.0.0.1";
	$un = "root";
	$conn = new mysqli($sv, $un, "", "test");
	if ($conn->connect_error) die("Could not connect to database: " . $conn->connect_error);
	return $conn;
}

?>
