<?php
include "../koneksi.php";

if (isset($_POST['id_nilai'], $_POST['nis'], $_POST['nip'], $_POST['id_mapel'], $_POST['nilai'])) {

    $id_nilai = $_POST['id_nilai'];
    $nis = $_POST['nis'];
    $nip = $_POST['nip'];
    $id_mapel = $_POST['id_mapel'];
    $nilai = $_POST['nilai'];

    mysqli_query($koneksi, "UPDATE nilai SET
        nis='$nis',
        nip='$nip',
        id_mapel='$id_mapel',
        nilai='$nilai'
        WHERE id_nilai='$id_nilai'");
}

header("Location: index.php");
exit;
?>