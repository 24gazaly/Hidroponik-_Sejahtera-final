<?php
include('koneksi.php');

// Ambil data berdasarkan ID
$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM call_center WHERE id_callcenter = '$id'");
$data = mysqli_fetch_assoc($query);

// Proses update
if (isset($_POST['update'])) {
    $nama = $_POST['nama_user'];
    $email = $_POST['email_user'];
    $pesan = $_POST['pesan'];

    $update = mysqli_query($koneksi, "UPDATE call_center SET 
        nama_user = '$nama', 
        email_user = '$email', 
        pesan = '$pesan' 
        WHERE id_callcenter = '$id'
    ");

    if ($update) {
        header("Location: index_callcenter.php");
    } else {
        echo "<script>alert('Gagal mengupdate data');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Call Center</title>
    <style>
        body {
            font-family: "Trebuchet MS";
            background-color: #f4f4f4;
            padding: 20px;
        }
        h2 {
            color: #006A71;
        }
        form {
            width: 400px;
            margin: auto;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 8px rgba(0,0,0,0.1);
        }
        label {
            display: block;
            margin-top: 15px;
        }
        input[type="text"], textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-top: 5px;
        }
        button {
            margin-top: 20px;
            padding: 10px;
            background-color: #48A6A7;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            opacity: 0.8;
        }
    </style>
</head>
<body>
    <h2 align="center">Edit Data Call Center</h2>
    <form method="POST">
        <label for="nama_user">Nama:</label>
        <input type="text" name="nama_user" value="<?= htmlspecialchars($data['nama_user']) ?>" required>

        <label for="email_user">Email:</label>
        <input type="text" name="email_user" value="<?= htmlspecialchars($data['email_user']) ?>" required>

        <label for="pesan">Pesan:</label>
        <textarea name="pesan" rows="5" required><?= htmlspecialchars($data['pesan']) ?></textarea>

        <button type="submit" name="update">Update</button>
    </form>
</body>
</html>
