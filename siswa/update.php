<?php
include "koneksi.php";

if(isset($_POST['nis'], $_POST['nama'], $_POST['alamat'])){

    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];

    mysqli_query($koneksi, "UPDATE siswa SET nama='$nama', alamat='$alamat' WHERE nis='$nis'");
}

header("Location: index.php");
exit;
?>