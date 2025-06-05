<?php
session_start();
include "koneksi.php";

if (isset($_POST['username'])) {
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    if ($nama && $username && $_POST['password']) {
        $query = mysqli_query($koneksi, "INSERT INTO user(nama, username, password, is_new) VALUES('$nama', '$username', '$password', 1)");
        if ($query) {
            echo '<script>alert("Pendaftaran berhasil! Silakan login."); window.location="login.php";</script>';
        } else {
            echo '<script>alert("Pendaftaran gagal.");</script>';
        }
    } else {
        echo '<script>alert("Harap isi semua field!");</script>';
    }
}
?>


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar User</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background-color: #f3f3f3;
            font-family: Arial, sans-serif;
            display: flex;
            height: 100vh;
            align-items: center;
            justify-content: center;
        }

        .form-container {
            background-color: white;
            padding: 30px 25px;
            border-radius: 10px;
            width: 260px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            text-align: center;
        }

        .form-container h2 {
            margin-bottom: 20px;
            font-size: 18px;
            font-weight: bold;
        }

        .form-container input {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border-radius: 6px;
            border: 1px solid #ccc;
            font-size: 14px;
        }

        .form-container button {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            background-color: #4CAF50;
            border: none;
            border-radius: 6px;
            color: white;
            font-size: 14px;
            cursor: pointer;
            font-weight: bold;
        }

        .form-container button:hover {
            background-color: #45a049;
        }

        .form-container a {
            display: block;
            margin-top: 12px;
            font-size: 14px;
            color: #4CAF50;
            text-decoration: none;
            font-weight: 500;
        }

        .error {
            color: red;
            font-size: 13px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Daftar User</h2>
        <form method="post">
            <input type="text" name="nama" placeholder="Nama Lengkap" required>
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Daftar</button>
        </form>
        <a href="login.php">Sudah daftar? silahkan Login</a>
    </div>
</body>
</html>
