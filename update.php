<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['username'])) {
    header("location:login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Ambil NIM dari parameter URL
    $nim = $_GET['nim'];

    // Gunakan parameterized query untuk menghindari SQL injection
    $query = "SELECT * FROM mahasiswa WHERE nim = :nim";

    // Persiapkan statement
    $statement = $con->prepare($query);

    // Bind parameter
    $statement->bindParam(':nim', $nim);

    // Eksekusi statement
    $statement->execute();

    // Ambil hasil
    $data = $statement->fetch(PDO::FETCH_ASSOC);

    // Tampilkan form update dengan data yang sudah ada
    ?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
        }

        form {
            width: 50%;
            margin-top: 20px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        button {
            padding: 10px;
            background-color: #333;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 4px;
        }

        button:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <h1>Update Data Mahasiswa</h1>
    <form action="process_update.php" method="POST">
        <input type="hidden" name="nim" value="<?php echo $data['nim']; ?>">
        <label for="nama">Nama:</label>
        <input type="text" name="nama" value="<?php echo $data['nama']; ?>" required>
        <label for="jurusan">Jurusan:</label>
        <input type="text" name="jurusan" value="<?php echo $data['jurusan']; ?>" required>
        <label for="no_telp">Telepon:</label>
        <input type="text" name="no_telp" value="<?php echo $data['no_telp']; ?>" maxlength="12" required>
        <label for="alamat">alamat:</label>
        <input type="text" name="alamat" value="<?php echo $data['alamat']; ?>" required>
        <label for="ipk">ipk:</label>
        <input type="text" name="ipk" value="<?php echo $data['ipk']; ?>" required>
        <label for="tanggal_lahir">tanggal lahir:</label>
        <input type="text" name="tanggal_lahir" value="<?php echo $data['tanggal_lahir']; ?>" required>
        <label for="biaya_ukt">biaya ukt:</label>
        <input type="text" name="biaya_ukt" value="<?php echo $data['biaya_ukt']; ?>" required>
        <button type="submit">Update</button>
        <button type="cancel">Cancel</button>
    </form>
</body>
</html>
    <?php
}
?>
