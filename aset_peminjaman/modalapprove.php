<?php
include('connection.php');
?>

<div id ="approve" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
         <!-- Modal Header -->
      <div class ="modal-header">
        <button type="button" class="close" data-dismiss="modal">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Tutup</span>
            </button>
        <h4 class="modal-title"> Form Approve </h4>
    </div>
    
    <div class="modal-body">
        <?php 
        $kode_aset=$_GET['kode_aset'];
        ?>
                                    
                                  <form class="form-horizontal" action='proses/prosesapprove.php' method='POST' enctype="multipart/form-data" onsubmit="return validasi_input(this)">

                             
                                <div class="form-group">
                                <label for="kode_aset">Kode Aset*</label>
                                <input type="text" id="kode_aset" name="kode_aset" value="<?php echo $data['kode_aset']?>" class="form-control" readonly>
                                </div>
                              

                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <input type="text" class="form-control" name="status" id="status" placeholder="Pilih Status"/>
                                </div>

                                <div class="form-group">
                                    <label for="Keterangan">Keterangan</label>
                                    <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Pilih Keterangan"/>
                                </div>

                                <div class="form-group">
                                    <label for="keteranganapproval">TTD</label>
                                    <textarea type="text" class="form-control" id="keteranganapproval" name="keteranganapproval" placeholder="Upload TTD Anda"></textarea>
                                </div>
                            </form>
                            </div>

                            <!-- Modal Footer -->
                            <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                            <button class="btn btn-primary  btn-sm pull-right" name="simpan">KIRIM</button>

                           </div>
                            </div>
                            </div>
                            </div>