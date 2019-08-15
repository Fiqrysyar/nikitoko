<div class="row" style="margin-bottom: 10px">
    <div class="col-md-4">
       
                <a class="btn btn-primary" href="barang_masuk/create">create</a>
    </div>
    <div class="col-md-4 text-center">
        <div style="margin-top: 8px" id="message">
            <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
        </div>
    </div>
    <div class="col-md-1 text-right">
    </div>
    <div class="col-md-3 text-right">
        <form action="<?php echo site_url('barang_masuk/index'); ?>" class="form-inline" method="get">
            <div class="input-group">
                <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                <span class="input-group-btn">
                            <?php
                            if ($q <> '')
                            {
                                ?>
                                <a href="<?php echo site_url('barang_masuk'); ?>" class="btn btn-default">Reset</a>
                                <?php
                            }
                            ?>
                    <button class="btn btn-primary" type="submit">Search</button>
                        </span>
            </div>
        </form>
    </div>
</div>
<table class="table table-bordered" style="margin-bottom: 10px">
    <tr>
        <th>No</th>
        <th>Tanggal</th>
        <th>Nama Barang</th>
        <th>Kode Barang</th>
        <th>Kode Supplier</th>
        <th>Jumlah</th>
        <th>Harga</th>
        <th>Total</th>
        <th>Action</th>
    </tr><?php
    foreach ($barang_masuk_data as $barang_masuk)
    {
        ?>
        <tr>
            <td width="80px"><?php echo ++$start ?></td>
            <td><?php echo $barang_masuk->tanggal; ?></td>
            <td><?php echo $barang_masuk->nama_barang; ?></td>
            <td><?php echo $barang_masuk->kode_barang; ?></td>
            <td><a href="<?= base_url()."Supplier/get_supplier_by_id/".$barang_masuk->kode_supplier ?>"> <?php echo $barang_masuk->kode_supplier; ?></a></td>
            <td><?php echo $barang_masuk->jumlah_beli; ?></td>
            <td><?php echo "Rp ",number_format($barang_masuk->harga_beli,2,",","."); ?></td>
            <td><?php echo "Rp ",number_format($barang_masuk->jumlah_beli*$barang_masuk->harga_beli,2,",","."); ?></td>
            <td style="text-align:center" width="200px">
                <?php
                echo ' | ';
                echo anchor(site_url('barang_masuk/update/'.$barang_masuk->id_barang_masuk),'Update');
                echo ' | ';
                echo anchor(site_url('barang_masuk/delete/'.$barang_masuk->id_barang_masuk),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
                ?>
            </td>
        </tr>
        <?php
    }
    ?>
</table>
<div class="row">
    <div class="col-md-6">
        <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
    </div>
    <div class="col-md-6 text-right">
        <?php echo $pagination ?>
    </div>
</div>