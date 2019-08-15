<form action="<?php echo $action; ?>" method="post" autocomplete="off">
        <div class="form-group">
           <div class="form-group">
            <label for="varchar">Kode Barang <?php echo form_error('kode_barang') ?></label>
            <input list="data_barang" type="text" class="form-control" name="kode_barang" id="kode_barang" placeholder="Kode barang" onchange="return autofill();">

        </div>
        </div>
        <div class="form-group">
            <label for="varchar">Nama Barang<?php echo form_error('nama_barang') ?></label>
            <input type="text" class="form-control" name="nama_barang" id="nama_barang"  value="<?php echo $nama_barang; ?>" />
        </div>
        
        <div class="form-group">
            <label for="date">Tgl Keluar <?php echo form_error('tgl_keluar') ?></label>
            <input type="text" class="form-control tgl" name="tgl_keluar" id="tgl_keluar" placeholder="Tgl Keluar" value="<?php echo $tgl_keluar; ?>" />
        </div>
        <div class="form-group">
            <label for="varchar">Harga </label>
            <input type="text" class="form-control" name="harga" id="harga"  >
        </div>
        <div class="form-group">
            <label for="varchar">Stok </label>
            <input type="text" class="form-control" name="stok" id="stok"  readonly>
        </div>
        <div class="form-group">
            <label for="int">Jumlah jual<?php echo form_error('jumlah_jual') ?></label>
            <input type="number" class="form-control" name="jumlah_jual" id="jumlah_jual" placeholder="jumlah" value="<?php echo $jumlah_jual; ?>" oninput="myFunction()" / >
        </div>

        <div class="form-group">
            <label for="varchar">Total </label>
            <input type="text" class="form-control" name="total" id="total"  >
        </div>
        <input type="hidden" name="id_barang_keluar" value="<?php echo $id_barang_keluar; ?>" /> 
        <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
        <a href="<?php echo site_url('barang_keluar') ?>" class="btn btn-default">Cancel</a>
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

    today = dd + '/' + mm + '/' + yyyy;

    function autofill(){
        var kode_barang =document.getElementById('kode_barang').value;

        $.ajax({
                       url:"<?php echo base_url();?>index.php/barang_keluar/cari",
                       data:'&kode_barang='+kode_barang,
                       success:function(data){
                           var hasil = JSON.parse(data);  
                    
            $.each(hasil, function(key,val){ 
                
               document.getElementById('kode_barang').value=val.kode_barang;
                           document.getElementById('nama_barang').value=val.nama_barang;
                           document.getElementById('tgl_keluar').value=today;
                           document.getElementById('stok').value=val.stok;
                           document.getElementById('harga').value=val.harga;
                             
                               
                    
                });
            }
        });
                  
    }

    function myFunction() {
        var x = document.getElementById("jumlah_jual").value;
        var stok= document.getElementById("stok").value;    
        

        if(x > stok){
            alert("Jumlah jual tidak boleh melebihi stok");
            document.getElementById('jumlah_jual').value= "";
            document.getElementById('total').value="";
        }else{
            var y = document.getElementById("harga").value;

            document.getElementById('total').value=x*y;
        }
    }
</script>