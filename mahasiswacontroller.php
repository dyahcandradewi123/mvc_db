<?php
require_once 'model/Mahasiswa.php';

class MahasiswaController {
    private $mahasiswaModel;

    public function __construct() {
        $this->mahasiswaModel = new Mahasiswa();
    }

    public function index() {
        $data = $this->mahasiswaModel->getAll();
        require 'view/mahasiswa/index.php';
    }

    public function create() {
        require 'view/mahasiswa/create.php';
    }

    public function store() {
        $nama = $_POST['nama'];
        $nim = $_POST['nim'];
        $this->mahasiswaModel->create($nama, $nim);
        header('Location: index.php?action=index');
    }

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nama = $_POST['nama'];
            $nim = $_POST['nim'];
            $this->mahasiswaModel->update($id, $nama, $nim);
            header('Location: index.php?action=index');
        } else {
            $data = $this->mahasiswaModel->getById($id);
            require 'view/mahasiswa/edit.php';
        }
    }

    public function delete($id) {
        $this->mahasiswaModel->delete($id);
        header('Location: index.php?action=index');
    }
}
?>
