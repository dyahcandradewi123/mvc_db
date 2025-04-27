<?php
require_once 'controller/MahasiswaController.php';

$controller = new MahasiswaController();

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
    case 'create':
        // Tampilkan form tambah mahasiswa
        ?>
        <h2>Tambah Mahasiswa</h2>
        <form action="index.php?action=store" method="POST">
            <label>Nama:</label><br>
            <input type="text" name="nama" required><br><br>

            <label>NIM:</label><br>
            <input type="text" name="nim" required><br><br>

            <button type="submit">Simpan</button>
        </form>
        <br>
        <a href="index.php?action=index">Kembali</a>
        <?php
        break;

    case 'store':
        // Simpan data mahasiswa
        $nama = $_POST['nama'];
        $nim = $_POST['nim'];
        $controller->store($nama, $nim);
        header('Location: index.php?action=index');
        break;

    case 'edit':
        // Tampilkan form edit mahasiswa
        $id = $_GET['id'];
        $data = $controller->getById($id);
        ?>
        <h2>Edit Mahasiswa</h2>
        <form action="index.php?action=update&id=<?= $id ?>" method="POST">
            <label>Nama:</label><br>
            <input type="text" name="nama" value="<?= $data['nama'] ?>" required><br><br>

            <label>NIM:</label><br>
            <input type="text" name="nim" value="<?= $data['nim'] ?>" required><br><br>

            <button type="submit">Update</button>
        </form>
        <br>
        <a href="index.php?action=index">Kembali</a>
        <?php
        break;

    case 'update':
        // Update data mahasiswa
        $id = $_GET['id'];
        $nama = $_POST['nama'];
        $nim = $_POST['nim'];
        $controller->update($id, $nama, $nim);
        header('Location: index.php?action=index');
        break;

    case 'delete':
        // Hapus data mahasiswa
        $id = $_GET['id'];
        $controller->delete($id);
        header('Location: index.php?action=index');
        break;

    default:
        // Tampilkan daftar mahasiswa
        $data = $controller->index();
        ?>
        <h1>Data Mahasiswa</h1>
        <a href="index.php?action=create">Tambah Mahasiswa</a>
        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIM</th>
                <th>Aksi</th>
            </tr>
            <?php
            $no = 1;
            while($row = $data->fetch(PDO::FETCH_ASSOC)) {
            ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $row['nama'] ?></td>
                <td><?= $row['nim'] ?></td>
                <td>
                    <a href="index.php?action=edit&id=<?= $row['id'] ?>">Edit</a> |
                    <a href="index.php?action=delete&id=<?= $row['id'] ?>" onclick="return confirm('Yakin hapus?')">Delete</a>
                </td>
            </tr>
            <?php } ?>
        </table>
        <?php
        break;
}
?>
