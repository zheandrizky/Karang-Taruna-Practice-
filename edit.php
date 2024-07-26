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
    <h2>KARANG TARUNA RT.04 RW.05</h2>
    <div class="container">
        <div class="breadcrumbs">
            <a href="index.php">Home</a> &gt;
            <span>Edit Data Anggota</span>
        </div>
        <h3 style="text-align: center;">EDIT DATA ANGGOTA</h3>

        <?php
        include 'koneksi/config.php';
        $id = $_GET['id'];
        $data = mysqli_query($dbconnect, "select * from anggota where id_anggota='$id'");
        while ($d = mysqli_fetch_array($data)) {
            ?>
            <form method="post" action="">
                <input type="hidden" name="id" value="<?php echo $d['id_anggota']; ?>">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" value="<?php echo $d['username']; ?>">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="<?php echo $d['email']; ?>">
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" value="<?php echo $d['password']; ?>">
                </div>
                <div class="form-group">
                    <label for="fullname">Fullname:</label>
                    <input type="text" id="fullname" name="fullname" value="<?php echo $d['fullname']; ?>">
                </div>
                <div class="form-group">
                    <label for="foto">Foto:</label>
                    <input type="text" id="foto" name="foto" value="<?php echo $d['foto']; ?>">
                </div>
                <input type="submit" value="SIMPAN">
            </form>
            <?php
        }
        ?>
    </div>
</body>

</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Koneksi database
    include 'koneksi/config.php';

    // Menangkap data yang dikirim dari form
    $id = $_POST['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $fullname = $_POST['fullname'];
    $foto = $_POST['foto'];

    // Update data ke database
    $query = "UPDATE anggota SET username='$username', email='$email', password='$password', fullname='$fullname', foto='$foto' WHERE id_anggota='$id'";
    if (mysqli_query($dbconnect, $query)) {
        // Mengalihkan halaman kembali ke index.php jika berhasil
        header("location:index.php");
    } else {
        // Jika terjadi kesalahan, tampilkan pesan error
        echo "Error: " . $query . "<br>" . mysqli_error($dbconnect);
    }
}
?>