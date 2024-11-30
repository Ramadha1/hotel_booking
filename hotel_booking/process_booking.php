<?php
include('config.php'); // Hubungkan ke database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = mysqli_real_escape_string($conn, $_POST['nama_pemesan']);
    $jenis_kelamin = mysqli_real_escape_string($conn, $_POST['jenis_kelamin']);
    $nomor_identitas = mysqli_real_escape_string($conn, $_POST['nomor_identitas']);
    $tipe_kamar = mysqli_real_escape_string($conn, $_POST['tipe_kamar']);
    $tanggal_pemesanan = mysqli_real_escape_string($conn, $_POST['tanggal_pemesanan']);
    $durasi_menginap = (int) $_POST['durasi_menginap'];
    $breakfast = isset($_POST['breakfast']) ? 1 : 0;
    $discount = "10%";
    $total_bayar = (int) str_replace('.', '', $_POST['total_bayar']);

    // Validasi nomor identitas
    if (!preg_match('/^\d{16}$/', $nomor_identitas)) {
        die("Nomor identitas tidak valid. Harus terdiri dari 16 digit angka.");
    }

    // Untuk menampilkan gambar pada tabel hasil.php
    $foto_kamar = '';

    switch ($tipe_kamar) {
        case 'Standar':
            $foto_kamar = 'standar.jpg';
            break;
        case 'Deluxe':
            $foto_kamar = 'deluxe.jpg';
            break;
        case 'Family':
            $foto_kamar = 'executive.jpg';
            break;
    }
    // Validasi lainnya dan simpan ke database
    $discount = ($durasi_menginap > 3) ? "10%" : "0%";


    $query = "INSERT INTO bookings (nama_pemesan, jenis_kelamin, nomor_identitas, tipe_kamar, foto_kamar, tanggal_pemesanan, durasi_menginap, breakfast, discount, total_bayar) VALUES ('$nama', '$jenis_kelamin', '$nomor_identitas', '$tipe_kamar', '$foto_kamar', '$tanggal_pemesanan', '$durasi_menginap', '$breakfast', '$discount', '$total_bayar')";
    if (mysqli_query($conn, $query)) {
        header("Location: hasil.php"); // Redirect ke halaman daftar pemesanan
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

?>