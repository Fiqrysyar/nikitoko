<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Barang Read</h2>
        <table class="table">
	    <tr><td>Kode Barang</td><td><?php echo $kode_barang; ?></td></tr>
	    <tr><td>Nama Barang</td><td><?php echo $nama_barang; ?></td></tr>
	    <tr><td>Harga Jual</td><td><?php echo $harga_jual; ?></td></tr>
        <tr><td>Harga Beli</td><td><?php echo $harga_beli; ?></td></tr>
	    <tr><td>Stok</td><td><?php echo $stok; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('barang') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>