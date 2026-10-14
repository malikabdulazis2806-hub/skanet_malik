<?php
include "koneksi.php";
session_start();

if (!isset($_SESSION['status']) || $_SESSION['status'] <> "sukses") {
    header("Location: ../logout.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Data Nilai - Sistem Akademik</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.css" rel="stylesheet">


<style>

/* =========================================
   RESET
========================================= */

* {
    box-sizing: border-box;
}

html {
    scroll-behavior: smooth;
}

body {
    margin: 0;
    min-height: 100vh;

    font-family: "Segoe UI", Arial, sans-serif;

    color: #ffffff;

    background:
        radial-gradient(
            circle at 80% 5%,
            rgba(123,63,180,.32),
            transparent 28%
        ),

        radial-gradient(
            circle at 10% 90%,
            rgba(38,55,145,.28),
            transparent 30%
        ),

        linear-gradient(
            135deg,
            #090719 0%,
            #100b27 45%,
            #171038 100%
        );

    position: relative;
    overflow-x: hidden;
}


/* =========================================
   BACKGROUND GLOW
========================================= */

body::before {
    content: "";

    position: fixed;

    width: 500px;
    height: 500px;

    top: -220px;
    right: -160px;

    border-radius: 50%;

    background:
        radial-gradient(
            circle,
            rgba(155,89,182,.42),
            rgba(111,66,193,.12) 45%,
            transparent 70%
        );

    filter: blur(25px);

    animation:
        glowMove 7s ease-in-out infinite alternate;

    pointer-events: none;

    z-index: -3;
}


body::after {
    content: "";

    position: fixed;

    width: 600px;
    height: 400px;

    bottom: -250px;
    left: -250px;

    border-radius: 50%;

    background:
        radial-gradient(
            circle,
            rgba(75,67,180,.30),
            transparent 70%
        );

    filter: blur(45px);

    animation:
        cityGlow 9s ease-in-out infinite alternate;

    pointer-events: none;

    z-index: -3;
}


@keyframes glowMove {

    0% {
        transform: scale(.95);
        opacity: .6;
    }

    100% {
        transform: scale(1.1);
        opacity: 1;
    }

}


@keyframes cityGlow {

    0% {
        transform: translateX(0);
    }

    100% {
        transform: translateX(80px);
    }

}


/* =========================================
   STARS
========================================= */

.stars,
.stars::before,
.stars::after {

    position: fixed;

    content: "";

    width: 3px;
    height: 3px;

    border-radius: 50%;

    background: #ffffff;

    box-shadow:

        60px 70px #fff,
        140px 160px #b9a9ff,
        220px 50px #fff,
        310px 130px #d9ccff,
        410px 35px #fff,
        510px 180px #b9a9ff,
        620px 80px #fff,
        730px 200px #d9ccff,
        840px 55px #fff,
        950px 150px #b9a9ff,
        1080px 70px #fff,
        1200px 190px #d9ccff,
        1320px 40px #fff;

    opacity: .4;

    z-index: -2;

    animation:
        twinkle 4s ease-in-out infinite alternate;
}


.stars::before {
    transform: translate(50px,300px);
    opacity: .25;
}


.stars::after {
    transform: translate(180px,500px);
    opacity: .30;
}


@keyframes twinkle {

    0% {
        opacity: .2;
    }

    100% {
        opacity: .7;
    }

}


/* =========================================
   BULAN
========================================= */

.moon {

    position: fixed;

    width: 80px;
    height: 80px;

    top: 7%;
    left: 7%;

    border-radius: 50%;

    background:
        radial-gradient(
            circle at 35% 35%,
            #ffffff,
            #e8ddff 55%,
            #bda5e8
        );

    box-shadow:

        0 0 20px rgba(220,195,255,.8),

        0 0 50px rgba(145,94,210,.55),

        0 0 90px rgba(103,65,170,.35);

    animation:
        moonFloat 5s ease-in-out infinite alternate;

    z-index: -1;
}


.moon::before {

    content: "";

    position: absolute;

    width: 14px;
    height: 14px;

    top: 20px;
    left: 18px;

    border-radius: 50%;

    background:
        rgba(150,120,180,.18);
}


.moon::after {

    content: "";

    position: absolute;

    width: 9px;
    height: 9px;

    top: 48px;
    left: 46px;

    border-radius: 50%;

    background:
        rgba(150,120,180,.18);
}


@keyframes moonFloat {

    0% {
        transform: translateY(0);
    }

    100% {
        transform: translateY(-8px);
    }

}


/* =========================================
   SYSTEM BRAND
========================================= */

.system-brand {

    max-width: 1250px;

    margin: 0 auto;

    padding: 28px 20px 0;

    display: flex;

    align-items: center;

    gap: 12px;

    animation: brandAppear .8s ease;
}


@keyframes brandAppear {

    from {
        opacity: 0;
        transform: translateY(-15px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }

}


.brand-logo {

    width: 58px;
    height: 58px;

    border-radius: 17px;

    object-fit: cover;

    border:
        1px solid rgba(190,150,255,.25);

    box-shadow:
        0 0 25px rgba(111,66,193,.45);

    transition: .35s;
}


.brand-logo:hover {

    transform:
        rotate(-4deg)
        scale(1.08);

    box-shadow:
        0 0 35px rgba(155,89,182,.65);
}


.brand-text {

    display: flex;

    flex-direction: column;
}


.brand-title {

    font-size: 22px;

    font-weight: 700;

    color: #ffffff;

    text-shadow:
        0 0 15px rgba(180,130,255,.35);
}


.brand-subtitle {

    font-size: 12px;

    color: #958ba8;
}


/* =========================================
   MAIN CONTAINER
========================================= */

.main-container {

    max-width: 1250px;

    margin: auto;

    padding: 25px 20px 40px;

    position: relative;

    z-index: 5;
}


/* =========================================
   MAIN CARD
========================================= */

.main-card {

    position: relative;

    border-radius: 25px;

    border:
        1px solid rgba(190,150,255,.20);

    background:

        linear-gradient(
            145deg,
            rgba(35,24,65,.90),
            rgba(15,11,35,.95)
        );

    backdrop-filter: blur(18px);

    -webkit-backdrop-filter: blur(18px);

    box-shadow:

        0 25px 60px rgba(0,0,0,.45),

        0 0 35px rgba(111,66,193,.16);

    overflow: hidden;

    animation:
        cardAppear .7s ease;
}


.main-card::before {

    content: "";

    position: absolute;

    top: 0;
    left: 0;

    width: 100%;
    height: 3px;

    background:

        linear-gradient(
            90deg,
            transparent,
            #9b59b6,
            #6f42c1,
            #9b59b6,
            transparent
        );

    box-shadow:
        0 0 15px rgba(155,89,182,.9);
}


@keyframes cardAppear {

    from {

        opacity: 0;

        transform:
            translateY(25px)
            scale(.98);

    }

    to {

        opacity: 1;

        transform:
            translateY(0)
            scale(1);

    }

}


/* =========================================
   CONTENT
========================================= */

.card-content {

    padding: 30px;
}


/* =========================================
   HEADER
========================================= */

.header {

    display: flex;

    justify-content: space-between;

    align-items: center;

    gap: 20px;

    padding-bottom: 24px;

    margin-bottom: 25px;

    border-bottom:
        1px solid rgba(190,150,255,.10);
}


.title-area {

    display: flex;

    align-items: center;

    gap: 16px;
}


/* =========================================
   LOGO DATA NILAI
========================================= */

.header-icon {

    width: 65px;
    height: 65px;

    flex-shrink: 0;

    border-radius: 18px;

    overflow: hidden;

    background:
        linear-gradient(
            135deg,
            rgba(111,66,193,.35),
            rgba(155,89,182,.15)
        );

    border:
        1px solid rgba(190,150,255,.20);

    box-shadow:
        0 0 25px rgba(111,66,193,.35);

    transition: .35s;
}


.header-icon:hover {

    transform:
        translateY(-4px)
        rotate(2deg);

    box-shadow:
        0 0 35px rgba(155,89,182,.55);
}


.data-logo {

    width: 100%;
    height: 100%;

    object-fit: cover;

    display: block;
}


/* =========================================
   TITLE
========================================= */

.title {

    margin: 0;

    color: #ffffff;

    font-size: 30px;

    font-weight: 700;

    text-shadow:
        0 0 15px rgba(180,130,255,.35);
}


.subtitle {

    margin: 4px 0 0;

    color: #a49aad;

    font-size: 14px;
}


/* =========================================
   BUTTON TAMBAH
========================================= */

.btn-add {

    border: none;

    border-radius: 12px;

    padding: 11px 18px;

    color: #ffffff !important;

    font-weight: 600;

    background:

        linear-gradient(
            135deg,
            #6f42c1,
            #9b59b6
        );

    box-shadow:
        0 8px 22px rgba(111,66,193,.30);

    transition: .3s;
}


.btn-add:hover {

    color: #ffffff !important;

    transform:
        translateY(-3px);

    background:

        linear-gradient(
            135deg,
            #7c4ed0,
            #a65fc1
        );

    box-shadow:
        0 12px 28px
        rgba(111,66,193,.45);
}


/* =========================================
   PRINT AREA
========================================= */

.print-area {

    display: flex;

    justify-content: flex-end;

    align-items: center;

    gap: 10px;

    margin-bottom: 22px;
}


.form-select {

    min-width: 210px;

    color: #ffffff;

    background-color: #1b1235;

    border:
        1px solid rgba(155,89,182,.35);

    border-radius: 11px;

    padding: 10px 14px;

    transition: .3s;
}


.form-select:focus {

    color: #ffffff;

    background-color: #21143d;

    border-color: #9b59b6;

    box-shadow:
        0 0 0 3px rgba(155,89,182,.15);
}


.form-select option {

    background: #21143d;

    color: #ffffff;
}


/* =========================================
   BUTTON PRINT
========================================= */

.btn-print {

    border: 1px solid rgba(108,255,170,.25);

    border-radius: 10px;

    color: #8fffc0 !important;

    background:
        rgba(22,163,74,.13);

    font-weight: 600;

    padding: 10px 15px;

    transition: .3s;
}


.btn-print:hover {

    color: #b4ffd5 !important;

    background:
        rgba(22,163,74,.22);

    border-color:
        rgba(108,255,170,.4);

    transform:
        translateY(-2px);

    box-shadow:
        0 7px 18px rgba(22,163,74,.15);
}


/* =========================================
   TABLE WRAPPER
========================================= */

.table-wrapper {

    overflow: hidden;

    border-radius: 16px;

    border:
        1px solid rgba(190,150,255,.10);

    background:
        rgba(8,5,25,.35);
}


.table-responsive {

    overflow-x: auto;
}


.table-responsive::-webkit-scrollbar {

    height: 8px;
}


.table-responsive::-webkit-scrollbar-track {

    background:
        #100a25;
}


.table-responsive::-webkit-scrollbar-thumb {

    background:

        linear-gradient(
            90deg,
            #6f42c1,
            #9b59b6
        );

    border-radius: 20px;
}


.table-responsive::-webkit-scrollbar-thumb:hover {

    background:
        #b875d4;
}


/* =========================================
   TABLE
========================================= */

.table {

    margin: 0;

    min-width: 950px;

    vertical-align: middle;

    --bs-table-color: #f5f0ff;

    --bs-table-bg: transparent;

    --bs-table-border-color:
        rgba(255,255,255,.08);

    color: #f5f0ff !important;
}


/* HEADER TABLE - SESUAI FOTO */

.table thead th {

    padding: 15px 14px;

    color: #ffffff !important;

    text-align: center;

    font-weight: 700;

    white-space: nowrap;

    border-color:
        rgba(255,255,255,.10) !important;

    background:

        linear-gradient(
            90deg,
            #5d2da5 0%,
            #7438c5 45%,
            #8142db 100%
        ) !important;

    box-shadow:
        inset 0 -1px rgba(255,255,255,.08);
}


/* GARIS PEMISAH HEADER */

.table thead th + th {

    border-left:
        1px solid rgba(255,255,255,.12) !important;
}


/* BODY */

.table tbody td {

    padding: 14px;

    color: #f5f0ff !important;

    border-color:
        rgba(255,255,255,.07) !important;

    background:
        rgba(255,255,255,.025) !important;
}


.table tbody tr {

    transition:
        .25s ease;
}


.table tbody tr:hover {

    transform:
        scale(1.003);

    box-shadow:
        inset 3px 0 #9b59b6;
}


.table tbody tr:hover td {

    color: #ffffff !important;

    background:
        rgba(111,66,193,.12) !important;
}


/* =========================================
   ICON DATA
========================================= */

.data-icon {

    color: #9f8bd4;

    margin-right: 8px;

    transition: .25s;
}


.table tbody tr:hover .data-icon {

    color: #c59aff;

    transform:
        scale(1.1);
}


/* =========================================
   NILAI BADGE
========================================= */

.nilai-badge {

    display: inline-flex;

    align-items: center;

    justify-content: center;

    min-width: 48px;

    padding: 7px 12px;

    border-radius: 9px;

    color: #e9dcff !important;

    background:
        rgba(111,66,193,.20);

    border:
        1px solid rgba(180,130,255,.20);

    font-weight: 700;

    box-shadow:
        0 4px 12px rgba(111,66,193,.12);

    transition: .25s;
}


.table tbody tr:hover .nilai-badge {

    background:
        linear-gradient(
            135deg,
            #6f42c1,
            #9b59b6
        );

    color: #ffffff !important;

    transform:
        scale(1.06);

    box-shadow:
        0 5px 15px rgba(111,66,193,.3);
}


/* =========================================
   ACTION BUTTON
========================================= */

.btn-action {

    border-radius: 9px;

    font-size: 13px;

    font-weight: 600;

    padding: 8px 12px;

    transition: .25s;
}


/* =========================================
   EDIT
========================================= */

.btn-warning {

    color: #ffc107 !important;

    background:
        rgba(255,193,7,.12) !important;

    border:
        1px solid rgba(255,193,7,.25) !important;
}


.btn-warning i {

    color: #ffc107 !important;
}


.btn-warning:hover {

    color: #ffd34d !important;

    background:
        rgba(255,193,7,.20) !important;

    border-color:
        rgba(255,193,7,.40) !important;

    transform:
        translateY(-2px);

    box-shadow:
        0 5px 15px rgba(255,193,7,.15);
}


/* =========================================
   HAPUS
========================================= */

.btn-danger {

    color: #ff6b9d !important;

    background:
        rgba(220,53,69,.12) !important;

    border:
        1px solid rgba(220,53,69,.25) !important;
}


.btn-danger i {

    color: #ff6b9d !important;
}


.btn-danger:hover {

    color: #ff8fb5 !important;

    background:
        rgba(220,53,69,.20) !important;

    border-color:
        rgba(255,107,157,.40) !important;

    transform:
        translateY(-2px);

    box-shadow:
        0 5px 15px rgba(255,107,157,.15);
}


/* =========================================
   BOTTOM AREA
========================================= */

.bottom-area {

    display: flex;

    justify-content: space-between;

    align-items: center;

    margin-top: 24px;

    padding-top: 20px;

    border-top:
        1px solid rgba(190,150,255,.10);
}


/* =========================================
   BUTTON BACK
========================================= */

.btn-back {

    color: #d0c8dd !important;

    background:
        rgba(255,255,255,.06);

    border:
        1px solid rgba(190,150,255,.15);

    border-radius: 11px;

    padding: 10px 17px;

    font-weight: 600;

    transition: .3s;
}


.btn-back:hover {

    color: #ffffff !important;

    background:
        rgba(111,66,193,.20);

    border-color:
        rgba(180,130,255,.30);

    transform:
        translateX(-3px);
}


/* =========================================
   EXCEL
========================================= */

.btn-excel {

    color: #8fffc0 !important;

    background:
        rgba(22,163,74,.13);

    border:
        1px solid rgba(108,255,170,.25);

    border-radius: 11px;

    padding: 10px 17px;

    font-weight: 600;

    transition: .3s;
}


.btn-excel:hover {

    color: #b4ffd5 !important;

    background:
        rgba(22,163,74,.22);

    transform:
        translateY(-2px);

    box-shadow:
        0 7px 18px rgba(22,163,74,.15);
}


/* =========================================
   FOOTER
========================================= */

.footer {

    text-align: center;

    margin-top: 28px;

    color: #70677d;

    font-size: 12px;
}


.footer-logo {

    width: 42px;
    height: 42px;

    object-fit: cover;

    display: block;

    margin: 0 auto 7px;

    border-radius: 50%;

    border:
        1px solid rgba(190,150,255,.25);

    box-shadow:
        0 0 15px rgba(111,66,193,.35);

    transition: .35s;
}


.footer-logo:hover {

    transform:
        rotate(5deg)
        scale(1.1);

    box-shadow:
        0 0 25px rgba(155,89,182,.55);
}


/* =========================================
   RESPONSIVE
========================================= */

@media(max-width:900px) {

    .header {

        flex-direction: column;

        align-items: stretch;
    }


    .header .btn-add {

        width: 100%;
    }


    .print-area {

        flex-direction: column;

        align-items: stretch;
    }


    .print-area form {

        width: 100%;

        display: flex;
    }


    .form-select {

        width: 100%;
    }


    .print-area .btn-print {

        flex: 1;
    }

}


@media(max-width:576px) {

    .system-brand {

        padding:
            20px 14px 0;
    }


    .brand-logo {

        width: 50px;
        height: 50px;
    }


    .brand-title {

        font-size: 19px;
    }


    .main-container {

        padding:
            20px 12px 30px;
    }


    .main-card {

        border-radius: 20px;
    }


    .card-content {

        padding: 18px;
    }


    .title {

        font-size: 23px;
    }


    .subtitle {

        font-size: 13px;
    }


    .header-icon {

        width: 55px;
        height: 55px;
    }


    .title-area {

        gap: 12px;
    }


    .bottom-area {

        flex-direction: column;

        align-items: stretch;

        gap: 12px;
    }


    .bottom-area .btn {

        width: 100%;
    }


    .moon {

        width: 60px;
        height: 60px;

        top: 5%;
        left: 4%;
    }

}

</style>

</head>


<body>


<!-- =========================================
     BACKGROUND
========================================= -->

<div class="stars"></div>

<div class="moon"></div>


<!-- =========================================
     SISTEM AKADEMIK
========================================= -->

<div class="system-brand">

    <img
        src="bochi the rock.jpg"
        alt="Sistem Akademik"
        class="brand-logo"
    >

    <div class="brand-text">

        <div class="brand-title">
            Sistem Akademik
        </div>

        <div class="brand-subtitle">
            Management & Academic Information System
        </div>

    </div>

</div>


<!-- =========================================
     MAIN
========================================= -->

<div class="main-container">

    <div class="main-card">

        <div class="card-content">


            <!-- HEADER -->

            <div class="header">

                <div class="title-area">


                    <!-- LOGO DATA NILAI -->

                    <div class="header-icon">

                        <img
                            src="Ikuyo Kita.jpg"
                            alt="Data Nilai"
                            class="data-logo"
                        >

                    </div>


                    <div>

                        <h1 class="title">
                            Data Nilai
                        </h1>

                        <p class="subtitle">
                            Kelola data nilai siswa dalam sistem akademik.
                        </p>

                    </div>

                </div>


                <!-- TAMBAH DATA -->

                <a
                    href="tambah.php"
                    class="btn btn-add"
                >

                    <i class="bi bi-plus-circle me-1"></i>

                    Tambah Data

                </a>

            </div>


            <!-- =========================================
                 PRINT AREA
            ========================================= -->

            <div class="print-area">


                <!-- PRINT SISWA -->

                <form
                    action="print.php"
                    method="GET"
                    target="_blank"
                    class="d-flex gap-2"
                >

                    <select
                        name="nis"
                        class="form-select"
                        required
                    >

                        <option value="">
                            Pilih Siswa
                        </option>


                        <?php

                        $siswa = mysqli_query(
                            $koneksi,
                            "SELECT nis, nama FROM siswa ORDER BY nama ASC"
                        );

                        while ($s = mysqli_fetch_array($siswa)) {

                        ?>

                        <option
                            value="<?php echo htmlspecialchars($s['nis']); ?>"
                        >

                            <?php echo htmlspecialchars($s['nama']); ?>

                        </option>

                        <?php

                        }

                        ?>

                    </select>


                    <button
                        type="submit"
                        class="btn btn-print text-nowrap"
                    >

                        <i class="bi bi-printer me-1"></i>

                        Print Siswa

                    </button>

                </form>


                <!-- PRINT SEMUA -->

                <a
                    href="print.php"
                    target="_blank"
                    class="btn btn-print text-nowrap"
                >

                    <i class="bi bi-printer-fill me-1"></i>

                    Print Semua

                </a>

            </div>


            <!-- =========================================
                 TABLE
            ========================================= -->

            <div class="table-wrapper">

                <div class="table-responsive">

                    <table class="table table-hover align-middle">


                        <thead>

                            <tr>

                                <th width="10%">
                                    ID Nilai
                                </th>

                                <th width="20%">
                                    Nama Siswa
                                </th>

                                <th width="20%">
                                    Mata Pelajaran
                                </th>

                                <th width="20%">
                                    Nama Guru
                                </th>

                                <th width="12%">
                                    Nilai
                                </th>

                                <th width="18%">
                                    Aksi
                                </th>

                            </tr>

                        </thead>


                        <tbody>

                        <?php

                        $query = mysqli_query(
                            $koneksi,

                            "SELECT
                                nilai.id_nilai,
                                siswa.nama AS namasiswa,
                                guru.nama AS namaguru,
                                mapel.mapel,
                                nilai.nilai

                            FROM siswa, guru, mapel, nilai

                            WHERE nilai.nis = siswa.nis

                            AND nilai.nip = guru.nip

                            AND nilai.id_mapel = mapel.id_mapel"
                        );


                        if (mysqli_num_rows($query) > 0) {

                            while ($data = mysqli_fetch_array($query)) {

                        ?>

                        <tr>


                            <!-- ID -->

                            <td class="text-center">

                                <?php
                                echo htmlspecialchars(
                                    $data['id_nilai']
                                );
                                ?>

                            </td>


                            <!-- SISWA -->

                            <td>

                                <i class="bi bi-person-fill data-icon"></i>

                                <?php
                                echo htmlspecialchars(
                                    $data['namasiswa']
                                );
                                ?>

                            </td>


                            <!-- MAPEL -->

                            <td>

                                <i class="bi bi-book-fill data-icon"></i>

                                <?php
                                echo htmlspecialchars(
                                    $data['mapel']
                                );
                                ?>

                            </td>


                            <!-- GURU -->

                            <td>

                                <i class="bi bi-person-badge-fill data-icon"></i>

                                <?php
                                echo htmlspecialchars(
                                    $data['namaguru']
                                );
                                ?>

                            </td>


                            <!-- NILAI -->

                            <td class="text-center">

                                <span class="nilai-badge">

                                    <?php
                                    echo htmlspecialchars(
                                        $data['nilai']
                                    );
                                    ?>

                                </span>

                            </td>


                            <!-- AKSI -->

                            <td class="text-center text-nowrap">


                                <!-- EDIT -->

                                <a
                                    href="edit.php?id_nilai=<?php echo $data['id_nilai']; ?>"
                                    class="btn btn-warning btn-sm btn-action me-1"
                                >

                                    <i class="bi bi-pencil-square"></i>

                                    Edit

                                </a>


                                <!-- HAPUS -->

                                <a
                                    href="hapus.php?id_nilai=<?php echo $data['id_nilai']; ?>"
                                    class="btn btn-danger btn-sm btn-action"
                                    onclick="return confirm('Yakin ingin menghapus data ini?')"
                                >

                                    <i class="bi bi-trash"></i>

                                    Hapus

                                </a>

                            </td>

                        </tr>


                        <?php

                            }

                        } else {

                        ?>

                        <tr>

                            <td
                                colspan="6"
                                class="text-center"
                                style="
                                    padding:45px;
                                    color:#8f869d;
                                    background:rgba(255,255,255,.02);
                                "
                            >

                                <i
                                    class="bi bi-clipboard-x"
                                    style="
                                        font-size:40px;
                                        display:block;
                                        margin-bottom:10px;
                                        color:#8061b5;
                                    "
                                ></i>

                                Belum ada data nilai.

                            </td>

                        </tr>

                        <?php

                        }

                        ?>

                        </tbody>

                    </table>

                </div>

            </div>


            <!-- =========================================
                 BOTTOM
            ========================================= -->

            <div class="bottom-area">


                <!-- KEMBALI -->

                <a
                    href="../index.php"
                    class="btn btn-back"
                >

                    <i class="bi bi-arrow-left me-1"></i>

                    Kembali ke Dashboard

                </a>


                <!-- EXPORT -->

                <a
                    href="export.php"
                    class="btn btn-excel"
                >

                    <i class="bi bi-file-earmark-excel me-1"></i>

                    Export Excel

                </a>

            </div>


            <!-- =========================================
                 FOOTER
            ========================================= -->

            <div class="footer">

                <img
                    src="bochi the rock.jpg"
                    alt="Sistem Akademik"
                    class="footer-logo"
                >

                <div>
                    Sistem Akademik
                </div>

            </div>


        </div>

    </div>

</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>