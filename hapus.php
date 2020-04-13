<?php
    include('lib/koneksi.php');

    $id = $_GET['id'];

    $query = $db->exec("DELETE FROM `barang` WHERE `barang`.`kode` = $id");

    if($query) echo "berhasil";

    if($query){
        session_start();
        $_SESSION['message'] = "berhasil menghapus barang!";
        header('location:inventory.php');
    }

    echo "gagal";
?>