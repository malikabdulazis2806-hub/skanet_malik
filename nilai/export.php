<?php

include "koneksi.php";

$filename = "Data_Nilai_Siswa.xls";

header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=\"$filename\"");
header("Pragma: no-cache");
header("Expires: 0");

?>

<table border="1">

    <tr>
        <th colspan="5">DATA NILAI SISWA</th>
    </tr>

    <tr>
        <th>ID Nilai</th>
        <th>Nama Siswa</th>
        <th>Mata Pelajaran</th>
        <th>Nama Guru</th>
        <th>Nilai</th>
    </tr>

<?php

$query = mysqli_query($koneksi, "SELECT
    nilai.id_nilai,
    siswa.nama AS namasiswa,
    guru.nama AS namaguru,
    mapel.mapel, 
    nilai.nilai
    FROM siswa, guru, mapel, nilai
    WHERE nilai.nis = siswa.nis
    AND nilai.nip = guru.nip
    AND nilai.id_mapel = mapel.id_mapel
    ORDER BY nilai.id_nilai ASC
");

while ($data = mysqli_fetch_array($query)) {

?>

    <tr>
        <td><?php echo $data['id_nilai']; ?></td>
        <td><?php echo $data['namasiswa']; ?></td>
        <td><?php echo $data['mapel']; ?></td>
        <td><?php echo $data['namaguru']; ?></td>
        <td><?php echo $data['nilai']; ?></td>
    </tr>

<?php } ?>

</table>