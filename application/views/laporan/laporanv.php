<div class="row" style="margin-bottom: 10px">
             <div class="col-md-4">
                
            </div> 
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('barang_keluar/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('barang_keluar'); ?>" class="btn btn-default">Reset</a>
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
        <th>Nama Barang</th>
        <th>Kode Barang</th>
        <th>Harga Beli</th>
        <th>Harga jual</th>
        <th>Stok Awal</th>
        <th>Jumlah Beli</th>
        <th>Jumlah jual</th>
        <th>Jumlah akhir </th>
            </tr><?php
       foreach ($Laporan_data as $barang)
            {
                ?>
                <tr>
            <td width="80px"><?php echo ++$start ?></td>
            <td><?php echo $barang->nama_barang ?></td>
           <td><?php echo $barang->kode_barang ?></td>
            <td><?php echo "Rp ",number_format($barang->harga_beli,2,",","."); ?></td>
             <td><?php echo "Rp ",number_format($barang->harga_jual,2,",","."); ?></td>
             <td><?php echo $barang->stok ?></td>
             <td><?php echo $barang->jumlah_beli ?></td>
             <td><?php echo $barang->jumlah_jual ?></td>
             <td><?php echo $barang->stok+ $barang->jumlah_beli-$barang->jumlah_jual ?></td>
            <td></td>

        
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