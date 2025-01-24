<!DOCTYPE html>
<html>
    <link rel="stylesheet" href="form.css">
<head>
    <title>Form Transaksi</title>
</head>
<body>
    <h2 class="judul">Form Transaksi</h2>
    <form method="post" action="proses.php">
        <label for="nama">Nama:</label><br>
        <input type="text" id="nama" name="nama"><br><br>
        <label for="alamat">Alamat:</label><br>
        <textarea id="alamat" name="alamat"></textarea><br><br>
        <label for="telepon">No. Telepon:</label><br>
        <input type="text" id="telepon" name="telepon"><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
