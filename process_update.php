<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari formulir
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    $no_telp = $_POST['no_telp'];
    $alamat = $_POST['alamat'];
    $ipk = $_POST['ipk'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $biaya_ukt = $_POST['biaya_ukt'];
   

    // Query untuk melakukan update data
    $update_query = "UPDATE mahasiswa SET nama='$nama', jurusan='$jurusan', no_telp='$no_telp', alamat='$alamat', ipk='$ipk', tanggal_lahir='$tanggal_lahir', biaya_ukt='$biaya_ukt' WHERE nim='$nim'";
    $con->query($update_query);

    // Redirect kembali ke halaman utama setelah update
    header("location: home.php");
    exit();
}
?>
