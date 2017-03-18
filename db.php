<?php
$host = "localhost";
$user = "it58160253";
$password = "CHSU#2785";
$dbname = "it58160253";
$conn = new mysqli($host, $user, $password, $dbname);
$conn->query('SET NAMES UTF8');
if ($conn->connect_error) die($conn->connect_error);
?>