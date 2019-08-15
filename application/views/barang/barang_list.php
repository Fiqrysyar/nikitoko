<div>
            <div class="col-md-4">
                <?php echo anchor(site_url('barang/create'),'Create', 'class="btn btn-primary"'); ?>
            </div> 
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <!-- <div class="col-md-3 text-right">
                <form action="<?php echo site_url('barang/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('barang'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div> -->
        </div>
        <br/>
        

        <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No</th>
                <th>Tanggal</th>       
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Stok</th>
                <th>Harga</th>
                <th>Foto Barang</th>
                <th>Action</th> 
                </tr>
                </thead>
                <tbody>
                <?php
                    foreach ($semua_barang->result() as $barang)
                    {
                        ?>
                        <tr>
                        <td width="80px"><?php echo ++$start ?></td>
                        <td><?php echo $barang->tanggal ?></td>
                        <td><?php echo $barang->kode_barang ?></td>
                        <td><?php echo $barang->nama_barang ?></td>
                        <td><?php echo $barang->stok ?></td>
                        <td><?php echo "Rp. ".$barang->harga ?></td>
                        <td>
                            <img width="150" height="150" src="<?= base_url()."image/barang/".$barang->foto_barang ?>">
                        </td>
                        <td style="text-align:center" width="200px">
                            <?php 
                            echo anchor(site_url('barang/update/'.$barang->id_barang),'Update'); 
                            echo ' | '; 
                            echo anchor(site_url('barang/delete/'.$barang->id_barang),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
                            ?>
                        </td>
                        </tr>
                <?php
                    }
                ?>
                </tbody>
                <tfoot>
                <tr>
               
                </tr>
                </tfoot>
              </table>


<!--         <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
        </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div> -->