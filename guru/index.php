<?php
include "koneksi.php";
session_start();

if ($_SESSION['status'] <> "sukses") {
    header("Location: ../logout.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Data Guru - Sistem Akademik</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.css" rel="stylesheet">


<style>

/* =========================================
   GLOBAL
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
            circle at 80% 10%,
            rgba(123, 63, 180, 0.32),
            transparent 28%
        ),

        radial-gradient(
            circle at 10% 85%,
            rgba(38, 55, 145, 0.28),
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

    width: 450px;
    height: 450px;

    top: -180px;
    right: -130px;

    border-radius: 50%;

    background:
        radial-gradient(
            circle,
            rgba(155, 89, 182, 0.40),
            rgba(111, 66, 193, 0.12) 45%,
            transparent 70%
        );

    filter: blur(25px);

    animation:
        moonGlow 7s ease-in-out infinite alternate;

    pointer-events: none;

    z-index: -3;
}


body::after {

    content: "";

    position: fixed;

    width: 550px;
    height: 350px;

    left: -220px;
    bottom: -200px;

    border-radius: 50%;

    background:
        radial-gradient(
            circle,
            rgba(75, 67, 180, 0.28),
            transparent 70%
        );

    filter: blur(45px);

    animation:
        cityGlow 9s ease-in-out infinite alternate;

    pointer-events: none;

    z-index: -3;
}


@keyframes moonGlow {

    0% {
        transform: scale(.95);
        opacity: .6;
    }

    100% {
        transform: scale(1.08);
        opacity: 1;
    }
}


@keyframes cityGlow {

    0% {
        transform: translateX(0);
    }

    100% {
        transform: translateX(70px);
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
        opacity: .2;
    }

    100% {
        opacity: .7;
    }
}


/* =========================================
   MOON
========================================= */

.moon {

    position: fixed;

    width: 80px;
    height: 80px;

    top: 8%;
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

    background: rgba(150,120,180,.18);
}


.moon::after {

    content: "";

    position: absolute;

    width: 9px;
    height: 9px;

    top: 48px;
    left: 46px;

    border-radius: 50%;

    background: rgba(150,120,180,.18);
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
   NAVBAR TRANSPARAN
========================================= */

.navbar {

    background: transparent !important;

    border: none !important;

    box-shadow: none !important;

    backdrop-filter: none !important;

    -webkit-backdrop-filter: none !important;

    padding: 20px 0;

    position: relative;

    z-index: 10;

    animation:
        navbarAppear .8s ease both;
}


@keyframes navbarAppear {

    from {
        opacity: 0;
        transform: translateY(-20px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }
}


/* =========================================
   BRAND MELAYANG
========================================= */

.navbar-brand {

    color: #ffffff !important;

    font-size: 21px;

    font-weight: 700;

    display: flex;

    align-items: center;

    gap: 10px;

    text-decoration: none;

    animation:
        brandFloat 4s ease-in-out infinite;
}


@keyframes brandFloat {

    0%,
    100% {
        transform: translateY(0);
    }

    50% {
        transform: translateY(-5px);
    }
}


/* =========================================
   LOGO NAVBAR
========================================= */

.logo-img {

    width: 55px;
    height: 55px;

    object-fit: cover;

    border-radius: 16px;

    border:
        2px solid rgba(210,170,255,.45);

    box-shadow:

        0 0 15px rgba(155,89,182,.60),
        0 0 35px rgba(111,66,193,.35);

    transition:
        transform .4s ease,
        box-shadow .4s ease;

    animation:
        logoGlow 3s ease-in-out infinite alternate;
}


@keyframes logoGlow {

    from {
        box-shadow:
            0 0 12px rgba(155,89,182,.45),
            0 0 25px rgba(111,66,193,.20);
    }

    to {
        box-shadow:
            0 0 25px rgba(190,130,255,.75),
            0 0 45px rgba(111,66,193,.40);
    }
}


.navbar-brand:hover .logo-img {

    transform:
        scale(1.12)
        rotate(-5deg);

    box-shadow:

        0 0 30px rgba(210,160,255,.9),
        0 0 55px rgba(111,66,193,.55);
}


/* =========================================
   TEXT SISTEM AKADEMIK
========================================= */

.brand-text {

    text-shadow:
        0 0 8px rgba(180,130,255,.45),
        0 0 20px rgba(111,66,193,.25);

    transition:
        .3s ease;
}


.navbar-brand:hover .brand-text {

    text-shadow:
        0 0 10px rgba(210,170,255,.8),
        0 0 30px rgba(111,66,193,.6);
}


/* =========================================
   USER
========================================= */

.user-name {

    color: #d8d0e8;

    font-size: 14px;

    animation:
        userFloat 4s ease-in-out infinite;
}


@keyframes userFloat {

    0%,
    100% {
        transform: translateY(0);
    }

    50% {
        transform: translateY(-3px);
    }
}


.user-name b {

    color: #ffffff;

    text-shadow:
        0 0 8px rgba(186,140,255,.7);
}


/* =========================================
   MAIN
========================================= */

.main-container {

    max-width: 1250px;

    margin: auto;
}


/* =========================================
   MAIN CARD
========================================= */

.main-card {

    border:
        1px solid rgba(190,150,255,.18);

    border-radius: 24px;

    background:

        linear-gradient(
            145deg,
            rgba(35,24,65,.88),
            rgba(15,11,35,.94)
        );

    backdrop-filter: blur(18px);

    -webkit-backdrop-filter: blur(18px);

    box-shadow:

        0 25px 60px rgba(0,0,0,.40),

        0 0 30px rgba(111,66,193,.14);

    overflow: hidden;

    position: relative;

    animation:
        cardAppear 1s cubic-bezier(.2,.8,.2,1) both;
}


@keyframes cardAppear {

    from {

        opacity: 0;

        transform:
            translateY(45px)
            scale(.97);

    }

    to {

        opacity: 1;

        transform:
            translateY(0)
            scale(1);

    }
}


.main-card::before {

    content: "";

    position: absolute;

    top: 0;
    left: -100%;

    width: 100%;
    height: 3px;

    background:

        linear-gradient(
            90deg,
            transparent,
            #9b59b6,
            #ffffff,
            #6f42c1,
            transparent
        );

    box-shadow:
        0 0 15px rgba(155,89,182,.8);

    animation:
        lightLine 4s linear infinite;
}


@keyframes lightLine {

    0% {
        left: -100%;
    }

    100% {
        left: 100%;
    }
}


/* =========================================
   HEADER
========================================= */

.page-header {

    display: flex;

    justify-content: space-between;

    align-items: center;

    gap: 15px;

    margin-bottom: 30px;

    animation:
        headerAppear 1s .15s ease both;
}


@keyframes headerAppear {

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


.page-title {

    margin: 0;

    font-size: 30px;

    font-weight: 700;

    color: #ffffff;

    text-shadow:
        0 0 15px rgba(180,130,255,.35);

    display: flex;

    align-items: center;
}


/* =========================================
   FOTO RYOU
========================================= */

.title-img {

    width: 65px;
    height: 65px;

    object-fit: cover;

    border-radius: 17px;

    margin-right: 12px;

    border:
        2px solid rgba(190,150,255,.35);

    box-shadow:

        0 0 18px rgba(155,89,182,.55),
        0 0 35px rgba(111,66,193,.25);

    animation:
        titleImageFloat 4s ease-in-out infinite alternate;

    transition:
        transform .4s ease,
        box-shadow .4s ease;
}


@keyframes titleImageFloat {

    0% {
        transform: translateY(0) rotate(0);
    }

    100% {
        transform: translateY(-7px) rotate(2deg);
    }
}


.title-img:hover {

    transform:
        scale(1.15)
        rotate(-5deg);

    box-shadow:

        0 0 30px rgba(200,150,255,.8),
        0 0 55px rgba(111,66,193,.45);
}


/* =========================================
   SUBTITLE
========================================= */

.page-subtitle {

    color: #938ba6;

    font-size: 14px;

    margin-top: 5px;

    margin-bottom: 0;
}


/* =========================================
   ADD BUTTON
========================================= */

.btn-add {

    border: none;

    border-radius: 12px;

    padding: 11px 18px;

    font-weight: 600;

    color: #ffffff;

    background:

        linear-gradient(
            135deg,
            #6f42c1,
            #9b59b6
        );

    box-shadow:
        0 8px 22px rgba(111,66,193,.30);

    transition:
        transform .3s ease,
        box-shadow .3s ease;
}


.btn-add:hover {

    color: #ffffff;

    transform:
        translateY(-4px)
        scale(1.03);

    box-shadow:
        0 12px 30px rgba(111,66,193,.55);
}


/* =========================================
   TABLE
========================================= */

.table-container {

    border:
        1px solid rgba(190,150,255,.12);

    border-radius: 16px;

    overflow: hidden;

    background:
        rgba(8,6,22,.35);

    animation:
        tableAppear 1s .35s ease both;
}


@keyframes tableAppear {

    from {

        opacity: 0;

        transform:
            translateY(25px);

    }

    to {

        opacity: 1;

        transform:
            translateY(0);

    }
}


.table {

    margin-bottom: 0;

    color: #ded9e8;

    border-color:
        rgba(190,150,255,.10);
}


.table thead th {

    padding: 15px 12px;

    background:

        linear-gradient(
            90deg,
            #4d267f,
            #6f42c1,
            #7c3aed
        );

    color: #ffffff;

    text-align: center;

    font-size: 14px;

    font-weight: 600;

    border-color:
        rgba(255,255,255,.10);

    white-space: nowrap;
}


.table tbody tr {

    animation:
        rowAppear .6s ease both;
}


.table tbody tr:nth-child(1) {
    animation-delay: .1s;
}

.table tbody tr:nth-child(2) {
    animation-delay: .18s;
}

.table tbody tr:nth-child(3) {
    animation-delay: .26s;
}

.table tbody tr:nth-child(4) {
    animation-delay: .34s;
}

.table tbody tr:nth-child(5) {
    animation-delay: .42s;
}


@keyframes rowAppear {

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


.table tbody td {

    padding: 14px 12px;

    background:
        rgba(255,255,255,.025);

    color: #d7d1e2;

    border-color:
        rgba(190,150,255,.10);

    vertical-align: middle;
}


.table-hover tbody tr {

    transition:
        transform .25s ease;
}


.table-hover tbody tr:hover {

    transform:
        translateX(5px);
}


.table-hover tbody tr:hover td {

    background:
        rgba(111,66,193,.14);

    color: #ffffff;

    box-shadow:
        inset 0 0 20px rgba(111,66,193,.04);
}


/* =========================================
   ACTION BUTTON
========================================= */

.btn-action {

    border: none;

    border-radius: 9px;

    font-size: 13px;

    padding: 7px 11px;

    transition:
        transform .25s ease,
        box-shadow .25s ease;
}


.btn-edit {

    background:
        rgba(245,158,11,.15);

    color: #ffc65c;

    border:
        1px solid rgba(245,158,11,.20);
}


.btn-edit:hover {

    color: #ffffff;

    background: #d97706;

    transform:
        translateY(-3px)
        scale(1.04);

    box-shadow:
        0 7px 18px rgba(245,158,11,.3);
}


.btn-delete {

    background:
        rgba(220,53,69,.15);

    color: #ff8794;

    border:
        1px solid rgba(220,53,69,.20);
}


.btn-delete:hover {

    color: #ffffff;

    background: #b02a37;

    transform:
        translateY(-3px)
        scale(1.04);

    box-shadow:
        0 7px 18px rgba(220,53,69,.3);
}


/* =========================================
   BACK BUTTON
========================================= */

.btn-back {

    margin-top: 25px;

    border-radius: 11px;

    padding: 10px 17px;

    color: #c5bdd3;

    background:
        rgba(255,255,255,.06);

    border:
        1px solid rgba(190,150,255,.15);

    transition:
        transform .3s ease,
        background .3s ease;
}


.btn-back:hover {

    color: #ffffff;

    background:
        rgba(111,66,193,.20);

    border-color:
        rgba(180,130,255,.30);

    transform:
        translateX(-5px);
}


/* =========================================
   FOOTER
========================================= */

.footer {

    text-align: center;

    color: #6f6780;

    font-size: 12px;

    margin-top: 30px;

    padding-bottom: 10px;

    animation:
        fadeIn 1s 1s ease both;
}


@keyframes fadeIn {

    from {
        opacity: 0;
    }

    to {
        opacity: 1;
    }
}


.footer hr {

    border: none;

    height: 1px;

    background:

        linear-gradient(
            90deg,
            transparent,
            rgba(155,89,182,.35),
            transparent
        );

    margin-bottom: 18px;
}


/* =========================================
   MOBILE
========================================= */

@media (max-width: 768px) {

    .navbar {

        padding: 15px 0;
    }


    .navbar-brand {

        font-size: 18px;
    }


    .logo-img {

        width: 48px;
        height: 48px;

        border-radius: 14px;
    }


    .user-name {

        font-size: 12px;
    }


    .page-header {

        align-items: flex-start;

        flex-direction: column;
    }


    .page-title {

        font-size: 26px;
    }


    .title-img {

        width: 52px;
        height: 52px;
    }


    .btn-add {

        width: 100%;
    }


    .main-card {

        border-radius: 19px;
    }


    .table {

        min-width: 650px;
    }


    .moon {

        width: 60px;
        height: 60px;

        left: 4%;
    }

}

</style>

</head>


<body>


<!-- BACKGROUND -->

<div class="stars"></div>

<div class="moon"></div>


<!-- =========================================
     NAVBAR TRANSPARAN
========================================= -->

<nav class="navbar navbar-expand-lg navbar-dark">

    <div class="container">

        <a
            class="navbar-brand"
            href="../index.php"
        >

            <img
                src="bochi the rock.jpg"
                class="logo-img"
                alt="Bocchi"
            >

            <span class="brand-text">
                Sistem Akademik
            </span>

        </a>


        <div class="user-name">

            Selamat Datang,

            <b>
                <?php echo $_SESSION['username']; ?>
            </b>

        </div>

    </div>

</nav>


<!-- =========================================
     MAIN
========================================= -->

<div class="container main-container py-5">


    <div class="main-card">

        <div class="card-body p-4 p-md-5">


            <!-- HEADER -->

            <div class="page-header">

                <div>

                    <h2 class="page-title">

                        <img
                            src="Ryou Yamada.jpg"
                            class="title-img"
                            alt="Ryou Yamada"
                        >

                        Data Guru

                    </h2>


                    <p class="page-subtitle">

                        Kelola data guru yang terdaftar dalam sistem.

                    </p>

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

            <div class="table-container">

                <div class="table-responsive">

                    <table class="table table-bordered table-hover align-middle">

                        <thead>

                            <tr>

                                <th width="15%">
                                    NIP
                                </th>

                                <th>
                                    Nama
                                </th>

                                <th>
                                    Alamat
                                </th>

                                <th width="20%">
                                    Aksi
                                </th>

                            </tr>

                        </thead>


                        <tbody>

                        <?php

                        $query = mysqli_query(
                            $koneksi,
                            "SELECT * FROM guru"
                        );

                        while ($data = mysqli_fetch_array($query)) {

                        ?>

                            <tr>

                                <td class="text-center">

                                    <?php echo $data['nip']; ?>

                                </td>


                                <td>

                                    <?php echo $data['nama']; ?>

                                </td>


                                <td>

                                    <?php echo $data['alamat']; ?>

                                </td>


                                <td class="text-center">


                                    <!-- EDIT -->

                                    <a
                                        href="edit.php?nip=<?php echo $data['nip']; ?>"
                                        class="btn btn-action btn-edit me-1"
                                    >

                                        <i class="bi bi-pencil-square"></i>

                                        Edit

                                    </a>


                                    <!-- HAPUS -->

                                    <a
                                        href="hapus.php?nip=<?php echo $data['nip']; ?>"
                                        class="btn btn-action btn-delete"
                                        onclick="return confirm('Yakin ingin menghapus data ini?')"
                                    >

                                        <i class="bi bi-trash"></i>

                                        Hapus

                                    </a>


                                </td>

                            </tr>


                        <?php } ?>

                        </tbody>

                    </table>

                </div>

            </div>


            <!-- BACK -->

            <a
                href="../index.php"
                class="btn btn-back"
            >

                <i class="bi bi-arrow-left me-1"></i>

                Kembali ke Dashboard

            </a>


        </div>

    </div>


    <!-- FOOTER -->

    <div class="footer">

        <hr>

        Copyright © <?php echo date("Y"); ?>

        Sistem Akademik

    </div>


</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>