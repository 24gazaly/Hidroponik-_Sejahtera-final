<?php
session_start();
include('koneksi.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username'");
    $data = mysqli_fetch_assoc($query);

    if ($data && password_verify($password, $data['password'])) {
        $_SESSION['id_user'] = $data['id_user'];
        $_SESSION['username'] = $data['username']; // pakai username

        if ($data['is_new'] == 1) {
            mysqli_query($koneksi, "UPDATE user SET is_new = 0 WHERE id = " . $data['id']);
            header("Location: ../landingpage/index.php");
        } else {
            header("Location: ../landingpage/riwayat_transaksi.php");
        }
        exit();
    } else {
        $error = "Username atau password salah.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login User</title>
    <style>
        * { box-sizing: border-box; }
        body {
            margin: 0; background-color: #f3f3f3;
            font-family: Arial, sans-serif;
            display: flex; height: 100vh;
            align-items: center; justify-content: center;
        }
        .login-container {
            background-color: white;
            padding: 30px 25px;
            border-radius: 10px;
            width: 260px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            text-align: center;
        }
        .login-container h2 {
            margin-bottom: 20px; font-size: 18px; font-weight: bold;
        }
        .login-container input[type="text"],
        .login-container input[type="password"] {
            width: 100%; padding: 10px; margin: 8px 0;
            border-radius: 6px; border: 1px solid #ccc; font-size: 14px;
        }
        .login-container button {
            width: 100%; padding: 10px; margin-top: 10px;
            background-color: #4CAF50; border: none;
            border-radius: 6px; color: white;
            font-size: 14px; cursor: pointer; font-weight: bold;
        }
        .login-container button:hover {
            background-color: #45a049;
        }
        .login-container a {
            display: block; margin-top: 12px; font-size: 14px;
            color: #4CAF50; text-decoration: none; font-weight: 500;
        }
        .error {
            color: red; font-size: 13px; margin-bottom: 10px;
        }
    </style>
</head>
<body>
<div class="login-container">
    <h2>Login User</h2>
    <?php if (!empty($error)) echo "<div class='error'>$error</div>"; ?>
    <form method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
    <a href="daftar.php">Daftar</a>
</div>
</body>
</html>
