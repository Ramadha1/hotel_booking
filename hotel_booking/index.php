<?php include('config.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Ada</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css"> <!-- Link ke styles.css -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
    <?php include('navbar.php'); ?> <!-- Navigation Bar -->
    <div class="container mt-4">
        <h1 class="text-center text-light mb-4">Selamat Datang di Hotel Ada</h1>
        <!-- Header dengan teks yang lebih kecil -->
        <div class="row">
            <div class="col-sm-12 col-md-4">
                <div class="card">
                    <img src="images/standar.jpg" class="card-img-top" alt="Kamar Standar">
                    <div class="card-body">
                        <h5 class="card-title text-dark">Kamar Standar</h5> <!-- Font hitam untuk nama kamar -->
                        <p class="card-text text-dark">Kamar dengan fasilitas dasar, cocok untuk perjalanan singkat.</p>
                        <!-- Font hitam untuk deskripsi -->
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="card">
                    <img src="images/deluxe.jpg" class="card-img-top" alt="Kamar Deluxe">
                    <div class="card-body">
                        <h5 class="card-title text-dark">Kamar Deluxe</h5> <!-- Font hitam untuk nama kamar -->
                        <p class="card-text text-dark">Kamar dengan fasilitas lebih lengkap untuk kenyamanan ekstra.</p>
                        <!-- Font hitam untuk deskripsi -->
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="card">
                    <img src="images/executive.jpg" class="card-img-top" alt="Kamar Family">
                    <div class="card-body">
                        <h5 class="card-title text-dark">Kamar Family</h5> <!-- Font hitam untuk nama kamar -->
                        <p class="card-text text-dark">Kamar luas dengan fasilitas premium untuk keluarga besar.</p>
                        <!-- Font hitam untuk deskripsi -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>