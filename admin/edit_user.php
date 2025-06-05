<?php
include("koneksi.php");

if( !isset($_GET['id'])) {
    header('Location: index_user.php');
}
$id = $_GET['id'];

$result = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user=$id");

while($data = mysqli_fetch_array($result)) {
    $username = $data['username'];
    $password = $data['password'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Edit</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="edit_user.css
    ">
</head>
<body>
    <div class="container">
    <h1 class="title">Tabel Edit User</h1>

    <form method="POST" action="proses_edit_user.php">
        <Table>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username" value="<?php echo $username ?>"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password" value="<?php echo $password ?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="simpan" value="Simpan"></td>
            </tr>
        </Table>
    </form>
</div>
</body>

</html>