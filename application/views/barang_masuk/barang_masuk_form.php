<form action="<?php echo $action; ?>" method="post">
        <div class="form-group">
            <label for="varchar">Kode Barang <?php echo form_error('kode_barang') ?></label>
            <select name="kode_barang" class="form-control">
                <option value="<?php echo $kode_barang ?>"><?php echo $kode_barang ?></option>
                <?php 
                $sql = $this->db->get('barang');
                foreach ($sql->result() as $row) {
                 ?>
                <option value="<?php echo $row->kode_barang ?>"><?php echo $row->nama_barang ?></option>
            <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="varchar">Kode Supplier <?php echo form_error('kode_supplier') ?></label>
            <select name="kode_supplier" class="form-control">
                <option value="<?php echo $kode_supplier ?>"><?php echo $kode_supplier ?></option>
                <?php 
                $sql = $this->db->get('supplier');
                foreach ($sql->result() as $row) {
                 ?>
                <option value="<?php echo $row->kode_supplier ?>"><?php echo $row->nama_supplier ?></option>
            <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="int">Jumlah beli <?php echo form_error('jumlah_beli') ?></label>
            <input type="text" class="form-control" name="jumlah_beli" id="jumlah_beli" placeholder="jumlah" value="<?php echo $jumlah_beli; ?>" />
        </div>
        <div class="form-group">
            <label for="int">Harga beli <?php echo form_error('harga') ?></label>
            <input type="text" class="form-control" name="harga_beli" id="harga_beli" placeholder="harga" value="<?php echo $harga_beli; ?>" />
        </div>
        <input type="hidden" name="id_barang_masuk" value="<?php echo $id_barang_masuk; ?>" /> 
        <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
        <a href="<?php echo site_url('barang_masuk') ?>" class="btn btn-default">Cancel</a>
    </form>