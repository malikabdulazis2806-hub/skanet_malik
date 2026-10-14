<?php 
 
include "koneksi.php"; 
 
$nis = isset($_GET['nis']) ? $_GET['nis'] : ""; 
 
?> 
 
<!DOCTYPE html> 
<html lang="id"> 
 
<head> 
 
<meta charset="UTF-8"> 
 
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
 
<title>Data Nilai Siswa</title> 
 
 
<style> 
 
/* ========================================= 
   DASAR 
========================================= */ 
 
*{ 
    box-sizing:border-box; 
} 
 
body{ 
 
    margin:0; 
 
    padding:40px; 
 
    font-family:Arial, Helvetica, sans-serif; 
 
    color:#ffffff; 
 
    min-height:100vh; 
 
    background: 
 
        radial-gradient( 
            circle at 15% 15%, 
            rgba(168,85,247,.30), 
            transparent 25% 
        ), 
 
        radial-gradient( 
            circle at 85% 20%, 
            rgba(124,58,237,.25), 
            transparent 25% 
        ), 
 
        radial-gradient( 
            circle at 80% 90%, 
            rgba(79,70,229,.25), 
            transparent 30% 
        ), 
 
        linear-gradient( 
            135deg, 
            #08051b, 
            #12082d, 
            #1b0d3d, 
            #090622 
        ); 
 
} 
 
 
/* ========================================= 
   CONTAINER 
========================================= */ 
 
.print-container{ 
 
    max-width:1000px; 
 
    margin:auto; 
 
    padding:35px; 
 
    border-radius:25px; 
 
    background:rgba(20,12,45,.90); 
 
    border:1px solid rgba(168,85,247,.35); 
 
    box-shadow: 
 
        0 0 30px rgba(124,58,237,.25), 
 
        0 20px 60px rgba(0,0,0,.45); 
 
} 
 
 
/* ========================================= 
   HEADER 
========================================= */ 
 
.header{ 
 
    text-align:center; 
 
    margin-bottom:30px; 
 
    padding-bottom:20px; 
 
    border-bottom:1px solid rgba(168,85,247,.35); 
 
} 
 
 
.icon{ 
 
    width:70px; 
 
    height:70px; 
 
    margin:0 auto 15px; 
 
    display:flex; 
 
    align-items:center; 
 
    justify-content:center; 
 
    border-radius:20px; 
 
    overflow:hidden; 
 
    background:linear-gradient( 
        135deg, 
        #7c3aed, 
        #a855f7 
    ); 
 
    box-shadow: 
 
        0 0 25px rgba(168,85,247,.45); 
 
} 
 
 
.icon img{ 
 
    width:100%; 
 
    height:100%; 
 
    object-fit:cover; 
 
    display:block; 
 
} 
 
 
h2{ 
 
    margin:0; 
 
    font-size:28px; 
 
    letter-spacing:1px; 
 
} 
 
 
.subtitle{ 
 
    margin-top:8px; 
 
    color:#aaa0bd; 
 
    font-size:14px; 
 
} 
 
 
/* ========================================= 
   INFORMASI SISWA 
========================================= */ 
 
.nama{ 
 
    text-align:center; 
 
    margin-bottom:25px; 
 
    padding:15px; 
 
    border-radius:12px; 
 
    background:rgba(124,58,237,.12); 
 
    border:1px solid rgba(168,85,247,.25); 
 
    color:#d8d0e8; 
 
} 
 
 
.nama strong{ 
 
    color:#ffffff; 
 
} 
 
 
/* ========================================= 
   TABLE 
========================================= */ 
 
.table-wrapper{ 
 
    overflow-x:auto; 
 
} 
 
 
table{ 
 
    width:100%; 
 
    border-collapse:collapse; 
 
    overflow:hidden; 
 
    border-radius:12px; 
 
} 
 
 
th{ 
 
    background:linear-gradient( 
        90deg, 
        #7c3aed, 
        #a855f7 
    ); 
 
    color:white; 
 
    padding:13px; 
 
    text-align:center; 
 
    border:1px solid rgba(255,255,255,.15); 
 
} 
 
 
td{ 
 
    padding:11px; 
 
    border:1px solid rgba(168,85,247,.25); 
 
    background:rgba(255,255,255,.04); 
 
    color:#e9e2f2; 
 
} 
 
 
tr:nth-child(even) td{ 
 
    background:rgba(124,58,237,.08); 
 
} 
 
 
.center{ 
 
    text-align:center; 
 
} 
 
 
/* ========================================= 
   NILAI 
========================================= */ 
 
.nilai{ 
 
    display:inline-block; 
 
    min-width:45px; 
 
    padding:5px 10px; 
 
    border-radius:8px; 
 
    background:linear-gradient( 
        135deg, 
        #7c3aed, 
        #a855f7 
    ); 
 
    color:white; 
 
    font-weight:bold; 
 
} 
 
 
/* ========================================= 
   BUTTON 
========================================= */ 
 
.button-area{ 
 
    margin-top:25px; 
 
    display:flex; 
 
    justify-content:center; 
 
    gap:10px; 
 
} 
 
 
button{ 
 
    border:none; 
 
    padding:11px 20px; 
 
    border-radius:10px; 
 
    background:linear-gradient( 
        135deg, 
        #7c3aed, 
        #a855f7 
    ); 
 
    color:white; 
 
    font-weight:bold; 
 
    cursor:pointer; 
 
    transition:.3s; 
 
} 
 
 
button:hover{ 
 
    transform:translateY(-2px); 
 
    box-shadow: 
 
        0 8px 20px rgba(168,85,247,.35); 
 
} 
 
 
.btn-back{ 
 
    background:#44404f; 
 
} 
 
 
/* ========================================= 
   PRINT 
========================================= */ 
 
@media print{ 
 
    @page{ 
 
        size:A4; 
 
        margin:15mm; 
 
    } 
 
 
    body{ 
 
        padding:0; 
 
        background:white; 
 
        color:black; 
 
        min-height:auto; 
 
    } 
 
 
    .print-container{ 
 
        max-width:none; 
 
        padding:0; 
 
        border:none; 
 
        border-radius:0; 
 
        background:white; 
 
        box-shadow:none; 
 
    } 
 
 
    .header{ 
 
        border-bottom:2px solid #7c3aed; 
 
    } 
 
 
    .icon{ 
 
        display:none; 
 
    } 
 
 
    h2{ 
 
        color:#000; 
 
    } 
 
 
    .subtitle{ 
 
        color:#555; 
 
    } 
 
 
    .nama{ 
 
        background:white; 
 
        border:1px solid #999; 
 
        color:#000; 
 
    } 
 
 
    .nama strong{ 
 
        color:#000; 
 
    } 
 
 
    table{ 
 
        border:1px solid #000; 
 
    } 
 
 
    th{ 
 
        background:#7c3aed !important; 
 
        color:white !important; 
 
        border:1px solid #000; 
 
        -webkit-print-color-adjust:exact; 
 
        print-color-adjust:exact; 
 
    } 
 
 
    td{ 
 
        background:white !important; 
 
        color:#000; 
 
        border:1px solid #000; 
 
    } 
 
 
    .nilai{ 
 
        background:#7c3aed !important; 
 
        color:white !important; 
 
        -webkit-print-color-adjust:exact; 
 
        print-color-adjust:exact; 
 
    } 
 
 
    .button-area{ 
 
        display:none; 
 
    } 
 
} 
 
 
/* ========================================= 
   MOBILE 
========================================= */ 
 
@media(max-width:600px){ 
 
    body{ 
 
        padding:15px; 
 
    } 
 
 
    .print-container{ 
 
        padding:20px; 
 
    } 
 
 
    h2{ 
 
        font-size:22px; 
 
    } 
 
 
    th, 
    td{ 
 
        padding:8px; 
 
        font-size:13px; 
 
    } 
 
} 
 
</style> 
 
</head> 
 
 
<body> 
 
 
<div class="print-container"> 
 
 
<!-- ===================================== 
     HEADER 
===================================== --> 
 
<div class="header"> 
 
    <div class="icon"> 
 
        <img src="ikuyo kita.jpg" alt="Ikuyo Kita"> 
 
    </div> 
 
    <h2> 
        DATA NILAI SISWA 
    </h2> 
 
    <div class="subtitle"> 
        Sistem Akademik 
    </div> 
 
</div> 
 
 
<?php 
 
 
if ($nis != "") { 
 
 
    /* ===================================== 
       PRINT SATU SISWA 
    ===================================== */ 
 
 
    $query = mysqli_query( 
        $koneksi, 
 
        "SELECT 
            siswa.nama AS namasiswa, 
            guru.nama AS namaguru, 
            mapel.mapel, 
            nilai.nilai 
 
        FROM nilai 
 
        JOIN siswa 
        ON nilai.nis = siswa.nis 
 
        JOIN guru 
        ON nilai.nip = guru.nip 
 
        JOIN mapel 
        ON nilai.id_mapel = mapel.id_mapel 
 
        WHERE nilai.nis = '$nis' 
 
        ORDER BY mapel.mapel ASC" 
    ); 
 
 
    $siswa_data = mysqli_fetch_assoc($query); 
 
 
    if (!$siswa_data) { 
 
        echo ' 
 
        <div class="nama"> 
            Data nilai siswa tidak ditemukan. 
        </div> 
 
        '; 
 
    } else { 
 
?> 
 
 
<div class="nama"> 
 
    Nama Siswa: 
 
    <strong> 
        <?php echo htmlspecialchars($siswa_data['namasiswa']); ?> 
    </strong> 
 
</div> 
 
 
<div class="table-wrapper"> 
 
<table> 
 
<tr> 
 
    <th width="8%"> 
        No 
    </th> 
 
    <th> 
        Mata Pelajaran 
    </th> 
 
    <th> 
        Nama Guru 
    </th> 
 
    <th width="15%"> 
        Nilai 
    </th> 
 
</tr> 
 
 
<?php 
 
 
mysqli_data_seek($query, 0); 
 
$no = 1; 
 
 
while ($data = mysqli_fetch_array($query)) { 
 
?> 
 
 
<tr> 
 
    <td class="center"> 
 
        <?php echo $no++; ?> 
 
    </td> 
 
 
    <td> 
 
        <?php echo htmlspecialchars($data['mapel']); ?> 
 
    </td> 
 
 
    <td> 
 
        <?php echo htmlspecialchars($data['namaguru']); ?> 
 
    </td> 
 
 
    <td class="center"> 
 
        <span class="nilai"> 
 
            <?php echo htmlspecialchars($data['nilai']); ?> 
 
        </span> 
 
    </td> 
 
</tr> 
 
 
<?php 
 
} 
 
?> 
 
 
</table> 
 
</div> 
 
 
<?php 
 
    } 
 
} else { 
 
 
    /* ===================================== 
       PRINT SEMUA SISWA 
    ===================================== */ 
 
?> 
 
 
<div class="nama"> 
 
    Semua Data Nilai Siswa 
 
</div> 
 
 
<div class="table-wrapper"> 
 
<table> 
 
<tr> 
 
    <th width="8%"> 
        No 
    </th> 
 
    <th> 
        Nama Siswa 
    </th> 
 
    <th> 
        Mata Pelajaran 
    </th> 
 
    <th> 
        Nama Guru 
    </th> 
 
    <th width="12%"> 
        Nilai 
    </th> 
 
</tr> 
 
 
<?php 
 
 
$query = mysqli_query( 
 
    $koneksi, 
 
    "SELECT 
        siswa.nama AS namasiswa, 
        guru.nama AS namaguru, 
        mapel.mapel, 
        nilai.nilai 
 
    FROM nilai 
 
    JOIN siswa 
    ON nilai.nis = siswa.nis 
 
    JOIN guru 
    ON nilai.nip = guru.nip 
 
    JOIN mapel 
    ON nilai.id_mapel = mapel.id_mapel 
 
    ORDER BY 
        siswa.nama ASC, 
        mapel.mapel ASC" 
); 
 
 
$no = 1; 
 
 
while ($data = mysqli_fetch_array($query)) { 
 
?> 
 
 
<tr> 
 
    <td class="center"> 
 
        <?php echo $no++; ?> 
 
    </td> 
 
 
    <td> 
 
        <?php echo htmlspecialchars($data['namasiswa']); ?> 
 
    </td> 
 
 
    <td> 
 
        <?php echo htmlspecialchars($data['mapel']); ?> 
 
    </td> 
 
 
    <td> 
 
        <?php echo htmlspecialchars($data['namaguru']); ?> 
 
    </td> 
 
 
    <td class="center"> 
 
        <span class="nilai"> 
 
            <?php echo htmlspecialchars($data['nilai']); ?> 
 
        </span> 
 
    </td> 
 
</tr> 
 
 
<?php 
 
} 
 
?> 
 
 
</table> 
 
</div> 
 
 
<?php 
 
} 
 
?> 
 
 
<!-- ===================================== 
     BUTTON 
===================================== --> 
 
<div class="button-area"> 
 
    <button 
        onclick="window.print()"> 
 
        🖨️ Print 
 
    </button> 
 
 
    <button 
        class="btn-back" 
        onclick="window.close()"> 
 
        ✕ Tutup 
 
    </button> 
 
</div> 
 
 
</div> 
 
 
</body> 
 
</html>