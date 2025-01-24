<?php
// Koneksi ke database
$koneksi = new mysqli('localhost', 'root', '', 'registrasi');

// Periksa koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Ambil data dari form
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$telepon = $_POST['telepon'];

// Buat id transaksi yang unik
$id_transaksi = uniqid();

// Simpan data ke database
$sql = "INSERT INTO transaksi (id_transaksi, nama, alamat, telepon) VALUES ('$id_transaksi', '$nama', '$alamat', '$telepon')";
if ($koneksi->query($sql) === TRUE) {
    // Redirect ke halaman lain jika input berhasil
    header("Location: Backtopage.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $koneksi->error;
}

// Tutup koneksi
$koneksi->close();
?>
