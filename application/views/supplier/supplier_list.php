<div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('supplier/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
<!--             <div class="col-md-3 text-right">
                <form action="<?php echo site_url('supplier/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('supplier'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div> -->
        </div>
        <table id="example2" class="table table-bordered" style="margin-bottom: 10px">
            <thead>
            <tr>
                <th>No</th>
        <th>Kode Supplier</th>
        <th>Nama Supplier</th>
        <th>Alamat</th>
        <th>Nomer HP</th>
        <th>Barang yang dijual</th>
        <th>Action</th>
            </tr>
        </thead>

        <tbody>

            <?php
            foreach ($supplier_data as $supplier)
            {
                ?>
                <tr>
            <td width="80px"><?php echo ++$start ?></td>
            <td><?php echo $supplier->kode_supplier ?></td>
            <td><?php echo $supplier->nama_supplier ?></td>
            <td><?php echo $supplier->alamat ?></td>
            <td><?php echo $supplier->nomer_hp ?></td>
            <td><?php echo $supplier->barang_jual ?></td>

            <td style="text-align:center" width="200px">
                <?php 
                echo anchor(site_url('supplier/update/'.$supplier->id_supplier),'Update'); 
                echo ' | '; 
                echo anchor(site_url('supplier/delete/'.$supplier->id_supplier),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
                ?>
            </td>
        </tr>
                <?php
            }
            ?>
        </tbody>
        </table>
<!--         <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
        </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div> -->