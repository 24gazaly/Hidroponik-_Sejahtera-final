<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil User</title>
    <link rel="stylesheet" href="profile.css">

    <link rel="stylesheet" href="https://unpkg.com/boxicon@latest/css/boxicons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Paytone+One&family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>
<body>

    <header>
        <div class="navbar">
            <div class="logo">
                <h2>Hidroponik <span>Sejahtera</span></h2>
            </div>
            <div class="navigator">
                <a href="../landingpage/">Home</a>
            </div>
        </div>
    </header>

    <section class="profile">
        <h1 class="heading">Profil User</h1>
        <br>
        <?php
        session_start();
        if (!isset($_SESSION['username'])) {
            header("Location:login.php");
            exit();
        }

        include 'koneksi.php';
        $username = $_SESSION['username'];
        $query_mysql = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username'") or die(mysqli_error($koneksi));
        if ($data = mysqli_fetch_array($query_mysql)) {
        ?>
        <table border="1" class="table">
            <tr>
                <th>Nama</th>
                <td><?php echo $data['nama']; ?></td>
            </tr>
            <tr>
                <th>Username</th>
                <td><?php echo $data['username']; ?></td>
            </tr>
            <tr>
                <th>Password</th>
                <td><?php echo $data['password']; ?></td>
            </tr>
        </table>
        <div class="button-container">
            <a href="../admin/edit_user.php?id=<?php echo $data['id_user']; ?>" class="btn-edit">Edit Profil</a>
            <a href="logout.php" class="btn">Log Out</a>
        </div>
        <?php } ?>
    </section>

</body>
</html>
