<h1>Edit Mahasiswa</h1>
<form method="post">
    Nama: <input type="text" name="nama" value="<?= $data['nama'] ?>" required><br><br>
    NIM: <input type="text" name="nim" value="<?= $data['nim'] ?>" required><br><br>
    <input type="submit" value="Update">
</form>
<a href="index.php">Kembali</a>
