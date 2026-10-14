<?php

include "koneksi.php";

// Ambil data dari form
$nis    = isset($_POST['nis']) ? trim($_POST['nis']) : "";
$nama   = isset($_POST['nama']) ? trim($_POST['nama']) : "";
$alamat = isset($_POST['alamat']) ? trim($_POST['alamat']) : "";


// Cek apakah NIS sudah ada
$cek = mysqli_query($koneksi, "SELECT nis FROM siswa WHERE nis = '$nis'");


// Jika NIS sudah digunakan
if (mysqli_num_rows($cek) > 0) {

    echo '
    <!DOCTYPE html>
    <html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>NIS Sudah Digunakan</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

        <style>
            body {
                margin: 0;
                min-height: 100vh;

                display: flex;
                align-items: center;
                justify-content: center;

                font-family: "Segoe UI", Arial, sans-serif;

                background:
                    radial-gradient(
                        circle at 80% 10%,
                        rgba(123, 63, 180, 0.32),
                        transparent 28%
                    ),
                    linear-gradient(
                        135deg,
                        #090719 0%,
                        #100b27 45%,
                        #171038 100%
                    );

                color: white;
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
                        rgba(35, 24, 65, 0.95),
                        rgba(15, 11, 35, 0.98)
                    );

                border: 1px solid rgba(190, 150, 255, 0.2);

                box-shadow:
                    0 25px 60px rgba(0, 0, 0, 0.5),
                    0 0 35px rgba(111, 66, 193, 0.2);
            }

            .icon {
                width: 70px;
                height: 70px;

                margin: 0 auto 20px;

                display: flex;
                align-items: center;
                justify-content: center;

                border-radius: 50%;

                font-size: 32px;

                color: #ffb4b4;

                background: rgba(220, 53, 69, 0.15);

                border: 1px solid rgba(220, 53, 69, 0.3);
            }

            h3 {
                margin-bottom: 10px;
                color: white;
            }

            p {
                color: #aaa1ba;
                margin-bottom: 25px;
            }

            .btn-back {
                border: none;

                color: white;

                padding: 10px 20px;

                border-radius: 10px;

                background:
                    linear-gradient(
                        135deg,
                        #6f42c1,
                        #9b59b6
                    );
            }

            .btn-back:hover {
                color: white;
                transform: translateY(-2px);
            }
        </style>
    </head>

    <body>

        <div class="alert-card">

            <div class="icon">
                !
            </div>

            <h3>NIS Sudah Digunakan</h3>

            <p>
                NIS <strong>' . htmlspecialchars($nis) . '</strong>
                sudah terdaftar di dalam sistem.
                <br>
                Silakan gunakan NIS yang berbeda.
            </p>

            <a href="javascript:history.back()" class="btn btn-back">
                ← Kembali ke Form
            </a>

        </div>

    </body>
    </html>
    ';

    exit;
}


// Jika NIS belum ada, simpan data
$query = "INSERT INTO siswa (nis, nama, alamat)
          VALUES ('$nis', '$nama', '$alamat')";

$simpan = mysqli_query($koneksi, $query);


// Jika berhasil
if ($simpan) {

    header("Location: index.php");
    exit;

}


// Jika terjadi error lain
else {

    echo "Data gagal disimpan: " . mysqli_error($koneksi);

}

?>