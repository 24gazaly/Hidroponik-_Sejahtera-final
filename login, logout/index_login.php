<?php 
    session_start(); 
    if (!isset($_SESSION['user'])) {
        header('location: login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Hidroponik Sejahtera</title>
</head>
<body style="text-align: center">
    <h1>Hidroponik Sejahtera</h1>
    <a href="index_login.php">Home</a>
    <a href="Logout.php">Logout</a>
    <hr>
    <h3>Selamat datang, <?php echo $_SESSION['user']['nama'] ?? 'Pengguna'; ?> </h3>
    Yeyy! kamu sudah login di Hidroponik Sejahtera
</body>
</html>