<?php
 include 'koneksi.php';
    $NIM = $_GET['nim'];
    $sql = "DELETE FROM mahasiswa WHERE nim ='$NIM'";
    $con->query($sql);
    header("Location: home.php");
?>