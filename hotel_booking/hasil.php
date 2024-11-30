<?php
include('config.php'); // Hubungkan ke database
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pemesanan Hotel</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css"> <!-- Link ke styles.css -->
</head>

<body>
    <div class="container mt-4 hasil-container table-responsive">
        <h1 class="text-center mb-4">Data Pemesanan Hotel</h1>
        <table class="table table-bordered table-striped">
            <thead>
                <tr class="text-center">
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Nomor Identitas</th>
                    <th>Tipe Kamar</th>
                    <th>Foto Kamar</th>
                    <th>Tanggal Pesan</th>
                    <th>Durasi (Hari)</th>
                    <th>Breakfast</th>
                    <th>Discount</th>
                    <th>Total Bayar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM bookings ORDER BY id ASC";
                $result = mysqli_query($conn, $query);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr class='text-center'>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['nama_pemesan'] . "</td>";
                        echo "<td>" . $row['jenis_kelamin'] . "</td>";
                        echo "<td>" . $row['nomor_identitas'] . "</td>";
                        echo "<td>" . $row['tipe_kamar'] . "</td>";
                        echo "<td><img src='images/" . $row['foto_kamar'] . "' alt='Foto Kamar' style='width: 100px; height: auto;'></td>";
                        echo "<td>" . $row['tanggal_pemesanan'] . "</td>";
                        echo "<td>" . $row['durasi_menginap'] . "</td>";
                        echo "<td>" . ($row['breakfast'] == '1' ? 'Ya' : 'Tidak') . "</td>";
                        echo "<td>" . $row['discount'] . "</td>";
                        echo "<td>Rp " . number_format($row['total_bayar'], 0, ',', '.') . "</td>";
                        echo "<td><a href='delete_booking.php?id=" . $row['id'] . "' class='btn btn-danger btn-sm'>Hapus</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='12' class='text-center'>Belum ada data pemesanan.</td></tr>";
                }
                ?>
            </tbody>

        </table>

        <!-- Tombol Kembali -->
        <div class="text-center mt-4">
            <a href="index.php" class="btn btn-primary">Kembali</a>
        </div>
    </div>
</body>

</html>