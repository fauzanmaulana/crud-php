<?php
    include('lib/koneksi.php');

    $id = $_GET['id'];
    
    $query = $db->query("SELECT * FROM `barang` WHERE kode = $id");

    foreach($query as $data){
        session_start();
        $_SESSION['dataedit'] = $data;
        header('location:inventory.php');
    }
?>