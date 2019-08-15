<form action="<?php echo $action; ?>" method="post">
        <div class="form-group">
            <label for="varchar">Kode Supplier <?php echo form_error('kode_supplier') ?></label>
            <input type="text" class="form-control" name="kode_supplier" id="kode_supplier" placeholder="Kode Supplier" value="<?php echo $kode_supplier; ?>" />
        </div>
        <div class="form-group">
            <label for="varchar">Nama Supplier <?php echo form_error('nama_supplier') ?></label>
            <input type="text" class="form-control" name="nama_supplier" id="nama_supplier" placeholder="Nama Supplier" value="<?php echo $nama_supplier; ?>" />
        </div>
        <div class="form-group">
            <label for="varchar">Alamat <?php echo form_error('alamat') ?></label>
            <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" value="<?php echo $alamat; ?>" />
        </div>
        <div class="form-group">
            <label for="varchar">Nomer Hp <?php echo form_error('nomer_hp') ?></label>
            <input type="text" class="form-control" name="nomer_hp" id="nomer_hp" placeholder="Nomer Hp" value="<?php echo $nomer_hp; ?>" />
        </div>
        <div class="form-group">
            <label for="varchar">Barang yang dijual <?php echo form_error('barang_jual') ?></label>
            <input type="text" class="form-control" name="barang_jual" id="barang_jual" placeholder="Barang yang dijual" value="<?php echo $barang_jual; ?>" />
        </div>
        <input type="hidden" name="id_supplier" value="<?php echo $id_supplier; ?>" /> 
        <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
        <a href="<?php echo site_url('supplier') ?>" class="btn btn-default">Cancel</a>
    </form>