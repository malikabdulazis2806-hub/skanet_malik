<?php
include "koneksi.php";

if(isset($_GET['nis'])){

    $nis = $_GET['nis'];

    mysqli_query($koneksi, "DELETE FROM siswa WHERE nis='$nis'");
}

header("Location: index.php");
exit;
?>