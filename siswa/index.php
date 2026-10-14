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

<title>Data Siswa - Sistem Akademik</title>

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

    z-index: -2;
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

    z-index: -2;
}


@keyframes moonGlow {

    0% {
        transform: scale(0.95);
        opacity: 0.6;
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

    opacity: 0.4;

    z-index: -1;

    animation:
        twinkle 4s ease-in-out infinite alternate;
}


.stars::before {

    transform:
        translate(50px, 300px);

    opacity: 0.25;
}


.stars::after {

    transform:
        translate(180px, 500px);

    opacity: 0.3;
}


@keyframes twinkle {

    0% {
        opacity: 0.2;
    }

    100% {
        opacity: 0.7;
    }

}


/* =========================================
   FLOATING HEADER
========================================= */

.floating-header {

    position: absolute;

    top: 25px;

    left: 35px;
    right: 35px;

    display: flex;

    align-items: center;

    justify-content: space-between;

    z-index: 20;

    pointer-events: none;

    animation:
        headerAppear 0.8s ease forwards;
}


@keyframes headerAppear {

    from {

        opacity: 0;

        transform:
            translateY(-20px);

    }

    to {

        opacity: 1;

        transform:
            translateY(0);

    }

}


/* =========================================
   BRAND
========================================= */

.brand-floating {

    display: flex;

    align-items: center;

    gap: 12px;

    text-decoration: none;

    color: #ffffff;

    pointer-events: auto;

    animation:
        brandFloat 4s ease-in-out infinite alternate;

    transition:
        transform 0.35s ease;
}


.brand-floating:hover {

    color: #ffffff;

    transform:
        translateY(-4px)
        scale(1.03);
}


.navbar-logo {

    width: 55px;
    height: 55px;

    border-radius: 16px;

    object-fit: cover;

    border:
        2px solid rgba(220, 180, 255, 0.40);

    box-shadow:
        0 0 15px rgba(155, 89, 182, 0.65),
        0 0 35px rgba(111, 66, 193, 0.30);

    transition:
        transform 0.45s ease,
        box-shadow 0.45s ease,
        filter 0.45s ease;
}


.navbar-logo:hover {

    transform:
        scale(1.16)
        rotate(5deg);

    box-shadow:
        0 0 22px rgba(220, 180, 255, 0.95),
        0 0 45px rgba(111, 66, 193, 0.65);

    filter:
        brightness(1.12);
}


.brand-title {

    font-size: 22px;

    font-weight: 700;

    letter-spacing: 0.4px;

    text-shadow:
        0 0 12px rgba(190, 140, 255, 0.55);

    transition:
        text-shadow 0.3s ease;
}


.brand-floating:hover .brand-title {

    text-shadow:
        0 0 10px rgba(220, 180, 255, 0.85),
        0 0 25px rgba(155, 89, 182, 0.60);
}


@keyframes brandFloat {

    0% {
        transform: translateY(0);
    }

    100% {
        transform: translateY(-6px);
    }

}


/* =========================================
   USER
========================================= */

.user-name {

    color: #d8d0e8;

    font-size: 14px;

    padding:
        9px 15px;

    border-radius: 14px;

    background:
        rgba(20, 14, 45, 0.35);

    border:
        1px solid rgba(180, 130, 255, 0.12);

    backdrop-filter: blur(8px);

    animation:
        userFloat 5s ease-in-out infinite alternate;
}


.user-name b {

    color: #ffffff;

    text-shadow:
        0 0 8px rgba(186, 140, 255, 0.7);
}


@keyframes userFloat {

    0% {
        transform: translateY(0);
    }

    100% {
        transform: translateY(-4px);
    }

}


/* =========================================
   MAIN
========================================= */

.main-container {

    max-width: 1250px;

    margin: auto;

    padding-top: 125px !important;
}


/* =========================================
   MAIN CARD
========================================= */

.main-card {

    border:
        1px solid rgba(190, 150, 255, 0.18);

    border-radius: 24px;

    background:
        linear-gradient(
            145deg,
            rgba(35, 24, 65, 0.88),
            rgba(15, 11, 35, 0.94)
        );

    backdrop-filter: blur(18px);

    -webkit-backdrop-filter: blur(18px);

    box-shadow:
        0 25px 60px rgba(0, 0, 0, 0.40),
        0 0 30px rgba(111, 66, 193, 0.14);

    overflow: hidden;

    position: relative;

    animation:
        cardAppear 0.8s cubic-bezier(.2,.8,.2,1) forwards;
}


@keyframes cardAppear {

    from {

        opacity: 0;

        transform:
            translateY(40px)
            scale(0.97);

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
        0 0 15px rgba(155, 89, 182, 0.8);

    animation:
        shineLine 4s ease-in-out infinite;
}


@keyframes shineLine {

    0% {
        left: -100%;
    }

    50% {
        left: 100%;
    }

    100% {
        left: 100%;
    }

}


/* =========================================
   PAGE HEADER
========================================= */

.page-header {

    display: flex;

    justify-content: space-between;

    align-items: center;

    gap: 15px;

    margin-bottom: 30px;

    animation:
        contentAppear 0.8s 0.25s ease both;
}


@keyframes contentAppear {

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


.page-title-area {

    display: flex;

    align-items: center;

    gap: 18px;
}


.page-logo {

    width: 82px;
    height: 82px;

    object-fit: cover;

    border-radius: 21px;

    border:
        2px solid rgba(190, 150, 255, 0.30);

    box-shadow:
        0 0 20px rgba(111, 66, 193, 0.40),
        0 0 40px rgba(155, 89, 182, 0.18);

    animation:
        pageLogoFloat 4s ease-in-out infinite alternate;

    transition:
        transform 0.45s ease,
        box-shadow 0.45s ease;
}


.page-logo:hover {

    transform:
        scale(1.12)
        rotate(-5deg);

    box-shadow:
        0 0 30px rgba(111, 66, 193, 0.70),
        0 0 55px rgba(155, 89, 182, 0.35);
}


@keyframes pageLogoFloat {

    0% {

        transform:
            translateY(0)
            rotate(0deg);

    }

    100% {

        transform:
            translateY(-7px)
            rotate(2deg);

    }

}


.page-title {

    margin: 0;

    font-size: 30px;

    font-weight: 700;

    color: #ffffff;

    text-shadow:
        0 0 15px rgba(180, 130, 255, 0.35);
}


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

    position: relative;

    overflow: hidden;

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
        0 8px 22px rgba(111, 66, 193, 0.30);

    transition:
        transform 0.3s ease,
        box-shadow 0.3s ease;
}


.btn-add::before {

    content: "";

    position: absolute;

    top: 0;

    left: -120%;

    width: 70%;

    height: 100%;

    background:
        linear-gradient(
            90deg,
            transparent,
            rgba(255,255,255,0.35),
            transparent
        );

    transform:
        skewX(-20deg);

    transition:
        0.6s;
}


.btn-add:hover::before {

    left: 140%;
}


.btn-add:hover {

    color: #ffffff;

    transform:
        translateY(-4px)
        scale(1.03);

    box-shadow:
        0 12px 30px rgba(111, 66, 193, 0.50);
}


/* =========================================
   TABLE
========================================= */

.table-container {

    border:
        1px solid rgba(190, 150, 255, 0.12);

    border-radius: 16px;

    overflow: hidden;

    background:
        rgba(8, 6, 22, 0.35);

    animation:
        tableAppear 0.8s 0.45s ease both;
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
        rgba(190, 150, 255, 0.10);
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
        rgba(255, 255, 255, 0.10);

    white-space: nowrap;
}


.table tbody td {

    padding: 14px 12px;

    background:
        rgba(255, 255, 255, 0.025);

    color: #d7d1e2;

    border-color:
        rgba(190, 150, 255, 0.10);

    vertical-align: middle;
}


/* =========================================
   ANIMASI BARIS TABLE
========================================= */

.table tbody tr {

    opacity: 0;

    animation:
        rowAppear 0.5s ease forwards;

    transition:
        transform 0.3s ease;
}


/* baris 1 */

.table tbody tr:nth-child(1) {
    animation-delay: 0.55s;
}

.table tbody tr:nth-child(2) {
    animation-delay: 0.65s;
}

.table tbody tr:nth-child(3) {
    animation-delay: 0.75s;
}

.table tbody tr:nth-child(4) {
    animation-delay: 0.85s;
}

.table tbody tr:nth-child(5) {
    animation-delay: 0.95s;
}

.table tbody tr:nth-child(6) {
    animation-delay: 1.05s;
}

.table tbody tr:nth-child(7) {
    animation-delay: 1.15s;
}

.table tbody tr:nth-child(8) {
    animation-delay: 1.25s;
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


.table-hover tbody tr {

    transition:
        transform 0.3s ease;
}


.table-hover tbody tr:hover {

    transform:
        translateX(5px);
}


.table-hover tbody tr:hover td {

    background:
        rgba(111, 66, 193, 0.14);

    color: #ffffff;

    box-shadow:
        inset 0 0 20px rgba(111, 66, 193, 0.05);
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
        transform 0.25s ease,
        box-shadow 0.25s ease;
}


.btn-edit {

    background:
        rgba(245, 158, 11, 0.15);

    color: #ffc65c;

    border:
        1px solid rgba(245, 158, 11, 0.20);
}


.btn-edit:hover {

    color: #ffffff;

    background:
        #d97706;

    transform:
        translateY(-3px)
        scale(1.04);

    box-shadow:
        0 6px 18px rgba(245, 158, 11, 0.30);
}


.btn-delete {

    background:
        rgba(220, 53, 69, 0.15);

    color: #ff8794;

    border:
        1px solid rgba(220, 53, 69, 0.20);
}


.btn-delete:hover {

    color: #ffffff;

    background:
        #b02a37;

    transform:
        translateY(-3px)
        scale(1.04);

    box-shadow:
        0 6px 18px rgba(220, 53, 69, 0.30);
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
        rgba(255, 255, 255, 0.06);

    border:
        1px solid rgba(190, 150, 255, 0.15);

    transition:
        transform 0.3s ease,
        background 0.3s ease,
        box-shadow 0.3s ease;
}


.btn-back:hover {

    color: #ffffff;

    background:
        rgba(111, 66, 193, 0.20);

    border-color:
        rgba(180, 130, 255, 0.30);

    transform:
        translateX(-5px);

    box-shadow:
        0 5px 18px rgba(111, 66, 193, 0.20);
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
        contentAppear 1s 0.8s ease both;
}


.footer hr {

    border: none;

    height: 1px;

    background:
        linear-gradient(
            90deg,
            transparent,
            rgba(155, 89, 182, 0.35),
            transparent
        );

    margin-bottom: 18px;
}


/* =========================================
   MOBILE
========================================= */

@media (max-width: 768px) {

    .floating-header {

        top: 18px;

        left: 18px;
        right: 18px;

        align-items: flex-start;
    }


    .navbar-logo {

        width: 45px;
        height: 45px;

        border-radius: 13px;
    }


    .brand-title {

        font-size: 17px;
    }


    .user-name {

        font-size: 11px;

        padding:
            7px 9px;

        max-width: 145px;

        text-align: right;
    }


    .main-container {

        padding-top: 110px !important;
    }


    .page-header {

        align-items: flex-start;

        flex-direction: column;
    }


    .page-title-area {

        width: 100%;
    }


    .page-logo {

        width: 65px;
        height: 65px;

        border-radius: 17px;
    }


    .page-title {

        font-size: 26px;
    }


    .page-subtitle {

        font-size: 13px;
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

}


/* =========================================
   REDUCE MOTION
========================================= */

@media (prefers-reduced-motion: reduce) {

    *,
    *::before,
    *::after {

        animation-duration: 0.01ms !important;

        animation-iteration-count: 1 !important;

        transition-duration: 0.01ms !important;
    }

}

</style>

</head>


<body>


<!-- =========================================
     BACKGROUND STARS
========================================= -->

<div class="stars"></div>


<!-- =========================================
     FLOATING HEADER
========================================= -->

<div class="floating-header">


    <!-- LOGO SISTEM AKADEMIK -->

    <a
        href="../index.php"
        class="brand-floating"
    >

        <img
            src="bochi the rock.jpg"
            class="navbar-logo"
            alt="Logo Sistem Akademik"
        >

        <span class="brand-title">
            Sistem Akademik
        </span>

    </a>


    <!-- USER -->

    <div class="user-name">

        Selamat Datang,

        <b>
            <?php echo $_SESSION['username']; ?>
        </b>

    </div>


</div>


<!-- =========================================
     MAIN
========================================= -->

<div class="container main-container py-5">


    <div class="main-card">

        <div class="card-body p-4 p-md-5">


            <!-- HEADER -->

            <div class="page-header">


                <div class="page-title-area">


                    <img
                        src="hitori gotoh.jpg"
                        class="page-logo"
                        alt="Logo Data Siswa"
                    >


                    <div>

                        <h2 class="page-title">
                            Data Siswa
                        </h2>


                        <p class="page-subtitle">

                            Kelola data siswa yang terdaftar dalam sistem.

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

            <div class="table-container">

                <div class="table-responsive">

                    <table class="table table-bordered table-hover align-middle">


                        <thead>

                            <tr>

                                <th width="15%">
                                    NIS
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
                            "SELECT * FROM siswa"
                        );

                        while ($data = mysqli_fetch_array($query)) {

                        ?>

                            <tr>

                                <td class="text-center">

                                    <?php echo $data['nis']; ?>

                                </td>


                                <td>

                                    <?php echo $data['nama']; ?>

                                </td>


                                <td>

                                    <?php echo $data['alamat']; ?>

                                </td>


                                <td class="text-center">


                                    <a
                                        href="edit.php?nis=<?php echo $data['nis']; ?>"
                                        class="btn btn-action btn-edit me-1"
                                    >

                                        <i class="bi bi-pencil-square"></i>

                                        Edit

                                    </a>


                                    <a
                                        href="hapus.php?nis=<?php echo $data['nis']; ?>"
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


            <!-- =================================
                 BACK
            ================================= -->

            <a
                href="../index.php"
                class="btn btn-back"
            >

                <i class="bi bi-arrow-left me-1"></i>

                Kembali ke Dashboard

            </a>


        </div>

    </div>


    <!-- =================================
         FOOTER
    ================================= -->

    <div class="footer">

        <hr>

        Copyright © <?php echo date("Y"); ?>

        Sistem Akademik

    </div>


</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>