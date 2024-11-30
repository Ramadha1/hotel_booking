<?php include('config.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Harga - Hotel Ada</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css"> <!-- Link ke styles.css -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
    <?php include('navbar.php'); ?> <!-- Navigation Bar -->
    <div class="container mt-4 harga-container">
        <h1 class="text-center mb-4 text-dark">Daftar Harga</h1>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Tipe Kamar</th>
                    <th>Harga per Hari</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Standar</td>
                    <td>Rp 500,000</td>
                </tr>
                <tr>
                    <td>Deluxe</td>
                    <td>Rp 750,000</td>
                </tr>
                <tr>
                    <td>Family</td>
                    <td>Rp 1,000,000</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>