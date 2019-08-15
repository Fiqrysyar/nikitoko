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
        <h2 style="margin-top:0px">Supplier Read</h2>
        <table class="table">
	    <tr><td>Kode Supplier</td><td><?php echo $kode_supplier; ?></td></tr>
	    <tr><td>Nama Supplier</td><td><?php echo $nama_supplier; ?></td></tr>
        <tr><td>Alamat</td><td><?php echo $alamat; ?></td></tr>
        <tr><td>Nomer hp</td><td><?php echo $nomer_hp; ?></td></tr>
        <tr><td>Barang yang dijual</td><td><?php echo $barang_jual; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('supplier') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>