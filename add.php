<?php

 include 'koneksi.php';
    $NIM = $_POST['nim'];
    $Nama = $_POST['nama'];
    $Jurusan = $_POST['jurusan'];
    $Telpon = $_POST['no_telp'];
    $ipk = $_POST['ipk'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $biaya_ukt = $_POST['biaya_ukt'];
    $alamat = $_POST['alamat'];
    
    $sql = "INSERT INTO mahasiswa (nim,nama,jurusan,no_telp,ipk,tanggal_lahir,biaya_ukt,alamat) VALUES ('$NIM','$Nama','$Jurusan','$Telpon','$ipk','$tanggal_lahir',' $biaya_ukt','$alamat')";
    $con->query($sql);
    header("Location: home.php");

?>