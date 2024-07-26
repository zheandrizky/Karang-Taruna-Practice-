<!DOCTYPE html>
<html>

<head>
    <title>Karang Taruna RT.04, RW.05</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h2 {
            color: #333;
        }

        .container {
            margin: 20px auto;
            max-width: 98%;
        }

        .card {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
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

        table {
            border-collapse: collapse;
            width: 100%;
        }

        table th,
        table td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        table th {
            background-color: #f2f2f2;
            text-align: left;
        }

        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        table tr:hover {
            background-color: #ddd;
        }

        a {
            text-decoration: none;
            padding: 5px 10px;
            color: #fff;
            border-radius: 3px;
        }

        a:hover {
            background-color: #0056b3;
        }

        .button-primary {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            text-decoration: none;
            display: inline-block;
            cursor: pointer;
        }

        .button-primary:hover {
            background-color: #0056b3;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="container">
        <div class="breadcrumbs">
            <a href="#">Home</a> &gt;
            <span>Data Anggota</span>
        </div>
        <div class="card">
            <h2>KARANG TARUNA RT. 04 RW. 05</h2>
            <br />
            <a href="add.php" class="button-primary">+ TAMBAH ANGGOTA</a>
            <br />
            <br />
            <table border="1">
                <tr>
                    <th>NO</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Fullname</th>
                    <th>Foto</th>
                    <th>OPSI</th>
                </tr>
                <?php
                include 'koneksi/config.php';
                $no = 1;
                $data = mysqli_query($dbconnect, "SELECT * FROM anggota");
                while ($d = mysqli_fetch_array($data)) {
                    ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $d['username']; ?></td>
                        <td><?php echo $d['email']; ?></td>
                        <td><?php echo $d['fullname']; ?></td>
                        <td><?php echo $d['foto']; ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $d['id_anggota']; ?>" style="background-color: #ffc107;"><i class="fa fa-pencil"></i> Edit</a>
                            <a href="#" onclick="confirmDelete(<?php echo $d['id_anggota']; ?>);" style="background-color: #dc3545;"><i class="fa fa-trash-o" aria-hidden="true"></i>Delete</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>
    </div>

    <script>
        function confirmDelete(id) {
            var result = confirm("Apakah Anda yakin ingin menghapus data ini?");
            if (result) {
                window.location.href = "delete.php?id=" + id;
            }
        }
    </script>
</body>

</html>
