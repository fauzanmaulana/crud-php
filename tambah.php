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

    $query = $db->exec("INSERT INTO `barang` (`kode`, `nama`, `harga`, `satuan`, `kategori`, `gambar`, `stok`, `tanggal`) VALUES ('$kode', '$nama', '$harga', '$satuan', '$kategori', '$gambar', '$stok', '$tanggal');");

    if($query){
        session_start();
        $_SESSION['message'] = "berhasil menambah barang!";
        header('location:inventory.php');
    }

    echo "gagal";
?>