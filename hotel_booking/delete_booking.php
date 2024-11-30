<?php
include('config.php'); // Hubungkan ke database

if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];

    $query = "DELETE FROM bookings WHERE id = $id";

    if (mysqli_query($conn, $query)) {
        header("Location: hasil.php");
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>