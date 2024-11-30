<?php include('config.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan Kamar</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css"> <!-- Link ke styles.css -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // Fungsi untuk mengatur harga per harinya sesuai tipe kamar
        function setHargaPerHari() {
            const tipeKamar = document.getElementById('tipe_kamar').value;
            let hargaPerHari = 0;

            if (tipeKamar === 'Standar') hargaPerHari = 500000;
            if (tipeKamar === 'Deluxe') hargaPerHari = 750000;
            if (tipeKamar === 'Family') hargaPerHari = 1000000;

            // Update input harga per hari
            document.getElementById('harga_per_hari').value = hargaPerHari.toLocaleString('id-ID');
        }

        function validateNomorIdentitas() {
            const input = document.getElementById('nomor_identitas');
            const error = document.getElementById('nomorIdentitasError');
            const regex = /^\d{16}$/; // Hanya 16 digit angka
            if (regex.test(input.value)) {
                error.style.display = 'none'; // Sembunyikan error
                input.setCustomValidity(''); // Valid
            } else {
                error.style.display = 'block'; // Tampilkan error
                input.setCustomValidity('Nomor identitas harus 16 digit angka.'); // Tidak valid
            }
        }

        // Fungsi untuk menghitung total bayar
        function hitungTotal() {
            const tipeKamar = document.getElementById('tipe_kamar').value;
            const durasiMenginap = parseInt(document.getElementById('durasi_menginap').value) || 0;
            const breakfast = document.getElementById('breakfast').checked;

            let hargaPerHari = 0;

            if (tipeKamar === 'Standar') hargaPerHari = 500000;
            if (tipeKamar === 'Deluxe') hargaPerHari = 750000;
            if (tipeKamar === 'Family') hargaPerHari = 1000000;

            let total = hargaPerHari * durasiMenginap;

            // Diskon 10% jika lebih dari 3 hari
            if (durasiMenginap > 3) {
                total -= total * 0.1;
            }

            // Tambahan biaya sarapan
            if (breakfast) {
                total += 80000 * durasiMenginap;
            }

            // Menampilkan total bayar dan memformat angka dengan koma
            document.getElementById('total_bayar').value = total.toLocaleString('id-ID');
            document.getElementById('total_bayar_container').style.display = 'block'; // Menampilkan kolom total bayar
        }
        // Mengatur tanggal minimum untuk input tanggal pemesanan
        document.addEventListener('DOMContentLoaded', function () {
            const today = new Date();
            const yyyy = today.getFullYear();
            const mm = String(today.getMonth() + 1).padStart(2, '0'); // Bulan 0-11, +1 untuk mendapatkan bulan yang benar
            const dd = String(today.getDate()).padStart(2, '0'); // Tanggal

            const minDate = `${yyyy}-${mm}-${dd}`;
            const tanggalPemesananInput = document.getElementById('tanggal_pemesanan');
            tanggalPemesananInput.setAttribute('min', minDate); // Set nilai minimum tanggal
        });

        // Atur harga per hari saat halaman dimuat
        document.addEventListener('DOMContentLoaded', setHargaPerHari);
    </script>
</head>

<body>
    <?php include('navbar.php'); ?>
    <div class="container mt-4 form-container">
        <h1 class="text-center mb-4">Form Pemesanan Kamar</h1>
        <form action="process_booking.php" method="POST">
            <div class="form-group">
                <label for="nama_pemesan">Nama Pemesan</label>
                <input type="text" name="nama_pemesan" id="nama_pemesan" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <div>
                    <input type="radio" name="jenis_kelamin" value="Laki-laki" required> Laki-laki
                    <input type="radio" name="jenis_kelamin" value="Perempuan" required> Perempuan
                </div>
            </div>

            <div class="form-group">
                <label for="nomor_identitas">Nomor Identitas</label>
                <input type="text" name="nomor_identitas" id="nomor_identitas" class="form-control" required
                    oninput="validateNomorIdentitas()" pattern="\d{16}"
                    title="Nomor identitas harus berupa 16 digit angka">
                <small id="nomorIdentitasError" class="text-danger" style="display: none;">Nomor identitas harus 16
                    digit angka.</small>
            </div>

            <div class="form-group">
                <label for="tipe_kamar">Tipe Kamar</label>
                <select name="tipe_kamar" id="tipe_kamar" class="form-control" onchange="setHargaPerHari()" required>
                    <option value="Standar">Standar</option>
                    <option value="Deluxe">Deluxe</option>
                    <option value="Family">Family</option>
                </select>
            </div>

            <div class="form-group">
                <label for="harga_per_hari">Harga (Rp)</label>
                <input type="text" id="harga_per_hari" class="form-control" readonly>
            </div>

            <div class="form-group">
                <label for="tanggal_pemesanan">Tanggal Pemesanan</label>
                <input type="date" name="tanggal_pemesanan" id="tanggal_pemesanan" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="durasi_menginap">Durasi Menginap (hari)</label>
                <input type="number" name="durasi_menginap" id="durasi_menginap" class="form-control" required min="1">
            </div>

            <div class="form-group form-check">
                <input type="checkbox" name="breakfast" id="breakfast" class="form-check-input">
                <label for="breakfast" class="form-check-label">Termasuk Breakfast (+Rp 80.000/hari)</label>
            </div>

            <!-- Kontainer Total Bayar yang awalnya tersembunyi -->
            <div class="form-group" id="total_bayar_container" style="display: none;">
                <label for="total_bayar">Total Bayar (Rp)</label>
                <input type="text" name="total_bayar" id="total_bayar" class="form-control" readonly>
            </div>

            <div class="form-group text-right">
                <button type="button" class="btn btn-primary" onclick="hitungTotal()">Hitung Total Bayar</button>
                <button type="submit" class="btn btn-success">Simpan</button>
                <button type="reset" class="btn btn-danger">Cancel</button>
            </div>
        </form>
    </div>
</body>

</html>