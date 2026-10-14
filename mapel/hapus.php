<?php
include "koneksi.php";

if(isset($_GET['id_mapel'])){

    $id_mapel = $_GET['id_mapel'];

    mysqli_query($koneksi, "DELETE FROM mapel WHERE id_mapel='$id_mapel'");
}

header("Location: index.php");
exit;
?>