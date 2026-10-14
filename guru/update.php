<?php
include "koneksi.php";

if (isset($_POST['nip'], $_POST['nama'], $_POST['alamat'])) {

    $nip = $_POST['nip'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];

    mysqli_query($koneksi, "UPDATE guru SET nama='$nama', alamat='$alamat' WHERE nip='$nip'");
}

header("Location: index.php");
exit;
?>