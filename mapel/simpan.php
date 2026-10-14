<?php

include "koneksi.php";


// Ambil data dari form
$id_mapel = isset($_POST['id_mapel']) ? trim($_POST['id_mapel']) : "";
$mapel    = isset($_POST['mapel']) ? trim($_POST['mapel']) : "";


// =========================================
// CEK ID MAPEL SUDAH ADA ATAU BELUM
// =========================================

$cek = mysqli_query(
    $koneksi,
    "SELECT id_mapel FROM mapel WHERE id_mapel = '$id_mapel'"
);


// Jika ID sudah digunakan
if (mysqli_num_rows($cek) > 0) {

    echo '

    <!DOCTYPE html>
    <html lang="id">

    <head>

        <meta charset="UTF-8">

        <meta
            name="viewport"
            content="width=device-width, initial-scale=1.0"
        >

        <title>ID Mata Pelajaran Sudah Digunakan</title>

        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
            rel="stylesheet"
        >

        <style>

            * {
                box-sizing: border-box;
            }

            body {

                margin: 0;

                min-height: 100vh;

                display: flex;

                align-items: center;

                justify-content: center;

                font-family:
                    "Segoe UI",
                    Arial,
                    sans-serif;

                color: white;

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

            }


            .alert-card {

                width: 90%;

                max-width: 460px;

                padding: 35px;

                text-align: center;

                border-radius: 22px;

                background:
                    rgba(17,10,42,.95);

                border:
                    1px solid rgba(168,85,247,.40);

                box-shadow:

                    0 25px 60px
                    rgba(0,0,0,.50),

                    0 0 35px
                    rgba(139,92,246,.20);

                animation:
                    appear .4s ease;

            }


            @keyframes appear {

                from {

                    opacity: 0;

                    transform:
                        translateY(15px)
                        scale(.97);

                }

                to {

                    opacity: 1;

                    transform:
                        translateY(0)
                        scale(1);

                }

            }


            .icon {

                width: 70px;

                height: 70px;

                margin:
                    0 auto 20px;

                display: flex;

                align-items: center;

                justify-content: center;

                border-radius: 50%;

                font-size: 30px;

                font-weight: 700;

                color: #ffb4b4;

                background:
                    rgba(220,53,69,.15);

                border:
                    1px solid rgba(220,53,69,.30);

            }


            h3 {

                margin-bottom: 10px;

                color: white;

            }


            p {

                color: #aaa1ba;

                margin-bottom: 25px;

                line-height: 1.6;

            }


            strong {

                color: #d8c5ff;

            }


            .btn-back {

                display: inline-block;

                text-decoration: none;

                border: none;

                color: white;

                padding:
                    10px 20px;

                border-radius: 10px;

                background:

                    linear-gradient(
                        135deg,
                        #7c3aed,
                        #a855f7
                    );

                transition: .3s;

            }


            .btn-back:hover {

                color: white;

                transform:
                    translateY(-2px);

                box-shadow:
                    0 8px 20px
                    rgba(168,85,247,.35);

            }

        </style>

    </head>


    <body>


        <div class="alert-card">


            <div class="icon">
                !
            </div>


            <h3>
                ID Mata Pelajaran Sudah Digunakan
            </h3>


            <p>

                ID Mata Pelajaran

                <strong>
                    ' . htmlspecialchars($id_mapel) . '
                </strong>

                sudah terdaftar di dalam sistem.

                <br>

                Silakan gunakan ID yang berbeda.

            </p>


            <a
                href="javascript:history.back()"
                class="btn-back"
            >

                ← Kembali ke Form

            </a>


        </div>


    </body>

    </html>

    ';

    exit;
}


// =========================================
// SIMPAN DATA
// =========================================

$query = "

    INSERT INTO mapel
    (id_mapel, mapel)

    VALUES
    ('$id_mapel', '$mapel')

";


$simpan = mysqli_query(
    $koneksi,
    $query
);


// =========================================
// HASIL
// =========================================

if ($simpan) {

    header("Location: index.php");

    exit;

} else {

    echo "

        <h3>Data gagal disimpan</h3>

        <p>
            Error:
            " . mysqli_error($koneksi) . "
        </p>

    ";

}

?>