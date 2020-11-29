<?php
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "enkripsikripto";

// $connection = mysqli_connect($servername, $username, $password, $dbname);
// if (!$connection){
//         die("Connection Failed:".mysqli_connect_error());
//     }


// $dbUser = 'localhost';
// $dbHost = 'root';
// $dbPass = '';
// $dbName = 'enkripsikripto';

// $db = mysqli_connect($dbUser, $dbHost, $dbPass, $dbName);
/**
 * using mysqli_connect for database connection
 */

$databaseHost = 'localhost';
$databaseName = 'enkripsikripto';
$databaseUsername = 'root';
$databasePassword = '';

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

?>