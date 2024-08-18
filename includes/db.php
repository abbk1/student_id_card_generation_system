<?php session_start(); ?>
<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$dbname = 'stu_id_card';

$conn = mysqli_connect($hostname, $username, $password, $dbname);

if (!$conn) {
    
    die('DB_CONNECTION_ERROR '. mysqli_connect_error());
}