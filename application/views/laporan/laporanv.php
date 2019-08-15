
    <!--Load chart js-->
    
<div class="row">
    <div class="col-md-6">
        <center>Data Jumlah Beli</center>
        <canvas id="canvas" width="500" height="280"></canvas>
    </div>

    <div class="col-md-6">
        <center>Data Jumlah Jual</center>
        <canvas id="canvas2" width="500" height="280"></canvas>
    </div>
    <hr/>
</div>
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
        <table id="example2" class="table table-bordered" style="margin-bottom: 10px">
            <thead>
            <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Kode Barang</th>
            <th>Harga Beli</th>
            <th>Harga jual</th>
            <th>Stok</th>
            <th>Jumlah Beli</th>
            <th>Jumlah jual</th>
            <th>Jumlah akhir </th>
            <th>Keuntungan</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($Laporan_data as $barang)
            {
                ?>
                <tr>
                    <td width="80px"><?php echo ++$start ?></td>
                    <td><?php echo $barang->nama ?></td>
                    <td><a href="<?php echo site_url('barang/barang_by_kode');?>/<?php echo $barang->kode_barang_utama?>"><?php echo $barang->kode_barang_utama?></a></td>
                    <td><?php echo "Rp ",number_format($barang->harga_beli_masuk,2,",","."); ?></td>
                    <td><?php echo "Rp ",number_format($barang->harga,2,",","."); ?></td>
                    <td><?php echo $barang->stok ?></td>
                    <td><?php echo $barang->jumlah_beli_masuk ?></td>
                    <td><?php echo $barang->jumlah_jual ?></td>
                    <td><?php echo $barang->stok + $barang->jumlah_beli_masuk-$barang->jumlah_jual ?></td>
                    <td>
                        <?php
                            $selisih= $barang->harga-$barang->harga_beli_masuk;
                            echo "Rp ",number_format($selisih*3,2,",",".");
                        ?>
                    </td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
        </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>

    <?php
        foreach($Laporan_data as $data){
            $merk[] = $data->nama;
            $stok[] = (float) $data->jumlah_jual;
            $beli[] = (float) $data->jumlah_beli_masuk;
        }
    ?>

    <script type="text/javascript" src="<?php echo base_url().'assets/chartjs/chart.min.js'?>"></script>
    <script>

            var lineChartData = {
                labels : <?php echo json_encode($merk);?>,
                datasets : [
                    
                    {
                        fillColor: "rgba(60,141,188,0.9)",
                        strokeColor: "rgba(60,141,188,0.8)",
                        pointColor: "#3b8bba",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(152,235,239,1)",
                        data : <?php echo json_encode($stok);?>
                    }

                ]
                
            }

            var lineChartData2 = {
                labels : <?php echo json_encode($merk);?>,
                datasets : [
                    
                    {
                        fillColor: "rgba(60,141,188,0.9)",
                        strokeColor: "rgba(60,141,188,0.8)",
                        pointColor: "#3b8bba",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(152,235,239,1)",
                        data : <?php echo json_encode($beli);?>
                    }

                ]
                
            }

        var myLine = new Chart(document.getElementById("canvas").getContext("2d")).Bar(lineChartData2, {
            scaleOverride: true,
            scaleSteps: 10, // number of ticks
            scaleStepWidth: 5, // tick interval
            scaleBeginAtZero: true
        });

        var myLine = new Chart(document.getElementById("canvas2").getContext("2d")).Bar(lineChartData, {
            scaleOverride: true,
            scaleSteps: 10, // number of ticks
            scaleStepWidth: 5, // tick interval
            scaleBeginAtZero: true
        });

        
    </script>