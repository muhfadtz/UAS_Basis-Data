<?php

include 'koneksi.php';

if (isset($_POST['username']) && isset($_POST['password'])) {
    session_start();

    $username = $_POST['username'];
    $password = $_POST['password'];

    // Gunakan parameterized query untuk menghindari SQL injection
    $query = "SELECT * FROM \"pengguna\" WHERE username = :username AND password = :password";

    // Persiapkan statement
    $statement = $con->prepare($query);

    // Bind parameter
    $statement->bindParam(':username', $username);
    $statement->bindParam(':password', $password);

    // Eksekusi statement
    $statement->execute();

    // Ambil hasil
    $result = $statement->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        $_SESSION['username'] = $username;
        header("location: home.php");
    } else {
        echo '<script>alert("Username atau password salah")</script>';
    }
}

?>
