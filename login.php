<?php
include "koneksi.php";

session_start();

if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query(
        $koneksi,
        "SELECT * FROM users
         WHERE username='$username'
         AND password='$password'"
    );

    $cek = mysqli_num_rows($query);

    if ($cek > 0) {

        $_SESSION['status'] = "sukses";
        $_SESSION['username'] = $username;

        header("Location: index.php");
        exit;

    } else {

        $pesan = "Username atau Password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Login - Sistem Akademik</title>

<link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
    rel="stylesheet"
>

<link
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.css"
    rel="stylesheet"
>

<style>

/* =========================================================
   RESET
========================================================= */

* {
    box-sizing: border-box;
}

html,
body {
    width: 100%;
    min-height: 100%;
}

body {

    margin: 0;

    min-height: 100vh;

    font-family: "Segoe UI", Arial, sans-serif;

    color: #fff;

    display: flex;

    align-items: center;
    justify-content: center;

    position: relative;

    overflow: hidden;

    background:

        radial-gradient(
            circle at 80% 5%,
            rgba(123, 63, 180, .34),
            transparent 28%
        ),

        radial-gradient(
            circle at 10% 90%,
            rgba(38, 55, 145, .28),
            transparent 30%
        ),

        linear-gradient(
            135deg,
            #090719 0%,
            #100b27 45%,
            #171038 100%
        );
}


/* =========================================================
   GLOW BACKGROUND
========================================================= */

body::before {

    content: "";

    position: fixed;

    width: 520px;
    height: 520px;

    top: -240px;
    right: -170px;

    border-radius: 50%;

    background:

        radial-gradient(
            circle,
            rgba(155, 89, 182, .45),
            rgba(111, 66, 193, .14) 45%,
            transparent 70%
        );

    filter: blur(20px);

    animation:
        glowMove 7s ease-in-out infinite alternate;

    pointer-events: none;

    z-index: 0;
}


body::after {

    content: "";

    position: fixed;

    width: 600px;
    height: 450px;

    left: -280px;
    bottom: -250px;

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

    z-index: 0;
}


@keyframes glowMove {

    0% {
        transform: scale(.92);
        opacity: .55;
    }

    100% {
        transform: scale(1.10);
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


/* =========================================================
   STARS
========================================================= */

.stars {

    position: fixed;

    inset: 0;

    pointer-events: none;

    z-index: 1;
}


.stars span {

    position: absolute;

    width: 3px;
    height: 3px;

    border-radius: 50%;

    background: #fff;

    box-shadow:
        0 0 8px #fff;

    opacity: .55;

    animation:
        starTwinkle 3s ease-in-out infinite alternate;
}


/* Posisi bintang */

.stars span:nth-child(1) {
    top: 10%;
    left: 7%;
}

.stars span:nth-child(2) {
    top: 17%;
    left: 27%;
}

.stars span:nth-child(3) {
    top: 8%;
    left: 55%;
}

.stars span:nth-child(4) {
    top: 15%;
    right: 17%;
}

.stars span:nth-child(5) {
    top: 32%;
    right: 7%;
}

.stars span:nth-child(6) {
    top: 42%;
    left: 8%;
}

.stars span:nth-child(7) {
    top: 55%;
    right: 12%;
}

.stars span:nth-child(8) {
    bottom: 20%;
    left: 18%;
}

.stars span:nth-child(9) {
    bottom: 12%;
    left: 48%;
}

.stars span:nth-child(10) {
    bottom: 27%;
    right: 25%;
}

.stars span:nth-child(11) {
    top: 68%;
    left: 5%;
}

.stars span:nth-child(12) {
    top: 27%;
    left: 78%;
}

.stars span:nth-child(13) {
    bottom: 8%;
    right: 8%;
}

.stars span:nth-child(14) {
    top: 6%;
    left: 42%;
}


@keyframes starTwinkle {

    0% {
        opacity: .15;
        transform: scale(.7);
    }

    100% {
        opacity: .85;
        transform: scale(1.3);
    }
}


/* =========================================================
   BULAN
========================================================= */

.moon {

    position: fixed;

    width: 82px;
    height: 82px;

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

        0 0 20px rgba(220,195,255,.85),

        0 0 50px rgba(145,94,210,.55),

        0 0 100px rgba(103,65,170,.35);

    animation:
        moonFloat 5s ease-in-out infinite alternate;

    pointer-events: none;

    z-index: 2;
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

    top: 49px;
    left: 47px;

    border-radius: 50%;

    background:
        rgba(150,120,180,.18);
}


@keyframes moonFloat {

    0% {
        transform: translateY(0);
    }

    100% {
        transform: translateY(-9px);
    }
}


/* =========================================================
   LOGIN WRAPPER
========================================================= */

.login-wrapper {

    width: 100%;

    max-width: 430px;

    padding: 20px;

    position: relative;

    z-index: 10;

    animation:
        wrapperAppear .8s ease;
}


@keyframes wrapperAppear {

    from {

        opacity: 0;

        transform:
            translateY(35px)
            scale(.96);

    }

    to {

        opacity: 1;

        transform:
            translateY(0)
            scale(1);

    }
}


/* =========================================================
   LOGIN CARD
========================================================= */

.login-card {

    position: relative;

    width: 100%;

    border-radius: 27px;

    border:
        1px solid rgba(190,150,255,.22);

    background:

        linear-gradient(
            145deg,
            rgba(35,24,65,.94),
            rgba(15,11,35,.96)
        );

    backdrop-filter: blur(20px);

    -webkit-backdrop-filter: blur(20px);

    box-shadow:

        0 30px 70px rgba(0,0,0,.50),

        0 0 40px rgba(111,66,193,.20),

        inset 0 1px 0 rgba(255,255,255,.04);

    overflow: hidden;

    animation:
        cardFloat 5s ease-in-out infinite alternate;
}


@keyframes cardFloat {

    0% {
        transform: translateY(0);
    }

    100% {
        transform: translateY(-5px);
    }
}


/* =========================================================
   GARIS NEON
========================================================= */

.login-card::before {

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
            #6f42c1,
            #c084fc,
            #9b59b6,
            #6f42c1,
            transparent
        );

    box-shadow:
        0 0 18px rgba(155,89,182,.95);

    animation:
        neonMove 3s linear infinite;
}


@keyframes neonMove {

    0% {
        background-position: -300px 0;
    }

    100% {
        background-position: 300px 0;
    }
}


/* =========================================================
   LOGO
========================================================= */

.logo-wrapper {

    width: 92px;
    height: 92px;

    margin: 0 auto 20px;

    padding: 3px;

    border-radius: 27px;

    background:

        linear-gradient(
            135deg,
            #6f42c1,
            #c084fc,
            #7c3aed
        );

    box-shadow:

        0 0 25px rgba(111,66,193,.40),

        0 0 55px rgba(155,89,182,.18);

    animation:
        logoFloat 4s ease-in-out infinite alternate;

    position: relative;
}


.logo-wrapper::before {

    content: "";

    position: absolute;

    inset: -8px;

    border-radius: 32px;

    border:
        1px solid rgba(192,132,252,.15);

    animation:
        logoRing 3s ease-in-out infinite alternate;
}


@keyframes logoRing {

    from {
        transform: scale(.95);
        opacity: .3;
    }

    to {
        transform: scale(1.08);
        opacity: .8;
    }
}


.logo {

    width: 100%;
    height: 100%;

    border-radius: 24px;

    overflow: hidden;

    background: #1b1235;

    position: relative;
}


.logo img {

    width: 100%;
    height: 100%;

    object-fit: cover;

    display: block;

    transform: scale(1.08);

    filter:
        brightness(.95)
        saturate(1.15);

    animation:
        logoZoom 7s ease-in-out infinite alternate;
}


.logo::after {

    content: "";

    position: absolute;

    inset: 0;

    background:

        linear-gradient(
            135deg,
            rgba(111,66,193,.20),
            transparent 45%,
            rgba(155,89,182,.16)
        );

    pointer-events: none;
}


@keyframes logoZoom {

    from {
        transform: scale(1.08);
    }

    to {
        transform: scale(1.18);
    }
}


@keyframes logoFloat {

    from {
        transform: translateY(0);
    }

    to {
        transform: translateY(-6px);
    }
}


/* =========================================================
   TITLE
========================================================= */

.login-title {

    margin: 0;

    color: #fff;

    font-size: 28px;

    font-weight: 700;

    letter-spacing: .2px;

    text-shadow:
        0 0 18px rgba(180,130,255,.35);
}


.login-subtitle {

    margin-top: 7px;

    color: #a49aad;

    font-size: 14px;
}


/* =========================================================
   SYSTEM BADGE
========================================================= */

.system-badge {

    display: inline-flex;

    align-items: center;

    gap: 7px;

    margin-top: 12px;

    padding: 6px 12px;

    border-radius: 20px;

    color: #d7c6f5;

    font-size: 11px;

    background:
        rgba(111,66,193,.12);

    border:
        1px solid rgba(180,130,255,.15);
}


.system-badge i {

    color: #c084fc;

    animation:
        pulseIcon 2s ease-in-out infinite;
}


@keyframes pulseIcon {

    0%,
    100% {
        opacity: .5;
    }

    50% {
        opacity: 1;
    }
}


/* =========================================================
   ALERT
========================================================= */

.alert-danger {

    color: #ffd9df;

    background:
        rgba(150,35,60,.18);

    border:
        1px solid rgba(255,100,130,.25);

    border-radius: 12px;

    font-size: 13px;

    animation:
        shake .4s ease;
}


@keyframes shake {

    0%,
    100% {
        transform: translateX(0);
    }

    25% {
        transform: translateX(-5px);
    }

    75% {
        transform: translateX(5px);
    }
}


/* =========================================================
   LABEL
========================================================= */

.form-label {

    color: #d8d0e8;

    font-size: 13px;

    font-weight: 600;

    margin-bottom: 8px;
}


/* =========================================================
   INPUT
========================================================= */

.input-group {

    border-radius: 13px;

    transition: .3s;

    box-shadow:
        0 5px 18px rgba(0,0,0,.12);
}


.input-group:focus-within {

    transform:
        translateY(-2px);

    box-shadow:
        0 8px 25px rgba(111,66,193,.18);
}


.input-group-text {

    width: 48px;

    justify-content: center;

    color: #c7a7ff;

    background:
        rgba(111,66,193,.16);

    border:
        1px solid rgba(180,140,255,.15);

    border-right: none;

    border-radius:
        13px 0 0 13px;

    transition: .3s;
}


.input-group:focus-within
.input-group-text {

    color: #e1cfff;

    background:
        rgba(111,66,193,.25);

    border-color:
        rgba(170,120,255,.55);
}


.form-control {

    height: 49px;

    color: #fff !important;

    background:
        rgba(255,255,255,.055) !important;

    border:
        1px solid rgba(180,140,255,.15);

    border-left: none;

    border-radius:
        0 13px 13px 0;

    transition: .3s;

    box-shadow: none !important;
}


.form-control::placeholder {

    color: #817895;
}


.form-control:focus {

    color: #fff !important;

    background:
        rgba(255,255,255,.08) !important;

    border-color:
        rgba(170,120,255,.55);

    outline: none;
}


/* =========================================================
   LOGIN BUTTON
========================================================= */

.btn-login {

    width: 100%;

    height: 51px;

    border: none;

    border-radius: 13px;

    color: #fff;

    font-size: 15px;

    font-weight: 700;

    background:

        linear-gradient(
            135deg,
            #6f42c1,
            #9b59b6
        );

    box-shadow:

        0 8px 25px rgba(111,66,193,.30),

        inset 0 1px 0 rgba(255,255,255,.15);

    transition: .3s;

    position: relative;

    overflow: hidden;
}


.btn-login::before {

    content: "";

    position: absolute;

    top: 0;

    left: -100%;

    width: 70%;

    height: 100%;

    background:
        linear-gradient(
            90deg,
            transparent,
            rgba(255,255,255,.22),
            transparent
        );

    transform: skewX(-20deg);

    transition: .6s;
}


.btn-login:hover::before {

    left: 130%;
}


.btn-login:hover {

    color: #fff;

    transform:
        translateY(-3px);

    background:

        linear-gradient(
            135deg,
            #7c4ed0,
            #a65fc1
        );

    box-shadow:

        0 12px 32px rgba(111,66,193,.45),

        0 0 20px rgba(155,89,182,.18);
}


.btn-login:active {

    transform:
        translateY(-1px);
}


/* =========================================================
   FOOTER
========================================================= */

.login-footer {

    margin-top: 24px;

    padding-top: 18px;

    border-top:
        1px solid rgba(190,150,255,.09);

    text-align: center;

    color: #71687f;

    font-size: 11px;
}


.footer-logo {

    width: 24px;
    height: 24px;

    object-fit: cover;

    border-radius: 50%;

    vertical-align: middle;

    margin-right: 5px;

    border:
        1px solid rgba(190,150,255,.25);

    box-shadow:
        0 0 10px rgba(111,66,193,.30);
}


/* =========================================================
   LOADING LOGIN
========================================================= */

.btn-login.loading {

    pointer-events: none;

    opacity: .8;
}


.btn-login.loading .login-text {

    display: none;
}


.btn-login.loading .spinner-border {

    display: inline-block !important;
}


/* =========================================================
   RESPONSIVE
========================================================= */

@media(max-width:768px) {

    .moon {

        width: 62px;
        height: 62px;

        top: 5%;
        left: 5%;
    }

    .login-wrapper {

        max-width: 420px;

        padding: 15px;
    }

    .login-card {

        border-radius: 22px;
    }

    .logo-wrapper {

        width: 80px;
        height: 80px;

        border-radius: 23px;
    }

    .logo {

        border-radius: 20px;
    }

    .login-title {

        font-size: 24px;
    }
}


@media(max-width:480px) {

    .login-wrapper {

        padding: 12px;
    }

    .login-card {

        border-radius: 20px;
    }

    .card-body {

        padding: 28px 22px !important;
    }

    .logo-wrapper {

        width: 74px;
        height: 74px;
    }

    .login-title {

        font-size: 23px;
    }

    .login-subtitle {

        font-size: 13px;
    }
}

</style>

</head>


<body>


<!-- =====================================================
     BINTANG
===================================================== -->

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
    <span></span>
    <span></span>
    <span></span>
    <span></span>

</div>


<!-- =====================================================
     BULAN
===================================================== -->

<div class="moon"></div>


<!-- =====================================================
     LOGIN
===================================================== -->

<div class="login-wrapper">

    <div class="login-card">

        <div class="card-body p-4 p-md-5">


            <!-- LOGO -->

            <div class="text-center mb-4">

                <div class="logo-wrapper">

                    <div class="logo">

                        <img
                            src="bochi the rock.jpg"
                            alt="Logo Sistem Akademik"
                        >

                    </div>

                </div>


                <h1 class="login-title">

                    Sistem Akademik

                </h1>


                <p class="login-subtitle">

                    Silakan login untuk melanjutkan

                </p>


                <div class="system-badge">

                    <i class="bi bi-mortarboard-fill"></i>

                    <span>Academic Management System</span>

                </div>

            </div>


            <!-- PESAN ERROR -->

            <?php if (isset($pesan)) { ?>

                <div class="alert alert-danger mb-4">

                    <i class="bi bi-exclamation-circle-fill me-2"></i>

                    <?php echo htmlspecialchars($pesan); ?>

                </div>

            <?php } ?>


            <!-- FORM -->

            <form method="POST" id="loginForm">


                <!-- USERNAME -->

                <div class="mb-3">

                    <label class="form-label">

                        Username

                    </label>


                    <div class="input-group">

                        <span class="input-group-text">

                            <i class="bi bi-person-fill"></i>

                        </span>


                        <input
                            type="text"
                            name="username"
                            class="form-control"
                            placeholder="Masukkan username"
                            autocomplete="username"
                            required
                        >

                    </div>

                </div>


                <!-- PASSWORD -->

                <div class="mb-4">

                    <label class="form-label">

                        Password

                    </label>


                    <div class="input-group">

                        <span class="input-group-text">

                            <i class="bi bi-lock-fill"></i>

                        </span>


                        <input
                            type="password"
                            name="password"
                            id="password"
                            class="form-control"
                            placeholder="Masukkan password"
                            autocomplete="current-password"
                            required
                        >

                        <button
                            type="button"
                            class="btn"
                            id="togglePassword"
                            style="
                                color:#c7a7ff;
                                background:rgba(255,255,255,.055);
                                border:1px solid rgba(180,140,255,.15);
                                border-left:none;
                                border-radius:0 13px 13px 0;
                            "
                        >

                            <i class="bi bi-eye-fill"></i>

                        </button>

                    </div>

                </div>


                <!-- LOGIN -->

                <div class="d-grid">

                    <button
                        type="submit"
                        class="btn btn-login"
                        name="login"
                        id="loginButton"
                    >

                        <span class="login-text">

                            <i class="bi bi-box-arrow-in-right me-2"></i>

                            Login

                        </span>


                        <span
                            class="spinner-border spinner-border-sm"
                            style="display:none;"
                        ></span>

                    </button>

                </div>


            </form>


            <!-- FOOTER -->

            <div class="login-footer">

                <img
                    src="bochi the rock.jpg"
                    alt="Logo"
                    class="footer-logo"
                >

                Sistem Akademik

                <div class="mt-1">

                    © <?php echo date("Y"); ?> Academic System

                </div>

            </div>


        </div>

    </div>

</div>


<!-- =====================================================
     JAVASCRIPT
===================================================== -->

<script>

/* =====================================================
   SHOW / HIDE PASSWORD
===================================================== */

const password =
    document.getElementById("password");

const togglePassword =
    document.getElementById("togglePassword");


togglePassword.addEventListener("click", function () {

    const icon =
        this.querySelector("i");

    if (password.type === "password") {

        password.type = "text";

        icon.classList.remove(
            "bi-eye-fill"
        );

        icon.classList.add(
            "bi-eye-slash-fill"
        );

    } else {

        password.type = "password";

        icon.classList.remove(
            "bi-eye-slash-fill"
        );

        icon.classList.add(
            "bi-eye-fill"
        );

    }

});


/* =====================================================
   LOGIN LOADING
===================================================== */

const loginForm =
    document.getElementById("loginForm");

const loginButton =
    document.getElementById("loginButton");


loginForm.addEventListener("submit", function () {

    loginButton.classList.add("loading");

});


/* =====================================================
   INPUT ANIMATION
===================================================== */

const inputs =
    document.querySelectorAll(".form-control");


inputs.forEach(function(input) {

    input.addEventListener("focus", function() {

        this.parentElement.style.transform =
            "translateY(-2px)";

    });


    input.addEventListener("blur", function() {

        this.parentElement.style.transform =
            "translateY(0)";

    });

});


/* =====================================================
   RANDOM STAR ANIMATION DELAY
===================================================== */

document
    .querySelectorAll(".stars span")
    .forEach(function(star, index) {

        star.style.animationDelay =
            (index * 0.25) + "s";

    });

</script>


<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
></script>


</body>

</html>