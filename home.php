<?php
session_start();
include 'koneksi.php'; // Ganti nama file sesuai dengan file koneksi PostgreSQL Anda

if (!isset($_SESSION['username'])) {
    header("location:login.php");
    exit();
}

if (isset($_SESSION['username'])) {
    $username  = $_SESSION['username'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px;
            background-image: url(../img/background.png);
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            background-attachment: fixed;
        }

        header {
            width: 100%;
        }

        header h1 {
            font-size: 48px;
            margin: 40px;
            color: #000;
            text-align: center;
            align-items: center;
        }

        .container {
            position: relative;
            max-width: 800px;
            width: 100%;
            background: #fff;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            margin-top: 30px;
            margin-bottom: 60px;
        }

        table {
            width: 80%;
            margin-top: 20px;
            border-collapse: collapse;
            background-color: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #ff835f;
            color: white;
        }

        .container header {
            font-size: 1.5rem;
            color: #333;
            font-weight: 500;
            text-align: center;
            margin-bottom: 20px;
        }

        .container .form {
            margin-top: 30px;
        }

        .form .input-box {
            width: 100%;
            margin-top: 20px;
        }

        .input-box label {
            color: #333;
        }

        .form :where(.input-box input, .select-box) {
            position: relative;
            height: 50px;
            width: 100%;
            outline: none;
            font-size: 1rem;
            color: #707070;
            margin-top: 8px;
            border: 1px solid #ddd;
            border-radius: 6px;
            padding: 0 15px;
        }

        .input-box input:focus {
            box-shadow: 0 1px 0 rgba(0, 0, 0, 0.1);
        }

        .form .column {
            display: flex;
            column-gap: 15px;
        }

        .form button {
            height: 55px;
            width: 100%;
            color: #fff;
            font-size: 1rem;
            font-weight: 400;
            margin-top: 30px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            transition: all 0.2s ease;
            background: #605989;
        }

        .form button:hover {
            background: #ff835f;
        }

        footer {
            background-color: #ff835f;
            color: white;
            padding: 1em;
            text-align: center;
            border-radius: 8px;
            margin-top: auto;
            /* Push the footer to the bottom */
            position: fixed;
            /* Fixed position at the bottom */
            width: 100%;
            /* Full width */
            bottom: 0;
            /* Stick to the bottom */
        }

        @media screen and (max-width: 600px) {
            .form .column {
                flex-wrap: wrap;
            }

            header h1 {
                font-size: 32px;
            }
        }
    </style>
</head>

<body>
    <header>
        <section>
            <h1>Welcome <?php echo $_SESSION['username']; ?></h1>
            
        </section>
    </header>

    <table border="1">
        <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>Jurusan</th>
            <th>Telepon</th>
            <th>Alamat</th>
            <th>Tanggal Lahir</th>
            <th>IPK</th>
            <th>Biaya UKT</th>
            <th>Action</th>
        </tr>
        <?php
        $stmt = $con->query("SELECT * FROM mahasiswa ORDER BY nim DESC ");
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . $row['nim'] . "</td>";
            echo "<td>" . $row['nama'] . "</td>";
            echo "<td>" . $row['jurusan'] . "</td>";
            echo "<td>" . $row['no_telp'] . "</td>";
            echo "<td>" . $row['alamat'] . "</td>";
            echo "<td>" . $row['tanggal_lahir'] . "</td>";
            echo "<td>" . $row['ipk'] . "</td>";
            echo "<td>" . $row['biaya_ukt'] . "</td>";
            echo "<td>
                      <a href='update.php?nim=" . $row['nim'] . "'>Update</a> |
                      <a href='delete.php?nim=" . $row['nim'] . "'>Delete</a>
                  </td>";
            echo "</tr>";
        }
        ?>
    </table>

    <section class="container">
        <header>Masukkan Data Anda</header>
        <form action="add.php" method="POST" class="form">
            <div class="input-box">
                <label>NIM</label>
                <input type="text" placeholder="412415" name="nim" required />
            </div>
            <div class="input-box">
                <label>Nama Lengkap</label>
                <input type="text" placeholder="John Doe" name="nama" required />
            </div>
            <div class="input-box">
                <label>Jurusan</label>
                <input type="text" placeholder="Ilmu Komputer" name="jurusan" required />
            </div>

            <div class="column">
                <div class="input-box">
                    <label>Nomor Telepon</label>
                    <input type="number" placeholder="081234567890" name="no_telp" required />
                </div>
                <div class="input-box">
                    <label>Tanggal Lahir</label>
                    <input type="date" placeholder="Masukkan Tanggal Lahir" name="tanggal_lahir" required />
                </div>
            </div>

            <div class="input-box">
                <label>Alamat</label>
                <input type="text" placeholder="Jl. Merak No. 10" name="alamat" required />
            </div>
            <div class="input-box">
                <label>IPK</label>
                <input type="text" placeholder="3.71" name="ipk" required />
            </div>
            <div class="input-box">
                <label>Biaya UKT</label>
                <input type="text" placeholder="6000000" name="biaya_ukt" required />
            </div>

            <button>Add New Data</button>
        </form>
    </section>

    <footer>
        &copy; 2023 Fadhlan, Adam, Yusuf, Yosia
    </footer>
</body>

</html>