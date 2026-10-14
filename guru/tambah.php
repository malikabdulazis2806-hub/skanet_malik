<!DOCTYPE html>
<html lang="id">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Tambah Data Guru - Sistem Akademik</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.css" rel="stylesheet">

<style>

/* =========================================
   GLOBAL
========================================= */

*{
    box-sizing:border-box;
}

html{
    scroll-behavior:smooth;
}

body{

    margin:0;

    min-height:100vh;

    font-family:"Segoe UI", Arial, sans-serif;

    color:#ffffff;

    display:flex;

    align-items:center;

    justify-content:center;

    background:

        radial-gradient(
            circle at 80% 10%,
            rgba(123,63,180,.32),
            transparent 28%
        ),

        radial-gradient(
            circle at 10% 85%,
            rgba(38,55,145,.28),
            transparent 30%
        ),

        linear-gradient(
            135deg,
            #090719 0%,
            #100b27 45%,
            #171038 100%
        );

    position:relative;

    overflow-x:hidden;
}


/* =========================================
   BACKGROUND GLOW
========================================= */

body::before{

    content:"";

    position:fixed;

    width:450px;
    height:450px;

    top:-180px;
    right:-130px;

    border-radius:50%;

    background:

        radial-gradient(
            circle,
            rgba(155,89,182,.40),
            rgba(111,66,193,.12) 45%,
            transparent 70%
        );

    filter:blur(25px);

    animation:
        moonGlow 7s ease-in-out infinite alternate;

    pointer-events:none;

    z-index:-2;
}


body::after{

    content:"";

    position:fixed;

    width:550px;
    height:350px;

    left:-220px;
    bottom:-200px;

    border-radius:50%;

    background:

        radial-gradient(
            circle,
            rgba(75,67,180,.28),
            transparent 70%
        );

    filter:blur(45px);

    animation:
        cityGlow 9s ease-in-out infinite alternate;

    pointer-events:none;

    z-index:-2;
}


@keyframes moonGlow{

    0%{
        transform:scale(.95);
        opacity:.6;
    }

    100%{
        transform:scale(1.08);
        opacity:1;
    }

}


@keyframes cityGlow{

    0%{
        transform:translateX(0);
    }

    100%{
        transform:translateX(70px);
    }

}


/* =========================================
   STARS
========================================= */

.stars,
.stars::before,
.stars::after{

    position:fixed;

    content:"";

    width:3px;
    height:3px;

    border-radius:50%;

    background:#ffffff;

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

    opacity:.4;

    z-index:-1;

    animation:
        twinkle 4s ease-in-out infinite alternate;
}


.stars::before{

    transform:
        translate(50px,300px);

    opacity:.25;
}


.stars::after{

    transform:
        translate(180px,500px);

    opacity:.30;
}


@keyframes twinkle{

    0%{
        opacity:.2;
    }

    100%{
        opacity:.7;
    }

}


/* =========================================
   MOON
========================================= */

.moon{

    position:fixed;

    width:80px;
    height:80px;

    top:8%;
    left:8%;

    border-radius:50%;

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

    z-index:-1;
}


.moon::before{

    content:"";

    position:absolute;

    width:14px;
    height:14px;

    top:20px;
    left:18px;

    border-radius:50%;

    background:
        rgba(150,120,180,.18);
}


.moon::after{

    content:"";

    position:absolute;

    width:9px;
    height:9px;

    top:48px;
    left:46px;

    border-radius:50%;

    background:
        rgba(150,120,180,.18);
}


@keyframes moonFloat{

    0%{
        transform:translateY(0);
    }

    100%{
        transform:translateY(-8px);
    }

}


/* =========================================
   FORM CONTAINER
========================================= */

.form-container{

    width:100%;

    max-width:620px;

    padding:25px 15px;

    position:relative;

    z-index:5;
}


/* =========================================
   CARD
========================================= */

.form-card{

    position:relative;

    border-radius:25px;

    border:
        1px solid rgba(190,150,255,.20);

    background:

        linear-gradient(
            145deg,
            rgba(35,24,65,.90),
            rgba(15,11,35,.95)
        );

    backdrop-filter:blur(18px);

    -webkit-backdrop-filter:blur(18px);

    box-shadow:

        0 25px 60px rgba(0,0,0,.45),

        0 0 35px rgba(111,66,193,.16);

    overflow:hidden;

    animation:
        cardAppear .7s ease;
}


.form-card::before{

    content:"";

    position:absolute;

    top:0;
    left:0;

    width:100%;
    height:3px;

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


@keyframes cardAppear{

    from{

        opacity:0;

        transform:
            translateY(20px)
            scale(.97);

    }

    to{

        opacity:1;

        transform:
            translateY(0)
            scale(1);

    }

}


/* =========================================
   HEADER
========================================= */

.form-header{

    text-align:center;

    margin-bottom:32px;
}


/* =========================================
   FOTO RYOU YAMADA
========================================= */

.form-icon{

    width:78px;
    height:78px;

    margin:0 auto 17px;

    display:flex;

    align-items:center;
    justify-content:center;

    border-radius:22px;

    overflow:hidden;

    background:

        linear-gradient(
            135deg,
            rgba(111,66,193,.25),
            rgba(155,89,182,.10)
        );

    border:
        1px solid rgba(190,150,255,.18);

    box-shadow:
        0 0 30px rgba(111,66,193,.20);
}


.form-icon img{

    width:100%;

    height:100%;

    object-fit:cover;

    display:block;
}


/* =========================================
   TITLE
========================================= */

.form-title{

    margin:0;

    color:#ffffff;

    font-size:28px;

    font-weight:700;

    text-shadow:
        0 0 15px rgba(180,130,255,.35);
}


.form-subtitle{

    color:#938ba6;

    font-size:14px;

    margin-top:6px;

    margin-bottom:0;
}


/* =========================================
   FORM
========================================= */

.form-label{

    color:#d8d0e8;

    font-size:14px;

    font-weight:600;

    margin-bottom:8px;
}


.form-control{

    min-height:48px;

    color:#ffffff;

    background:
        rgba(255,255,255,.06);

    border:
        1px solid rgba(190,150,255,.15);

    border-radius:12px;

    transition:.3s;

    box-shadow:
        0 5px 15px rgba(0,0,0,.10);
}


.form-control::placeholder{

    color:#817895;
}


.form-control:focus{

    color:#ffffff;

    background:
        rgba(255,255,255,.08);

    border-color:
        rgba(170,120,255,.65);

    box-shadow:

        0 0 0 3px rgba(111,66,193,.15),

        0 0 20px rgba(111,66,193,.12);
}


textarea.form-control{

    resize:vertical;

    min-height:110px;
}


/* =========================================
   BUTTON
========================================= */

.btn{

    border-radius:11px;

    padding:10px 18px;

    font-weight:600;

    transition:.3s;
}


.btn-save{

    border:none;

    color:#ffffff;

    background:

        linear-gradient(
            135deg,
            #6f42c1,
            #9b59b6
        );

    box-shadow:
        0 8px 22px rgba(111,66,193,.30);
}


.btn-save:hover{

    color:#ffffff;

    transform:translateY(-3px);

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


.btn-back{

    color:#c5bdd3;

    background:
        rgba(255,255,255,.06);

    border:
        1px solid rgba(190,150,255,.15);
}


.btn-back:hover{

    color:#ffffff;

    background:
        rgba(111,66,193,.20);

    border-color:
        rgba(180,130,255,.30);

    transform:translateX(-3px);
}


/* =========================================
   FOOTER
========================================= */

.footer{

    text-align:center;

    color:#6f6780;

    font-size:12px;

    margin-top:20px;
}


/* =========================================
   RESPONSIVE
========================================= */

@media(max-width:768px){

    body{

        align-items:flex-start;

        padding-top:40px;

        padding-bottom:30px;
    }


    .moon{

        width:60px;
        height:60px;

        top:3%;
        left:4%;
    }


    .form-container{

        padding:
            20px 15px;
    }


    .form-card{

        border-radius:20px;
    }


    .form-title{

        font-size:24px;
    }


    .d-flex{

        gap:10px;
    }


    .btn{

        padding:
            10px 14px;
    }

}

</style>

</head>

<body>


<!-- BACKGROUND -->

<div class="stars"></div>

<div class="moon"></div>


<!-- FORM -->

<div class="form-container">

    <div class="form-card">

        <div class="card-body p-4 p-md-5">


            <!-- HEADER -->

            <div class="form-header">

                <div class="form-icon">

                    <img
                        src="ryou yamada.jpg"
                        alt="Ryou Yamada"
                    >

                </div>


                <h2 class="form-title">

                    Tambah Data Guru

                </h2>


                <p class="form-subtitle">

                    Tambahkan data guru baru ke dalam sistem.

                </p>

            </div>


            <!-- FORM -->

            <form
                action="simpan.php"
                method="POST"
            >


                <!-- NIP -->

                <div class="mb-3">

                    <label class="form-label">

                        NIP

                    </label>


                    <input
                        type="text"
                        name="nip"
                        class="form-control"
                        placeholder="Masukkan NIP"
                        required
                    >

                </div>


                <!-- NAMA -->

                <div class="mb-3">

                    <label class="form-label">

                        Nama Guru

                    </label>


                    <input
                        type="text"
                        name="nama"
                        class="form-control"
                        placeholder="Masukkan Nama Guru"
                        required
                    >

                </div>


                <!-- ALAMAT -->

                <div class="mb-4">

                    <label class="form-label">

                        Alamat

                    </label>


                    <textarea
                        name="alamat"
                        class="form-control"
                        rows="3"
                        placeholder="Masukkan Alamat"
                        required
                    ></textarea>

                </div>


                <!-- BUTTON -->

                <div class="d-flex justify-content-between">

                    <a
                        href="index.php"
                        class="btn btn-back"
                    >

                        <i class="bi bi-arrow-left me-1"></i>

                        Kembali

                    </a>


                    <button
                        type="submit"
                        class="btn btn-save"
                    >

                        <i class="bi bi-save me-1"></i>

                        Simpan

                    </button>

                </div>


            </form>


            <!-- FOOTER -->

            <div class="footer">

                <i class="bi bi-moon-stars-fill me-1"></i>

                Sistem Akademik

            </div>


        </div>

    </div>

</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>