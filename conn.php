<?php

$host= "localhost";
$username= "root";
$password = "";

$db_name = "booking";

$conn = mysqli_connect($host, $username, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
}