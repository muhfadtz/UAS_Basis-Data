<?php

$host = 'localhost';
$dbname = 'mahasiswa';
$username = 'postgres';
$password = 'postgres';

try {
    $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Masukkan objek PDO ke dalam variabel $con
    $con = $pdo;
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>

