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

<title>Data Mata Pelajaran - Sistem Akademik</title>

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
            circle at 82% 5%,
            rgba(123, 63, 180, .38),
            transparent 28%
        ),

        radial-gradient(
            circle at 8% 88%,
            rgba(38, 55, 145, .32),
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

    width: 520px;
    height: 520px;

    top: -220px;
    right: -170px;

    border-radius: 50%;

    background:

        radial-gradient(
            circle,
            rgba(155, 89, 182, .45),
            rgba(111, 66, 193, .13) 45%,
            transparent 70%
        );

    filter: blur(25px);

    animation:
        glowMove 7s ease-in-out infinite alternate;

    pointer-events: none;

    z-index: -5;
}


body::after {

    content: "";

    position: fixed;

    width: 650px;
    height: 420px;

    bottom: -260px;
    left: -280px;

    border-radius: 50%;

    background:

        radial-gradient(
            circle,
            rgba(75, 67, 180, .32),
            transparent 70%
        );

    filter: blur(45px);

    animation:
        bottomGlow 9s ease-in-out infinite alternate;

    pointer-events: none;

    z-index: -5;
}


@keyframes glowMove {

    0% {
        transform: scale(.95) translate(0, 0);
        opacity: .55;
    }

    100% {
        transform: scale(1.1) translate(-15px, 15px);
        opacity: 1;
    }

}


@keyframes bottomGlow {

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
        1320px 40px #fff,
        1420px 220px #b9a9ff;

    opacity: .4;

    z-index: -2;

    animation:
        twinkle 4s ease-in-out infinite alternate;
}


.stars::before {

    transform:
        translate(50px, 300px);

    opacity: .25;
}


.stars::after {

    transform:
        translate(180px, 500px);

    opacity: .30;
}


@keyframes twinkle {

    0% {
        opacity: .18;
    }

    50% {
        opacity: .45;
    }

    100% {
        opacity: .75;
    }

}


/* =========================================
   MOON
========================================= */

.moon {

    position: fixed;

    width: 80px;
    height: 80px;

    top: 7%;
    left: 8%;

    border-radius: 50%;

    background:

        radial-gradient(
            circle at 35% 35%,
            #ffffff,
            #e8ddff 55%,
            #bda5e8
        );

    box-shadow:

        0 0 20px rgba(220, 195, 255, .8),

        0 0 50px rgba(145, 94, 210, .55),

        0 0 90px rgba(103, 65, 170, .35);

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
        rgba(150, 120, 180, .18);
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
        rgba(150, 120, 180, .18);
}


@keyframes moonFloat {

    0% {
        transform: translateY(0);
    }

    100% {
        transform: translateY(-10px);
    }

}


/* =========================================
   FLOATING SYSTEM HEADER
========================================= */

.system-header {

    position: absolute;

    top: 22px;
    left: 7.5%;
    right: 7.5%;

    display: flex;

    align-items: center;

    justify-content: space-between;

    z-index: 20;

    pointer-events: none;

    animation:
        headerAppear 1s ease;
}


.system-brand {

    display: flex;

    align-items: center;

    gap: 10px;

    pointer-events: auto;

    animation:
        brandFloat 4s ease-in-out infinite alternate;
}


.system-logo {

    width: 58px;
    height: 58px;

    object-fit: cover;

    border-radius: 18px;

    border:
        2px solid rgba(220, 190, 255, .35);

    box-shadow:

        0 0 15px rgba(155, 89, 182, .60),

        0 0 35px rgba(111, 66, 193, .30);

    transition: .35s ease;
}


.system-logo:hover {

    transform:
        scale(1.08)
        rotate(-3deg);

    box-shadow:

        0 0 25px rgba(190, 150, 255, .85),

        0 0 50px rgba(111, 66, 193, .45);
}


.system-name {

    font-size: 21px;

    font-weight: 700;

    color: #ffffff;

    letter-spacing: .3px;

    text-shadow:

        0 0 12px rgba(180, 130, 255, .55);
}


.user-box {

    pointer-events: auto;

    color: #cfc6df;

    font-size: 14px;

    animation:
        userFloat 4s ease-in-out infinite alternate;
}


.user-box b {

    color: #ffffff;

    font-weight: 700;

    text-shadow:
        0 0 10px rgba(190, 150, 255, .7);
}


@keyframes brandFloat {

    0% {
        transform: translateY(0);
    }

    100% {
        transform: translateY(-5px);
    }

}


@keyframes userFloat {

    0% {
        transform: translateY(0);
    }

    100% {
        transform: translateY(-3px);
    }

}


@keyframes headerAppear {

    from {

        opacity: 0;

        transform:
            translateY(-15px);

    }

    to {

        opacity: 1;

        transform:
            translateY(0);

    }

}


/* =========================================
   MAIN CONTAINER
========================================= */

.main-container {

    max-width: 1200px;

    margin: auto;

    padding:
        165px 20px 35px;

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
        1px solid rgba(190, 150, 255, .20);

    background:

        linear-gradient(
            145deg,
            rgba(35, 24, 65, .90),
            rgba(15, 11, 35, .95)
        );

    backdrop-filter: blur(18px);

    -webkit-backdrop-filter: blur(18px);

    box-shadow:

        0 25px 60px rgba(0, 0, 0, .45),

        0 0 35px rgba(111, 66, 193, .16);

    overflow: hidden;

    animation:
        cardAppear .8s ease;
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
        0 0 15px rgba(155, 89, 182, .9);
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
   HEADER CONTENT
========================================= */

.page-header {

    display: flex;

    justify-content: space-between;

    align-items: center;

    gap: 20px;

    margin-bottom: 28px;

    padding-bottom: 22px;

    border-bottom:
        1px solid rgba(190, 150, 255, .10);
}


.title-area {

    display: flex;

    align-items: center;

    gap: 16px;

    animation:
        titleAppear .8s ease .2s both;
}


.title-icon {

    width: 62px;
    height: 62px;

    flex-shrink: 0;

    display: flex;

    align-items: center;

    justify-content: center;

    border-radius: 17px;

    overflow: hidden;

    background:

        linear-gradient(
            135deg,
            rgba(111, 66, 193, .28),
            rgba(155, 89, 182, .10)
        );

    border:
        1px solid rgba(190, 150, 255, .25);

    box-shadow:

        0 0 20px rgba(111, 66, 193, .25),

        0 0 35px rgba(155, 89, 182, .12);

    animation:
        iconFloat 4s ease-in-out infinite alternate;
}


.title-icon img {

    width: 100%;
    height: 100%;

    object-fit: cover;

    display: block;

    transition: .35s ease;
}


.title-icon:hover img {

    transform:
        scale(1.08);
}


.title {

    margin: 0;

    color: #ffffff;

    font-size: 29px;

    font-weight: 700;

    text-shadow:
        0 0 15px rgba(180, 130, 255, .35);
}


.subtitle {

    margin: 4px 0 0;

    color: #a49aad;

    font-size: 14px;
}


@keyframes titleAppear {

    from {

        opacity: 0;

        transform:
            translateX(-15px);

    }

    to {

        opacity: 1;

        transform:
            translateX(0);

    }

}


@keyframes iconFloat {

    0% {
        transform: translateY(0);
    }

    100% {
        transform: translateY(-6px);
    }

}


/* =========================================
   ADD BUTTON
========================================= */

.btn-add {

    border: none;

    border-radius: 12px;

    padding: 12px 19px;

    color: #ffffff;

    font-weight: 600;

    background:

        linear-gradient(
            135deg,
            #7541c5,
            #9b59b6
        );

    box-shadow:

        0 8px 22px rgba(111, 66, 193, .30),

        0 0 15px rgba(155, 89, 182, .10);

    transition:
        transform .3s ease,
        box-shadow .3s ease;

    animation:
        buttonAppear .8s ease .35s both;
}


.btn-add:hover {

    color: #ffffff;

    transform:
        translateY(-4px)
        scale(1.02);

    background:

        linear-gradient(
            135deg,
            #824dd5,
            #a45fc0
        );

    box-shadow:

        0 12px 30px rgba(111, 66, 193, .50),

        0 0 25px rgba(155, 89, 182, .25);
}


.btn-add i {

    transition:
        transform .3s ease;
}


.btn-add:hover i {

    transform:
        rotate(90deg);
}


@keyframes buttonAppear {

    from {

        opacity: 0;

        transform:
            translateY(15px);

    }

    to {

        opacity: 1;

        transform:
            translateY(0);

    }

}


/* =========================================
   TABLE WRAPPER
========================================= */

.table-wrapper {

    overflow-x: auto;

    border-radius: 16px;

    border:
        1px solid rgba(190, 150, 255, .10);

    box-shadow:
        0 10px 30px rgba(0, 0, 0, .18);

    animation:
        tableAppear .9s ease .25s both;
}


@keyframes tableAppear {

    from {

        opacity: 0;

        transform:
            translateY(20px);

    }

    to {

        opacity: 1;

        transform:
            translateY(0);

    }

}


/* =========================================
   TABLE
========================================= */

.table {

    margin: 0;

    vertical-align: middle;

    --bs-table-color: #f5f0ff;

    --bs-table-bg: transparent;

    --bs-table-border-color:
        rgba(255, 255, 255, .08);

    color: #f5f0ff !important;
}


/* HEADER TABLE
   WARNA SESUAI FOTO
========================================= */

.table thead th {

    padding: 16px 14px;

    color: #ffffff !important;

    text-align: center;

    white-space: nowrap;

    font-size: 14px;

    font-weight: 700;

    border-color:
        rgba(255, 255, 255, .12) !important;

    background:

        linear-gradient(
            90deg,
            #52288c 0%,
            #7138bb 35%,
            #8140dc 65%,
            #7034bd 100%
        ) !important;

    box-shadow:
        inset 0 -1px rgba(255,255,255,.10);
}


/* Efek garis antar header */

.table thead th + th {

    border-left:
        1px solid rgba(255,255,255,.12);
}


/* =========================================
   TABLE BODY
========================================= */

.table tbody td {

    padding: 15px 14px;

    color: #e0d9eb !important;

    border-color:
        rgba(255,255,255,.07) !important;

    background:
        rgba(255,255,255,.025) !important;

    transition:
        background .25s ease,
        color .25s ease;
}


.table tbody tr {

    transition:
        transform .25s ease,
        box-shadow .25s ease;
}


.table tbody tr:hover {

    transform:
        translateX(3px);

    box-shadow:
        inset 4px 0 #8d4de0;
}


.table tbody tr:hover td {

    color: #ffffff !important;

    background:
        rgba(111,66,193,.13) !important;
}


/* =========================================
   ID BADGE
========================================= */

.id-badge {

    display: inline-flex;

    align-items: center;

    justify-content: center;

    min-width: 42px;

    padding: 5px 10px;

    border-radius: 8px;

    color: #e3d7ff !important;

    background:
        rgba(111,66,193,.18);

    border:
        1px solid rgba(180,130,255,.15);

    font-weight: 600;

    transition: .25s;
}


.table tbody tr:hover .id-badge {

    background:
        rgba(141,77,224,.28);

    box-shadow:
        0 0 12px rgba(141,77,224,.18);
}


/* =========================================
   ACTION BUTTON
========================================= */

.btn-action {

    border-radius: 9px;

    font-size: 13px;

    font-weight: 600;

    padding: 8px 12px;

    transition:
        transform .25s ease,
        box-shadow .25s ease,
        background .25s ease;
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
        translateY(-3px);

    box-shadow:
        0 7px 18px rgba(255,193,7,.18);
}


/* =========================================
   DELETE
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
        translateY(-3px);

    box-shadow:
        0 7px 18px rgba(255,107,157,.18);
}


/* =========================================
   BOTTOM
========================================= */

.bottom-area {

    margin-top: 24px;

    padding-top: 20px;

    border-top:
        1px solid rgba(190,150,255,.10);

    animation:
        bottomAppear .8s ease .5s both;
}


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
        translateX(-4px);

    box-shadow:
        0 5px 18px rgba(111,66,193,.15);
}


@keyframes bottomAppear {

    from {

        opacity: 0;

        transform:
            translateY(10px);

    }

    to {

        opacity: 1;

        transform:
            translateY(0);

    }

}


/* =========================================
   EMPTY DATA
========================================= */

.empty-data {

    text-align: center;

    padding: 45px 20px !important;

    color: #aaa0b9 !important;

    background:
        rgba(255,255,255,.02) !important;
}


.empty-data i {

    display: block;

    font-size: 42px;

    color: #8061b5;

    margin-bottom: 10px;

    animation:
        emptyFloat 3s ease-in-out infinite alternate;
}


@keyframes emptyFloat {

    from {
        transform: translateY(0);
    }

    to {
        transform: translateY(-7px);
    }

}


/* =========================================
   FOOTER
========================================= */

.footer {

    text-align: center;

    margin-top: 25px;

    padding-bottom: 10px;

    color: #70677d;

    font-size: 12px;

    animation:
        footerAppear 1s ease .6s both;
}


.footer-logo {

    width: 28px;
    height: 28px;

    object-fit: cover;

    border-radius: 50%;

    vertical-align: middle;

    margin-right: 6px;

    border:
        1px solid rgba(190,150,255,.25);

    box-shadow:
        0 0 12px rgba(111,66,193,.35);
}


@keyframes footerAppear {

    from {
        opacity: 0;
    }

    to {
        opacity: 1;
    }

}


/* =========================================
   RESPONSIVE
========================================= */

@media(max-width: 768px) {

    .system-header {

        top: 15px;

        left: 5%;
        right: 5%;
    }


    .system-logo {

        width: 45px;
        height: 45px;

        border-radius: 14px;
    }


    .system-name {

        font-size: 17px;
    }


    .user-box {

        font-size: 12px;
    }


    .main-container {

        padding:
            125px 12px 25px;
    }


    .main-card {

        border-radius: 20px;
    }


    .page-header {

        align-items: flex-start;

        flex-direction: column;
    }


    .title {

        font-size: 23px;
    }


    .title-icon {

        width: 52px;
        height: 52px;
    }


    .btn-add {

        width: 100%;
    }


    .moon {

        width: 60px;
        height: 60px;

        top: 4%;
        left: 4%;
    }


    .table {

        min-width: 650px;
    }

}


@media(max-width: 480px) {

    .system-header {

        left: 18px;
        right: 18px;
    }


    .system-name {

        font-size: 15px;
    }


    .user-box {

        font-size: 11px;
    }


    .system-logo {

        width: 40px;
        height: 40px;
    }


    .main-container {

        padding-top: 115px;
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
     FLOATING SYSTEM AKADEMIK
     TANPA KOTAK PANJANG
========================================= -->

<div class="system-header">

    <a
        href="../index.php"
        class="system-brand text-decoration-none"
    >

        <img
            src="bochi the rock.jpg"
            class="system-logo"
            alt="Logo Sistem Akademik"
        >

        <span class="system-name">
            Sistem Akademik
        </span>

    </a>


    <div class="user-box">

        Selamat Datang,

        <b>
            <?php echo htmlspecialchars($_SESSION['username']); ?>
        </b>

    </div>

</div>


<!-- =========================================
     MAIN
========================================= -->

<div class="main-container">

    <div class="main-card">

        <div class="card-body p-3 p-md-4">


            <!-- HEADER -->

            <div class="page-header">


                <div class="title-area">


                    <div class="title-icon">

                        <img
                            src="Nijika Ijichi.jpg"
                            alt="Nijika Ijichi"
                        >

                    </div>


                    <div>

                        <h2 class="title">
                            Data Mata Pelajaran
                        </h2>


                        <p class="subtitle">
                            Kelola daftar mata pelajaran dalam sistem akademik.
                        </p>

                    </div>


                </div>


                <a
                    href="tambah.php"
                    class="btn btn-add"
                >

                    <i class="bi bi-plus-circle me-1"></i>

                    Tambah Data

                </a>


            </div>


            <!-- =================================
                 TABLE
            ================================= -->

            <div class="table-wrapper">

                <table class="table table-hover align-middle">


                    <thead>

                        <tr>

                            <th width="15%">
                                ID
                            </th>


                            <th>
                                Nama Mata Pelajaran
                            </th>


                            <th width="25%">
                                Aksi
                            </th>

                        </tr>

                    </thead>


                    <tbody>


                    <?php

                    $query = mysqli_query(
                        $koneksi,
                        "SELECT * FROM mapel"
                    );


                    if (mysqli_num_rows($query) > 0) {


                        while ($data = mysqli_fetch_array($query)) {

                    ?>

                    <tr>


                        <td class="text-center">

                            <span class="id-badge">

                                <?php
                                echo htmlspecialchars(
                                    $data['id_mapel']
                                );
                                ?>

                            </span>

                        </td>


                        <td>

                            <?php
                            echo htmlspecialchars(
                                $data['mapel']
                            );
                            ?>

                        </td>


                        <td class="text-center">


                            <!-- EDIT -->

                            <a
                                href="edit.php?id_mapel=<?php echo $data['id_mapel']; ?>"
                                class="btn btn-warning btn-sm btn-action me-1"
                            >

                                <i class="bi bi-pencil-square"></i>

                                Edit

                            </a>


                            <!-- HAPUS -->

                            <a
                                href="hapus.php?id_mapel=<?php echo $data['id_mapel']; ?>"
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
                            colspan="3"
                            class="empty-data"
                        >

                            <i class="bi bi-book"></i>

                            Belum ada data mata pelajaran.

                        </td>

                    </tr>


                    <?php

                    }

                    ?>


                    </tbody>

                </table>

            </div>


            <!-- =================================
                 BACK BUTTON
            ================================= -->

            <div class="bottom-area">

                <a
                    href="../index.php"
                    class="btn btn-back"
                >

                    <i class="bi bi-arrow-left me-1"></i>

                    Kembali ke Dashboard

                </a>

            </div>


            <!-- =================================
                 FOOTER
            ================================= -->

            <div class="footer">

                <img
                    src="bochi the rock.jpg"
                    alt="Bocchi the Rock"
                    class="footer-logo"
                >

                Sistem Akademik

                &nbsp;•&nbsp;

                <?php echo date("Y"); ?>

            </div>


        </div>

    </div>

</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>