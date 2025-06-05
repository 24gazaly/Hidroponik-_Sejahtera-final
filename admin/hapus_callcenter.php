<?php
include('koneksi.php');
$id = $_GET['id'];
mysqli_query($koneksi, "DELETE FROM call_center WHERE id_callcenter='$id'") or die(mysqli_error($koneksi));
header("Location: index_callcenter.php");
?>