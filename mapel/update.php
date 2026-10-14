<?php
include "koneksi.php";

if(isset($_POST['id_mapel'], $_POST['mapel'])){

    $id_mapel = $_POST['id_mapel'];
    $mapel = $_POST['mapel'];

    mysqli_query($koneksi, "UPDATE mapel SET mapel='$mapel' WHERE id_mapel='$id_mapel'");
}

header("Location: index.php");
exit;
?>