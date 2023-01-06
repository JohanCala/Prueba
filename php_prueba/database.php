<?php 
$server = 'localhost';
$username = 'root';
$password = 'admin';
$database = 'db_p';

try {
    $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}

?>