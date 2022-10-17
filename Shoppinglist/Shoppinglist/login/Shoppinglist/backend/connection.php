<?php

$dbhost = "localhost";
$dbusers = "root";

$dbpass = "";
$dbname = "shoppinglist";

if (!$con = mysqli_connect($dbhost, $dbusers, $dbpass, $dbname)) {

	die("failed to connect!");
}
