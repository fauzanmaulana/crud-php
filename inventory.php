<?php include('lib/koneksi.php'); session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>tugas pwpb</title>
    <style>
        form table{border:1px solid #000; padding:1em; margin:auto}
        table{margin:auto; text-align:'center';}
        a{text-decoration:none;}
        section{display:flex; justify-content: space-between;}
        section p{padding:5px; background: rgb(166, 255, 163)}
        section p, section h1{margin:0;}
    </style>
</head> 
<body>
    <div class="container">

        <!-- alert action -->
        <?php if(isset($_SESSION['message'])) : ?>
            <section class="message">
                <h1>Message</h1>
                <p><?= $_SESSION['message']; ?> <span style="cursor:pointer;" onclick=delmsg()>&times;</span></p>
            </section>
            <?php unset($_SESSION['message']); ?>
        <?php endif; ?>

        <!-- form tambah -->
        <?php if(!isset($_SESSION['dataedit'])) : ?>
            <form action="tambah.php" method="post" class="form-tambah">
                <table cellpadding="10" cellspacing="0">
                    <tr>
                        <td colspan=2>
                            <h3 style="text-align:center; margin:0; margin-bottom:0.5em">form input master dan stok data barang</h3>
                        </td>
                    </tr>
                    <tr>
                        <td>Kode Produk : </td>
                        <td><input type="text" name="kode"></td>
                    </tr>
                    <tr>
                        <td>Nama Produk : </td>
                        <td><input type="text" name="nama"></td>
                    </tr>
                    <tr>
                        <td>Harga Produk : </td>
                        <td><input type="text" name="harga"></td>
                    </tr>
                    <tr>
                        <td>Satuan : </td>
                        <td>
                            <select name="satuan" id="satuan">
                                <option value="">pilih satuan</option>
                                <option value="Gelas">Gelas</option>
                                <option value="Botol">Botol</option>
                                <option value="pcs">Pcs</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Kategori : </td>
                        <td>
                            <select name="kategori" id="kategori">
                                <option value="">pilih kategori</option>
                                <option value="Minuman Dingin">Minuman Dingin</option>
                                <option value="Minuman Hangat">Minuman Hangat</option>
                                <option value="Minuman Biasa">Minuman Biasa</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>URL Gambar : </td>
                        <td><input type="text" name="gambar"></td>
                    </tr>
                    <tr>
                        <td>Stok Awal : </td>
                        <td><input type="text" name="stok"></td>
                    </tr>
                    <tr>
                        <td>Tanggal Ditambahkan : </td>
                        <td><input type="date" name="tanggal"></td>
                    </tr>
                    <tr>
                        <td><button type="submit">Simpan</button></td>
                    </tr>
                </table>
            </form>
        <?php endif; ?>

        <!-- form edit -->
        <?php if(isset($_SESSION['dataedit'])) : ?>
            <?php $data = $_SESSION['dataedit']; ?>
            <form action="proses_edit.php" method="post" class="form-edit">
                <table cellpadding="10" cellspacing="0">
                    <tr>
                        <td colspan=2>
                            <h3 style="text-align:center; margin:0; margin-bottom:0.5em">form input master dan stok data barang</h3>
                        </td>
                    </tr>
                    <tr>
                        <td>Kode Produk : </td>
                        <td><input type="text" name="kode" value="<?=$data['kode']?>"></td>
                    </tr>
                    <tr>
                        <td>Nama Produk : </td>
                        <td><input type="text" name="nama" value="<?=$data['nama']?>"></td>
                    </tr>
                    <tr>
                        <td>Harga Produk : </td>
                        <td><input type="text" name="harga" value="<?=$data['harga']?>"></td>
                    </tr>
                    <tr>
                        <td>Satuan : </td>
                        <td>
                            <select name="satuan" id="satuan">
                                <option selected="selected" value="<?=$data['satuan']?>"><?=$data['satuan']?></option>
                                <option value="Gelas">Gelas</option>
                                <option value="Botol">Botol</option>
                                <option value="pcs">Pcs</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Kategori : </td>
                        <td>
                            <select name="kategori" id="kategori">
                                <option selected="selected" value="<?=$data['kategori']?>"><?=$data['kategori']?></option>
                                <option value="Minuman Dingin">Minuman Dingin</option>
                                <option value="Minuman Hangat">Minuman Hangat</option>
                                <option value="Minuman Biasa">Minuman Biasa</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>URL Gambar : </td>
                        <td><input type="text" name="gambar" value="<?=$data['gambar']?>"></td>
                    </tr>
                    <tr>
                        <td>Stok Awal : </td>
                        <td><input type="text" name="stok" value="<?=$data['stok']?>"></td>
                    </tr>
                    <tr>
                        <td>Tanggal Ditambahkan : </td>
                        <td><input type="date" name="tanggal" value="<?=$data['tanggal']?>"></td>
                    </tr>
                    <tr>
                        <td><button type="submit">Simpan</button></td>
                    </tr>
                </table>
            </form>
            <?php unset($_SESSION['dataedit']) ?>
        <?php endif; ?>

        <br>
        
        <!-- table data -->
        <?php $i = 1; $query = $db->query('SELECT * FROM `barang`'); ?>
        <table border=1 cellpadding="10" cellspacing="0">
            <tr>
                <td>No</td>
                <td>Kode Produk</td>
                <td>Nama Produk</td>
                <td>Harga Produk</td>
                <td>Satuan Produk</td>
                <td>Kategori Produk</td>
                <td>Gambar Produk</td>
                <td>Stok Produk</td>
                <td>Tanggal Ditambahkan</td>
                <td>Modify</td>
            </tr>
            <?php foreach($query as $data) : ?>
                <tr>
                    <td><?= $i++;    ?></td>
                    <td><?= $data['kode']; ?></td>
                    <td><?= $data['nama']; ?></td>
                    <td><?= $data['harga']; ?></td>
                    <td><?= $data['satuan']; ?></td>
                    <td><?= $data['kategori']; ?></td>
                    <td><img src="<?= $data['gambar'] ?>" width=100></td>
                    <?php $stok = $data['stok']; echo ($data['stok'] < 5) ? "<td style='background:red; color:#fff'>$stok</td>" : "<td>$stok</td>"; ?>
                    <td><?= $data['tanggal']; ?></td>
                    <td><a href="edit.php?id=<?=$data['kode'];?>">edit</a> | <a href="hapus.php?id=<?=$data['kode'];?>" onclick="return confirm('yakin?')">hapus</a></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>

    <script>
        const delmsg = () => document.querySelector('.message').style.display = 'none'

        // const setSatuan = (id, value) => {    
        //     let element = document.querySelector(id);
        //     element.value = value;
        // }

    </script>
</body>
</html>