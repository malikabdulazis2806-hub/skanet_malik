<?php
include "koneksi.php";
session_start();

if (!isset($_SESSION['status']) || $_SESSION['status'] <> "sukses") {
    header("Location: ../logout.php");
    exit;
}

$id_mapel = $_GET['id_mapel'];

$query = mysqli_query(
    $koneksi,
    "SELECT * FROM mapel WHERE id_mapel='$id_mapel'"
);

$data = mysqli_fetch_array($query);

if (!$data) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Edit Data Mata Pelajaran - Sistem Akademik</title>

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

    background:

        radial-gradient(
            circle at 15% 20%,
            rgba(153,76,255,.30),
            transparent 25%
        ),

        radial-gradient(
            circle at 85% 15%,
            rgba(126,34,206,.30),
            transparent 30%
        ),

        radial-gradient(
            circle at 50% 100%,
            rgba(67,56,202,.25),
            transparent 35%
        ),

        linear-gradient(
            135deg,
            #08051a,
            #12082b,
            #0b0922
        );

    overflow-x:hidden;

    position:relative;
}


/* =========================================
   BINTANG
========================================= */

body::before{

    content:"";

    position:fixed;

    inset:0;

    pointer-events:none;

    background-image:

        radial-gradient(
            circle,
            rgba(255,255,255,.8) 1px,
            transparent 1px
        ),

        radial-gradient(
            circle,
            rgba(196,181,253,.7) 1px,
            transparent 1px
        ),

        radial-gradient(
            circle,
            rgba(255,255,255,.5) 1px,
            transparent 1px
        );

    background-size:
        120px 120px,
        180px 180px,
        250px 250px;

    background-position:
        20px 30px,
        80px 100px,
        150px 50px;

    opacity:.45;

    z-index:0;
}


/* =========================================
   BULAN
========================================= */

.moon{

    position:fixed;

    width:105px;
    height:105px;

    top:70px;
    left:8%;

    border-radius:50%;

    background:

        radial-gradient(
            circle at 30% 30%,
            #ffffff,
            #eee8ff 45%,
            #d8cfff 75%
        );

    box-shadow:

        0 0 20px rgba(255,255,255,.8),

        0 0 50px rgba(196,181,253,.7),

        0 0 90px rgba(139,92,246,.4);

    z-index:0;

    animation:
        moonFloat 5s ease-in-out infinite alternate;
}


.moon::after{

    content:"";

    position:absolute;

    width:105px;
    height:105px;

    border-radius:50%;

    background:#100823;

    left:32px;
    top:-8px;
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
   CAHAYA
========================================= */

.glow{

    position:fixed;

    width:450px;
    height:450px;

    right:-180px;
    bottom:-180px;

    border-radius:50%;

    background:#7c3aed;

    filter:blur(100px);

    opacity:.25;

    pointer-events:none;

    z-index:0;

    animation:
        glowMove 8s ease-in-out infinite alternate;
}


@keyframes glowMove{

    0%{
        transform:scale(.95);
    }

    100%{
        transform:scale(1.1);
    }

}


/* =========================================
   CONTAINER
========================================= */

.main-container{

    min-height:100vh;

    display:flex;

    align-items:center;

    justify-content:center;

    padding:40px 20px;

    position:relative;

    z-index:5;
}


/* =========================================
   CARD
========================================= */

.edit-card{

    width:100%;

    max-width:650px;

    background:

        linear-gradient(
            145deg,
            rgba(35,24,65,.92),
            rgba(15,11,35,.96)
        );

    border:
        1px solid rgba(190,150,255,.22);

    border-radius:28px;

    padding:10px;

    box-shadow:

        0 0 30px rgba(124,58,237,.25),

        0 20px 60px rgba(0,0,0,.45),

        0 0 50px rgba(111,66,193,.12);

    backdrop-filter:blur(18px);

    -webkit-backdrop-filter:blur(18px);

    overflow:hidden;

    animation:
        fadeIn .7s ease;
}


.edit-card::before{

    content:"";

    position:absolute;

    left:0;
    top:0;

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


@keyframes fadeIn{

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


.card-content{

    padding:35px;
}


/* =========================================
   HEADER MAPEL
========================================= */

.header-mapel{

    text-align:center;

    margin-bottom:28px;
}


/* LOGO MAPEL */

.mapel-logo{

    width:100px;

    height:100px;

    object-fit:cover;

    display:block;

    margin:0 auto 18px;

    border-radius:24px;

    border:
        2px solid rgba(190,150,255,.30);

    box-shadow:

        0 0 20px rgba(139,92,246,.35),

        0 0 45px rgba(168,85,247,.18);

    animation:
        logoFloat 4s ease-in-out infinite alternate;
}


@keyframes logoFloat{

    0%{
        transform:translateY(0);
    }

    100%{
        transform:translateY(-5px);
    }

}


/* ICON KECIL */

.header-icon{

    width:52px;
    height:52px;

    display:flex;

    align-items:center;
    justify-content:center;

    margin:0 auto 15px;

    border-radius:16px;

    background:

        linear-gradient(
            135deg,
            rgba(124,58,237,.30),
            rgba(168,85,247,.12)
        );

    border:
        1px solid rgba(168,85,247,.25);

    color:#d8b4fe;

    font-size:24px;

    box-shadow:
        0 0 20px rgba(168,85,247,.20);
}


/* =========================================
   JUDUL
========================================= */

h2{

    color:#ffffff;

    font-weight:700;

    text-align:center;

    margin-bottom:8px;

    text-shadow:
        0 0 15px rgba(180,130,255,.30);
}


.subtitle{

    text-align:center;

    color:#a9a0ba;

    font-size:14px;

    margin-bottom:30px;
}


/* =========================================
   LABEL
========================================= */

.form-label{

    color:#ddd4f0;

    font-weight:600;

    margin-bottom:8px;
}


/* =========================================
   INPUT
========================================= */

.form-control{

    min-height:50px;

    background:
        rgba(255,255,255,.055);

    border:
        1px solid rgba(168,85,247,.25);

    color:#ffffff;

    border-radius:12px;

    padding:12px 15px;

    transition:.3s;

    box-shadow:
        0 5px 15px rgba(0,0,0,.08);
}


.form-control:focus{

    background:
        rgba(255,255,255,.08);

    color:#ffffff;

    border-color:#a855f7;

    box-shadow:

        0 0 0 3px rgba(168,85,247,.15),

        0 0 20px rgba(168,85,247,.15);
}


.form-control::placeholder{

    color:#80749b;
}


/* READONLY */

.form-control[readonly]{

    background:
        rgba(124,58,237,.10);

    color:#bdb2d1;

    cursor:not-allowed;

    border-color:
        rgba(168,85,247,.18);
}


/* =========================================
   BUTTON
========================================= */

.btn{

    border-radius:12px;

    padding:11px 20px;

    font-weight:600;

    transition:.3s;
}


.btn-primary{

    background:

        linear-gradient(
            135deg,
            #7c3aed,
            #a855f7
        );

    border:none;

    color:#ffffff;

    box-shadow:
        0 8px 20px rgba(124,58,237,.30);
}


.btn-primary:hover{

    background:

        linear-gradient(
            135deg,
            #8b5cf6,
            #c084fc
        );

    color:#ffffff;

    transform:
        translateY(-2px);

    box-shadow:
        0 12px 28px rgba(168,85,247,.45);
}


.btn-secondary{

    background:
        rgba(255,255,255,.06);

    border:
        1px solid rgba(190,150,255,.15);

    color:#d8d0e8;
}


.btn-secondary:hover{

    background:
        rgba(111,66,193,.20);

    border-color:
        rgba(180,130,255,.30);

    color:#ffffff;

    transform:
        translateX(-3px);
}


/* =========================================
   GARIS
========================================= */

.divider{

    height:1px;

    background:

        linear-gradient(
            90deg,
            transparent,
            rgba(168,85,247,.4),
            transparent
        );

    margin:30px 0 20px;
}


/* =========================================
   FOOTER
========================================= */

.footer{

    text-align:center;

    color:#756b8c;

    font-size:13px;
}


.footer i{

    color:#a78bfa;
}


/* =========================================
   LOGO SISTEM AKADEMIK
========================================= */

.system-logo{

    width:28px;
    height:28px;

    object-fit:cover;

    border-radius:50%;

    vertical-align:middle;

    margin-right:6px;

    box-shadow:
        0 0 10px rgba(168,85,247,.35);
}


/* =========================================
   MOBILE
========================================= */

@media(max-width:576px){

    .main-container{

        padding:25px 15px;
    }


    .card-content{

        padding:25px 20px;
    }


    .mapel-logo{

        width:85px;
        height:85px;

        border-radius:20px;
    }


    h2{

        font-size:23px;
    }


    .d-flex{

        gap:10px;
    }


    .btn{

        padding:10px 14px;
    }


    .moon{

        width:70px;
        height:70px;

        top:30px;
        left:4%;
    }


    .moon::after{

        width:70px;
        height:70px;

        left:20px;
        top:-5px;
    }

}

</style>

</head>


<body>


<!-- CAHAYA -->

<div class="glow"></div>


<!-- BULAN -->

<div class="moon"></div>


<!-- FORM -->

<div class="main-container">

    <div class="edit-card">

        <div class="card-content">


            <!-- HEADER -->

            <div class="header-mapel">


                <!-- LOGO MATA PELAJARAN -->

                <img
                    src="nijika ijichi.jpg"
                    class="mapel-logo"
                    alt="Logo Mata Pelajaran"
                >


                <div class="header-icon">

                    <i class="bi bi-pencil-square"></i>

                </div>


                <h2>

                    Edit Data Mata Pelajaran

                </h2>


                <p class="subtitle">

                    Perbarui informasi mata pelajaran.

                </p>

            </div>


            <!-- FORM -->

            <form
                action="update.php"
                method="POST"
            >


                <!-- ID MAPEL -->

                <div class="mb-4">

                    <label class="form-label">

                        <i class="bi bi-hash"></i>

                        ID Mata Pelajaran

                    </label>


                    <input
                        type="text"
                        name="id_mapel"
                        class="form-control"
                        value="<?php echo htmlspecialchars($data['id_mapel']); ?>"
                        readonly
                    >

                </div>


                <!-- NAMA MAPEL -->

                <div class="mb-4">

                    <label class="form-label">

                        <i class="bi bi-book"></i>

                        Nama Mata Pelajaran

                    </label>


                    <input
                        type="text"
                        name="mapel"
                        class="form-control"
                        value="<?php echo htmlspecialchars($data['mapel']); ?>"
                        placeholder="Masukkan nama mata pelajaran"
                        required
                    >

                </div>


                <div class="divider"></div>


                <!-- BUTTON -->

                <div class="d-flex justify-content-between align-items-center">


                    <a
                        href="index.php"
                        class="btn btn-secondary"
                    >

                        <i class="bi bi-arrow-left me-1"></i>

                        Kembali

                    </a>


                    <button
                        type="submit"
                        class="btn btn-primary"
                    >

                        <i class="bi bi-save me-1"></i>

                        Simpan Perubahan

                    </button>


                </div>


            </form>


            <div class="divider"></div>


            <!-- FOOTER -->

            <div class="footer">

                <img
                    src="bochi the rock.jpg"
                    class="system-logo"
                    alt="Bochi the Rock"
                >

                Sistem Akademik

            </div>


        </div>

    </div>

</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>