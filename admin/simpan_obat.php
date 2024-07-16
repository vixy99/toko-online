<?php
    include "database.php";

    // Ambil data dari form
    $id_obat = $_POST['id_obat'];
    $nama_obat = $_POST['nama_obat'];
    $kegunaan = $_POST['kegunaan'];
    $harga = $_POST['harga'];

    // Pengecekan apakah id_obat sudah ada
    $check_query = "SELECT * FROM obat WHERE id_obat = '$id_obat'";
    $check_result = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        // Jika id_obat sudah ada, tampilkan pesan error
        echo "<script>alert('ID Obat sudah ada. Silakan masukkan ID Obat yang lain.')</script>";
        echo "<script>window.history.back();</script>";
    } else {
        // Jika id_obat belum ada, lakukan insert ke database
        $query = "INSERT INTO obat (id_obat, nama_obat, kegunaan, harga) 
                  VALUES ('$id_obat', '$nama_obat', '$kegunaan', '$harga')";

        // Eksekusi query
        if (mysqli_query($conn, $query)) {
            // Jika berhasil disimpan, redirect ke halaman data_obatt.php
            header("location:data_obatt.php");
        } else {
            // Jika gagal, tampilkan pesan error
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }
    }

    mysqli_close($conn);
?>
