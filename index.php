<?php
session_start();

if ($_SESSION['status'] <> "sukses") {
    header("Location: logout.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Dashboard - Sistem Akademik</title>

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap Icons -->
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
            circle at 75% 15%,
            rgba(123, 63, 180, 0.35),
            transparent 28%
        ),

        radial-gradient(
            circle at 15% 80%,
            rgba(38, 55, 145, 0.30),
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
   NIGHT SKY
========================================= */

body::before {
    content: "";

    position: fixed;

    width: 420px;
    height: 420px;

    top: -180px;
    right: -120px;

    border-radius: 50%;

    background:
        radial-gradient(
            circle,
            rgba(154, 89, 182, 0.38),
            rgba(111, 66, 193, 0.12) 45%,
            transparent 70%
        );

    filter: blur(20px);

    animation: moonGlow 7s ease-in-out infinite alternate;

    pointer-events: none;

    z-index: -2;
}


body::after {
    content: "";

    position: fixed;

    width: 500px;
    height: 300px;

    left: -180px;
    bottom: -180px;

    border-radius: 50%;

    background:
        radial-gradient(
            circle,
            rgba(75, 67, 180, 0.25),
            transparent 70%
        );

    filter: blur(40px);

    animation: cityGlow 9s ease-in-out infinite alternate;

    pointer-events: none;

    z-index: -2;
}


@keyframes moonGlow {

    0% {
        transform: scale(0.95);
        opacity: 0.65;
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
        80px 40px #fff,
        160px 120px #b9a9ff,
        260px 70px #fff,
        370px 180px #d9ccff,
        490px 45px #fff,
        620px 140px #b9a9ff,
        750px 80px #fff,
        850px 210px #d9ccff,
        950px 55px #fff,
        1050px 160px #b9a9ff,
        1150px 90px #fff,
        1250px 230px #d9ccff,
        1350px 50px #fff,
        1450px 150px #b9a9ff;

    opacity: 0.45;

    z-index: -1;

    animation: twinkle 4s ease-in-out infinite alternate;
}


.stars::before {
    transform: translate(40px, 300px);
    opacity: 0.25;
}


.stars::after {
    transform: translate(180px, 500px);
    opacity: 0.35;
}


@keyframes twinkle {

    0% {
        opacity: 0.25;
    }

    100% {
        opacity: 0.75;
    }

}


/* =========================================
   FLOATING HEADER
   TANPA KOTAK / NAVBAR
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
}


/* =========================================
   LOGO + TEXT SISTEM AKADEMIK
========================================= */

.brand-floating {

    display: flex;

    align-items: center;

    gap: 13px;

    text-decoration: none;

    color: #ffffff;

    pointer-events: auto;

    animation:
        brandFloat 4s ease-in-out infinite alternate;

    transition:
        transform 0.4s ease;
}


.brand-floating:hover {

    color: #ffffff;

    transform:
        translateY(-3px)
        scale(1.03);
}


.navbar-logo {

    width: 58px;
    height: 58px;

    border-radius: 17px;

    object-fit: cover;

    object-position: center;

    border:
        2px solid rgba(220, 180, 255, 0.45);

    box-shadow:
        0 0 15px rgba(155, 89, 182, 0.65),
        0 0 35px rgba(111, 66, 193, 0.35);

    transition:
        transform 0.45s cubic-bezier(.2,.8,.2,1),
        box-shadow 0.45s ease,
        filter 0.45s ease;
}


/* Animasi logo saat hover */

.navbar-logo:hover {

    transform:
        scale(1.18)
        rotate(6deg)
        translateY(-4px);

    border-color:
        rgba(235, 210, 255, 0.85);

    box-shadow:
        0 0 20px rgba(210, 160, 255, 0.95),
        0 0 45px rgba(111, 66, 193, 0.70),
        0 0 75px rgba(155, 89, 182, 0.35);

    filter:
        brightness(1.15)
        saturate(1.25);
}


/* Teks Sistem Akademik */

.brand-title {

    font-size: 23px;

    font-weight: 700;

    letter-spacing: 0.5px;

    color: #ffffff;

    text-shadow:
        0 0 12px rgba(190, 140, 255, 0.55);

    transition:
        text-shadow 0.4s ease,
        transform 0.4s ease;
}


.brand-floating:hover .brand-title {

    text-shadow:
        0 0 10px rgba(220, 180, 255, 0.8),
        0 0 25px rgba(155, 89, 182, 0.65);

    transform:
        translateX(3px);
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
   WELCOME USER
========================================= */

.welcome {

    pointer-events: auto;

    font-size: 14px;

    color: #d8d0e8;

    padding: 10px 16px;

    border-radius: 15px;

    background:
        rgba(20, 14, 45, 0.35);

    border:
        1px solid rgba(180, 130, 255, 0.12);

    backdrop-filter: blur(8px);

    box-shadow:
        0 8px 25px rgba(0, 0, 0, 0.15);

    animation:
        welcomeFloat 5s ease-in-out infinite alternate;
}


.welcome b {

    color: #ffffff;

    text-shadow:
        0 0 8px rgba(186, 140, 255, 0.7);
}


@keyframes welcomeFloat {

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

    max-width: 1200px;

    padding-top: 145px !important;
}


/* =========================================
   HEADER
========================================= */

.dashboard-header {

    margin-bottom: 45px;
}


.moon {

    width: 78px;
    height: 78px;

    margin: 0 auto 20px;

    border-radius: 50%;

    background:
        radial-gradient(
            circle at 35% 35%,
            #ffffff,
            #e9ddff 55%,
            #bda5e8
        );

    box-shadow:
        0 0 20px rgba(220, 195, 255, 0.8),
        0 0 55px rgba(145, 94, 210, 0.55),
        0 0 100px rgba(103, 65, 170, 0.35);

    position: relative;

    animation:
        moonFloat 5s ease-in-out infinite alternate;
}


.moon::before,
.moon::after {

    content: "";

    position: absolute;

    border-radius: 50%;

    background: rgba(160, 130, 190, 0.18);
}


.moon::before {

    width: 14px;
    height: 14px;

    top: 20px;
    left: 17px;
}


.moon::after {

    width: 9px;
    height: 9px;

    top: 47px;
    left: 45px;
}


@keyframes moonFloat {

    0% {
        transform: translateY(0);
    }

    100% {
        transform: translateY(-8px);
    }

}


.dashboard-header h2 {

    font-size: 38px;

    font-weight: 700;

    color: #ffffff;

    text-shadow:
        0 0 15px rgba(176, 125, 255, 0.45);
}


.dashboard-header p {

    color: #aaa2c1 !important;

    font-size: 15px;
}


/* =========================================
   CARDS
========================================= */

.card-menu {

    position: relative;

    height: 100%;

    padding: 32px 20px !important;

    border:
        1px solid rgba(180, 140, 255, 0.18);

    border-radius: 22px;

    background:
        linear-gradient(
            145deg,
            rgba(36, 25, 66, 0.82),
            rgba(18, 13, 40, 0.88)
        );

    backdrop-filter: blur(12px);

    -webkit-backdrop-filter: blur(12px);

    box-shadow:
        0 15px 35px rgba(0, 0, 0, 0.28);

    overflow: hidden;

    transition:
        transform 0.4s cubic-bezier(.2,.8,.2,1),
        box-shadow 0.4s ease,
        border-color 0.4s ease;
}


/* Glow atas card */

.card-menu::before {

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
            transparent
        );

    box-shadow:
        0 0 15px rgba(155, 89, 182, 0.8);
}


/* Glow bawah */

.card-menu::after {

    content: "";

    position: absolute;

    width: 130px;
    height: 130px;

    right: -60px;
    bottom: -70px;

    border-radius: 50%;

    background:
        rgba(111, 66, 193, 0.16);

    filter: blur(20px);

    transition: 0.5s;
}


.card-menu:hover {

    transform:
        translateY(-10px);

    border-color:
        rgba(181, 137, 255, 0.50);

    box-shadow:
        0 20px 45px rgba(0, 0, 0, 0.40),
        0 0 30px rgba(111, 66, 193, 0.22);
}


.card-menu:hover::after {

    transform:
        scale(1.5);

    background:
        rgba(155, 89, 182, 0.22);
}


/* =========================================
   FOTO LOGO CARD
========================================= */

.icon-box {

    width: 115px;
    height: 115px;

    margin: 0 auto 15px;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 28px;

    background:
        linear-gradient(
            135deg,
            rgba(111, 66, 193, 0.25),
            rgba(155, 89, 182, 0.12)
        );

    border:
        1px solid rgba(180, 140, 255, 0.20);

    box-shadow:
        0 0 20px rgba(111, 66, 193, 0.22);

    overflow: hidden;

    transition:
        transform 0.45s cubic-bezier(.2,.8,.2,1),
        box-shadow 0.45s ease,
        border-color 0.45s ease;
}


.card-logo {

    width: 100px;
    height: 100px;

    border-radius: 24px;

    object-fit: cover;

    object-position: center;

    border:
        2px solid rgba(220, 190, 255, 0.35);

    box-shadow:
        0 0 15px rgba(155, 89, 182, 0.55),
        0 0 30px rgba(111, 66, 193, 0.30);

    transition:
        transform 0.55s cubic-bezier(.2,.8,.2,1),
        box-shadow 0.55s ease,
        filter 0.55s ease;
}


/* =========================================
   ANIMASI GAMBAR CARD
========================================= */

.card-menu:hover .icon-box {

    transform:
        translateY(-8px)
        scale(1.08);

    border-color:
        rgba(205, 165, 255, 0.55);

    box-shadow:
        0 0 25px rgba(155, 89, 182, 0.45),
        0 0 50px rgba(111, 66, 193, 0.25);
}


.card-menu:hover .card-logo {

    transform:
        scale(1.12)
        rotate(2deg);

    box-shadow:
        0 0 20px rgba(200, 150, 255, 0.85),
        0 0 45px rgba(111, 66, 193, 0.55);

    filter:
        brightness(1.08)
        saturate(1.15);
}


.card-logo:hover {

    transform:
        scale(1.16)
        rotate(-2deg);

    box-shadow:
        0 0 25px rgba(220, 180, 255, 0.95),
        0 0 55px rgba(111, 66, 193, 0.65);

    filter:
        brightness(1.12)
        saturate(1.2);
}


/* =========================================
   CARD TEXT
========================================= */

.card-menu h4 {

    font-size: 20px;

    font-weight: 600;

    color: #ffffff !important;

    margin-top: 18px;

    margin-bottom: 8px;
}


.card-menu p {

    font-size: 14px;

    color: #aaa2c1 !important;

    margin-bottom: 5px;
}


/* =========================================
   LINKS
========================================= */

.menu-link {

    display: block;

    height: 100%;

    color: inherit;
}


.menu-link:hover {

    color: inherit;
}


/* =========================================
   LOGOUT
========================================= */

.logout-btn {

    border:
        1px solid rgba(255, 120, 140, 0.25);

    padding: 12px 28px;

    border-radius: 12px;

    font-weight: 600;

    background:
        linear-gradient(
            135deg,
            #8f3046,
            #6d2639
        );

    color: #ffffff;

    box-shadow:
        0 8px 25px rgba(120, 30, 60, 0.25);

    transition:
        transform 0.3s ease,
        box-shadow 0.3s ease;
}


.logout-btn:hover {

    transform:
        translateY(-3px);

    color: #ffffff;

    box-shadow:
        0 12px 30px rgba(170, 45, 80, 0.35);
}


/* =========================================
   FOOTER
========================================= */

.footer {

    color: #746c88;

    text-align: center;

    margin-top: 55px;

    padding-bottom: 15px;

    font-size: 13px;
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

    margin-bottom: 20px;
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


    .brand-floating {

        gap: 9px;
    }


    .navbar-logo {

        width: 45px;
        height: 45px;

        border-radius: 13px;
    }


    .brand-title {

        font-size: 17px;
    }


    .welcome {

        font-size: 11px;

        padding: 8px 10px;

        border-radius: 11px;

        max-width: 145px;

        text-align: right;
    }


    .main-container {

        padding-top: 120px !important;
    }


    .dashboard-header {

        margin-bottom: 30px;
    }


    .dashboard-header h2 {

        font-size: 30px;
    }


    .moon {

        width: 65px;
        height: 65px;
    }


    .card-menu {

        border-radius: 19px;
    }


    .icon-box {

        width: 105px;
        height: 105px;

        border-radius: 25px;
    }


    .card-logo {

        width: 90px;
        height: 90px;

        border-radius: 21px;
    }

}

</style>

</head>


<body>


<!-- =========================================
     BINTANG
========================================= -->

<div class="stars"></div>


<!-- =========================================
     FLOATING HEADER
     TANPA KOTAK NAVBAR
========================================= -->

<div class="floating-header">


    <!-- LOGO + SISTEM AKADEMIK -->

    <a href="#" class="brand-floating">

        <img
            src="bochi the rock.jpg"
            alt="Logo Sistem Akademik"
            class="navbar-logo"
        >

        <span class="brand-title">
            Sistem Akademik
        </span>

    </a>


    <!-- WELCOME -->

    <div class="welcome">

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


    <!-- HEADER -->

    <div class="text-center dashboard-header">

        <div class="moon"></div>


        <h2>
            Dashboard
        </h2>


        <p>

            Selamat datang di Sistem Akademik.

            <br>

            Pilih menu yang ingin kamu kelola.

        </p>

    </div>


    <!-- =========================================
         MENU
    ========================================= -->

    <div class="row g-4">


        <!-- SISWA -->

        <div class="col-md-6 col-lg-3">

            <a
                href="siswa"
                class="text-decoration-none menu-link"
            >

                <div class="card card-menu text-center">

                    <div class="icon-box">

                        <img
                            src="hitori gotoh.jpg"
                            alt="Data Siswa"
                            class="card-logo"
                        >

                    </div>


                    <h4>
                        Data Siswa
                    </h4>


                    <p>
                        Kelola data siswa
                    </p>

                </div>

            </a>

        </div>


        <!-- GURU -->

        <div class="col-md-6 col-lg-3">

            <a
                href="guru"
                class="text-decoration-none menu-link"
            >

                <div class="card card-menu text-center">

                    <div class="icon-box">

                        <img
                            src="ryou yamada.jpg"
                            alt="Data Guru"
                            class="card-logo"
                        >

                    </div>


                    <h4>
                        Data Guru
                    </h4>


                    <p>
                        Kelola data guru
                    </p>

                </div>

            </a>

        </div>


        <!-- MAPEL -->

        <div class="col-md-6 col-lg-3">

            <a
                href="mapel"
                class="text-decoration-none menu-link"
            >

                <div class="card card-menu text-center">

                    <div class="icon-box">

                        <img
                            src="nijika ijichi.jpg"
                            alt="Mata Pelajaran"
                            class="card-logo"
                        >

                    </div>


                    <h4>
                        Mata Pelajaran
                    </h4>


                    <p>
                        Kelola mata pelajaran
                    </p>

                </div>

            </a>

        </div>


        <!-- NILAI -->

        <div class="col-md-6 col-lg-3">

            <a
                href="nilai"
                class="text-decoration-none menu-link"
            >

                <div class="card card-menu text-center">

                    <div class="icon-box">

                        <img
                            src="ikuyo kita.jpg"
                            alt="Data Nilai"
                            class="card-logo"
                        >

                    </div>


                    <h4>
                        Data Nilai
                    </h4>


                    <p>
                        Kelola nilai siswa
                    </p>

                </div>

            </a>

        </div>


    </div>


    <!-- =========================================
         LOGOUT
    ========================================= -->

    <div class="text-center mt-5">

        <a
            href="logout.php"
            class="btn logout-btn"
        >

            <i class="bi bi-box-arrow-right me-1"></i>

            Logout

        </a>

    </div>


    <!-- =========================================
         FOOTER
    ========================================= -->

    <div class="footer">

        <hr>

        Copyright ©<?php echo date("Y"); ?>

        Sistem Akademik

    </div>

</div>


<!-- Bootstrap JS -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
```
