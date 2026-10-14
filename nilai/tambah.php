<?php
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Tambah Data Nilai</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.css" rel="stylesheet">


<style>

/* ================================
   DASAR
================================ */

*{
    box-sizing:border-box;
}

body{

    margin:0;

    min-height:100vh;

    font-family:Arial, sans-serif;

    color:#ffffff;

    background:

        radial-gradient(
            circle at 15% 20%,
            rgba(168,85,247,.30),
            transparent 25%
        ),

        radial-gradient(
            circle at 85% 15%,
            rgba(139,92,246,.25),
            transparent 25%
        ),

        radial-gradient(
            circle at 80% 85%,
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

    position:relative;

    overflow-x:hidden;
}


/* ================================
   BULAN
================================ */

body::before{

    content:"";

    position:fixed;

    width:120px;
    height:120px;

    border-radius:50%;

    background:#eee9ff;

    top:70px;
    left:8%;

    box-shadow:

        0 0 20px rgba(238,233,255,.9),

        0 0 50px rgba(190,160,255,.6),

        0 0 100px rgba(168,85,247,.4);

    z-index:-2;
}


/* ================================
   CAHAYA UNGU
================================ */

body::after{

    content:"";

    position:fixed;

    width:500px;
    height:500px;

    border-radius:50%;

    background:#7c3aed;

    right:-220px;
    bottom:-220px;

    filter:blur(110px);

    opacity:.28;

    z-index:-2;
}


/* ================================
   BINTANG
================================ */

.stars{

    position:fixed;

    inset:0;

    pointer-events:none;

    z-index:-1;
}

.stars span{

    position:absolute;

    width:4px;
    height:4px;

    background:#ffffff;

    border-radius:50%;

    opacity:.65;

    box-shadow:0 0 8px #ffffff;
}

.stars span:nth-child(1){
    top:12%;
    left:25%;
}

.stars span:nth-child(2){
    top:20%;
    left:55%;
}

.stars span:nth-child(3){
    top:10%;
    right:15%;
}

.stars span:nth-child(4){
    top:45%;
    left:8%;
}

.stars span:nth-child(5){
    top:65%;
    left:20%;
}

.stars span:nth-child(6){
    top:35%;
    right:8%;
}

.stars span:nth-child(7){
    bottom:18%;
    right:25%;
}

.stars span:nth-child(8){
    bottom:10%;
    left:45%;
}

.stars span:nth-child(9){
    top:28%;
    left:80%;
}

.stars span:nth-child(10){
    bottom:30%;
    left:10%;
}


/* ================================
   CONTAINER
================================ */

.main-container{

    min-height:100vh;

    display:flex;

    align-items:center;

    justify-content:center;

    padding:50px 20px;
}


/* ================================
   CARD
================================ */

.card{

    width:100%;

    max-width:650px;

    border:none;

    border-radius:25px;

    background:rgba(20,12,45,.88);

    border:1px solid rgba(168,85,247,.35);

    box-shadow:

        0 0 30px rgba(124,58,237,.25),

        0 20px 60px rgba(0,0,0,.45);

    backdrop-filter:blur(15px);

    animation:fadeIn .7s ease;
}


@keyframes fadeIn{

    from{

        opacity:0;

        transform:translateY(20px);
    }

    to{

        opacity:1;

        transform:translateY(0);
    }
}


/* ================================
   HEADER
================================ */

.title-box{

    text-align:center;

    margin-bottom:30px;
}


/* LOGO NIJIKA */

.title-icon{

    width:85px;
    height:85px;

    margin:auto;

    display:flex;

    align-items:center;
    justify-content:center;

    border-radius:50%;

    overflow:hidden;

    background:linear-gradient(
        135deg,
        #7c3aed,
        #a855f7
    );

    border:3px solid rgba(255,255,255,.25);

    box-shadow:

        0 0 20px rgba(168,85,247,.45),

        0 0 35px rgba(124,58,237,.25);
}


.title-icon img{

    width:100%;
    height:100%;

    object-fit:cover;

    display:block;
}


/* JUDUL */

h2{

    margin-top:18px;

    margin-bottom:6px;

    font-weight:700;

    color:#ffffff;
}


.subtitle{

    color:#a99fbd;

    margin:0;

    font-size:14px;
}


/* ================================
   LABEL
================================ */

.form-label{

    color:#dcd3ed;

    font-weight:600;

    margin-bottom:8px;
}


/* ================================
   INPUT
================================ */

.form-control,
.form-select{

    min-height:48px;

    border-radius:12px;

    background:rgba(255,255,255,.07);

    border:1px solid rgba(168,85,247,.35);

    color:#ffffff;

    transition:.3s;
}


.form-control::placeholder{

    color:#8f859f;
}


.form-control:focus,
.form-select:focus{

    background:rgba(255,255,255,.09);

    color:#ffffff;

    border-color:#a855f7;

    box-shadow:

        0 0 0 3px rgba(168,85,247,.15),

        0 0 15px rgba(168,85,247,.15);
}


.form-select option{

    background:#21143d;

    color:#ffffff;
}


/* ================================
   BUTTON
================================ */

.btn{

    border-radius:11px;

    padding:10px 18px;

    font-weight:600;

    transition:.3s;
}


.btn-primary{

    background:linear-gradient(
        135deg,
        #7c3aed,
        #a855f7
    );

    border:none;

    color:white;

    box-shadow:

        0 5px 15px rgba(124,58,237,.25);
}


.btn-primary:hover{

    background:linear-gradient(
        135deg,
        #8b5cf6,
        #c084fc
    );

    color:white;

    transform:translateY(-2px);

    box-shadow:

        0 8px 25px rgba(168,85,247,.4);
}


.btn-secondary{

    background:rgba(255,255,255,.08);

    border:1px solid rgba(255,255,255,.12);

    color:#d8d0e8;
}


.btn-secondary:hover{

    background:rgba(255,255,255,.15);

    color:white;

    transform:translateY(-2px);
}


/* ================================
   MOBILE
================================ */

@media(max-width:576px){

    .main-container{

        padding:25px 12px;
    }

    .card-body{

        padding:22px !important;
    }

    h2{

        font-size:23px;
    }

    .title-icon{

        width:70px;
        height:70px;
    }

    .d-flex.justify-content-between{

        gap:10px;
    }

    .d-flex.justify-content-between .btn{

        flex:1;
    }
}

</style>

</head>


<body>


<!-- ================================
     BINTANG
================================ -->

<div class="stars">

    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>

</div>


<div class="main-container">


<div class="card">


<div class="card-body p-5">


<!-- ================================
     JUDUL + LOGO NIJIKA
================================ -->

<div class="title-box">

    <div class="title-icon">

        <img
            src=" ikuyo kita.jpg"
            alt="ikuyo kita"
        >

    </div>


    <h2>
        Tambah Data Nilai
    </h2>


    <p class="subtitle">
        Masukkan data nilai siswa ke dalam sistem akademik.
    </p>

</div>


<!-- ================================
     FORM
================================ -->

<form action="simpan.php" method="post">


<!-- SISWA -->

<div class="mb-3">

    <label class="form-label">

        <i class="bi bi-person-fill"></i>

        Nama Siswa

    </label>


    <select
        name="nis"
        class="form-select"
        required>

        <option value="">
            Pilih Siswa
        </option>


        <?php

        $query = mysqli_query(
            $koneksi,
            "SELECT * FROM siswa ORDER BY nama ASC"
        );


        while($data = mysqli_fetch_array($query)){

        ?>

        <option value="<?php echo htmlspecialchars($data['nis']); ?>">

            <?php echo htmlspecialchars($data['nama']); ?>

        </option>

        <?php

        }

        ?>

    </select>

</div>


<!-- GURU -->

<div class="mb-3">

    <label class="form-label">

        <i class="bi bi-person-badge-fill"></i>

        Guru

    </label>


    <select
        name="nip"
        class="form-select"
        required>

        <option value="">
            Pilih Guru
        </option>


        <?php

        $query = mysqli_query(
            $koneksi,
            "SELECT * FROM guru ORDER BY nama ASC"
        );


        while($data = mysqli_fetch_array($query)){

        ?>

        <option value="<?php echo htmlspecialchars($data['nip']); ?>">

            <?php echo htmlspecialchars($data['nama']); ?>

        </option>

        <?php

        }

        ?>

    </select>

</div>


<!-- MAPEL -->

<div class="mb-3">

    <label class="form-label">

        <i class="bi bi-book-fill"></i>

        Mata Pelajaran

    </label>


    <select
        name="id_mapel"
        class="form-select"
        required>

        <option value="">
            Pilih Mata Pelajaran
        </option>


        <?php

        $query = mysqli_query(
            $koneksi,
            "SELECT * FROM mapel ORDER BY mapel ASC"
        );


        while($data = mysqli_fetch_array($query)){

        ?>

        <option value="<?php echo htmlspecialchars($data['id_mapel']); ?>">

            <?php echo htmlspecialchars($data['mapel']); ?>

        </option>

        <?php

        }

        ?>

    </select>

</div>


<!-- NILAI -->

<div class="mb-4">

    <label class="form-label">

        <i class="bi bi-award-fill"></i>

        Nilai

    </label>


    <input
        type="number"
        name="nilai"
        class="form-control"
        placeholder="Masukkan nilai"
        min="0"
        max="100"
        required>

</div>


<!-- BUTTON -->

<div class="d-flex justify-content-between">


<a
    href="index.php"
    class="btn btn-secondary">

    <i class="bi bi-arrow-left"></i>

    Kembali

</a>


<button
    type="submit"
    class="btn btn-primary">

    <i class="bi bi-save"></i>

    Simpan

</button>


</div>


</form>


</div>

</div>


</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>