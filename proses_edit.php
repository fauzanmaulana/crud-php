<?php
    include('lib/koneksi.php');

    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $satuan = $_POST['satuan'];
    $kategori = $_POST['kategori'];
    $gambar = $_POST['gambar'];
    $stok = $_POST['stok'];
    $tanggal = $_POST['tanggal'];

    $query = $db->exec("UPDATE `barang` SET `kode` = '95707', `nama` = '$nama', `harga` = '$harga', `satuan` = '$satuan', `kategori` = '$kategori', `gambar` = '$gambar', `stok` = '$stok', `tanggal` = '$tanggal' WHERE `barang`.`kode` = $kode;");

    if($query){
        session_start();
        $_SESSION['message'] = "berhasil edit barang!";
        header('location:inventory.php');
    }

    echo "gagal";
?>