<?php
require_once 'controller/MahasiswaController.php';

$controller = new MahasiswaController();

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
    case 'create':
        $controller->create();
        break;
    case 'store': // <<<<<< INI YANG KURANG!!
        $controller->store();
        break;
    case 'edit':
        $controller->edit($_GET['id']);
        break;
    case 'delete':
        $controller->delete($_GET['id']);
        break;
    default:
        $controller->index();
        break;
}
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
    <?php $no = 1; while($row = $data->fetch(PDO::FETCH_ASSOC)) { ?>
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
