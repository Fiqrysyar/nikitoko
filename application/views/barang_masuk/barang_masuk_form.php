<form action="<?php echo $action; ?>" method="post">
       </div>
        <div class="form-group">
            <label for="varchar">Kode Barang <?php echo form_error('kode_barang') ?></label>
            <!-- <select name="kode_barang" class="form-control">
                <option value="<?php echo $kode_barang ?>"><?php echo $kode_barang ?></option>
                <?php 
                $sql = $this->db->get('barang');
                foreach ($sql->result() as $row) {
                 ?>
                <option value="<?php echo $row->kode_barang ?>"><?php echo $row->nama_barang ?></option>
            <?php } ?>
            </select> -->
            <input list="data_barang" type="text" class="form-control" name="kode_barang" id="kode_barang" placeholder="Kode barang" onchange="return autofill();">
        </div>

        <div class="form-group">
            <label for="int">Nama Barang </label>
            <input type="text" class="form-control" name="nama_barang" id="nama_barang">
        </div>    
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
            <label for="int">tanggal </label>
            <input type="text" class="form-control" name="tanggal" id="tanggal" placeholder="tanggal" >
        </div>    
 
        <div class="form-group">
            <label for="int">Jumlah beli <?php echo form_error('jumlah_beli') ?></label>
            <input type="number" class="form-control" name="jumlah_beli" id="jumlah_beli" placeholder="jumlah" value="<?php echo $jumlah_beli; ?>" />
        </div>
        <div class="form-group">
            <label for="int">Harga beli <?php echo form_error('harga') ?></label>
            <input type="number" class="form-control" name="harga_beli" id="harga_beli" placeholder="harga" value="<?php echo $harga_beli; ?>" oninput="myFunction()"/>
        </div>
        <div class="form-group">
            <label for="int">Total <?php echo form_error('total') ?></label>
            <input type="text" class="form-control" name="total" id="total" placeholder="Total" />
        </div>

        <input type="hidden" name="id_barang_masuk" value="<?php echo $id_barang_masuk; ?>" /> 
        <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
        <a href="<?php echo site_url('barang_masuk') ?>" class="btn btn-default">Cancel</a>
    </form>

    <datalist id="data_barang">
    <?php
        foreach ($semua_barang->result() as $row) {
    ?>
            <option value="<?= $row->kode_barang ?>"><?= $row->kode_barang."<br/>".$row->nama_barang ?></option>
    <?php
        }
    ?>
    
    </datalist>

     <script src="<?php echo base_url(); ?>assets/ajax/ajax.js"></script> 

<script>
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();

    today = yyyy + '-' + mm + '-' + dd;

    function autofill(){
        var kode_barang =document.getElementById('kode_barang').value;

        $.ajax({
                       url:"<?php echo base_url();?>index.php/barang_masuk/cari",
                       data:'&kode_barang='+kode_barang,
                       success:function(data){
                           var hasil = JSON.parse(data);  
                    
            $.each(hasil, function(key,val){ 
                
               document.getElementById('kode_barang').value=val.kode_barang;
                           document.getElementById('nama_barang').value=val.nama_barang;
                           document.getElementById('tanggal').value=today;
                           /*document.getElementById('stok').value=val.stok;
                           */
                             
                               
                    
                });
            }
        });
                  
    }

    function myFunction() {
        var x = document.getElementById("jumlah_beli").value;
        var y= document.getElementById("harga_beli").value;    
        

            document.getElementById('total').value=x*y;

    }
</script>