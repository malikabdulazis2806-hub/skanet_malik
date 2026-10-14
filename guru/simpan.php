<?php

include "koneksi.php";

// Ambil data dari form
$nip    = isset($_POST['nip']) ? trim($_POST['nip']) : "";
$nama   = isset($_POST['nama']) ? trim($_POST['nama']) : "";
$alamat = isset($_POST['alamat']) ? trim($_POST['alamat']) : "";


// =========================================
// CEK NIP SUDAH ADA ATAU BELUM
// =========================================

$cek = mysqli_query(
    $koneksi,
    "SELECT nip FROM guru WHERE nip = '$nip'"
);


// Jika NIP sudah digunakan
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

        <title>NIP Sudah Digunakan</title>

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

            }


            .alert-card {

                width: 90%;

                max-width: 450px;

                padding: 35px;

                text-align: center;

                border-radius: 22px;

                background:

                    linear-gradient(
                        145deg,
                        rgba(35,24,65,.95),
                        rgba(15,11,35,.98)
                    );

                border:
                    1px solid rgba(190,150,255,.20);

                box-shadow:

                    0 25px 60px rgba(0,0,0,.50),

                    0 0 35px
                    rgba(111,66,193,.20);

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

                font-size: 32px;

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

                border: none;

                color: white;

                padding:
                    10px 20px;

                border-radius: 10px;

                background:

                    linear-gradient(
                        135deg,
                        #6f42c1,
                        #9b59b6
                    );

                transition: .3s;

            }


            .btn-back:hover {

                color: white;

                transform:
                    translateY(-2px);

                box-shadow:
                    0 8px 20px
                    rgba(111,66,193,.35);

            }

        </style>

    </head>


    <body>


        <div class="alert-card">


            <div class="icon">

                !

            </div>


            <h3>

                NIP Sudah Digunakan

            </h3>


            <p>

                NIP

                <strong>
                    ' . htmlspecialchars($nip) . '
                </strong>

                sudah terdaftar di dalam sistem.

                <br>

                Silakan gunakan NIP yang berbeda.

            </p>


            <a
                href="javascript:history.back()"
                class="btn btn-back"
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
// SIMPAN DATA GURU
// =========================================

$query = "

    INSERT INTO guru
    (nip, nama, alamat)

    VALUES
    ('$nip', '$nama', '$alamat')

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

    echo "Data gagal disimpan: "
        . mysqli_error($koneksi);

}

?>