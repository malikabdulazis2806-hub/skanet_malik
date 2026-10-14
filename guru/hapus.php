<?php
include "koneksi.php";

if(isset($_GET['nip'])){
    $nip = $_GET['nip'];

    mysqli_query($koneksi, "DELETE FROM guru WHERE nip='$nip'");
}

header("Location: index.php");
exit;
?>