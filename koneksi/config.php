<?php
define('DBHOST', 'localhost');
define('DBUSER', 'root');
define('DBPASS', '');
define('DBNAME', 'kartar');

// * $dbconnect : koneksi kedatabase

$dbconnect = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);

// * Check Error yang terjadi saat koneksi

if ($dbconnect->connect_error) {
die('Database Not Connect. Error : ' . $dbconnect->connect_error);
}

// jika terdapat error maka die() // stop dan tampilkan error

?>