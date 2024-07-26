<!DOCTYPE html>
<html>

<head>
    <title>CRUD PHP dan MySQLi - Karang Taruna</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        h2 {
            color: #333;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 0 auto;
        }

        .breadcrumbs {
            margin-bottom: 20px;
        }

        .breadcrumbs a {
            color: #007bff;
            text-decoration: none;
        }

        .breadcrumbs a:hover {
            text-decoration: underline;
        }

        .breadcrumbs span {
            color: #333;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: calc(100% - 12px);
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 3px;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="breadcrumbs">
            <a href="index.php">Home</a> &gt;
            <span>Tambah Anggota</span>
        </div>
        <h2 style="text-align: center;">TAMBAH DATA ANGGOTA</h2>

        <form method="post" action="">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password">
            </div>
            <div class="form-group">
                <label for="fullname">Fullname:</label>
                <input type="text" id="fullname" name="fullname">
            </div>
            <div class="form-group">
                <label for="foto">Foto:</label>
                <input type="text" id="foto" name="foto">
            </div>
            <input type="submit" value="SIMPAN">
        </form>
    </div>
</body>

</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Koneksi database
    include 'koneksi/config.php';

    // Menangkap data yang dikirim dari form
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $fullname = $_POST['fullname'];
    $foto = $_POST['foto'];

    // Insert data ke database
    $query = "INSERT INTO anggota (username, email, password, fullname, foto) VALUES ('$username', '$email', '$password', '$fullname', '$foto')";
    if (mysqli_query($dbconnect, $query)) {
        // Mengalihkan halaman kembali ke index.php jika berhasil
        header("location:index.php");
    } else {
        // Jika terjadi kesalahan, tampilkan pesan error
        echo "Error: " . $query . "<br>" . mysqli_error($dbconnect);
    }
}
?>
