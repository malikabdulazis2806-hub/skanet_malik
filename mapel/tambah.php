<!DOCTYPE html>
<html lang="id">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Tambah Mata Pelajaran - Sistem Akademik</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.css" rel="stylesheet">

<style>

/* =========================
   GLOBAL
========================= */

*{
    box-sizing:border-box;
}

html{
    scroll-behavior:smooth;
}

body{
    margin:0;
    min-height:100vh;

    color:#ffffff;

    font-family:"Segoe UI", Arial, sans-serif;

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


/* =========================
   BINTANG
========================= */

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

    animation:starsMove 8s ease-in-out infinite alternate;
}


@keyframes starsMove{

    0%{
        opacity:.25;
    }

    100%{
        opacity:.6;
    }

}


/* =========================
   BULAN
========================= */

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

    z-index:1;

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
        transform:translateY(-10px);
    }

}


/* =========================
   CONTAINER
========================= */

.container-main{

    width:92%;

    max-width:800px;

    margin:55px auto;

    position:relative;

    z-index:2;

    animation:
        cardAppear .7s ease;
}


/* =========================
   CARD
========================= */

.main-card{

    background:
        rgba(17,10,42,.88);

    border:
        1px solid rgba(168,85,247,.45);

    border-radius:28px;

    padding:30px;

    box-shadow:
        0 0 25px rgba(139,92,246,.20),

        0 0 70px rgba(124,58,237,.12),

        inset 0 0 30px rgba(139,92,246,.04);

    backdrop-filter:blur(15px);

    -webkit-backdrop-filter:blur(15px);

    position:relative;

    overflow:hidden;
}


/* GARIS ATAS */

.main-card::before{

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


/* =========================
   ANIMASI CARD
========================= */

@keyframes cardAppear{

    from{

        opacity:0;

        transform:
            translateY(25px)
            scale(.97);

    }

    to{

        opacity:1;

        transform:
            translateY(0)
            scale(1);

    }

}


/* =========================
   HEADER
========================= */

.header{

    display:flex;

    align-items:center;

    gap:18px;

    padding-bottom:25px;

    border-bottom:
        1px solid rgba(196,181,253,.15);
}


/* =========================
   LOGO MAPEL
========================= */

.title-icon{

    width:65px;
    height:65px;

    display:flex;

    align-items:center;
    justify-content:center;

    flex-shrink:0;

    border-radius:18px;

    overflow:hidden;

    background:
        linear-gradient(
            145deg,
            rgba(139,92,246,.35),
            rgba(168,85,247,.12)
        );

    border:
        1px solid rgba(168,85,247,.4);

    box-shadow:
        0 0 20px rgba(139,92,246,.25),

        0 0 35px rgba(168,85,247,.10);

    transition:.3s;
}


.title-icon:hover{

    transform:
        scale(1.08)
        rotate(-2deg);

    box-shadow:
        0 0 30px rgba(168,85,247,.45);
}


.title-icon img{

    width:100%;
    height:100%;

    object-fit:cover;

    display:block;
}


/* =========================
   TITLE
========================= */

.title{

    margin:0;

    font-size:30px;

    font-weight:700;

    color:#ffffff;

    text-shadow:
        0 0 15px rgba(180,130,255,.25);
}


.subtitle{

    margin:5px 0 0;

    color:#bdb3d8;

    font-size:14px;
}


/* =========================
   FORM
========================= */

.form-area{

    padding-top:30px;
}


.form-label{

    color:#e9d5ff;

    font-weight:600;

    margin-bottom:8px;
}


.form-control{

    height:52px;

    color:#ffffff;

    background:
        rgba(10,6,30,.65);

    border:
        1px solid rgba(168,85,247,.30);

    border-radius:12px;

    padding:12px 15px;

    transition:.25s;
}


.form-control::placeholder{

    color:#80749b;
}


.form-control:focus{

    color:#ffffff;

    background:
        rgba(17,10,42,.9);

    border-color:
        #a855f7;

    box-shadow:

        0 0 0 3px
        rgba(168,85,247,.15),

        0 0 18px
        rgba(139,92,246,.15);
}


/* =========================
   BUTTON AREA
========================= */

.button-area{

    display:flex;

    justify-content:space-between;

    gap:15px;

    margin-top:28px;
}


.btn{

    border-radius:12px;

    padding:11px 18px;

    font-weight:600;

    transition:.25s;
}


/* =========================
   SIMPAN
========================= */

.btn-save{

    border:none;

    color:#ffffff;

    background:
        linear-gradient(
            135deg,
            #7c3aed,
            #a855f7
        );

    box-shadow:
        0 8px 20px
        rgba(124,58,237,.30);
}


.btn-save:hover{

    color:#ffffff;

    transform:
        translateY(-2px);

    background:
        linear-gradient(
            135deg,
            #8b5cf6,
            #c084fc
        );

    box-shadow:
        0 12px 25px
        rgba(168,85,247,.45);
}


/* =========================
   KEMBALI
========================= */

.btn-back{

    display:inline-flex;

    align-items:center;

    gap:7px;

    color:#d8d0e8;

    text-decoration:none;

    background:
        rgba(139,92,246,.10);

    border:
        1px solid rgba(168,85,247,.20);
}


.btn-back:hover{

    color:#ffffff;

    background:
        rgba(139,92,246,.20);

    transform:
        translateY(-2px);
}


/* =========================
   FOOTER
========================= */

.footer{

    display:flex;

    align-items:center;

    justify-content:center;

    gap:9px;

    margin-top:28px;

    color:#74698d;

    font-size:13px;
}


.footer img{

    width:30px;
    height:30px;

    object-fit:cover;

    border-radius:50%;

    border:
        1px solid rgba(168,85,247,.40);

    box-shadow:
        0 0 12px rgba(139,92,246,.35);

    transition:.3s;
}


.footer img:hover{

    transform:
        scale(1.12);

    box-shadow:
        0 0 20px rgba(168,85,247,.60);
}


.footer i{

    color:#a78bfa;
}


/* =========================
   RESPONSIVE
========================= */

@media(max-width:768px){

    .container-main{

        width:94%;

        margin:25px auto;
    }


    .main-card{

        padding:20px;

        border-radius:20px;
    }


    .header{

        align-items:flex-start;
    }


    .title-icon{

        width:55px;
        height:55px;
    }


    .title{

        font-size:24px;
    }


    .subtitle{

        font-size:13px;
    }


    .button-area{

        flex-direction:column-reverse;
    }


    .button-area .btn{

        width:100%;

        justify-content:center;
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


    .footer img{

        width:27px;
        height:27px;
    }

}

</style>

</head>


<body>


<!-- BULAN -->

<div class="moon"></div>


<!-- CONTAINER -->

<div class="container-main">

    <div class="main-card">


        <!-- HEADER -->

        <div class="header">


            <!-- LOGO MAPEL -->

            <div class="title-icon">

                <img
                    src="nijika ijichi.jpg"
                    alt="Logo Mata Pelajaran"
                >

            </div>


            <!-- JUDUL -->

            <div>

                <h1 class="title">
                    Tambah Mata Pelajaran
                </h1>

                <p class="subtitle">
                    Tambahkan mata pelajaran baru ke dalam sistem akademik.
                </p>

            </div>


        </div>


        <!-- FORM -->

        <div class="form-area">

            <form
                action="simpan.php"
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
                        placeholder="Masukkan ID Mata Pelajaran"
                        required
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
                        placeholder="Masukkan Nama Mata Pelajaran"
                        required
                    >

                </div>


                <!-- BUTTON -->

                <div class="button-area">


                    <!-- KEMBALI -->

                    <a
                        href="index.php"
                        class="btn btn-back"
                    >

                        <i class="bi bi-arrow-left"></i>

                        Kembali

                    </a>


                    <!-- SIMPAN -->

                    <button
                        type="submit"
                        class="btn btn-save"
                    >

                        <i class="bi bi-save"></i>

                        Simpan

                    </button>


                </div>


            </form>

        </div>


        <!-- FOOTER -->

        <div class="footer">

            <img
                src="bochi the rock.jpg"
                alt="Bochi the Rock"
            >

            <span>
                Sistem Akademik
            </span>

        </div>


    </div>

</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>